<?php 
require 'file/connection.php';
session_start();
if(!isset($_SESSION['hid'])) {
    header('location:login.php');
} else {
    $hid = $_SESSION['hid'];
    $sql = "SELECT * FROM bloodinfo WHERE hid='$hid'";
    $result = mysqli_query($conn, $sql);
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Blood Stock</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <style>
        .stock-overview {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            margin-bottom: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .blood-group-card {
            background: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 1rem;
            border-left: 4px solid #e23c3c;
            transition: all 0.3s ease;
        }
        
        .blood-group-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        }
        
        .blood-group-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }
        
        .blood-group-name {
            font-size: 1.5rem;
            font-weight: 600;
            color: #e23c3c;
        }
        
        .blood-group-actions {
            display: flex;
            gap: 0.5rem;
        }
        
        .btn-stock {
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-stock-edit {
            background: #4CAF50;
            color: white;
            border: none;
        }
        
        .btn-stock-delete {
            background: #f44336;
            color: white;
            border: none;
        }
        
        .btn-stock:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }
        
        .add-stock-form {
            background: #fff;
            border-radius: 10px;
            padding: 2rem;
            margin-top: 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stock-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }
        
        .stat-card {
            background: #fff;
            border-radius: 8px;
            padding: 1.5rem;
            text-align: center;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            color: #e23c3c;
            margin-bottom: 0.5rem;
        }
        
        .stat-label {
            color: #666;
            font-size: 0.9rem;
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
                    <a href="bloodstock.php" class="nav-link active">
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

    <div class="container mt-4">
        <div class="stock-overview">
            <h2><i class="fas fa-chart-bar"></i> Blood Stock Overview</h2>
            
            <div class="stock-stats">
                <?php
                $total_units = 0;
                $blood_groups = array();
                
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        $total_units++;
                        if(isset($blood_groups[$row['bg']])) {
                            $blood_groups[$row['bg']]++;
                        } else {
                            $blood_groups[$row['bg']] = 1;
                        }
                    }
                }
                ?>
                <div class="stat-card">
                    <div class="stat-value"><?php echo $total_units; ?></div>
                    <div class="stat-label">Total Blood Units</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value"><?php echo count($blood_groups); ?></div>
                    <div class="stat-label">Blood Groups Available</div>
                </div>
                <div class="stat-card">
                    <div class="stat-value"><?php echo array_key_exists('O+', $blood_groups) ? $blood_groups['O+'] : 0; ?></div>
                    <div class="stat-label">O+ Units (Universal Donor)</div>
                </div>
            </div>

            <?php if(isset($_GET['error'])) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?php echo $_GET['error']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>
            <?php if(isset($_GET['msg'])) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo $_GET['msg']; ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php } ?>

            <div class="add-stock-form">
                <h4><i class="fas fa-plus-circle"></i> Add New Blood Stock</h4>
                <form action="file/infoAdd.php" method="post" class="form-inline justify-content-center">
                    <select name="bg" class="form-control mr-2" required>
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
                    <button type="submit" name="add" class="btn btn-primary">
                        <i class="fas fa-plus"></i> Add Stock
                    </button>
                </form>
            </div>
        </div>

        <div class="row">
            <?php
            if(mysqli_num_rows($result) > 0) {
                mysqli_data_seek($result, 0);  // Reset result pointer
                while($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="col-md-6 col-lg-4">
                <div class="blood-group-card">
                    <div class="blood-group-header">
                        <div class="blood-group-name"><?php echo $row['bg']; ?></div>
                        <div class="blood-group-actions">
                            <a href="file/delete.php?bid=<?php echo $row['bid'];?>" class="btn btn-stock btn-stock-delete">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="blood-group-info">
                        <p class="mb-0">Added on: <?php echo isset($row['date']) ? date('d M Y', strtotime($row['date'])) : date('d M Y'); ?></p>
                    </div>
                </div>
            </div>
            <?php }} else { ?>
            <div class="col-12">
                <div class="alert alert-info" role="alert">
                    <i class="fas fa-info-circle"></i> No blood samples available
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 