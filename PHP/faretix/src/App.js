import './App.css';
import React from 'react';  // Ensure React is imported

function App() {
  // State to store train schedule
  const [schedule, setSchedule] = React.useState(null);

  // States for user input fields
  const [departure, setDeparture] = React.useState("");
  const [departureDate, setDepartureDate] = React.useState("");
  const [destination, setDestination] = React.useState("");
  const [returnDate, setReturnDate] = React.useState("");

  // State to store error message
  const [errorMessage, setErrorMessage] = React.useState("");

  // State for station suggestions
  const [suggestions, setSuggestions] = React.useState([]);

  // Function to fetch train schedule based on user input
  const handleSearch = async () => {
    if (!departure || !destination) {
      // Show an error message if stations are missing
      setErrorMessage("Please enter both departure and destination stations.");
      return;
    }
    
    if (!departureDate || !returnDate) {
      setErrorMessage("Please select both departure and return dates.");
      return;
    }

    // Check if the dates are in the correct order
    if (new Date(departureDate) > new Date(returnDate)) {
      setErrorMessage("Return date cannot be earlier than departure date.");
      return;
    }    

    // Send request to backend API with query parameters
    try {
      setErrorMessage("");  // Clear any existing error message
      const response = await fetch(
        `http://127.0.0.1:8080/api/train-schedule?departure=${departure}&destination=${destination}`
      );
      const data = await response.json();
      setSchedule(data);  // Update the state with the response data
    } catch (error) {
      console.error("Error fetching train schedule:", error);
      alert("An error occurred while fetching the train schedule.");
    }
  };

  // Function to fetch station suggestions based on user input
  const fetchStationSuggestions = async (query) => {
    if (!query) {
      setSuggestions([]);  // Clear suggestions if the input is empty
      return;
    }

    try {
      const username = process.env.REACT_APP_API_USERNAME;
      const password = process.env.REACT_APP_API_PASSWORD;

      // Send a request with Basic Authentication
      const response = await fetch(`https://opendata.nationalrail.co.uk/api/staticfeeds/4.0?query=${query}`, {
        headers: {
          'Authorization': `Basic ${btoa(`${username}:${password}`)}`
        }
      });

      const data = await response.json();
      setSuggestions(data.stations || []);
    } catch (error) {
      console.error("Error fetching station suggestions:", error);
    }
  };

  return (
    <div className="App">
      {/* Navigation Bar */}
      <header className="navbar">
        <div className="logo">Faretix</div>
        <nav>
          <a href="#home">Home</a>
          <a href="#schedules">Train Schedules</a>
          <a href="#tickets">Tickets</a>
          <a href="#contact">Contact</a>
        </nav>
      </header>

      {/* Hero Section */}
      <section className="hero-section">
        <h1>Welcome to Faretix!</h1>
        <p>Your one-stop solution for train schedules and ticketing.</p>

        {/* Search Form Box */}
        <div className="search-box">
          {errorMessage && <p className="error-message">{errorMessage}</p>}

          {/* Departure Row */}
          <div className="search-row">
            <input
              type="text"
              placeholder="Enter departure station..."
              value={departure}
              onChange={(e) => {
                setDeparture(e.target.value);
                fetchStationSuggestions(e.target.value);
              }}
            />
            {/* Suggestions List */}
            {suggestions.length > 0 && (
              <ul className="suggestions-list">
                {suggestions.map((station, index) => (
                  <li key={index} onClick={() => setDeparture(station.name)}>
                    {station.name}
                  </li>
                ))}
              </ul>
            )}
            <input
              type="date"
              placeholder="Select departure date..."
              value={departureDate}
              onChange={(e) => setDepartureDate(e.target.value)}
            />
          </div>

          {/* Destination Row */}
          <div className="search-row">
            <input
              type="text"
              placeholder="Enter destination station..."
              value={destination}
              onChange={(e) => setDestination(e.target.value)}
            />
            <input
              type="date"
              placeholder="Select return date..."
              value={returnDate}
              onChange={(e) => setReturnDate(e.target.value)}
            />
          </div>

          {/* Search Button */}
          <div className="search-form">
            <button onClick={handleSearch}>Search</button>
          </div>
        </div>
      </section>

      {/* Display train schedule */}
      <section className="schedule-section">
        <h2>Train Schedule</h2>
        {schedule ? (
          <div>
            <p><strong>Departure:</strong> {schedule.departure}</p>
            <p><strong>Destination:</strong> {schedule.destination}</p>
            <p><strong>Departure Time:</strong> {schedule.departure_time}</p>
            <p><strong>Arrival Time:</strong> {schedule.arrival_time}</p>
            <p><strong>Status:</strong> {schedule.status}</p>
          </div>
        ) : (
          <p>Loading schedule...</p>
        )}
      </section>

      {/* Promotions Section */}
      <section className="promotions">
        <div className="promo-card">
          <h2>Plan Your Next Journey</h2>
          <p>Find the best routes and ticket options available.</p>
        </div>
        <div className="promo-card">
          <h2>Get Exclusive Discounts</h2>
          <p>Save on your travels with our partner promotions.</p>
        </div>
      </section>

      <footer className="footer">
        <p>Powered by National Rail Enquiries (NRE) data.</p>
        <p>
          Welcome to FareTix.com – a platform I’m developing to enhance my software skills.
          This site connects to the NRE API to display real-time train schedules and updates.
          It’s a continuous learning project where I add new features and improvements over time.
        </p>
        <p>
          Through FareTix, I’m growing in backend integration, API development, frontend design, and secure data handling.
          Follow along as I refine this platform and share my journey as a software engineer.
        </p>
        <p className="copyright">
          © 2025 | Created by FCX NukeSubmarine. All rights reserved.
        </p>
      </footer>
    </div>
  );
}

export default App;
