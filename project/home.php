<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "Jewllery";
$port = 3307;

$conn = new mysqli($servername, $username, $password, $dbname, $port);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: home.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jewelry Collections</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            line-height: 1.6;
            background-color: #F3E5C3;
            color: #174E4F;
        }

        html { scroll-behavior: smooth; }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background-color: #fff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .logo {
            font-size: 24px;
            font-weight: bold;
            color: #174E4F;
        }

        nav {
            display: flex;
            align-items: center;
            margin-left: 20px; /* Shifts navigation to the right */
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 20px;
            margin: 0;
            padding: 0;
        }

        nav a {
            text-decoration: none;
            color: #174E4F;
            font-weight: 500;
        }

        nav a:hover {
            color: #F3E5C3;
            background-color: #174E4F;
            padding: 5px 10px;
            border-radius: 3px;
        }

        .hero {
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background-image: url('jewelry-background.jpg');
            background-size: cover;
            background-position: center;
            color: #174E4F;
            padding: 0 20px;
        }

        .hero h1 {
            font-size: 48px;
            margin-bottom: 10px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 20px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .hero .reserve-button {
            padding: 12px 25px;
            background-color: #174E4F;
            color: #F3E5C3;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }

        .hero .reserve-button:hover {
            background-color: #0F3435;
        }

        .why-choose-us {
            padding: 50px;
            text-align: center;
            background-color: #F3E5C3;
        }

        .why-choose-us h2 {
            font-size: 32px;
            color: #174E4F;
            margin-bottom: 20px;
        }

        .why-choose-us p {
            font-size: 18px;
            color: #174E4F;
            max-width: 600px;
            margin: 0 auto;
        }

        .collections {
            padding: 50px;
            text-align: center;
            background-color: #fff;
        }

        .collections h2 {
            font-size: 32px;
            color: #174E4F;
            margin-bottom: 20px;
        }

        .collections p {
            font-size: 18px;
            color: #174E4F;
            max-width: 600px;
            margin: 0 auto 30px;
        }

        .collection-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            max-width: 1200px;
            margin: 30px auto;
        }

        .collection-item {
            position: relative;
            background-color: #F3E5C3;
            padding: 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .collection-item:hover {
            transform: scale(1.05);
        }

        .collection-item img {
            width: 100%;
            height: auto; /* Allows proportional scaling */
            object-fit: cover;
            border-radius: 5px;
        }

        .collection-item h3 {
            color: #174E4F;
            margin: 10px 0;
            font-size: 18px;
        }

        .price { font-weight: bold; }
        .stock { color: #0F3435; font-style: italic; }

        .form-container {
            background: white;
            padding: 20px;
            border-radius: 5px;
            max-width: 400px;
            margin: 20px auto;
            display: none;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            color: #174E4F;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .cta-button {
            padding: 12px 25px;
            background-color: #174E4F;
            color: #F3E5C3;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            cursor: pointer;
        }

        .cta-button:hover {
            background-color: #0F3435;
        }

        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 4px;
            margin-bottom: 10px;
        }

        footer {
            background-color: #174E4F; /* Matches the dark teal in the image */
            color: #D7C4A8; /* Light beige/off-white text color to match the image */
            text-align: center;
            padding: 20px 0;
            width: 100%;
            position: relative;
            bottom: 0;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">Jewelry</div>
        <nav>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#collections">Collections</a></li>
            </ul>
        </nav>
    </header>

    <section class="hero" id="home">
        <h1>Reserve Your Timeless Piece</h1>
        <p>Discover elegance and exclusivity with our handcrafted jewelry.</p>
        <a href="index.php" class="reserve-button">Reserve Now</a>
    </section>

    <section class="why-choose-us">
        <h2>Why Choose Us?</h2>
        <p>At Jewelry, we offer bespoke designs and a seamless reservation experience. Secure your favorite piece today!</p>
    </section>

    <section class="collections" id="collections">
        <h2>Our Collections</h2>
        <p>Explore our stunning range of handcrafted jewelry pieces, designed with elegance and precision.</p>
        <div class="collection-grid">
            <div class="collection-item" onclick="window.location.href='index.php?id=1'">
                <img src="emeraldbliss.jpg" alt="Emerald Bliss">
                <h3>Emerald Bliss</h3>
                <p class="price">$1,299.99</p>
                <p class="stock">Stock: 49</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=2'">
                <img src="sapphiredream.jpg" alt="Sapphire Dream">
                <h3>Sapphire Dream</h3>
                <p class="price">$899.99</p>
                <p class="stock">Stock: 50</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=3'">
                <img src="rubyglow.jpg" alt="Ruby Glow">
                <h3>Ruby Glow</h3>
                <p class="price">$999.99</p>
                <p class="stock">Stock: 49</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=4'">
                <img src="diamondfrost.jpg" alt="Diamond Frost">
                <h3>Diamond Frost</h3>
                <p class="price">$1,499.99</p>
                <p class="stock">Stock: 49</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=5'">
                <img src="pearlelegance.jpg" alt="Pearl Elegance">
                <h3>Pearl Elegance</h3>
                <p class="price">$799.99</p>
                <p class="stock">Stock: 50</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=6'">
                <img src="amethystdream.jpg" alt="Amethyst Dream">
                <h3>Amethyst Dream</h3>
                <p class="price">$599.99</p>
                <p class="stock">Stock: 50</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=7'">
                <img src="goldensunrise.jpg" alt="Golden Sunrise">
                <h3>Golden Sunrise</h3>
                <p class="price">$899.99</p>
                <p class="stock">Stock: 50</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=8'">
                <img src="oceanblue.jpg" alt="Ocean Blue Topaz">
                <h3>Ocean Blue Topaz</h3>
                <p class="price">$699.99</p>
                <p class="stock">Stock: 50</p>
            </div>
            <div class="collection-item" onclick="window.location.href='index.php?id=9'">
                <img src="diamondinfinity.jpg" alt="Diamond Infinity">
                <h3>Diamond Infinity</h3>
                <p class="price">$1,299.99</p>
                <p class="stock">Stock: 50</p>
            </div>
        </div>
    </section>

    <!-- Login Form -->
    <div id="login-form" class="form-container">
        <h2>Login</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <form method="POST" action="home.php">
            <input type="hidden" name="action" value="login">
            <div class="form-group">
                <label for="login-email">Email</label>
                <input type="email" id="login-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="login-password">Password</label>
                <input type="password" id="login-password" name="password" required>
            </div>
            <button type="submit" class="cta-button">Login</button>
        </form>
    </div>

    <!-- Sign Up Form -->
    <div id="signup-form" class="form-container">
        <h2>Sign Up</h2>
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message"><?php echo $_SESSION['error']; unset($_SESSION['error']); ?></div>
        <?php endif; ?>
        <?php if (isset($_SESSION['success'])): ?>
            <div class="success-message"><?php echo $_SESSION['success']; unset($_SESSION['success']); ?></div>
        <?php endif; ?>
        <form method="POST" action="home.php">
            <input type="hidden" name="action" value="signup">
            <div class="form-group">
                <label for="signup-username">Username</label>
                <input type="text" id="signup-username" name="username" required>
            </div>
            <div class="form-group">
                <label for="signup-email">Email</label>
                <input type="email" id="signup-email" name="email" required>
            </div>
            <div class="form-group">
                <label for="signup-password">Password</label>
                <input type="password" id="signup-password" name="password" required>
            </div>
            <button type="submit" class="cta-button">Sign Up</button>
        </form>
    </div>

    <footer>
        <p>© 2025 Jewelry. All rights reserved.</p>
    </footer>

    <script>
        // Show/hide forms based on hash
        window.addEventListener('hashchange', showRelevantForm);
        window.addEventListener('load', showRelevantForm);

        function showRelevantForm() {
            const hash = window.location.hash;
            document.getElementById('login-form').style.display = hash === '#login' ? 'block' : 'none';
            document.getElementById('signup-form').style.display = hash === '#signup' ? 'block' : 'none';
        }
    </script>
</body>
</html>