from flask import Flask, request, jsonify  # Import Flask for web server and request handling
from services.train_service import get_train_schedule  # Import the updated function

# Initialize the Flask app
app = Flask(__name__)

# Route for the home page
@app.route("/", methods=["GET"])
def home():
    return "<h1>Welcome to Faretix Backend API!</h1>", 200

@app.route('/api/train-schedule', methods=['GET'])
def train_schedule():
    """API endpoint to get the train schedule based on user input."""
    # Call the service function which now supports query parameters
    schedule_data = get_train_schedule()
    return jsonify(schedule_data)


# Run the Flask app
if __name__ == "__main__":
    app.run(debug=True, host='0.0.0.0', port=8080)
