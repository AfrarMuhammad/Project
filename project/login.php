<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Jewellery Shop Login</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Lato', sans-serif;
    }

    /* Full-page container with the specified background color */
    .outer-box {
      width: 100vw;
      height: 100vh;
      background: #F3E5C3;
      position: relative;
      overflow: hidden;
    }

    /* Central login container with the new dark background */
    .inner-box {
      width: 550px;
      padding: 350px 50px;
      margin: 0 auto;
      position: relative;
      margin-right: 0%;
      top: 45%;
      transform: translateY(-50%);
      background: #174E4F;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      z-index: 2;
    }

    /* Header section styling with light text for contrast */
    .login-header h1 {
      font-size: 2.5rem;
      color: #F3E5C3;
      margin-bottom: 10px;
    }

    .login-header p {
      font-size: 1rem;
      color: #ddd;
      margin-bottom: 20px;
    }

    /* Main body styling for the form */
    .login-body {
      margin: 20px 0;
    }

    .login-body p {
      margin: 12px 0;
    }

    .login-body p label {
      display: block;
      font-weight: 600;
      margin-bottom: 5px;
      color: #F3E5C3;
    }

    /* Input fields styling */
    .login-body p input {
      width: 100%;
      padding: 14px;
      border: 2px solid #ccc;
      border-radius: 20px;
      font-size: 1rem;
      margin-top: 4px;
    }

    /* Styling for the submit button with gradient background */
    .login-body p input[type="submit"] {
      border: none;
      color: #D7EAE2;
      cursor: pointer;
      transition:  step-end;
      background-size: 200%;
      background-image: linear-gradient(to right, #E84F5E, #5C0E14);
    }

    .login-body p input[type="submit"]:hover {
      background-position: -100% 0;
    }

    /* Footer styling */
    .login-footer p {
      color: #ddd;
      text-align: center;
      font-size: 0.9rem;
    }

    .login-footer p a {
      color: #F17141;
      text-decoration: none;
    }

    .login-footer p a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="outer-box">
    <div class="inner-box">
      <header class="login-header">
        <h1>Login</h1>
        <p> Please enter your credentials.</p>
      </header>
      <main class="login-body">
        <form action="process_login.php" method="POST">
          <p>
            <label for="username">Username</label>
            <input type="email" name="email" placeholder="Enter your username" required>
          </p>
          <p>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Enter your password" required>
          </p>
          <p>
            <input type="submit" value="Login">
          </p>
        </form>
      </main>
      <footer class="login-footer">
        <p>Don't have an account? 
          <a href="singup.php">Sign Up</a>
        </p>
      </footer>
    </div>
  </div>
</body>
</html>
