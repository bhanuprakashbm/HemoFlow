<?php
require 'file/connection.php';
session_start();
if(!isset($_SESSION['rid']))
{
  header('location:login.php');
}
else {
	if(isset($_SESSION['rid'])){
		$id=$_SESSION['rid'];
		$sql = "SELECT * FROM receivers WHERE id='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
	}
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | My Account</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<style>
        :root {
            --primary-color: #e23c3c;
            --secondary-color: #2d3748;
            --accent-color: #f56565;
            --text-color: #2d3748;
            --light-gray: #f8f9fa;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            padding-top: 60px;
        }

        /* Navigation styles moved to styles.css */

        .profile-container {
            max-width: 600px;
            margin: 2rem auto;
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .profile-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .profile-img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 1rem;
            padding: 0.5rem;
            background: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
  }

        .form-group label {
            color: var(--text-color);
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 0.75rem;
            margin-bottom: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(226, 60, 60, 0.1);
        }

        .btn-update {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-update:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 1rem;
            color: var(--text-color);
            text-decoration: none;
        }

        .back-link:hover {
            color: var(--primary-color);
        }

        @media (max-width: 768px) {
            .nav-container {
                flex-direction: column;
                padding: 1rem;
            }

            .nav-list {
                margin-top: 1rem;
                flex-wrap: wrap;
                justify-content: center;
            }

            .nav-item {
                margin: 0.25rem;
            }

            .profile-container {
                margin: 1rem;
            }
}
</style>
</head>
<body>
    <nav class="dashboard-nav">
        <div class="nav-container">
            <a href="Userpage.html" class="brand-logo">
                <i class="fas fa-tint"></i>
                <h1 class="brand-name">Hemo<span>Flow</span></h1>
            </a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="rprofile.php" class="nav-link active">
                        <i class="fas fa-user"></i> My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blooddinfo.php" class="nav-link">
                        <i class="fas fa-info-circle"></i> Blood Info
                    </a>
                </li>
                <li class="nav-item">
                    <a href="abs.php" class="nav-link">
                        <i class="fas fa-tint"></i> Available Blood
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sentrequest.php" class="nav-link">
                        <i class="fas fa-clock"></i> Request Status
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blooddonate.php" class="nav-link">
                        <i class="fas fa-heart"></i> Donate Blood
                    </a>
                </li>
                <li class="nav-item">
                    <a href="logout.php" class="nav-link">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
		<?php require 'message.php'; ?>

        <div class="profile-container">
            <div class="profile-header">
                <img src="image/user.png" alt="profile" class="profile-img">
                <h2>My Profile</h2>
					</div>
					   <form action="file/updateprofile.php" method="post">
                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="rname" value="<?php echo $row['rname']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email Address</label>
                    <input type="email" name="remail" value="<?php echo $row['remail']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="rpassword" value="<?php echo $row['rpassword']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Phone Number</label>
                    <input type="tel" name="rphone" value="<?php echo $row['rphone']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text" name="rcity" value="<?php echo $row['rcity']; ?>" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Blood Group</label>
                    <select class="form-control" name="bg" required>
                             <option selected><?php echo $row['rbg']; ?></option>
                             <option>A-</option>
                             <option>A+</option>
                             <option>B-</option>
                             <option>B+</option>
                             <option>AB-</option>
                             <option>AB+</option>
                             <option>O-</option>
                             <option>O+</option>
                        </select>
                </div>
                <button type="submit" name="update" class="btn-update">Update Profile</button>
					   </form>
            <a href="Userpage.html" class="back-link">Back to Dashboard</a>
				</div>
			</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>