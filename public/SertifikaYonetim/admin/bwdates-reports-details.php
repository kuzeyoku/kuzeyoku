<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{



  ?>
<!doctype html>
<html class="no-js" lang="en">
<head>
   
    <title>Fc Raporlar</title>
   

    <link rel="apple-touch-icon" href="apple-icon.png">
   

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>
        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Öğrenci İncele</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="bwdates-report-ds.php">Tarih Aralığı Raporu</a></li>
                            <li class="active">Öğrenci</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Öğrenci İncele</strong>
                            </div>
                            <div class="card-body">
<h4 class="m-t-0 header-title">Tarih Aralığı Raporu</h4>
                                    <?php
$fdate=$_POST['fromdate'];
$tdate=$_POST['todate'];

?>
<h5 align="center" style="color:blue">Rapor Baş. Tarih <?php echo $fdate?> Bit. Tarihi <?php echo $tdate?></h5>

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <tr>
                  <th>S.NO</th>
                  <th>Tc No</th>
                    <th>Sertifika No</th>
                  <th>Öğrenci</th>
                  <th>Kurs</th>
                    <th>Kayıt Tarihi</th>       
                   <th>Action</th>
                </tr>
                                        </tr>
                                        </thead>
                                    <?php
                                    $sql="SELECT * from ogrenciler where date(RegDate) between '$fdate' and '$tdate'";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);

$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $row)
{               ?>   
              
                <tr>
                  <td><?php echo htmlentities($cnt);?></td>
                  <td><?php  echo htmlentities($row->TcNo);?></td>
                    <td><?php  echo htmlentities($row->SertifikaNo);?></td>
                  <td><?php  echo htmlentities($row->NameSurname);?></td>
                  <td><?php  echo htmlentities($row->Course);?></td>
                  <td><?php  echo htmlentities($row->RegDate);?></td>
                  <td><a href="edit-student-detail.php?editid=<?php echo htmlentities ($row->ID);?>">Detay</a></td>
                </tr>
                <?php 
$cnt=$cnt+1;
} }?>

                                </table>
                            </div>
                        </div>
                    </div>



                </div>
            </div><!-- .animated -->
        </div><!-- .content -->


    </div><!-- /#right-panel -->

    <!-- Right Panel -->


    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/popper.js/dist/umd/popper.min.js"></script>
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>

</html>
<?php }  ?>