<?php
	session_start();
	error_reporting(0);
	
	include('include/config.php');
	include('include/checklogin.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor | Profile</title>

    <link
        href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
    <link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
    <link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
    <link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/plugins.css">
    <link rel="stylesheet" href="assets/css/themes/theme-5.css" id="skin_color" />


</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Doctor | Profile</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Doctor</span>
                                </li>
                                <li class="active">
                                    <span>Profile</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">

                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-body">
                                                <?php 
                                                $sql=mysqli_query($con,"select * from doctors where docEmail='".$_SESSION['dlogin']."'");
                                                  while($data=mysqli_fetch_array($sql)){
                                                ?>
                                                <div class="profile-container" style="display: flex;">
                                                    <div class="profile-image">
                                                        <?php $pic = ($data["profile_pic"] != "" ) ? $data["profile_pic"] : "doctor.png" ?>
                                                        <a href="../admin/profile_pics/<?php echo $pic ?>"
                                                            target="_blank"><img
                                                                src="../admin/profile_pics/<?php echo $pic ?>" alt=""
                                                                width="150" height="150" class="thumbnail"></a>
                                                    </div>
                                                    <div class="profile-info" style="padding: 20px;">
                                                        <h4><?php echo htmlentities($data['doctorName']);?>'s Profile
                                                        </h4>
                                                        <p><b>Profile Reg. Date:
                                                            </b><?php echo htmlentities($data['creationDate']);?></p>
                                                        <?php if($data['updationDate']){?>
                                                        <p><b>Profile Last Updation Date:
                                                            </b><?php echo htmlentities($data['updationDate']);?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>

                                                <form role="form" name="adddoc" method="post"
                                                    onSubmit="return valid();">

                                                    <div class="form-group">
                                                        <label for="specilization">
                                                            Doctor Specialization
                                                        </label>
                                                        <input type="text" name="specilization" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['specilization']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Doctor Name
                                                        </label>
                                                        <input type="text" name="docname" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['doctorName']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="docdegree">
                                                            Doctor Degree
                                                        </label>
                                                        <input type="text" name="docdegree" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['docdegree']);?>">
                                                    </div>


                                                    <div class="form-group">
                                                        <label for="address">
                                                            Doctor Clinic Address
                                                        </label>
                                                        <textarea name="clinicaddress" class="form-control"
                                                            readonly><?php echo htmlentities($data['address']);?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Consultancy Fees
                                                        </label>
                                                        <input type="text" name="docfees" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['docFees']);?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicedays">
                                                            Doctor Practice days
                                                        </label>
                                                        <input type="text" name="practicedays" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['practicedays']);?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicetime">
                                                            Doctor Practice Time
                                                        </label>
                                                        <input type="text" name="practicetime" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['practicetime']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Contact no
                                                        </label>
                                                        <input type="text" name="doccontact" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['contactno']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Email
                                                        </label>
                                                        <input type="email" name="docemail" class="form-control"
                                                            readonly="readonly"
                                                            value="<?php echo htmlentities($data['docEmail']);?>">
                                                    </div>
                                                    <?php } ?>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <!-- end: BASIC EXAMPLE -->
                        <!-- end: SELECT BOXES -->
                    </div>
                </div>
            </div>
            <!-- start: FOOTER -->
            <?php include('include/footer.php');?>
            <!-- end: FOOTER -->

        </div>
        <!-- start: MAIN JAVASCRIPTS -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/modernizr/modernizr.js"></script>
        <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
        <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
        <script src="vendor/switchery/switchery.min.js"></script>
        <!-- end: MAIN JAVASCRIPTS -->
        <!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
        <script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
        <script src="vendor/autosize/autosize.min.js"></script>
        <script src="vendor/selectFx/classie.js"></script>
        <script src="vendor/selectFx/selectFx.js"></script>
        <script src="vendor/select2/select2.min.js"></script>
        <script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
        <script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
        <!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
        <!-- start: CLIP-TWO JAVASCRIPTS -->
        <script src="assets/js/main.js"></script>
        <!-- start: JavaScript Event Handlers for this page -->
        <script src="assets/js/form-elements.js"></script>
        <script>
        jQuery(document).ready(function() {
            Main.init();
            FormElements.init();
        });
        </script>
        <!-- end: JavaScript Event Handlers for this page -->
        <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>