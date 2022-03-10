<?php
    include_once('hms/include/config.php');
    $spec_id = "";
    if (!empty($_GET)) {
        // no data passed by get
        $spec_id = $_GET['spec'];
    }
    // echo "Specification : " . $spec_id;
?>
<!DOCTYPE HTML>
<html>

<head>
    <title>MediSmart | Available Doctors</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
    <link href='http://fonts.googleapis.com/css?family=Ropa+Sans' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./css/avail-doc.css">

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
                    <li class="active"><a href="avail-doctor.php">Available Doctors</a></li>
                    <li><a href="contact.php">contact</a></li>
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
                <div class="col span_cus_1_of_3">

                    <div class="sidebar app-aside" id="sidebar">
                        <div class="sidebar-container perfect-scrollbar">
                            <nav>
                                <!-- start: MAIN NAVIGATION MENU -->
                                <div class="navbar-title">
                                    <span>Doctor Specialization</span>
                                </div>
                                <ul class="main-navigation-menu">
                                    <?php
                                        $sql=mysqli_query($con,"select * from doctorSpecilization");
                                        while($row=mysqli_fetch_array($sql)){
									?>
                                    <li>
                                        <a href="avail-doctor.php?spec=<?php echo $row['id'];?>">
                                            <div class="item-content">
                                                <div class="item-media">
                                                    <i class="fas fa-user-md"></i>
                                                </div>
                                                <div class="item-inner">
                                                    <span class="title"> <?php echo $row['specilization'];?> </span><i
                                                        class="icon-arrow"></i>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php 
                                        }
                                    ?>
                                </ul>
                                <!-- end: CORE FEATURES -->
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col span_cus_2_of_3">
                    <div class="contact-form">
                        <h2 class="avail__heading">Available Doctors</h2>

                        <div class="Items">
                            <?php
                                $sql="";
                
                                if($spec_id == ""){
                                    $sql=mysqli_query($con,"SELECT * FROM doctors");
                                }else{
                                    $sql=mysqli_query($con,"SELECT * FROM doctors WHERE specilization = (SELECT specilization FROM doctorspecilization WHERE id = {$spec_id})");
                                }
                                
                                $num=mysqli_num_rows($sql);
                                if($num>0){
                                
                                while($row=mysqli_fetch_array($sql)){
                            ?>

                            <div class="Item">
                                <div class="ImageContainer">
                                    <img src="./images/doctor-placeholder.png" alt="Demo Doctor" class="Image">
                                </div>
                                <div class="Item__title"><?php echo $row['doctorName'];?></div>
                                <div class="Item__specialty">Specialities: <?php echo $row['specilization'];?>
                                </div>
                                <div class="Item__practice">Practice Days : <?php echo $row['practicedays'];?></div>
                                <div class="Item__practice">Practice Time : <?php echo $row['practicetime'];?></div>
                                <div class="Item__branch"><?php echo $row['address'];?></div>
                            </div>
                            <?php 
                                    }
                                }else{
                            ?>
                            <div class="no__doctor">No doctor is available now. </div>
                            <?php 
                                }
                            ?>
                        </div>
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