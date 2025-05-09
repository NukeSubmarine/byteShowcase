// In src/api.js

export async function getTrainSchedule(departure, destination) {
    try {
        // Make a GET request to the backend API with query parameters
        const response = await fetch(
            `http://127.0.0.1:8080/api/train-schedule?departure=${departure}&destination=${destination}`
        );

        if (!response.ok) {
            throw new Error(`HTTP error! Status: ${response.status}`);
        }

        // Parse and return the JSON response
        return await response.json();
    } catch (error) {
        console.error("Error fetching train schedule:", error);
        throw error;  // Re-throw the error to handle it in App.js
    }
}


