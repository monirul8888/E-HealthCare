<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Health Care</title>
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="home.css">
    <style>
        /* Extra CSS for doctor connection section */
        .doctor-connection {
            margin: 40px auto;
            padding: 25px;
            max-width: 600px;
            background-color: #ffffff;
            border: 1px solid #e0e0e0;
            border-radius: 10px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
        }

        .doctor-connection h2 {
            font-size: 26px;
            color: #007BFF;
            margin-bottom: 15px;
        }

        .doctor-connection p {
            font-size: 16px;
            color: #555;
            margin-bottom: 20px;
        }

        .dropdown-box select {
            width: 80%;
            padding: 12px 16px;
            font-size: 16px;
            border: 1px solid #007BFF;
            border-radius: 6px;
            background-color: #f9f9f9;
            color: #333;
            transition: box-shadow 0.3s, border-color 0.3s;
            cursor: pointer;
        }

        .dropdown-box select:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.2);
            outline: none;
        }

        @media (max-width: 600px) {
            .dropdown-box select {
                width: 95%;
            }
        }

        /* Styling for the button */
        .btn.primary {
            border: 2px solid  #388e3c; /* Update to a blue border */
            background-color:  #388e3c;
            color: white;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 6px;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn.primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        #bold{
            font-weight: 750;

        }
         body,
            html {
                margin: 0;
                padding: 0;
            }

            .container {
                margin: 0 auto;
                padding: 0;
            }

            .header {
                margin-bottom: 10px;
            }

            .content {
                margin-top:50px;
                padding-top: 30px;
            }


        

    </style>
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

        const findDoctorBtn = document.getElementById('find-doctor-btn');
        const specializationSelect = document.getElementById('specialization-select');

        findDoctorBtn.addEventListener('click', () => {
            const specialization = specializationSelect.value;
            if (specialization !== "Select Specialization" && specialization !== "") {
                window.location.href = `f_doctor.php?specialization=${encodeURIComponent(specialization)}`;
            } else {
                alert("Please select a specialization.");
            }
        });
    </script>
</body>
</html>
