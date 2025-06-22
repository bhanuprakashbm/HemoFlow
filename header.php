<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title><?php echo isset($title) ? $title : 'HemoFlow - Blood Bank Management System'; ?></title>
</head>
<body>
    <!-- Top Header -->
    <header class="top-header fixed-top">
    <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <a href="index.php" class="brand-logo">
                        <i class="fas fa-tint"></i>
                        <h1 class="brand-name">Hemo<span>Flow</span></h1>
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <div class="font-controls">
                        <button class="font-control-btn" title="Increase font size">A+</button>
                        <button class="font-control-btn" title="Normal font size">A</button>
                        <button class="font-control-btn" title="Decrease font size">A-</button>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Navigation -->
    <nav class="main-nav fixed-top">
        <div class="container">
            <button class="navbar-toggler d-lg-none" type="button">
                <i class="fas fa-bars"></i>
          </button>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'index.php' ? 'active' : ''; ?>">
                        <i class="fas fa-home"></i> Home
                    </a>
                </li>
            <li class="nav-item">
                    <a href="about.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'about.php' ? 'active' : ''; ?>">
                        <i class="fas fa-info-circle"></i> About
                    </a>
            </li>
            <li class="nav-item">
                    <a href="bloodinfo.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'bloodinfo.php' ? 'active' : ''; ?>">
                        <i class="fas fa-tint"></i> Services
                    </a>
                </li>
                <li class="nav-item">
                    <a href="contact.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'contact.php' ? 'active' : ''; ?>">
                        <i class="fas fa-envelope"></i> Contact
                    </a>
                </li>
                <?php if(isset($_SESSION['rid']) || isset($_SESSION['hid'])): ?>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
                <?php else: ?>
                <li class="nav-item">
                    <a href="login.php" class="nav-link <?php echo basename($_SERVER['PHP_SELF']) == 'login.php' ? 'active' : ''; ?>">
                        <i class="fas fa-sign-in-alt"></i> Login
                    </a>
            </li>
                <?php endif; ?>
        </ul>
    </div>
</nav>

    <!-- Spacer for Fixed Header -->
    <div class="header-spacer"></div>

    <script>
        // Mobile menu toggle
        document.querySelector('.navbar-toggler').addEventListener('click', function() {
            document.querySelector('.nav-list').classList.toggle('show');
        });

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