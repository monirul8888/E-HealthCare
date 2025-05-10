<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - E-Health Care</title>

    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="about.css">
    <link rel="stylesheet" href="home.css">
</head>

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
        <div class="about-content">
            <h1>About E-Health Care</h1>
            <p>
                At E-Health Care, we believe in leveraging technology to transform the way healthcare is delivered.
                Founded in 2024, our goal is to bridge the gap between patients and quality healthcare services,
                making it easier, faster, and more affordable for everyone to access the care they deserve.
            </p>
            <h2>Our Mission</h2>
            <p>
                To provide accessible and affordable healthcare solutions to individuals worldwide by using innovative
                digital tools and a patient-centric approach.
            </p>
            <h2>Our Vision</h2>
            <p>
                To revolutionize the healthcare industry by becoming the leading platform for virtual health services
                and ensuring every individual has access to quality care, no matter where they are.
            </p>
            <h2>Why Choose Us?</h2>
            <ul>
                <li>24/7 access to certified doctors and specialists.</li>
                <li>Convenient online consultations from the comfort of your home.</li>
                <li>Secure and fast delivery of medicines to your doorstep.</li>
                <li>Comprehensive health monitoring and personalized care plans.</li>
            </ul>
            <p>
                Join us in our journey to make healthcare accessible for all. Together, we can create a healthier,
                happier world.
            </p>
        </div>
    </div>
    <div class="footer">
        &copy; 2024 E-Health Care. All Rights Reserved.
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