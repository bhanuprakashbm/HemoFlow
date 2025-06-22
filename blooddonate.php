<?php 
session_start();
require 'file/connection.php';
if(!isset($_SESSION['rid']) && !isset($_SESSION['hid'])) {
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Blood Donation</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
<style>
        .dashboard-hero {
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('image/hospital1.jpg');
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

        .dashboard-hero h1 {
            font-size: 3rem;
            font-weight: 700;
            margin-bottom: 1rem;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.3);
        }

        .dashboard-hero p {
            font-size: 1.25rem;
            max-width: 600px;
            margin: 0 auto;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
        }

        .dashboard-section {
            padding: 5rem 0;
            background: var(--light-gray);
        }

        .dashboard-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 15px rgba(0,0,0,0.1);
        }

        .dashboard-card h3 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .dashboard-card h3 i {
            color: var(--primary-color);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .stat-card {
            background: var(--light-gray);
            padding: 1.5rem;
            border-radius: 10px;
            text-align: center;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: var(--secondary-color);
            font-size: 1rem;
            font-weight: 500;
        }

        .action-buttons {
            display: flex;
            gap: 1rem;
            margin-top: 1.5rem;
        }

        .btn-dashboard {
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            font-weight: 600;
            transition: all 0.3s ease;
            flex: 1;
            text-align: center;
        }

        .btn-primary-action {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-primary-action:hover {
            background-color: #d62f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
            color: white;
        }

        .btn-secondary-action {
    background-color: white;
            color: var(--primary-color);
            border: 2px solid var(--primary-color);
        }

        .btn-secondary-action:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
        }

        .table-responsive {
            margin-top: 2rem;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }

        .custom-table {
            margin-bottom: 0;
        }

        .custom-table thead th {
            background-color: var(--primary-color);
            color: white;
            font-weight: 600;
            border: none;
            padding: 1rem;
        }

        .custom-table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-color: #f0f0f0;
        }

        .custom-table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }

        .status-approved {
            background-color: #d4edda;
            color: #155724;
        }

        .status-rejected {
            background-color: #f8d7da;
            color: #721c24;
        }

        @media (max-width: 768px) {
            .dashboard-hero {
                height: 250px;
            }

            .dashboard-hero h1 {
                font-size: 2.5rem;
            }

            .dashboard-section {
                padding: 3rem 0;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn-dashboard {
width: 100%;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 1rem;
            }
        }

        /* Add styles for donation form */
        .donation-form {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            max-width: 600px;
            margin: 0 auto;
        }

        .donation-form h3 {
            color: var(--secondary-color);
            font-weight: 600;
            margin-bottom: 1.5rem;
text-align: center;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 500;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 8px;
            padding: 0.75rem;
            width: 100%;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(226, 60, 60, 0.1);
        }

        .terms-section {
            margin: 1.5rem 0;
            padding: 1rem;
            background: #f8f9fa;
            border-radius: 8px;
        }

        .terms-content {
            font-size: 0.9rem;
            color: #666;
            margin-top: 1rem;
        }

        .btn-donate-submit {
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 50px;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-donate-submit:hover {
            background: #d62f2f;
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(226, 60, 60, 0.2);
        }

        .custom-checkbox {
            margin: 1rem 0;
        }
</style>
</head>
<body>
    <?php if(isset($_SESSION['rid'])) { ?>
    <!-- User Dashboard Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <a href="Userpage.html" class="brand-logo">
                <i class="fas fa-tint"></i>
                <h1 class="brand-name">Hemo<span>Flow</span></h1>
            </a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="rprofile.php" class="nav-link">
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
                    <a href="blooddonate.php" class="nav-link active">
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
    <?php } elseif(isset($_SESSION['hid'])) { ?>
    <!-- Hospital Dashboard Navigation -->
    <nav class="dashboard-nav">
        <div class="nav-container">
            <a href="hospitalpage.html" class="brand-logo">
                <i class="fas fa-tint"></i>
                <h1 class="brand-name">Hemo<span>Flow</span></h1>
            </a>
            <ul class="nav-list">
                <li class="nav-item">
                    <a href="hprofile.php" class="nav-link">
                        <i class="fas fa-user"></i> My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="bloodstock.php" class="nav-link">
                        <i class="fas fa-database"></i> Blood Stock
                    </a>
                </li>
                <li class="nav-item">
                    <a href="bloodrequest.php" class="nav-link">
                        <i class="fas fa-paper-plane"></i> Blood Requests
                    </a>
                </li>
                <li class="nav-item">
                    <a href="deleteit.php" class="nav-link">
                        <i class="fas fa-search"></i> Need Blood
                    </a>
                </li>
                <li class="nav-item">
                    <a href="sentrequestd.php" class="nav-link">
                        <i class="fas fa-clock"></i> Request Status
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
    <?php } ?>

    <div class="main-content">
        <div class="dashboard-hero">
            <?php if(isset($_SESSION['hid'])) { ?>
            <h1>Blood Donation Dashboard</h1>
            <p>Monitor and manage blood donation activities</p>
            <?php } else { ?>
            <h1>Blood Donation</h1>
            <p>Your contribution can save lives</p>
            <?php } ?>
        </div>

        <section class="dashboard-section">
            <div class="container">
                <?php if(isset($_SESSION['hid'])) { ?>
                <div class="dashboard-card">
                    <h3><i class="fas fa-chart-bar"></i> Overview</h3>
                    <div class="stats-grid">
                        <?php
                        $hid = $_SESSION['hid'];
                        
                        // Total donations
                        $sql = "SELECT COUNT(*) as total FROM blooddonate WHERE hid='$hid'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $total_donations = $row['total'];

                        // Pending requests
                        $sql = "SELECT COUNT(*) as pending FROM blooddonate WHERE hid='$hid' AND status='pending'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $pending_requests = $row['pending'];

                        // Approved donations
                        $sql = "SELECT COUNT(*) as approved FROM blooddonate WHERE hid='$hid' AND status='approved'";
                        $result = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($result);
                        $approved_donations = $row['approved'];
                        ?>
                        <div class="stat-card">
                            <div class="stat-value"><?php echo $total_donations; ?></div>
                            <div class="stat-label">Total Donations</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value"><?php echo $pending_requests; ?></div>
                            <div class="stat-label">Pending Requests</div>
                        </div>
                        <div class="stat-card">
                            <div class="stat-value"><?php echo $approved_donations; ?></div>
                            <div class="stat-label">Approved Donations</div>
                        </div>
                    </div>
                    <div class="action-buttons">
                        <a href="bloodstock.php" class="btn btn-dashboard btn-primary-action">
                            <i class="fas fa-tint"></i> View Blood Stock
                        </a>
                        <a href="bloodrequest.php" class="btn btn-dashboard btn-secondary-action">
                            <i class="fas fa-hand-holding-medical"></i> Blood Requests
                        </a>
                    </div>
                </div>

                <div class="dashboard-card">
                    <h3><i class="fas fa-list"></i> Recent Donations</h3>
                    <div class="table-responsive">
                        <table class="table custom-table">
                            <thead>
                                <tr>
			<th>Name</th>
			<th>Blood Group</th>
                                    <th>Date</th>
			<th>Status</th>
		</tr>
                            </thead>
                            <tbody>
                <?php
                                $sql = "SELECT * FROM blooddonate WHERE hid='$hid' ORDER BY date DESC LIMIT 5";
                                $result = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($result) > 0) {
                                    while($row = mysqli_fetch_array($result)) {
                                ?>
		<tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['bg']; ?></td>
                                    <td><?php echo date('d M Y', strtotime($row['date'])); ?></td>
                                    <td>
                                        <span class="status-badge status-<?php echo strtolower($row['status']); ?>">
                                            <?php echo ucfirst($row['status']); ?>
                                        </span>
			</td>
                                </tr>
                                <?php }} else { ?>
                                <tr>
                                    <td colspan="4" class="text-center">No donations found</td>
		</tr>
		<?php } ?>
                            </tbody>
	</table>
                    </div>
                </div>
                <?php } elseif(isset($_SESSION['rid'])) { ?>
                <div class="donation-form">
                    <h3><i class="fas fa-heart"></i> Donate Blood</h3>
                    <?php require 'message.php'; ?>
                    
                    <form action="file/requestd.php" method="post">
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="bg" required>
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

                        <div class="terms-section">
                            <h4>Donation Requirements</h4>
                            <div class="terms-content">
                                <ul>
                                    <li>You must be at least 18 years old</li>
                                    <li>You must weigh at least 50 kg</li>
                                    <li>Your last donation was more than 3 months ago</li>
                                    <li>You must be in good health and feeling well</li>
                                    <li>You have not had any recent surgeries or medical procedures</li>
                                </ul>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms" required>
                                <label class="custom-control-label" for="terms">
                                    I confirm that I meet all the requirements above
                                </label>
                            </div>
                        </div>

                        <button type="submit" name="request" class="btn-donate-submit">
                            <i class="fas fa-heart"></i> Submit Donation Request
                        </button>
                    </form>
                </div>
                <?php } else { ?>
                <div class="dashboard-card text-center">
                    <h3><i class="fas fa-user-lock"></i> Access Restricted</h3>
                    <p>Please login to access blood donation.</p>
                    <div class="action-buttons justify-content-center">
                        <a href="login.php" class="btn btn-dashboard btn-primary-action">
                            <i class="fas fa-sign-in-alt"></i> Login Now
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </section>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>