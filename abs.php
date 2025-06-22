<?php 
session_start();
require 'file/connection.php';
if(isset($_GET['search'])){
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg='$searchKey'";
}else{
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
}
$result = mysqli_query ($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>HemoFlow | Available Blood</title>
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

        .brand-logo {
            display: flex;
            align-items: center;
            text-decoration: none;
        }

        .brand-name {
            font-size: 1.5rem;
            color: var(--secondary-color);
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

        .blood-container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .search-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .search-form {
            display: flex;
            gap: 1rem;
            align-items: flex-end;
        }

        .form-group {
            flex: 1;
            margin-bottom: 0;
        }

        .form-label {
            font-weight: 600;
            color: var(--secondary-color);
            margin-bottom: 0.5rem;
            display: block;
        }

        .form-control {
            border: 1px solid #e2e8f0;
            border-radius: 5px;
            padding: 0.75rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(226, 60, 60, 0.1);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-reset {
            background-color: #718096;
            color: white;
            border: none;
        }

        .btn-reset:hover {
            background-color: #4a5568;
            color: white;
        }

        .btn-search {
            background-color: var(--primary-color);
            color: white;
            border: none;
        }

        .btn-search:hover {
            background-color: #d32f2f;
            color: white;
        }

        .blood-table {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .blood-table th {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            font-weight: 500;
        }

        .blood-table td {
            padding: 1rem;
            border-bottom: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .table-title {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem;
            font-size: 1.25rem;
            font-weight: 600;
            text-align: center;
        }

        .btn-request {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-request:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 2rem;
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

            .search-form {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }

            .blood-container {
                margin: 1rem;
            }

            .blood-table {
                display: block;
                overflow-x: auto;
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
                    <a href="abs.php" class="nav-link active">
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

    <div class="blood-container">
        <?php require 'message.php'; ?>
        
        <div class="search-card">
            <form method="get" action="" class="search-form">
                <div class="form-group">
                    <label class="form-label">Select Blood Group</label>
               <select name="search" class="form-control">
                        <option value="">All Blood Groups</option>
                        <option value="A+" <?php if(@$_GET['search'] == 'A+') echo 'selected'; ?>>A+</option>
                        <option value="A-" <?php if(@$_GET['search'] == 'A-') echo 'selected'; ?>>A-</option>
                        <option value="B+" <?php if(@$_GET['search'] == 'B+') echo 'selected'; ?>>B+</option>
                        <option value="B-" <?php if(@$_GET['search'] == 'B-') echo 'selected'; ?>>B-</option>
                        <option value="AB+" <?php if(@$_GET['search'] == 'AB+') echo 'selected'; ?>>AB+</option>
                        <option value="AB-" <?php if(@$_GET['search'] == 'AB-') echo 'selected'; ?>>AB-</option>
                        <option value="O+" <?php if(@$_GET['search'] == 'O+') echo 'selected'; ?>>O+</option>
                        <option value="O-" <?php if(@$_GET['search'] == 'O-') echo 'selected'; ?>>O-</option>
                    </select>
                </div>
                <div>
                    <a href="abs.php" class="btn btn-reset">
                        <i class="fas fa-undo"></i> Reset
                    </a>
                    <button type="submit" name="submit" class="btn btn-search">
                        <i class="fas fa-search"></i> Search
                    </button>
                </div>
           </form>
        </div>

        <div class="blood-table">
            <div class="table-title">Available Blood Samples</div>
            <?php
            if ($result) {
                $row_count = mysqli_num_rows($result);
                if ($row_count > 0) {
            ?>
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
                                <th>City</th>
                                <th>Email</th>
                                <th>Phone</th>
                <th>Blood Group</th>
                <th>Action</th>
            </tr>
                        </thead>
                        <tbody>
                <?php
                            $counter = 0;
                            while($row = mysqli_fetch_array($result)) { 
                            ?>
            <tr>
                                <td><?php echo ++$counter; ?></td>
                                <td><?php echo $row['hname']; ?></td>
                                <td><?php echo $row['hcity']; ?></td>
                                <td><?php echo $row['hemail']; ?></td>
                                <td><?php echo $row['hphone']; ?></td>
                                <td>
                                    <span class="badge badge-danger"><?php echo $row['bg']; ?></span>
                                </td>
                                <td>
                <form action="file/request.php" method="post">
                                        <input type="hidden" name="bid" value="<?php echo $row['bid']; ?>">
                                        <input type="hidden" name="hid" value="<?php echo $row['hid']; ?>">
                                        <input type="hidden" name="bg" value="<?php echo $row['bg']; ?>">
                <?php if (isset($_SESSION['hid'])) { ?>
                                            <button type="button" class="btn btn-request hospital">
                                                <i class="fas fa-ban"></i> Request Sample
                                            </button>
                                        <?php } else { ?>
                                            <button type="submit" name="request" class="btn btn-request">
                                                <i class="fas fa-paper-plane"></i> Request Sample
                                            </button>
                <?php } ?>
                </form>
                                </td>
            </tr>
        <?php } ?>
                        </tbody>
        </table>
                </div>
            <?php 
                } else {
                    echo '<div class="empty-state">
                        <i class="fas fa-search" style="font-size: 3rem; color: var(--primary-color); margin-bottom: 1rem;"></i>
                        <h3>No Results Found</h3>
                        <p>Try adjusting your search criteria or check back later.</p>
                    </div>';
                }
            } 
            ?>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
    $('.hospital').on('click', function(){
            alert("Hospital users cannot request blood samples.");
    });
</script>
</body>
</html>