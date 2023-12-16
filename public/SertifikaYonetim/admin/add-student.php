<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['trmsaid']==0)) {
  header('location:logout.php');
  } else{
    if(isset($_POST['submit']))
  {

$trmsaid=$_SESSION['trmsaid'];
$tname=$_POST['tname'];
$ttcno=$_POST['tcno'];
$sertifikanosu=$_POST['sertifikanosu'];
$email=$_POST['email'];
$mobnum=$_POST['mobilenumber'];
$address=$_POST['address'];
$quali=$_POST['qualifications'];
$tsubjects=$_POST['tsubjects'];
$tdate=$_POST['joiningdate'];
$propic=$_FILES["propic"]["name"];
$extension = substr($propic,strlen($propic)-4,strlen($propic));
$allowed_extensions = array(".jpg","jpeg",".png",".gif");
if(!in_array($extension,$allowed_extensions))
{
echo "<script>alert('Resim Formatı Uygun Değil. Sadece jpg / jpeg/ png /gif Fformatlarını Kullanın');</script>";
}
else
{

$propic=md5($propic).time().$extension;
 move_uploaded_file($_FILES["propic"]["tmp_name"],"images/".$propic);
$sql="insert into ogrenciler(NameSurname,TcNo,Picture,Email,MobileNumber,"
        . "Qualifications,Address,Course,JoiningDate , Picture2,Picture3,Picture4,Picture5,SertifikaNo)values"
        . "(:tname,:tcno,:tpics,:email,:mobilenumber,:qualifications,"
        . ":address,:tsubjects,:joiningdate,'blank.jpg','blank.jpg','blank.jpg','blank.jpg',:sertifikanosu)";
$query=$dbh->prepare($sql);
$query->bindParam(':tname',$tname,PDO::PARAM_STR);
$query->bindParam(':tcno',$ttcno,PDO::PARAM_STR);
$query->bindParam(':sertifikanosu',$sertifikanosu,PDO::PARAM_STR);
$query->bindParam(':tpics',$propic,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':qualifications',$quali,PDO::PARAM_STR);
$query->bindParam(':mobilenumber',$mobnum,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':tsubjects',$tsubjects,PDO::PARAM_STR);
$query->bindParam(':joiningdate',$tdate,PDO::PARAM_STR);
 $query->execute();

   $LastInsertId=$dbh->lastInsertId();
   if ($LastInsertId>0) {
    echo '<script>alert("Öğrenci Kaydı Başarıyla Yapıldı.")</script>';
echo "<script>window.location.href ='add-student.php'</script>";
  }
  else
    {
         echo '<script>alert("Birşeyler Yanlış Gitti. Lütfen Tekrar Deneyin.")</script>';
    }

  
}
}
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
   
    <title>Fc Öğrenci Ekle</title>
  

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
                        <h1>Öğrenci Bilgileri</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="add-student.php">Öğrenci Bilgileri</a></li>
                            <li class="active">Ekle</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Öğrenci </strong><small> Bilgileri</small></div>
                            <form name="" method="post" action="" enctype="multipart/form-data">
                                
                            <div class="card-body card-block">
 
                                <div class="form-group"><label for="company" class=" form-control-label"> Ad Soyad</label><input type="text" name="tname" value="" class="form-control" id="tname" required="true"></div>
                                <div class="form-group"><label for="company" class=" form-control-label"> Tc No</label><input type="text" name="tcno" value="" class="form-control" id="tcno" required="true"></div>   
                                <div class="form-group"><label for="company" class=" form-control-label"> Sertifika No</label><input type="text" name="sertifikanosu" value="" class="form-control" id="sertifikanosu" required="false"></div>  
                                <div class="form-group"><label for="company" class=" form-control-label"> Resim</label><input type="file" name="propic" value="" class="form-control" id="propic" required="true"></div>
                                <div class="form-group"><label for="company" class=" form-control-label">KATILIM BELGESİ</label> &nbsp;<img src="images/<?php echo $row->Picture2;?>" width="100" height="100" value="<?php  echo $row->Resim2;?>">
									<a href="changeimage1.php?editid=<?php echo $row->ID;?>"> &nbsp; Resim Seç</a>
									</div>
								<div class="form-group"><label for="company" class=" form-control-label">ADLİ SİCİL KAYDI</label> &nbsp;<img src="images/<?php echo $row->Picture3;?>" width="100" height="100" value="<?php  echo $row->Resim3;?>">
									<a href="changeimage2.php?editid=<?php echo $row->ID;?>"> &nbsp; Resim Seç</a>
									</div>
								<div class="form-group"><label for="company" class=" form-control-label">İKAMETGAH</label> &nbsp;<img src="images/<?php echo $row->Picture4;?>" width="100" height="100" value="<?php  echo $row->Resim4;?>">
									<a href="changeimage3.php?editid=<?php echo $row->ID;?>"> &nbsp; Resim Seç</a>
									</div>
								<div class="form-group"><label for="company" class=" form-control-label">SAĞLIK RAPORU</label> &nbsp;<img src="images/<?php echo $row->Picture5;?>" width="100" height="100" value="<?php  echo $row->Resim5;?>">
									<a href="changeimage4.php?editid=<?php echo $row->ID;?>"> &nbsp; Resim Seç</a>
									</div>

                                        <div class="form-group"><label for="street" class=" form-control-label">Email</label><input type="text" name="email" value="" id="email" class="form-control" required="true"></div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Öğrenci İle İlgili Notlar</label><input type="text" name="qualifications" id="qualifications" value="" class="form-control" required="true"></div>
                                                    </div>
                                        
                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Cep Telefonu</label><input type="text" name="mobilenumber" id="mobilenumber" value="" class="form-control" required="true" maxlength="10" pattern="[0-9]+"></div>
                                                    </div>
                                                   
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Kurs</label><select type="text" name="tsubjects" id="tsubjects" value="" class="form-control" required="true">
<option value="">Kurs Seçiniz</option>
                                                        <?php 

$sql2 = "SELECT * from   kurslar ";
$query2 = $dbh -> prepare($sql2);
$query2->execute();
$result2=$query2->fetchAll(PDO::FETCH_OBJ);

foreach($result2 as $row)
{          
    ?>  
<option value="<?php echo htmlentities($row->Course);?>"><?php echo htmlentities($row->Course);?></option>
 <?php } ?> 
            
                                                        
                                                    </select></div>
                                                    </div>
                                               
                                                    
                                                    </div>
                                                    <div class="row form-group">
                                                <div class="col-12">
   <div class="form-group"><label for="city" class=" form-control-label">Adres</label><textarea type="text" name="address" id="address" value="" class="form-control" rows="4" cols="12" required="true"></textarea></div>
                                                    </div>
                                                    <div class="col-12">
                                                    <div class="form-group"><label for="city" class=" form-control-label">Katılım Tarihi</label><input type="date" name="joiningdate" id="joiningdate" value="" class="form-control" required="true"></div>
                                                    </div>
                                                    
                                                    </div>
                                                     <p style="text-align: center;"><button type="submit" class="btn btn-primary btn-sm" name="submit" id="submit">
                                                            <i class="fa fa-dot-circle-o"></i>  Ekle
                                                        </button></p>
                                                    
                                                </div>
                                                </form>
                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>