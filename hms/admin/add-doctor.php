<?php
    session_start();
    error_reporting(0);
    include('include/config.php');
    include('include/checklogin.php');
    check_login();

    if(isset($_POST['submit'])){	
        $docspecialization=$_POST['Doctorspecialization'];
        $docname=$_POST['docname'];
        $docdegree=$_POST['docdegree'];
        $docaddress=$_POST['clinicaddress'];
        $docfees=$_POST['docfees'];
        $practicedays=$_POST['practicedays'];
        $practicetime=$_POST['practicetime'];
        $doccontactno=$_POST['doccontact'];
        $docemail=$_POST['docemail'];
        $password=md5($_POST['npass']);

        $sql=mysqli_query($con,"insert into doctors(specilization,doctorName,docdegree,address,docFees,practicedays,practicetime,contactno,docEmail,password) values('$docspecialization','$docname','$docdegree','$docaddress','$docfees','$practicedays','$practicetime','$doccontactno','$docemail','$password')");

        if($sql){
            echo "<script>alert('Doctor info added Successfully');</script>";
            echo "<script>window.location.href ='manage-doctors.php'</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin | Add Doctor</title>

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
    <script type="text/javascript">
    function valid() {
        if (document.adddoc.npass.value != document.adddoc.cfpass.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.adddoc.cfpass.focus();
            return false;
        }
        return true;
    }
    </script>


    <script>
    function checkemailAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'emailid=' + $("#docemail").val(),
            type: "POST",
            success: function(data) {
                $("#email-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
    </script>
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

            <!-- end: TOP NAVBAR -->
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">Admin | Add Doctor</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li>
                                    <span>Admin</span>
                                </li>
                                <li class="active">
                                    <span>Add Doctor</span>
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
                                            <div class="panel-heading">
                                                <h5 class="panel-title">Add Doctor</h5>
                                            </div>
                                            <div class="panel-body">

                                                <form role="form" name="adddoc" method="post"
                                                    onSubmit="return valid();">
                                                    <div class="form-group">
                                                        <label for="DoctorSpecialization">
                                                            Doctor Specialization
                                                        </label>
                                                        <select name="Doctorspecialization" class="form-control"
                                                            required="true">
                                                            <option value="">Select Specialization</option>
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
                                                            placeholder="Enter Doctor Name" required="true">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="doctordegree">
                                                            Doctor Degree
                                                        </label>
                                                        <input type="text" name="docdegree" class="form-control"
                                                            placeholder="Enter Doctor Degree" required="true">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="address">
                                                            Doctor Clinic Address
                                                        </label>
                                                        <textarea name="clinicaddress" class="form-control"
                                                            placeholder="Enter Doctor Clinic Address"
                                                            required="true"></textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Consultancy Fees
                                                        </label>
                                                        <input type="text" name="docfees" class="form-control"
                                                            placeholder="Enter Doctor Consultancy Fees" required="true">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicedays">
                                                            Doctor Practice Days
                                                        </label>
                                                        <div class="selector">
                                                            <label>
                                                                <input type="radio" name="selectdays"
                                                                    value="Saturday - Thursday" class="docdays__radio"
                                                                    checked="checked" />
                                                                Sat - Thu
                                                            </label> &nbsp;&nbsp;
                                                            <label>
                                                                <input name="selectdays" type="radio" value="Friday"
                                                                    class="docdays__radio" />
                                                                Fri
                                                            </label>
                                                        </div>
                                                        <input name="practicedays" type="text" value=""
                                                            id="docdays__input" class="form-control"
                                                            placeholder="Enter Doctor Practice Days" required="true" />
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="practicetime">
                                                            Doctor Practice Time
                                                        </label>
                                                        <br>
                                                        <div class="selector">
                                                            <label>
                                                                <input type="radio" name="selecttime" value="2pm - 5pm"
                                                                    class="doctime__radio" checked="checked" />
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
                                                        <input name="practicetime" type="text" value=""
                                                            id="doctime__input" class="form-control"
                                                            placeholder="Enter Doctor Practice Time" required="true" />
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Contact no
                                                        </label>
                                                        <input type="text" id="doc_contact" name="doccontact"
                                                            class="form-control" placeholder="Enter Doctor Contact no"
                                                            required="true" onBlur="checkContact()">
                                                        <span id="contact-status"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="fess">
                                                            Doctor Email
                                                        </label>
                                                        <input type="email" id="docemail" name="docemail"
                                                            class="form-control" placeholder="Enter Doctor Email id"
                                                            required="true" onBlur="checkemailAvailability()">
                                                        <span id="email-availability-status"></span>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword1">
                                                            Password
                                                        </label>
                                                        <input type="password" name="npass" class="form-control"
                                                            placeholder="New Password" required="required">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="exampleInputPassword2">
                                                            Confirm Password
                                                        </label>
                                                        <input type="password" name="cfpass" class="form-control"
                                                            placeholder="Confirm Password" required="required">
                                                    </div>

                                                    <button type="submit" name="submit" id="submit"
                                                        class="btn btn-o btn-primary">
                                                        Submit
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

    <!-- start: SETTINGS -->
    <?php include('include/setting.php');?>

    <!-- end: SETTINGS -->
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
        $("input[type=radio].doctime__radio:checked").click();

        // checkbox select
        $("input[type=radio].docdays__radio").click(function() {
            $("#docdays__input").val(this.value);
        });

        //init
        $("input[type=radio].docdays__radio:checked").click();
    });
    </script>
    <!-- end: JavaScript Event Handlers for this page -->
    <!-- end: CLIP-TWO JAVASCRIPTS -->
</body>

</html>