<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chat App</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <style>
    body {
      font-family: "Open Sans", sans-serif;
      display: grid;
      place-content: center;
      background-color: #ebebeb;
      min-height: 100vh;
    }




    .main {
      margin-top: 100px;
      border: 8px solid #dddddd;
      border-radius: 24px;
      overflow: hidden;
      background-color: #fff;
    }

    .name {
      display: flex;
      font-size: 32px;
      font-weight: 700;
      padding: 8px 16px;
      color: #7e7e7e;
      background-color: #ebebeb;
    }

    .name > span {
      color: #bbb;
    }

    .name-input {
      font-size: 24px;
      font-weight: 700;
      color: #7e7e7e;
      flex-grow: 1;
      border: none;
      margin: 0 12px;
      outline: none;
      background-color: #ebebeb;
    }

    .message-container {
      display: flex;
      flex-direction: column;
      background-color: #f6f6f6;
      width: 400px;
      height: 600px;
      overflow-y: auto;
      overflow-x: hidden;
    }

    .message-left,
    .message-right {
      list-style: none;
      padding: 8px 12px;
      margin: 12px;
      max-width: 250px;
      font-size: 18px;
      word-wrap: break-word;
    }

    .message-left {
      border-radius: 20px 20px 20px 0;
      align-self: flex-start;
      background-color: #fff;
      box-shadow: -2px 2px 4px #dcdcdc;
    }

    .message-right {
      border-radius: 20px 20px 0 20px;
      align-self: flex-end;
      background-color: #2d2d2d;
      box-shadow: 2px 2px 4px #dcdcdc;
      color: #f6f6f6;
    }

    .message-left p span,
    .message-right p span {
      display: block;
      font-style: italic;
      font-size: 12px;
      margin-top: 4px;
    }

    .message-form {
      display: flex;
      justify-content: space-between;
      width: 400px;
    }

    .message-input {
      flex-grow: 1;
      height: 48px;
      font-size: 16px;
      border: none;
      outline: none;
      padding: 0 12px;
      background-color: #fff;
    }

    .send-button {
      height: 48px;
      font-size: 16px;
      border: none;
      padding: 0 20px;
      outline: none;
      background-color: #fff;
      cursor: pointer;
    }

    .v-divider {
      height: 48px;
      width: 2px;
      background-color: #f6f6f6;
    }
  </style>
  <link rel="stylesheet" href="index.css">

</head>
<body>

  <!-- Header Section -->
  <div class="header">
    <h2>Welcome To E-Health Care</h2>
    <div class="nav-links">
      <a href="home.php">Home</a>
      <a href="doctors.php">Doctors</a>
      <a href="services.php">Services</a>
      <a href="signup.php">Sign Up</a>
      <a href="signin.php">Log In</a>
      <a href="about.php">About Us</a>
    </div>
  </div>

  <!-- Chat Section -->
  <h1 class="title">eHealthCare Messenger</h1>
  <div class="main">
    <div class="name">
      <span><i class="far fa-user"></i></span>
      <input type="text" id="name-input" class="name-input" value="anonymous" maxlength="20" />
    </div>

    <ul class="message-container" id="message-container"></ul>

    <form class="message-form" id="message-form">
      <input type="text" id="message-input" class="message-input" placeholder="Type your message..." required />
      <div class="v-divider"></div>
      <button type="submit" class="send-button">Send <i class="fas fa-paper-plane"></i></button>
    </form>
  </div>

  <script>
    document.addEventListener("DOMContentLoaded", () => {
      const messageForm = document.getElementById("message-form");
      const nameInput = document.getElementById("name-input");
      const messageInput = document.getElementById("message-input");
      const messageContainer = document.getElementById("message-container");

      messageForm.addEventListener("submit", function (e) {
        e.preventDefault();
        const sender = nameInput.value.trim();
        const message = messageInput.value.trim();
        if (!message) return;

        fetch("chat.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/x-www-form-urlencoded",
          },
          body: `sender_name=${encodeURIComponent(sender)}&message_text=${encodeURIComponent(message)}`,
        })
          .then((res) => res.json())
          .then((data) => {
            console.log(data);
            if (data.success) {
              messageInput.value = "";
              loadMessages();
            } else {
              alert(data.error || "Message not sent.");
            }
          })
          .catch((err) => console.error("Error:", err));
      });

      function loadMessages() {
        fetch("chat.php")
          .then((res) => res.json())
          .then((messages) => {
            messageContainer.innerHTML = "";
            const currentUser = nameInput.value.trim();

            messages.forEach((msg) => {
              const li = document.createElement("li");
              li.className = msg.sender_name === currentUser ? "message-right" : "message-left";
              li.innerHTML = `<p>${msg.message_text}<span>${msg.sender_name} | ${msg.created_at}</span></p>`;
              messageContainer.appendChild(li);
            });

            messageContainer.scrollTop = messageContainer.scrollHeight;
          });
      }

      // Load initially and every 2 seconds
      loadMessages();
      setInterval(loadMessages, 2000);
    });
  </script>
</body>
</html>




