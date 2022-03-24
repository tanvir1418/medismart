<?php
	session_start();
	error_reporting(0);

	include('include/config.php');
	include('include/checklogin.php');
	check_login();

	$did=intval($_GET['id']);// get doctor id

	if(isset($_POST['submit'])){
		$docspecialization=$_POST['Doctorspecialization'];
		$docname=$_POST['docname'];
        $docgender=$_POST['docgender'];
		$docdegree=$_POST['docdegree'];
		$docaddress=$_POST['clinicaddress'];
		$docfees=$_POST['docfees'];
        $practicedays=$_POST['practicedays'];
        $practicetime=$_POST['practicetime'];
		$doccontactno=$_POST['doccontact'];
		$docemail=$_POST['docemail'];

        $filename = "";
        $error = FALSE;

        if (is_uploaded_file($_FILES["profile_pic"]["tmp_name"])) {
            $filename = time() . '_' . $_FILES["profile_pic"]["name"];
            $filepath = 'profile_pics/' . $filename;
            if (!move_uploaded_file($_FILES["profile_pic"]["tmp_name"], $filepath)) {
            $error = TRUE;
            }
        } else {
            $filename = $_POST['old_pic'];
        }


		$sql=mysqli_query($con,"Update doctors set specilization='$docspecialization',doctorName='$docname',profile_pic='$filename',docgender='$docgender',docdegree='$docdegree',address='$docaddress',docFees='$docfees',practicedays='$practicedays',practicetime='$practicetime',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
		if($sql){
			$msg="Doctor Details updated Successfully";
		}
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Edit Doctor Details</title>

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

    <script>
    function checkContact() {
        // doc_contact
        var contact = jQuery("#doc_contact").val();
        var validBdPhoneNoRegex = /(^(\+88|0088)?(01){1}[3456789]{1}(\d){8})$/;
        var mobileRegexTest = validBdPhoneNoRegex.test(contact);
        if (contact == "" || !mobileRegexTest) {
            jQuery("#contact-status").html(
                "Please enter valid contact (Ex. +8801xxxxxxxxx, 01xxxxxxxxx)"
            );
        } else {
            jQuery("#contact-status").html("");
        }
    }
    </script>


</head>

<body>
    <div id="app">
        <?php include('include/sidebar.php');?>
        <div class="app-content">

            <?php include('include/header.php');?>
            <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Edit Doctor Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Edit Doctor Details</span>
                                </li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->
                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                                <h5 style="color: green; font-size:18px; ">
                                    <?php if($msg) { echo htmlentities($msg);}?> </h5>
                                <div class="row margin-top-30">
                                    <div class="col-lg-8 col-md-12">
                                        <div class="panel panel-white">
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Edit Doctor info</h5>
                                            </div>
                                            <div class="panel-body">
                                                <?php 
													$sql=mysqli_query($con,"select * from doctors where id='$did'");
													while($data=mysqli_fetch_array($sql)){
												?>
                                                <h4><?php echo htmlentities($data['doctorName']);?>'s Profile</h4>
                                                <p><b>Profile Reg. Date:
                                                    </b><?php echo htmlentities($data['creationDate']);?></p>
                                                <?php if($data['updationDate']){?>
                                                <p><b>Profile Last Updation Date:
                                                    </b><?php echo htmlentities($data['updationDate']);?></p>
                                                <?php } ?>
                                                <hr />
                                                <form role="form" name="adddoc" method="post"
                                                    enctype="multipart/form-data" onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">
                                                            Doctor Specialization
                                                        </label>
                                                        <select name="Doctorspecialization" class="form-control"
                                                            required="required">
                                                            <option
                                                                value="<?php echo htmlentities($data['specilization']);?>">
                                                                <?php echo htmlentities($data['specilization']);?>
                                                            </option>
                                                            <?php 
																$ret=mysqli_query($con,"select * from doctorspecilization");
																while($row=mysqli_fetch_array($ret)){
															?>
                                                            <option
                                                                value="<?php echo htmlentities($row['specilization']);?>">
                                                                <?php echo htmlentities($row['specilization']);?>
                                                            </option>
                                                            <?php } ?>

                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctorname">
                                                            Doctor Name
                                                        </label>
                                                        <input type="text" name="docname" class="form-control"
                                                            value="<?php echo htmlentities($data['doctorName']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="">
                                                            <?php $pic = ($data["profile_pic"] != "" ) ? $data["profile_pic"] : "doctor.png" ?>
                                                            <a href="profile_pics/<?php echo $pic ?>"
                                                                target="_blank"><img
                                                                    src="profile_pics/<?php echo $pic ?>" alt=""
                                                                    width="200" height="200" class="thumbnail"></a>
                                                        </div>
                                                        <input type="hidden" name="old_pic"
                                                            value="<?php echo $data["profile_pic"] ?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label class="control-label" for="profile_pic">Profile
                                                            picture:</label>
                                                        <div class="profile-input">
                                                            <input type="file" id="profile_pic"
                                                                class="form-control file" name="profile_pic">
                                                            <span class="help-block">Must me jpg, jpeg, png, gif, bmp
                                                                image only.</span>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="docgender">
                                                            Doctor Gender
                                                        </label>
                                                        <div class="selector">
                                                            <label>
                                                                <input name="selectgender" type="radio" value="Male"
                                                                    class="docgender__radio" />
                                                                Male
                                                            </label> &nbsp;&nbsp;
                                                            <label>
                                                                <input name="selectgender" type="radio" value="Female"
                                                                    class="docgender__radio" />
                                                                Female
                                                            </label>
                                                        </div>
                                                        <input name="docgender" type="text"
                                                            value="<?php echo htmlentities($data['docgender']);?>"
                                                            id="docgender__input" class="form-control"
                                                            required="true" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="docdegree">
                                                            Doctor Degree
                                                        </label>
                                                        <input type="text" name="docdegree" class="form-control"
                                                            value="<?php echo htmlentities($data['docdegree']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">
                                                            Doctor Clinic Address
                                                        </label>
                                                        <textarea name="clinicaddress"
                                                            class="form-control"><?php echo htmlentities($data['address']);?></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Consultancy Fees
                                                        </label>
                                                        <input type="text" name="docfees" class="form-control"
                                                            required="required"
                                                            value="<?php echo htmlentities($data['docFees']);?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicedays">
                                                            Doctor Practice days
                                                        </label>
                                                        <div class="selector">
                                                            <label>
                                                                <input type="radio" name="selectdays"
                                                                    value="Saturday - Thursday"
                                                                    class="docdays__radio" />
                                                                Sat - Thu
                                                            </label> &nbsp;&nbsp;
                                                            <label>
                                                                <input name="selectdays" type="radio" value="Friday"
                                                                    class="docdays__radio" />
                                                                Fri
                                                            </label>
                                                        </div>
                                                        <input type="text" name="practicedays" class="form-control"
                                                            id="docdays__input" required="required"
                                                            value="<?php echo htmlentities($data['practicedays']);?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicetime">
                                                            Doctor Practice Time
                                                        </label>
                                                        <div class="selector">
                                                            <label>
                                                                <input type="radio" name="selecttime" value="2pm - 5pm"
                                                                    class="doctime__radio" />
                                                                2pm - 5pm
                                                            </label> &nbsp;&nbsp;
                                                            <label>
                                                                <input type="radio" name="selecttime" value="6pm - 9pm"
                                                                    class="doctime__radio" />
                                                                6pm - 9pm
                                                            </label> &nbsp;&nbsp;
                                                            <label>
                                                                <input type="radio" name="selecttime" value="10pm - 1am"
                                                                    class="doctime__radio" />
                                                                10pm - 1am
                                                            </label>
                                                        </div>
                                                        <input type="text" name="practicetime" class="form-control"
                                                            id="doctime__input" required="required"
                                                            value="<?php echo htmlentities($data['practicetime']);?>">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Contact no
                                                        </label>
                                                        <input type="text" id="doc_contact" name="doccontact"
                                                            class="form-control" required="required"
                                                            onBlur="checkContact()"
                                                            value="<?php echo htmlentities($data['contactno']);?>">
                                                        <span id="contact-status"></span>
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


                                                    <button type="submit" name="submit" class="btn btn-o btn-primary">
                                                        Update
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                                <div class="panel panel-white">


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

        // checkbox select
        $("input[type=radio].doctime__radio").click(function() {
            $("#doctime__input").val(this.value);
        });

        //init
        // $("input[type=radio].doctime__radio:checked").click();

        // checkbox select
        $("input[type=radio].docdays__radio").click(function() {
            $("#docdays__input").val(this.value);
        });

        //init
        // $("input[type=radio].docdays__radio:checked").click();

        // checkbox select
        $("input[type=radio].docgender__radio").click(function() {
            $("#docgender__input").val(this.value);
        });

    });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>