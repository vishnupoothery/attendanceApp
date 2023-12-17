<?php
  require 'checkLogin.php';
  require 'config.php';
?>

<?php
$records = $conn->prepare('SELECT * FROM class WHERE id = :id');
$records->bindParam(':id', $_GET['batchId']);
$records->execute();
$batch = $records->fetch(PDO::FETCH_ASSOC);


//         $stmt = $conn->prepare('SELECT roll,name FROM student WHERE class = :id ORDER BY roll');
//         $stmt->bindParam(':id', $_GET['id']);
//         $stmt->execute();
    
//         $filelocation = 'export/';
//         $filename     = 'export-'.date('Y-m-d H.i.s').'.csv';
//         $file_export  =  $filelocation . $filename;
    
//         $data = fopen($file_export, 'w');
    
//         $csv_fields = array();
    
//         $csv_fields[] = 'Roll Number';
//         $csv_fields[] = 'Name';
    
//         fputcsv($data, $csv_fields);
    
//         while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
//         fputcsv($data, $row);
//         }
?>

<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MCA UCC Admin - View Batch</title>

    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

  </head>

  <body id="page-top">

  


        <?php
        include("./navBar.php")
        ?>
 
       <div id="wrapper">
 
       <?php
        include("./sideNav.php")
        ?>

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
            <a href="addBatch.php" class="btn btn-outline-dark btn-bread"> Add Batch </a>
            <a class="btn btn-dark btn-bread" href="viewBatches.php"> View Batches </a>
          </div>
          <?php
if(!empty($_GET['message'])){
    echo '<div class="alert alert-info" role="alert">
    '.$_GET['message'].'
  </div>';
}
            ?>
          <!-- DataTables Example -->
          <div class="card mb-3">
            <div class="card-body">
              <div class="">
                <div class="row">
                  <div class="col-1"><b>Sl. no</b></div>
                  <div class="col-2"><b>ROLL NO</b></div>
                  <div class="col-5"><b>NAME</b></div>
                  <div class="col-4"><b>ACTIONS</b></div>
                  <div class="col-12"><hr></div>
                <?php
                $count = 1;
                foreach($conn->query('SELECT * FROM student WHERE class = '.$_GET["batchId"]) as $row){
                    echo '<div class="col-1">'.$count.'</div><div class="col-2">'.$row['roll'].'</div><div class="col-5"><a class="student-name" href="viewStudent.php?id='.$row['id'].'">'.$row['name'].'</a></div>
                    <div class="col-4" ><a href="editStudent.php?id='.$row['id'].'"> EDIT | </a>
                    <a style="color: red;cursor:pointer;" data-toggle="modal" data-target="#modal'.$row['id'].'"> DELETE </a></div><div class="col-12"><hr></div>';
                $count += 1;
                  }
                ?>
              </div>
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <footer class="sticky-footer">
          <div class="container my-auto">
            <div class="copyright text-center my-auto">
              <span>MCA UCC Attendance Management</span>
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

<?php
foreach ($conn->prepare('SELECT * FROM student WHERE class = :id') as $row) {
  $stmt = $conn->prepare('SELECT * FROM student WHERE class = :id');
  $stmt->bindParam(':id', $_GET["id"]);
  $stmt->execute();

  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      echo '<div class="modal fade" id="modal'.$row['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Delete</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            Are you sure you want to delete this
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="deleteStudent.php?id='.$row['id'].'" type="button" class="btn btn-danger">DELETE</a>
          </div>
        </div>
      </div>
    </div>';
  }
}

?>