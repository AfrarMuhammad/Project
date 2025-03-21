<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jewellery Shop Signup</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Lato', sans-serif;
    }

    /* Full-page container */
    .outer-box {
      width: 100vw;
      height: 100vh;
      background: #F3E5C3;
      position: relative;
      overflow: hidden;
    }

    /* Central signup container with the dark background */
    .inner-box {
      width: 550px;
      padding: 350px 50px;
      margin: 0 auto;
      position: absolute;
      top: 50%;
      left: 83%;
      transform: translate(-50%, -50%);
      background: #174E4F;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      z-index: 2;
    }

    /* Header section styling */
    .signup-header h1 {
      font-size: 2.5rem;
      color: #F3E5C3;
      text-align: center;
    }

    .signup-header p {
      font-size: 1rem;
      color: #ddd;
      text-align: center;
      margin-bottom: 20px;
    }

    /* Form styling */
    .signup-body p {
      margin: 12px 0;
    }

    .signup-body p label {
      display: block;
      font-weight: 600;
      margin-bottom: 5px;
      color: #F3E5C3;
    }

    .signup-body p input {
      width: 100%;
      padding: 14px;
      border: 2px solid #ccc;
      border-radius: 20px;
      font-size: 1rem;
      margin-top: 4px;
    }

    /* Styling for the submit button */
    .signup-body p input[type="submit"] {
      border: none;
      color: #D7EAE2;
      cursor: pointer;
      background-size: 200%;
      background-image: linear-gradient(to right, #E84F5E, #5C0E14);
      transition: background 0.4s ease-in-out;
    }

    .signup-body p input[type="submit"]:hover {
      background-image: linear-gradient(to right, #5C0E14, #E84F5E);
    }

    /* Footer styling */
    .signup-footer p {
      color: #ddd;
      text-align: center;
      font-size: 0.9rem;
    }

    .signup-footer p a {
      color: #F17141;
      text-decoration: none;
    }

    .signup-footer p a:hover {
      text-decoration: underline;
    }

    /* Responsive Adjustments */
    @media (max-width: 600px) {
      .inner-box {
        width: 90%;
        padding: 50px;
      }
    }
  </style>
</head>
<body>
  <div class="outer-box">
    <div class="inner-box">
      <header class="signup-header">
        <h1>Sign Up</h1>
        <p>Create your account</p>
      </header>
      <main class="signup-body">
        <form action="process_signup.php" method="POST" onsubmit="return validateForm()">
          <p>
            <label for="username">Username</label>
            <input type="text" name="username" placeholder="Enter your username" required>
          </p>
          <p>
            <label for="email">Email ID</label>
            <input type="email"  name="email" placeholder="Enter your email" required>
          </p>
          <p>
            <label for="phone">Phone Number</label>
            <input  name="phoneno" placeholder="Enter your phone number" pattern="[0-9]{10}" required>
          </p>
          <p>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
          </p>
          <p>
            <label for="confirm_password">Confirm Password</label>
            <input type="password"  name="confirm_password" placeholder="Confirm your password" required>
          </p>
          <p>
            <input type="submit" value="Create Account">
          </p>
        </form>
      </main>
      <footer class="signup-footer">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </footer>
    </div>
  </div>

  <script>
    function validateForm() {
      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm-password").value;
      const phone = document.getElementById("phone").value;
      const phonePattern = /^[0-9]{10}$/;

      if (!phonePattern.test(phone)) {
        alert("Please enter a valid 10-digit phone number.");
        return false;
      }

      if (password !== confirmPassword) {
        alert("Passwords do not match!");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
