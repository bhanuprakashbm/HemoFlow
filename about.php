<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | About</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/about1.png');
            background-size: cover;
            background-position: center;
            height: 300px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            color: white;
            margin-top: var(--nav-height);
            position: relative;
        }

        .hero-section h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-section p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .about-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .about-img {
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }

        .about-section h2 {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .about-section p {
            color: #718096;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        @media (max-width: 768px) {
            .hero-section {
                height: 250px;
            }

            .hero-section h1 {
                font-size: 2.5rem;
            }

            .about-section {
                padding: 3rem 0;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <header class="home-header">
        <nav class="home-nav">
            <a href="index.php" class="home-brand">
                <i class="fas fa-tint"></i>
                <h1>Hemo<span>Flow</span></h1>
            </a>

            <button class="menu-toggle d-lg-none">
                <i class="fas fa-bars"></i>
            </button>

            <ul class="home-nav-list">
                <li class="home-nav-item">
                    <a href="index.php" class="home-nav-link">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="home-nav-item">
                    <a href="about.php" class="home-nav-link active">
                        <i class="fas fa-info-circle"></i> About
                    </a>
                </li>
                <li class="home-nav-item">
                    <a href="bloodinfo.php" class="home-nav-link">
                        <i class="fas fa-tint"></i> Services
                    </a>
                </li>
                <li class="home-nav-item">
                    <a href="contact.php" class="home-nav-link">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </li>
                <li class="home-nav-item">
                    <a href="login.php" class="home-nav-link login-btn">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
                </li>
                <li class="home-nav-item">
                    <div class="font-controls">
                        <button class="font-control-btn" title="Increase font size">A+</button>
                        <button class="font-control-btn" title="Normal font size">A</button>
                        <button class="font-control-btn" title="Decrease font size">A-</button>
                    </div>
                </li>
            </ul>
        </nav>
    </header>

    <div class="main-content">
        <div class="hero-section">
            <h1>About HemoFlow</h1>
            <p>Connecting donors with recipients, saving lives one donation at a time.</p>
        </div>

        <section class="about-section">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <img src="image/about1.png" class="img-fluid about-img" alt="About HemoFlow">
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <h2>BLOOD - "I'm here to save you!"</h2>
                        <p class="py-3">We believe Every life counts!, Every life matters. Time is the essence when it comes to saving lives. Our mission at HemoFlow is to streamline the blood donation process, making blood available quickly and efficiently to those who need it most.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>