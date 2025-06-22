<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <style>
        .contact-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/contact.jpg');
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

        .contact-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .contact-hero p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .contact-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .contact-info {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .contact-info h2 {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .contact-info p {
            color: #718096;
            font-size: 1.1rem;
            line-height: 1.8;
        }

        .contact-form {
            background: white;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .contact-form h2 {
            color: var(--secondary-color);
            font-weight: 700;
            margin-bottom: 1.5rem;
        }

        .form-control {
            border: 1px solid var(--border-color);
            padding: 0.75rem;
            border-radius: 8px;
            margin-bottom: 1rem;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(226, 60, 60, 0.25);
        }

        .btn-contact {
            background-color: var(--primary-color);
            color: white;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-contact:hover {
            background-color: #d62f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
        }

        @media (max-width: 768px) {
            .contact-hero {
                height: 250px;
            }

            .contact-hero h1 {
                font-size: 2.5rem;
            }

            .contact-section {
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
                    <a href="contact.php" class="home-nav-link active">
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
        <div class="contact-hero">
            <h1>Contact Us</h1>
            <p>Get in touch with us for any inquiries or support</p>
        </div>

        <section class="contact-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6">
                        <div class="contact-info">
                            <h2>Get In Touch</h2>
                            <p><i class="fas fa-map-marker-alt mr-2"></i> 123 Blood Bank Street, City, Country</p>
                            <p><i class="fas fa-phone-alt mr-2"></i> +1 234 567 8900</p>
                            <p><i class="fas fa-envelope mr-2"></i> info@hemoflow.com</p>
                            <p><i class="fas fa-clock mr-2"></i> Monday - Friday: 9:00 AM - 6:00 PM</p>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-6">
                        <div class="contact-form">
                            <h2>Send us a Message</h2>
                            <form>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Your Name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Subject">
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="5" placeholder="Your Message"></textarea>
                                </div>
                                <button type="submit" class="btn btn-contact">Send Message</button>
                            </form>
                        </div>
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