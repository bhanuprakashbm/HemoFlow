<?php 
require 'file/connection.php'; 
session_start();
if(!isset($_SESSION['rid'])) {
  header('location:login.php');
} else {
    $rid = $_SESSION['rid'];
    $sql = "select bloodrequest.*, hospitals.* from bloodrequest, hospitals where rid='$rid' && bloodrequest.hid=hospitals.id";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HemoFlow | Request Status</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            --success-color: #48bb78;
            --warning-color: #ed8936;
            --danger-color: #e53e3e;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-gray);
            padding-top: 60px;
        }

        .dashboard-nav {
            background: white;
            padding: 1rem 0;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
        }

        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1rem;
        }

        .brand {
            font-size: 1.5rem;
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 600;
        }

        .nav-list {
            display: flex;
            list-style: none;
            margin: 0;
            padding: 0;
            align-items: center;
        }

        .nav-item {
            margin: 0 0.5rem;
        }

        .nav-link {
            color: var(--text-color);
            text-decoration: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-link.active {
            background-color: #ffe5e5;
            color: var(--primary-color);
        }

        .nav-link:hover {
            background-color: #ffe5e5;
            color: var(--primary-color);
            text-decoration: none;
        }

        .requests-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .requests-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .requests-title {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            font-size: 1.25rem;
            font-weight: 600;
            text-align: center;
        }

        .requests-table {
            margin: 0;
        }

        .requests-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            font-weight: 500;
            border: none;
        }

        .requests-table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .status-badge {
            padding: 0.5rem 1rem;
            border-radius: 9999px;
            font-weight: 500;
            font-size: 0.875rem;
            text-transform: capitalize;
        }

        .status-pending {
            background-color: var(--warning-color);
            color: white;
        }

        .status-accepted {
            background-color: var(--success-color);
            color: white;
        }

        .status-rejected {
            background-color: var(--danger-color);
            color: white;
        }

        .btn-cancel {
            background-color: var(--danger-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-cancel:hover {
            background-color: #c53030;
            color: white;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 3rem 1rem;
            color: var(--text-color);
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

            .requests-container {
                margin: 1rem;
            }

            .requests-table {
                display: block;
                overflow-x: auto;
            }

            .status-badge {
                padding: 0.25rem 0.75rem;
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
                    <a href="sentrequest.php" class="nav-link active">
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

    <div class="requests-container">
		<?php require 'message.php'; ?>

        <div class="requests-card">
            <div class="requests-title">Blood Sample Requests</div>
            <?php
            if ($result) {
                $row_count = mysqli_num_rows($result);
                if ($row_count > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table requests-table mb-0">
                        <thead>
		<tr>
			<th>#</th>
                                <th>Hospital Name</th>
			<th>Email</th>
			<th>City</th>
			<th>Phone</th>
			<th>Blood Group</th>
			<th>Status</th>
			<th>Action</th>
		</tr>
                        </thead>
                        <tbody>
                            <?php 
                            $counter = 0;
                            while($row = mysqli_fetch_array($result)) { 
                                $status = strtolower($row['status']);
                            ?>
                            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row['hname']; ?></td>
                                <td><?php echo $row['hemail']; ?></td>
                                <td><?php echo $row['hcity']; ?></td>
                                <td><?php echo $row['hphone']; ?></td>
                                <td>
                                    <span class="badge badge-danger"><?php echo $row['bg']; ?></span>
                                </td>
                                <td>
                                    <span class="status-badge status-<?php echo $status; ?>">
                <?php
                                        switch($status) {
                                            case 'pending':
                                                echo '<i class="fas fa-clock"></i> ';
                                                break;
                                            case 'accepted':
                                                echo '<i class="fas fa-check"></i> ';
                                                break;
                                            case 'rejected':
                                                echo '<i class="fas fa-times"></i> ';
                                                break;
                                        }
                                        echo ucfirst($status); 
                                        ?>
                                    </span>
                                </td>
                                <td>
                                    <?php if($status != 'accepted') { ?>
                                        <a href="file/cancel.php?reqid=<?php echo $row['reqid']; ?>" class="btn btn-cancel">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
			<?php } ?>
			</td>
		</tr>
		<?php } ?>
                        </tbody>
	</table>
</div>
            <?php 
                } else {
                    echo '<div class="empty-state">
                        <i class="fas fa-inbox" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                        <h3>No Requests Found</h3>
                        <p>You haven\'t made any blood sample requests yet.</p>
                        <a href="abs.php" class="btn btn-cancel mt-3">
                            <i class="fas fa-tint"></i> Browse Available Blood
                        </a>
                    </div>';
                }
            } 
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>