<?php 
require 'file/connection.php'; 
session_start();
  if(!isset($_SESSION['hid']))
  {
  header('location:login.php');
  }
  else {
    $hid = $_SESSION['hid'];
    $sql = "SELECT bloodrequest.*, receivers.* from bloodrequest, receivers where hid='$hid' && bloodrequest.rid=receivers.id ORDER BY bloodrequest.reqid DESC";
    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Request Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        .status-container {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 2rem;
        }

        .status-title {
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

        .badge-blood {
            background-color: var(--primary-color);
            color: white;
        }

        .badge-status {
            padding: 0.5rem 1.5rem;
        }

        .badge-pending {
            background-color: #f6ad55;
            color: #744210;
        }

        .badge-accepted {
            background-color: #68d391;
            color: #22543d;
        }

        .badge-rejected {
            background-color: #fc8181;
            color: #742a2a;
        }

        .btn {
            padding: 0.5rem 1.5rem;
            border-radius: 50px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-cancel {
            background-color: var(--danger-color);
            border: none;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #c53030;
            transform: translateY(-2px);
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
                    <a href="sentrequestd.php" class="nav-link active">
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

        <div class="status-container">
            <h2 class="status-title">
                <i class="fas fa-history"></i> Request History
                <small class="text-muted">All blood requests and their current status</small>
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
                                <th>Action</th>
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
                                    <span class="badge badge-blood"><?php echo $row['bg'];?></span>
                                </td>
                                <td>
                                    <?php if($row['status'] == 'Pending') { ?>
                                        <span class="badge badge-pending">Pending</span>
                                    <?php } else if($row['status'] == 'Accepted') { ?>
                                        <span class="badge badge-accepted">Accepted</span>
                                    <?php } else { ?>
                                        <span class="badge badge-rejected">Rejected</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <?php if($row['status'] == 'Pending') { ?>
                                        <a href="file/canceld.php?reqid=<?php echo $row['reqid'];?>" class="btn btn-cancel">
                                            <i class="fas fa-times"></i> Cancel
                                        </a>
                                    <?php } else { ?>
                                        <span class="text-muted">No action needed</span>
                                    <?php } ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } else { ?>
                <div class="empty-state">
                    <i class="fas fa-history"></i>
                    <h3>No Request History</h3>
                    <p>You haven't received any blood requests yet.</p>
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