<?php 
  require 'file/connection.php';
  session_start();
  if(!isset($_SESSION['rid']))
  {
  header('location:login.php');
  }
  else {
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HemoFlow | Blood Info</title>
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

        .blood-info-container {
            max-width: 1000px;
            margin: 2rem auto;
            padding: 0 1rem;
        }

        .info-card {
            background: white;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            padding: 2rem;
            margin-bottom: 2rem;
        }

        .info-card-header {
            color: var(--secondary-color);
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid #f1f1f1;
  }

        .terms-link {
            color: var(--primary-color);
            text-decoration: none;
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
        }

        .terms-content {
            background: var(--light-gray);
            padding: 1rem;
            border-radius: 5px;
            margin: 1rem 0;
            font-size: 0.9rem;
            line-height: 1.6;
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

        .btn-add {
            background-color: var(--primary-color);
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 5px;
            font-weight: 500;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-add:hover {
            background-color: #d32f2f;
            transform: translateY(-2px);
        }

        .blood-table {
            width: 100%;
            margin-top: 2rem;
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
        }

        .btn-delete {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 5px;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-delete:hover {
            background-color: #c82333;
            text-decoration: none;
            color: white;
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

            .blood-info-container {
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
                    <a href="rprofile.php" class="nav-link">
                        <i class="fas fa-user"></i> My Account
                    </a>
                </li>
                <li class="nav-item">
                    <a href="blooddinfo.php" class="nav-link active">
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

    <div class="blood-info-container">
      <?php require 'message.php'; ?>

        <div class="row">
            <div class="col-lg-6">
                <div class="info-card">
                    <h3 class="info-card-header">Add Available Blood Group</h3>
        <form action="file/infoAddd.php" method="post">
                        <a class="terms-link" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                            <i class="fas fa-info-circle"></i> Terms & Conditions
                        </a>
                        
                        <div class="collapse terms-content" id="collapseExample">
                            <p>If you or your Friends/Family have the mentioned blood type, only then add the Blood group (No spam). This helps hospitals contact you with your given details if they need your or your friends/family's blood.</p>
                            <p>You should have a blood sample tested by your doctor, nurse, or trained phlebotomist at a pathology collection centre, clinic or hospital.</p>
                            <p>Make sure you have been eating a healthy diet (No Smoking/Drinking) for at least a week before donating blood.</p>
                            <p>By checking the box below, you promise that you have read and accepted these instructions and are willing to donate blood voluntarily.</p>
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="terms" name="condition" value="agree" required>
                                <label class="custom-control-label" for="terms">I agree to the terms and conditions</label>
                            </div>
        </div>
                
                        <div class="form-group">
                            <label>Blood Group</label>
                            <select class="form-control" name="bg" required>
                                <option value="">Select Blood Group</option>
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

                        <button type="submit" name="add" class="btn-add">
                            <i class="fas fa-plus-circle"></i> Add Blood Group
                        </button>
        </form>
       </div>
     </div>

            <div class="col-lg-6">
                <div class="info-card">
                    <h3 class="info-card-header">Your Blood Groups</h3>
                    <?php   
                    if(isset($_SESSION['rid'])){
    $rid=$_SESSION['rid'];
    $sql = "SELECT * from blooddinfo where rid='$rid'";
    $result = mysqli_query($conn, $sql);
  }
  ?>
                    
                    <?php
                    if ($result) {
                        $row_count = mysqli_num_rows($result);
                        if ($row_count == 0) {
                            echo '<div class="alert alert-info">No blood groups added yet.</div>';
                        } else {
                    ?>
                        <div class="table-responsive">
                            <table class="table blood-table">
                                <thead>
            <tr>
              <th>#</th>
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
                                        <td><?php echo $row['bg']; ?></td>
                                        <td>
                                            <a href="file/deleted.php?bdid=<?php echo $row['bdid'];?>" class="btn-delete">
                                                <i class="fas fa-trash-alt"></i> Delete
                                            </a>
                                        </td>
            </tr>
            <?php } ?>
                                </tbody>
          </table>
      </div>
                    <?php 
                        }
                    } 
                    ?>
                </div>
            </div>
   </div>
</div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>