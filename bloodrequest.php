<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
    $hid = $_SESSION['hid'];
    $sql = "SELECT bloodrequest.*, receivers.* from bloodrequest, receivers 
            WHERE hid='$hid' AND bloodrequest.rid=receivers.id AND bloodrequest.status='Pending'";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Blood Requests</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
<style>
        .requests-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .requests-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f1f1;
        }

        .table {
            margin-bottom: 0;
        }

        .table th {
            background-color: var(--light-gray);
            color: var(--secondary-color);
            font-weight: 600;
            border: none;
        }

        .table td {
            vertical-align: middle;
            color: var(--text-color);
            border-color: #f1f1f1;
        }

        .badge {
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
        }

        .badge-danger {
            background-color: var(--primary-color);
        }

        .btn {
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
            padding: 0.5rem 1rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
            text-decoration: none;
            color: #fff;
        }

        .btn-success {
            background-color: #38a169;
            border: none;
            color: white !important;
        }

        .btn-success:hover {
            background-color: #2f855a;
            transform: translateY(-2px);
            color: white !important;
            text-decoration: none;
        }

        .btn-danger {
            background-color: #e53e3e;
            border: none;
            color: white !important;
        }

        .btn-danger:hover {
            background-color: #c53030;
            transform: translateY(-2px);
            color: white !important;
            text-decoration: none;
        }

        .btn.disabled {
            opacity: 0.7 !important;
            cursor: not-allowed;
            transform: none !important;
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
            color: var(--text-color);
        }

        .empty-state i {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .empty-state h3 {
            font-size: 1.5rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .empty-state p {
            color: #718096;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
            justify-content: flex-start;
            align-items: center;
        }
</style>
</head>
<body>
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
                    <a href="bloodrequest.php" class="nav-link active">
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

    <div class="container">
		<?php require 'message.php'; ?>

        <div class="requests-container">
            <h2 class="requests-title">
                <i class="fas fa-paper-plane"></i> Pending Blood Requests
                <small class="text-muted">Requests that need your action</small>
            </h2>

            <?php
            if ($result) {
                $row_count = mysqli_num_rows($result);
                if ($row_count > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>City</th>
                                <th>Phone</th>
                                <th>Blood Group</th>
                                <th>Status</th>
                                <th colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            while($row = mysqli_fetch_array($result)) { 
                            ?>
                            <tr>
                                <td><?php echo ++$counter;?></td>
                                <td><?php echo $row['rname'];?></td>
                                <td><?php echo $row['remail'];?></td>
                                <td><?php echo $row['rcity'];?></td>
                                <td><?php echo $row['rphone'];?></td>
                                <td>
                                    <span class="badge badge-danger"><?php echo $row['bg'];?></span>
                                </td>
                                <td>
                                    <span class="badge badge-warning">Pending</span>
                                </td>
                                <td class="action-buttons">
                                    <a href="file/accept.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-success">
                                        <i class="fas fa-check"></i> Accept
                                    </a>
                                    <a href="file/reject.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-danger">
                                        <i class="fas fa-times"></i> Reject
                                    </a>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="empty-state">
                    <i class="fas fa-check-circle"></i>
                    <h3>No Pending Requests</h3>
                    <p>You're all caught up! No blood requests need your attention right now.</p>
                </div>
            <?php } } ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>