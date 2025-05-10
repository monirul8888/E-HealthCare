<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="services.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="contact-section.css"> <!-- Link to the new Contact Us CSS -->
</head>
<style>
    
    


.contact-section {
  background-color:rgb(241, 244, 250);
  padding: 40px 20px;
  margin-top: 50px;
  border-radius: 10px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

.contact-section h3 {
  font-size: 28px;
  color: #0077cc;
  margin-bottom: 20px;
}

.contact-section p {
  font-size: 16px;
  margin-bottom: 15px;
}

.contact-section ul {
  list-style-type: none;
  padding-left: 0;
  margin-bottom: 20px;
}

.contact-section ul li {
  margin-bottom: 8px;
}

.contact-section form label {
  display: block;
  margin: 12px 0 6px;
  font-weight: bold;
}

.contact-section input,
.contact-section textarea {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 6px;
  font-size: 15px;
}

.contact-section textarea {
  resize: vertical;
  height: 120px;
}

.contact-section button {
  margin-top: 15px;
  padding: 10px 25px;
  font-size: 16px;
  background-color: #28a745;
  color: #fff;
  border: none;
  border-radius: 6px;
  cursor: pointer;
  transition: background-color 0.3s;
}

.contact-section button:hover {
  background-color: #218838;
}











</style>
<body>
<div class="container">
    <div class="header">
        <h2>Welcome To E-Health Care</h2>
        <div class="nav-links">
            <a href="home.php">Home</a>
            <a href="doctors.php">Doctors</a>
            <a href="services.php">Services</a>
            <a href="signup.php">Sign Up</a>
            <a href="signin.php">Log In</a>
            <a href="about.php">About Us</a>

            <!-- Search Toggle and Bar -->
            <div class="search-section">
                <button id="search-toggle">🔍</button>
                <div id="search-bar" class="search-bar">
                    <input type="text" id="search-input" placeholder="Search...">
                    <button id="search-btn">Go</button>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <!-- Contact Us Section -->
        <div class="contact-section">
            <h3>Contact Us</h3>
            <p>If you have any questions, feel free to reach out to us:</p>
            <ul>
                <li><strong>Email:</strong> support@ehealthcare.com</li>
                <li><strong>Phone:</strong> +880 1234 567890</li>
                <li><strong>Address:</strong> Dhaka, Bangladesh</li>
            </ul>
            <form action="contact_form.php" method="POST">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Your Email</label>
                <input type="email" id="email" name="email" required>

                <label for="message">Your Message</label>
                <textarea id="message" name="message" required></textarea>

                <button type="submit">Send Message</button>
            </form>
        </div>

        <!-- Services Section -->
        <div class="services">
            <h3>Our Services</h3>
            <div class="service-list">
                <a href="doctors.php">
                    <div class="service-item">
                        <div class="image-size">
                            <img src="telemedicine.png" alt="Telemedicine">
                        </div>
                        <h4>Telemedicine</h4>
                        <p>Consult with our healthcare professionals online from the comfort of your home.</p>
                    </div>
                </a>
                <div class="service-item">
                    <div class="image-size">
                        <a href="pharmacy.php">
                            <img src="pharmacy.png" alt="Online Pharmacy">
                        </a>
                    </div>
                    <h4>Online Pharmacy</h4>
                    <p>Order medications online and have them delivered to your doorstep.</p>
                </div>
                <div class="service-item">
                    <div class="image-size">
                        <a href="checkups.php">
                            <img src="health-checkup.png" alt="Health Checkup">
                        </a>
                    </div>
                    <h4>Health Checkups</h4>
                    <p>Book regular health checkups and screenings to stay healthy.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="footer">
        &copy; 2025 E-Health Care. All Rights Reserved.
    </div>
</div>

<script>
    const toggle = document.getElementById('search-toggle');
    const searchBar = document.getElementById('search-bar');

    toggle.addEventListener('click', () => {
        searchBar.classList.toggle('active');
    });

    const searchInput = document.getElementById('search-input');
    const searchBtn = document.getElementById('search-btn');

    searchBtn.addEventListener('click', () => {
        const query = searchInput.value.trim().toLowerCase();

        switch (query) {
            case "home":
                window.location.href = "home.php";
                break;
            case "service":
            case "services":
                window.location.href = "services.php";
                break;
            case "doctors":
                window.location.href = "doctors.php";
                break;
            case "about":
                window.location.href = "about.php";
                break;
            default:
                alert("Page not found. Try typing: home, service, doctors, or about.");
        }
    });
</script>
</body>
</html>
