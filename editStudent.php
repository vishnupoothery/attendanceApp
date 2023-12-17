<?php
  require 'checkLogin.php';
  require 'config.php';

  $records = $conn->prepare('SELECT * FROM student WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $student = $records->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>MCA Admin - Edit Student</title>

  <!-- Bootstrap core CSS-->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
    integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

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
          <li class="breadcrumb-item active">Edit Student</li>
        </ol>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-body">
            <form enctype="multipart/form-data" method="POST" action="validateEditStudent.php">
              <div class="form-group">
                <input value="<?php echo $student['name']; ?>" type="text" name="name" placeholder="Enter Name"
                  id="name" class="form-control">
              </div>
              <div class="form-group">
                <input type="date" class="form-control" name="dob" id="dob" value="<?php echo $student['dob']; ?>">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['age']; ?>" type="text" name="age" placeholder="Enter age" id="age"
                  class="form-control">
              </div>
              <div class="form-group">
                <select class="form-control" id="sex" name="sex">
                  <option value="male">Male</option>
                  <option value="female">Female</option>
                  <option value="other">Other</option>
                </select>
              </div>
              <div class="form-group">
                <input value="<?php echo $student['school']; ?>" type="text" name="school"
                  placeholder="Name of current School" id="school" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['board']; ?>" type="text" name="board" placeholder="Board of Exam"
                  id="board" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['reservation']; ?>" type="text" name="reservation"
                  placeholder="Reservation category (if any)" id="reservation" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="address" id="address" class="form-control"
                  placeholder="Enter address"><?php echo $student['address']; ?></textarea>
              </div>
              <div class="form-group">
                <input value="<?php echo $student['father']; ?>" type="text" name="father"
                  placeholder="Enter Father's name" id="father" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['mobile1']; ?>" type="text" name="mobile1"
                  placeholder="Enter Father's number" id="mobile1" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['occupation']; ?>" class="form-control" type="text" name="occupation"
                  id="occupation" placeholder="Enter father's occupation">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['mother']; ?>" type="text" name="mother"
                  placeholder="Enter Mother's name" id="mother" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['motherOccupation']; ?>" type="text" name="motherOccupation"
                  placeholder="Enter Mother's occupation" id="motherOccupation" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['email']; ?>" type="text" name="email" placeholder="Enter Email ID"
                  id="email" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['guardian']; ?>" type="text" name="guardian"
                  placeholder="Enter Guardian's name" id="guardian" class="form-control">
              </div>
              <div class="form-group">
                <input value="<?php echo $student['guardianRelation']; ?>" type="text" name="guardianRelation"
                  placeholder="Enter Guardian's relation" id="guardianRelation" class="form-control">
              </div>
              <div class="form-group">
                <textarea name="guardianAddress" id="guardianAddress" class="form-control"
                  placeholder="Enter Guardian's address"><?php echo $student['guardianAddress']; ?></textarea>
              </div>
              <div class="form-group">
                <input value="<?php echo $student['mobile2']; ?>" type="text" name="mobile2"
                  placeholder="Enter Guardian's number" id="mobile2" class="form-control">
              </div>
              <div class="form-group">
                <input hidden value="<?php echo $student['id']; ?>" type="text" name="id" id="id" class="form-control">
              </div>
              <div class="form-group">
                <select class="form-control" name="batch" id="batch">
                  <?php
                    foreach($conn->query('SELECT batchName,id FROM batch WHERE old = 0 AND id = '.$student['batch']) as $row){
                        echo '<option value="'.$row['id'].'">'.$row['batchName'].'</option>';
                    }
                        foreach($conn->query('SELECT batchName,id FROM batch WHERE old = 0 AND id != '.$student['batch']) as $row){
                            echo '<option value="'.$row['id'].'">'.$row['batchName'].'</option>';
                        }
                        ?>
                </select>
              </div>
              <div class="form-group">
                <select class="form-control" id="subject" name="subject">
                  <option value="PCMB">PCMB</option>
                  <option value="PCMCS">PCMCS</option>
                </select>
              </div>
              <div class="form-group">
                <input value="<?php echo $student['xschool']; ?>" type="text" name="xschool"
                  placeholder="Name of School of Xth Education" id="xschool" class="form-control">
              </div>
              <div class="row">
                <div class="col-12 col-md-3">
                  <div class="form-group">
                    <input value="<?php echo $student['phy']; ?>" type="text" name="phy" placeholder="Mark in physics"
                      id="phy" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="form-group">
                    <input value="<?php echo $student['che']; ?>" type="text" name="che" placeholder="Mark in chemisrty"
                      id="che" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="form-group">
                    <input value="<?php echo $student['maths']; ?>" type="text" name="maths" placeholder="Mark in maths"
                      id="maths" class="form-control">
                  </div>
                </div>
                <div class="col-12 col-md-3">
                  <div class="form-group">
                    <input value="<?php echo $student['bio']; ?>" type="text" name="bio" placeholder="Mark in biology"
                      id="bio" class="form-control">
                  </div>
                </div>
              </div>
              <div class="form-group text-center">
                <input required class="btn btn-outline-primary" type="submit" name="submit" value="Edit Student">
              </div>
            </form>
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
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
    integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
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