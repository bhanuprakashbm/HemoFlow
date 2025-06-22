<?php 
session_start();
if (isset($_SESSION['hid'])) {
  header("location:bloodrequest.php");
}elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
}else{
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
  <style>
        .register-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/signin.jpg');
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

        .register-hero h1 {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .register-hero p {
            font-size: 1.1rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .register-section {
            padding: 5rem 0;
            background: var(--light-gray);
            min-height: calc(100vh - 300px - var(--nav-height));
            display: flex;
            align-items: center;
        }

        .register-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .register-tabs {
            display: flex;
            justify-content: center;
            margin-bottom: 3rem;
            gap: 1rem;
        }

        .register-tab {
            padding: 1rem 2rem;
            font-size: 1.1rem;
            font-weight: 600;
            color: var(--secondary-color);
            background: white;
            border: 2px solid transparent;
            border-radius: 50px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .register-tab.active {
            background: var(--primary-color);
            color: white;
            border-color: var(--primary-color);
        }

        .register-tab:hover:not(.active) {
            border-color: var(--primary-color);
            color: var(--primary-color);
        }

        .register-form-container {
            background: white;
            border-radius: 15px;
            padding: 3rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .register-form {
            display: none;
        }

        .register-form.active {
            display: block;
        }

        .form-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 2rem;
            text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 0.75rem 1rem;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(226, 60, 60, 0.1);
        }

        .btn-register {
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 50px;
            padding: 0.75rem 2rem;
            font-weight: 600;
            width: 100%;
            margin-top: 1rem;
            transition: all 0.3s ease;
            font-size: 0.9rem;
        }

        .btn-register:hover {
            background: #d62f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
        }

        .login-link {
            text-align: center;
            margin-top: 1.5rem;
            color: var(--secondary-color);
            font-size: 0.9rem;
        }

        .login-link a {
            color: var(--primary-color);
            font-weight: 600;
            text-decoration: none;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        @media (max-width: 768px) {
            .register-hero {
                height: 250px;
            }

            .register-hero h1 {
                font-size: 2rem;
            }

            .register-section {
                padding: 3rem 0;
            }

            .register-form-container {
                padding: 2rem;
            }

            .register-tabs {
                flex-direction: column;
                gap: 0.5rem;
            }

            .register-tab {
                width: 100%;
                text-align: center;
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
        <div class="register-hero">
            <h1>Create Account</h1>
            <p>Join our community and help save lives through blood donation</p>
        </div>

        <section class="register-section">
            <div class="register-container">
                <?php require 'message.php'; ?>
                
                <div class="register-tabs">
                    <button class="register-tab active" data-form="receiver">Receiver Registration</button>
                    <button class="register-tab" data-form="hospital">Hospital Registration</button>
       </div>

                <div class="register-form-container">
                    <!-- Receiver Registration Form -->
                    <form class="register-form active" id="receiverForm" action="file/receiverReg.php" method="post">
                        <h2 class="form-title">Receiver Registration</h2>
                        <div class="form-group">
                            <label>Full Name</label>
                            <input type="text" name="rname" class="form-control" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="remail" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="rpassword" class="form-control" placeholder="Create password" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="rphone" class="form-control" placeholder="Enter phone number" required>
                        </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="rcity" class="form-control" placeholder="Enter city" required>
                        </div>
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select name="bg" class="form-control" required>
                                <option value="">Select Blood Group</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
          </select>
                        </div>
                        <button type="submit" name="rregister" class="btn btn-register">
                            <i class="fas fa-user-plus"></i> Register
                        </button>
                        <div class="login-link">
                            Already have an account? <a href="login.php">Login Now</a>
                        </div>
        </form>

                    <!-- Hospital Registration Form -->
                    <form class="register-form" id="hospitalForm" action="file/hospitalReg.php" method="post">
                        <h2 class="form-title">Hospital Registration</h2>
                        <div class="form-group">
                            <label>Hospital Name</label>
                            <input type="text" name="hname" class="form-control" placeholder="Enter hospital name" required>
                        </div>
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" name="hemail" class="form-control" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="hpassword" class="form-control" placeholder="Create password" required>
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="hphone" class="form-control" placeholder="Enter phone number" required>
       </div>
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="hcity" class="form-control" placeholder="Enter city" required>
    </div>
                        <button type="submit" name="hregister" class="btn btn-register">
                            <i class="fas fa-hospital-user"></i> Register Hospital
                        </button>
                        <div class="login-link">
                            Already have an account? <a href="login.php">Login Now</a>
</div>
                    </form>
</div>
</div>
        </section>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Tab switching functionality
        const tabs = document.querySelectorAll('.register-tab');
        const forms = document.querySelectorAll('.register-form');

        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Remove active class from all tabs and forms
                tabs.forEach(t => t.classList.remove('active'));
                forms.forEach(f => f.classList.remove('active'));

                // Add active class to clicked tab and corresponding form
                tab.classList.add('active');
                const formId = tab.dataset.form + 'Form';
                document.getElementById(formId).classList.add('active');
            });
        });
    </script>
</body>
</html>
<?php } ?>