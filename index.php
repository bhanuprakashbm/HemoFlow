<?php 
    session_start();

    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow - Modern Blood Bank Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        :root {
            --primary-color: #e23c3c;
            --secondary-color: #2d3748;
            --accent-color: #f56565;
            --text-color: #2d3748;
            --light-gray: #f8f9fa;
        }

        .brand-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none !important;
        }

        .brand-logo i {
            font-size: 2rem;
            color: var(--primary-color);
            filter: drop-shadow(0 2px 4px rgba(226, 60, 60, 0.2));
        }

        .brand-name {
            font-size: 1.8rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin: 0;
        }

        .brand-name span {
            color: var(--primary-color);
        }

        .top-header {
            background: white;
            padding: 15px 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .hero-section {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/bb1.jpg');
            background-size: cover;
            background-position: center;
            height: 600px;
            display: flex;
            align-items: center;
            position: relative;
            margin-top: var(--nav-height);
        }

        .hero-content {
            max-width: 800px;
            margin: 0 auto;
            text-align: center;
            color: white;
            z-index: 1;
        }

        .hero-content h1 {
            font-size: 3.5rem;
            font-weight: 700;
            margin-bottom: 1.5rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .hero-content p {
            font-size: 1.25rem;
            margin-bottom: 2rem;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .cta-button {
            display: inline-block;
            padding: 1rem 2.5rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: white;
            background: var(--primary-color);
            border-radius: 50px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(226, 60, 60, 0.3);
        }

        .cta-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(226, 60, 60, 0.4);
            color: white;
            text-decoration: none;
        }

        .feature-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            text-align: center;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .feature-icon {
            font-size: 2.5rem;
            color: var(--primary-color);
            margin-bottom: 1.5rem;
        }

        .feature-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--secondary-color);
        }

        .feature-text {
            color: #718096;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .hero-content h1 {
                font-size: 2.5rem;
            }

            .brand-name {
                font-size: 1.5rem;
            }

            .hero-section {
                height: 500px;
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
                    <a href="index.php" class="home-nav-link active">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
                <li class="home-nav-item">
                    <a href="about.php" class="home-nav-link">
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

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <h1>Save Lives with HemoFlow</h1>
                <p>Your contribution matters. One donation can save up to three lives. Join our mission to make blood readily available to those in need.</p>
                <a href="register.php" class="cta-button">Start Donating Today</a>
            </div>
                    </div>
    </section>

    <!-- Features Section -->
    <div class="container my-5">
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-search feature-icon"></i>
                    <h3 class="feature-title">Find Donors</h3>
                    <p class="feature-text">Quickly locate blood donors in your area and connect with them instantly.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-hospital feature-icon"></i>
                    <h3 class="feature-title">Blood Banks</h3>
                    <p class="feature-text">Access a network of verified blood banks and check real-time availability.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="feature-card">
                    <i class="fas fa-heartbeat feature-icon"></i>
                    <h3 class="feature-title">Emergency Help</h3>
                    <p class="feature-text">Get immediate assistance for urgent blood requirements.</p>
            </div>
            </div>
        </div>
    </div>

    <!-- Include Footer -->
    <?php include 'footer.php'; ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Font size control functionality
        document.querySelectorAll('.font-control-btn').forEach(button => {
            button.addEventListener('click', function() {
                const size = this.textContent;
                const body = document.body;
                
                if (size === 'A+') {
                    body.style.fontSize = '18px';
                } else if (size === 'A-') {
                    body.style.fontSize = '14px';
                } else {
                    body.style.fontSize = '16px';
                }
            });
        });
    </script>
</body>
</html>