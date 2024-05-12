from flask import Flask, request, jsonify
import pickle
import numpy as np

app = Flask(__name__)

# Data dictionary (can be removed if not needed)
# user_data = {'work_life_balance': None, 'skill_development': None, ...}

filename = 'model.sav'
model = pickle.load(open(filename, 'rb'))

@app.route('/', methods=['POST'])
def get_input():
    if request.method == 'POST':
        if request.is_json:  # Check if the request has JSON content
            data = request.get_json()  # Parse the JSON data

            # Extract user input from the JSON (modify key names as needed)
            work_life_balance = float(data.get('work_life_balance'))
            skill_development = float(data.get('skill_development'))
            salary_and_benefits = float(data.get('salary_and_benefits'))
            job_security = float(data.get('job_security'))
            career_growth = float(data.get('career_growth'))
            work_satisfaction = float(data.get('work_satisfaction'))

            # Validate and process data (optional)
            # ...
            
            # Create the input for the model
            input_data = [
                work_life_balance,
                skill_development,
                salary_and_benefits,
                job_security,
                career_growth,
                work_satisfaction
            ]

            # Make prediction
            prediction = model.predict([input_data])  # Reshape for single sample
            overall_rating = np.round(prediction[0], 2)  # Get first element

            # Return JSON response
            return jsonify({'Overall_rating': overall_rating})

        else:
            return jsonify({'error': 'Request must be JSON'}), 400  # Error for non-JSON requests

if __name__ == '__main__':
    app.run(host="0.0.0.0", debug=True, port=8000)