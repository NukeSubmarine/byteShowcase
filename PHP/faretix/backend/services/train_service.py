# Update your train_service.py file with the following code

from flask import request  # Import request to handle query parameters

def get_train_schedule():
    """Generate dynamic train schedule based on query parameters."""
    # Fetch query parameters from the request
    departure_station = request.args.get('departure', 'London Kings Cross')
    destination_station = request.args.get('destination', 'Edinburgh Waverley')

    # Generate dynamic response with the provided parameters
    schedule = {
        "departure": departure_station,
        "destination": destination_station,
        "departure_time": "10:30 AM",
        "arrival_time": "2:30 PM",
        "status": "On Time"
    }

    return schedule

