<?php 
    session_start();
  require 'file/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Services</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
<style>
        .services-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/RBC.png');
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

        .services-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
  }

        .services-hero p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .services-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .blood-group-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
            margin: 0 auto;
            max-width: 1200px;
            padding: 0 1rem;
        }

        .blood-group-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .blood-group-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .blood-group-header {
            background: var(--primary-color);
            color: white;
            padding: 1.5rem;
            text-align: center;
        }

        .blood-type {
            font-size: 2rem;
            font-weight: 700;
            margin: 0;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }

        .blood-group-body {
            padding: 2rem;
        }

        .blood-info {
            text-align: center;
            margin-bottom: 2rem;
        }

        .stock-amount {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
        }

        .stock-label {
            color: #718096;
            font-size: 0.9rem;
        }

        .update-date {
            color: #718096;
            font-size: 0.85rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .blood-actions {
            display: grid;
            gap: 1rem;
        }

        .btn-blood-action {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            text-align: center;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-donate {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-donate:hover {
            background-color: #d62f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
            color: white;
        }

        .btn-request {
    background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-request:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
        }

        @media (max-width: 768px) {
            .services-hero {
                height: 250px;
            }

            .services-hero h1 {
                font-size: 2.5rem;
            }

            .services-section {
                padding: 3rem 0;
            }

            .blood-group-grid {
                grid-template-columns: 1fr;
                gap: 1.5rem;
            }
        }

        .services-overview {
            padding: 4rem 0;
            background: white;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .service-card {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
            text-align: center;
            padding: 2rem;
            border: 2px solid #f0f0f0;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
            border-color: var(--primary-color);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: var(--light-gray);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: var(--primary-color);
            font-size: 2rem;
            transition: all 0.3s ease;
        }

        .service-card:hover .service-icon {
            background: var(--primary-color);
            color: white;
        }

        .service-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1rem;
        }

        .service-description {
            color: #718096;
            font-size: 0.9rem;
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .service-link:hover {
            text-decoration: underline;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
            color: var(--secondary-color);
        }

        .section-title h2 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .section-title p {
            color: #718096;
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
        }

        @media (max-width: 768px) {
            .services-grid {
                grid-template-columns: 1fr;
            }

            .section-title h2 {
                font-size: 1.75rem;
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
                    <a href="bloodinfo.php" class="home-nav-link active">
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
        <div class="services-hero">
            <h1>Our Services</h1>
            <p>Comprehensive blood bank services to serve the community</p>
        </div>

        <section class="services-overview">
            <div class="section-title">
                <h2>Blood Bank Services</h2>
                <p>Discover our range of services designed to make blood donation and acquisition seamless</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <h3 class="service-title">Blood Availability Search</h3>
                    <p class="service-description">Search for available blood units across multiple blood banks in your area. Real-time inventory updates help you find the blood type you need.</p>
                    <a href="bloodinfo.php" class="service-link">
                        Check Availability <i class="fas fa-arrow-right"></i>
                    </a>
         </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-calendar-alt"></i>
       </div>
                    <h3 class="service-title">Blood Donation Camps</h3>
                    <p class="service-description">Find upcoming blood donation camps in your locality or organize a blood donation camp at your institution.</p>
                    <a href="contact.php" class="service-link">
                        Learn More <i class="fas fa-arrow-right"></i>
                    </a>
     </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-hospital-user"></i>
                    </div>
                    <h3 class="service-title">Hospital Registration</h3>
                    <p class="service-description">Hospitals can register to access blood bank services, manage inventory, and handle blood requests efficiently.</p>
                    <a href="register.php" class="service-link">
                        Register Now <i class="fas fa-arrow-right"></i>
                    </a>
                </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-hand-holding-medical"></i>
                    </div>
                    <h3 class="service-title">Blood Request</h3>
                    <p class="service-description">Submit blood requirements for patients. Track request status and coordinate with blood banks.</p>
                    <a href="bloodrequest.php" class="service-link">
                        Request Blood <i class="fas fa-arrow-right"></i>
                    </a>
            </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-user-md"></i>
                    </div>
                    <h3 class="service-title">Donor Management</h3>
                    <p class="service-description">Register as a blood donor, schedule donations, and maintain your donation history. Get notifications for future donations.</p>
                    <a href="register.php" class="service-link">
                        Become a Donor <i class="fas fa-arrow-right"></i>
                    </a>
      </div>

                <div class="service-card">
                    <div class="service-icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="service-title">Analytics & Reports</h3>
                    <p class="service-description">Access detailed reports and analytics about blood donation patterns, inventory levels, and usage statistics.</p>
                    <a href="blooddonate.php" class="service-link">
                        View Reports <i class="fas fa-arrow-right"></i>
                    </a>
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