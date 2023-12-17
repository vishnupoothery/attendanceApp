<?php
  require 'checkLogin.php';
  require 'config.php';

  $records = $conn->prepare('SELECT * FROM student WHERE id = :id');
  $records->bindParam(':id', $_GET['id']);
  $records->execute();
  $student = $records->fetch(PDO::FETCH_ASSOC);

  $records = $conn->prepare('SELECT batchName FROM batch WHERE id = :id');
  $records->bindParam(':id', $student['batch']);
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

    <title>&nbsp;</title>

    <!-- Bootstrap core CSS-->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
        integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    <!-- Custom styles for this template-->

    <style>
        .box {
            padding: 5px;
            border-width: 1px;
            border-style: solid;
            border-color: black;
        }
    </style>



</head>

<body id="page-top">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-8">
                        <img src="img/logo-color.png" class="img-fluid">
                    </div>
                    <div class="col-4"></div>
                </div>
            </div>
            <div class="col-6" style="text-align:right">AYAKKODEN TOWER<br>
                Bypass road, Kondotty</div>
        </div>
        <div class="row">
            <div class="col-12"><br><br></div>
            <div class="col-12">
                <h3 class="text-center">STUDENT REPORT</h3>
            </div>
            <div class="col-12"><br><br></div>
            <div class="col-12">
                <div class="row">
                    <div class="col-2 box"><img class="img-fluid" src="<?php echo $student['picture']; ?>"></div>
                    <div class="col-10 box">
                        <p>Name : <?php echo $student['name'] ?><br>
                            <hr>
                            RollNo : <?php echo $student['rollNo'] ?><br>
                            <hr>
                            Batch : <?php echo $batch['batchName'] ?></p>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="row">
                    <div class="col-12"><br><br></div>
                    <div class="col-12">
                        <h4 class="text-center">Ranklist Details</h4>
                    </div>
                    <div class="col-1 box">Sl No.</div>
                    <div class="col-3 box">Subject</div>
                    <div class="col-3 box">Chapter</div>
                    <div class="col-1 box">Date</div>
                    <div class="col-1 box">Total</div>
                    <div class="col-1 box">Mark</div>
                    <div class="col-1 box">Percent</div>
                    <div class="col-1 box">Rank</div>
                    <?php
                        $count = 1;
                        foreach($conn->query('SELECT A.examName,A.date,A.total,A.type,A.classAvg,A.chapter,R.rollNo,R.rank,R.mark,R.percent,R.present FROM exam A, rank R WHERE R.rollNo = "'.$student['rollNo'].'" AND A.id = R.examID') as $row){
                            $date = date("d-m-Y", strtotime($row['date']));
                            echo '<div class="col-1 box">'.$count.'</div>
                            <div class="col-3 box">'.$row['examName'].'( '.$row['type'].' )</div>
                            <div class="col-3 box">'.$row['chapter'].'</div>
                            <div class="col-1 box">'.$date.'</div>
                            <div class="col-1 box">'.$row['total'].'</div>';
                            if($row['present'] == 0){
                                echo '<div class="col-1 box">Absent</div>
                                <div class="col-1 box">Absent</div>
                                <div class="col-1 box">Absent</div>';
                            }
                            else{
                                echo '<div class="col-1 box">'.$row['mark'].'</div>
                                <div class="col-1 box">'.$row['percent'].'</div>
                                <div class="col-1 box">'.$row['rank'].'</div>';
                            }
                            
                            $count++;
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>


    <script>//window.print();</script>
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
<?php
echo '<div class="modal fade" id="modal'.$_GET['id'].'" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      <a href="deleteStudent.php?id='.$_GET['id'].'" type="button" class="btn btn-danger">DELETE</a>
    </div>
  </div>
</div>
</div>';

?>