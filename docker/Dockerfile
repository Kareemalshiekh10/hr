# syntax=docker/dockerfile:1

# Comments are provided throughout this file to help you get started.
# If you need more help, visit the Dockerfile reference guide at
# https://docs.docker.com/go/dockerfile-reference/

ARG PYTHON_VERSION=3.11.8
FROM python:${PYTHON_VERSION}-slim as base
# FROM ubuntu:22.04
# FROM ppemodel:v2

# Set the working directory in the container
WORKDIR /app

# Copy the FastAPI application code into the container
COPY . /app

# Copy the requirements.txt file into the container
COPY requirements.txt /app/requirements.txt

# Install the dependencies from requirements.txt
RUN pip install -r /app/requirements.txt

# Expose the port that FastAPI runs on
EXPOSE 8000

# Command to run the FastAPI application
CMD ["python", "overall_rating.py"]

