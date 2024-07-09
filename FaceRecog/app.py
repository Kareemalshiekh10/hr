import os
import cv2
import numpy as np
import face_recognition
from flask import Flask, request, jsonify
from flask_cors import CORS

app = Flask(__name__)
CORS(app)

known_face_encodings = []
known_face_metadata = []
face_recognition_database_path = "Database"

def load_known_faces():
    global known_face_encodings, known_face_metadata
    if not os.path.exists(face_recognition_database_path):
        print(f"[!] Directory {face_recognition_database_path} does not exist.")
        return

    for folder in os.listdir(face_recognition_database_path):
        path = os.path.join(face_recognition_database_path, folder)
        if not os.path.isdir(path):
            continue

        for filename in os.listdir(path):
            if filename.endswith('.jpg') or filename.endswith('.png'):
                image_path = os.path.join(path, filename)
                try:
                    face_image = face_recognition.load_image_file(image_path)
                    face_encodings = face_recognition.face_encodings(face_image)
                    if face_encodings:
                        face_encoding = face_encodings[0]
                        name = folder
                        metadata = {"name": name}
                        known_face_encodings.append(face_encoding)
                        known_face_metadata.append(metadata)
                        print(f"Loaded {name} from {image_path}")
                except Exception as e:
                    print(f"[!] Error processing {image_path}: {e}")

load_known_faces()

def identify_person(frame: np.ndarray):
    rgb_frame = np.ascontiguousarray(frame[:, :, ::-1])
    face_locations = face_recognition.face_locations(rgb_frame)
    face_encodings = face_recognition.face_encodings(rgb_frame, face_locations)
    
    closest_face_name = "Unknown"
    closest_face_location = (0, 0, 0, 0)

    for face_encoding, (top, right, bottom, left) in zip(face_encodings, face_locations):
        matches = face_recognition.compare_faces(known_face_encodings, face_encoding)
        if True in matches:
            first_match_index = matches.index(True)
            closest_face_name = known_face_metadata[first_match_index]["name"]
            closest_face_location = (top, right, bottom, left)
    
    return closest_face_name, closest_face_location

@app.route('/identify', methods=['POST'])
def identify():
    if 'file' not in request.files:
        return jsonify({"error": "No file part in the request"}), 400

    file = request.files['file']

    if file.filename == '':
        return jsonify({"error": "No selected file"}), 400

    if file:
        image = np.frombuffer(file.read(), np.uint8)
        frame = cv2.imdecode(image, cv2.IMREAD_COLOR)
        
        name, face_location = identify_person(frame)
        top, right, bottom, left = face_location
        result = {
            "name": name,
            "face_location": {
                "top": top,
                "right": right,
                "bottom": bottom,
                "left": left
            }
        }
        return jsonify(result)

if __name__ == '__main__':
    app.run(host='0.0.0.0', port=7000)
