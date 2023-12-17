<?php
  require 'checkLogin.php';
  require 'config.php';

  $_months_ = array("Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
?>

<?php
$records = $conn->prepare('SELECT * FROM subject WHERE id = :id');
$records->bindParam(':id', $_GET['batch']);
$records->execute();
$batch = $records->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Pulse Admin - View Batch</title>

    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

    <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

      <a class="navbar-brand mr-1" href="index.php">PULSE Admin</a>

      <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fas fa-bars"></i>
      </button>

      <!-- Navbar Search -->
      <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search Student" aria-label="Search" aria-describedby="basic-addon2">
          <div class="input-group-append">
            <button class="btn btn-primary" type="button">
              <i class="fas fa-search"></i>
            </button>
          </div>
        </div>
      </form>

      <!-- Navbar -->
      <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-bell fa-fw"></i>
            <span class="badge badge-danger">9+</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope fa-fw"></i>
            <span class="badge badge-danger">7</span>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user-circle fa-fw"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Settings</a>
            <a class="dropdown-item" href="#">Activity Log</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
          </div>
        </li>
      </ul>

    </nav>

    <div id="wrapper">

      <!-- Sidebar -->
      <ul class="sidebar navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addBatch.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Batch</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addStudent.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Student</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addExam.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Exam</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addRanklist.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Ranklist</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addTimeTable.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Timetable</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="addAttendanceBatches.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Add Attendance</span></a>
        </li>
      </ul>

      <div id="content-wrapper">

        <div class="container-fluid">

          <!-- Breadcrumbs-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="#">Dashboard</a>
            </li>
            <li class="breadcrumb-item active">View Batch</li>
            <li class="breadcrumb-item active"><?php echo $batch['name']; ?></li>
          </ol>
          <!--  Buttons  -->
          <div class="box-btn">
              <a class="btn btn-outline-dark btn-bread" href="viewAttendanceBatches.php">Back</a>
              <a class="btn btn-outline-dark btn-bread" href="addAttendanceBatches.php"> Add Attendance </a>
              <a class="btn btn-dark btn-bread"> View Attendance </a>
            </div>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-body">
              <!--  <div class="row">
                    <?php 
                    $count = 1;
                    foreach($conn->query('SELECT DISTINCT date FROM attendance WHERE subject = '.$_GET['batch'].' ORDER BY date ASC') as $row){
                      echo '<div class="col-12"><a class="btn btn-link" href="viewBatchAttendance.php?batch='.$_GET['batch'].'&date='.$row['date'].'">'.$row['date'].'</a></div>';
                      $count+=1;
                      $dateee = strtotime($row['date']);
                      $day = date('Y', $dateee);
                      var_dump($day);
                      echo '<br>';
                      }
                      
                    ?>
                  </div>
                  -->
                  <div class="row">
                    <form method="GET" action="viewBatchAttendance.php">
                      <input type="hidden" name="batch" value="<?php echo $_GET['batch'] ?>">
                      <div class="form-group">
                        <input type="date" name="date" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="submit" name="submit" value="CHECK ATTENDANCE" class="btn btn-outline-dark">
                      </div>
                    </form>
                  </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>Copyright © Your Website 2018</span>
            </div>
          </div>
        </footer>

      </div>
      <!-- /.content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>

    <!-- Demo scripts for this page-->
    <script src="js/demo/datatables-demo.js"></script>
    <script src="js/demo/chart-area-demo.js"></script>

  </body>

</html>
