<?php
    include_once('hms/include/config.php');
    if(isset($_POST['submit']))
    {
        $name=$_POST['fullname'];
        $email=$_POST['emailid'];
        $mobileno=$_POST['mobileno'];
        $dscrption=$_POST['description'];
        $query=mysqli_query($con,"insert into tblcontactus(fullname,email,contactno,message) value('$name','$email','$mobileno','$dscrption')");
        echo "<script>alert('Your information succesfully submitted');</script>";
        echo "<script>window.location.href ='contact.php'</script>";

    }
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>MediSmart | Contact us</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
</head>

<body>
    <!--start-wrap-->

    <!--start-header-->
    <div class="header">
        <div class="wrap">
            <!--start-logo-->
            <div class="logo">
                <a href="index.html" style="font-size: 35px; color: #3391e7;">
                    <i class="fas fa-clinic-medical"></i> MediSmart</a>
                </a>
            </div>
            <!--end-logo-->
            <!--start-top-nav-->
            <div class="top-nav">
                <ul>
                    <li><a href="index.html">Home</a></li>

                    <li class="active"><a href="contact.php">contact</a></li>
                </ul>
            </div>
            <div class="clear"> </div>
            <!--end-top-nav-->
        </div>
        <!--end-header-->
    </div>
    <div class="clear"> </div>
    <div class="wrap">
        <div class="contact">
            <div class="section group">
                <div class="col span_1_of_3">

                    <div class="company_address">
                        <h2>Hospital Address :</h2>
                        <p>Sheba Diagnostics,</p>
                        <p>Khandar, Bogura, </p>
                        <p>Bangladesh</p>
                        <p>Phone: +8801779-858586</p>
                        <p>Email: <span>afiya@sheba.com</span></p>

                    </div>
                </div>
                <div class="col span_2_of_3">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <form name="contactus" method="post">
                            <div>
                                <span><label>NAME</label></span>
                                <span><input type="text" name="fullname" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>E-MAIL</label></span>
                                <span><input type="email" name="emailid" required="ture" value=""></span>
                            </div>
                            <div>
                                <span><label>MOBILE.NO</label></span>
                                <span><input type="text" name="mobileno" required="true" value=""></span>
                            </div>
                            <div>
                                <span><label>Description</label></span>
                                <span><textarea name="description" required="true"> </textarea></span>
                            </div>
                            <div>
                                <span><input type="submit" name="submit" value="Submit"></span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="clear"> </div>
        </div>
        <div class="clear"> </div>
    </div>
    <div class="clear"> </div>
    <div class="footer">
        <div class="wrap">
            <div class="footer-left">
                <ul>
                    <li><a href="index.html">Home</a></li>

                    <li><a href="contact.php">contact</a></li>
                </ul>
            </div>

            <div class="clear"> </div>
        </div>
    </div>
    <!--end-wrap-->
</body>

</html>