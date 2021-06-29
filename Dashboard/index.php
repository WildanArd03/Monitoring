<?php 
session_start();
include '../config/konek.php';
if (empty($_SESSION['username'])) {
    echo "<script>alert('Silahkan Login Terlebih Dahulu');document.location.href='../index.php'</script>";
}
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>SuperVisor Digital | Dashboard</title>
    <!-- Bootstrap Core CSS -->
    <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="../assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="../assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../Css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="../Css/colors/blue.css" id="theme" rel="stylesheet">
    <link rel="stylesheet" href="../Css/bulat.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header fix-sidebar card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-toggleable-sm navbar-light">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="teq">
                    <a class="navbar-brand text-light" href="index.php" style="margin-left: 25px;">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            
                            <!-- Light Logo icon -->
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span style="color: white;font-size: 20px">
                         
                         <!-- Light Logo text -->    
                         SUPERVISOR DIGITAL</span> </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto mt-md-0" style="margin-left: -30px;">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                             <?php 
                                $sql = mysqli_query ($con,"SELECT * FROM login WHERE username = '$_SESSION[username]'");
                                $tampil = mysqli_fetch_array($sql);
                                $_SESSION['kepsek'] = $tampil['role'] == "kepsek";
                                $_SESSION['guru'] = $tampil['role'] == "guru";
                                $_SESSION['super'] = $tampil['role'] == "supervisor";
                                $_SESSION['kuri'] = $tampil['role'] == "kurikulum";
                             ?>
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.png" alt="user" class="profile-pic m-r-10" /><?= $_SESSION['username'] ?></a>
                            <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                              <a class="dropdown-item"  href="logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="waves-effect waves-dark" href="index.php" aria-expanded="false"><i class="mdi mdi-gauge"></i><span class="hide-menu">Dashboard</span></a>
                        </li>
                        <?php
                        if ($_SESSION['super']) {
                                echo '<li> <a class="waves-effect waves-dark" href="sVisor.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Daftar Tugas</span></a>
                                </li>';
                        } 
                        if ($_SESSION['guru']) {
                                echo  '<li> <a class="waves-effect waves-dark" href="dUser.php" aria-expanded="false"><i class="mdi mdi-account-check"></i><span class="hide-menu">Upload File</span></a>
                        </li>';
                        }
                        if ($_SESSION['kepsek']) {
                                echo '<li> <a class="waves-effect waves-dark" href="table-basic.html" aria-expanded="false"><i class="mdi mdi-table"></i><span class="hide-menu">Data guru</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="icon-material.html" aria-expanded="false"><i class="mdi mdi-emoticon"></i><span class="hide-menu">Data SuperVisor</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="map-google.html" aria-expanded="false"><i class="mdi mdi-earth"></i><span class="hide-menu">Data Kurikulum</span></a>
                        </li>
                        <li> <a class="waves-effect waves-dark" href="pages-blank.html" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Laporan</span></a>
                        </li>';
                            }
                         ?>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!-- End Bottom points-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 col-8 align-self-center">
                        <h3 class="text-themecolor">DASHBOARD</h3>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        </ol>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- Row -->
                <!-- Row -->
                <div class="row">
                    <!-- Column -->
                    <div class="col-md-3">
                        <div class="card">
                            <img class="card-img-top" src="../assets/images/background/profile-bg.jpg" alt="Card image cap">
                            <div class="card-block little-profile text-center">
                                <div class="pro-img"><img src="../assets/images/users/1.png" alt="user" /></div>
                                <h3 class="m-b-0"><?= $tampil['nama']; ?></h3>
                                <p>Web Designer &amp; Developer</p>
                            </div>
                        </div>
                    </div>
                    <?php 
                    $sql = mysqli_query($con, "SELECT count(upload_file) as u_file FROM file");
                    $data = mysqli_fetch_array($sql);
                    $file = $data['u_file'];


                            if ($_SESSION['guru']) {
                                    echo  '<div class="col-lg-9">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4>DATA UPLOAD</h4>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-lg-6">
                                                                <h5 class="m-t-10" style="font-size:30px;">Jumlah upload</h5> 
                                                            </div>
                                                            <div class="col-lg-6">
                                                            <h5>
                                                            <span class="pull-right"  style="font-size:150px; padding:50px; background:#3498db; color:white; padding-top:75px; padding-bottom:75px;"> 
                                                            ';
                                    echo $file;
                                    echo '</span></h5></div></div>';
                             }
                             ?>
                             <?php 
                             if ($_SESSION['kepsek']) {
                                echo  '
                                <div class="col-lg-8 col-xlg-9 col-md-7">
                                    <div class="card">
                                        <div class="card-block">
                                        <h4>DATA</h4>
                                        <hr>
                                        <h5 class="m-t-30">Tugas yang di upload <span class="pull-right">16</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-info" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width:20%; height:6px;"> <span class="sr-only">50% Complete</span>
                                            </div>
                                        </div>
                                        <h5 class="m-t-30">Siswa yang tidak mengerjakan <span class="pull-right">50</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width:10%; height:6px;"> <span class="sr-only">50% Complete</span>
                                            </div>
                                        </div>
                                        <h5 class="m-t-30">Guru <span class="pull-right">26</span></h5>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width:40%; height:6px;"> <span class="sr-only">50% Complete</span>
                                            </div>
                                        </div>';
                            }?>
                    
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer"> © SMK WIKRAMA BOGOR </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/plugins/bootstrap/js/tether.min.js"></script>
    <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../js/jquery.slimscroll.js"></script>
    <!--Wave Effects -->
    <script src="../js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="../assets/plugins/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <!--Custom JavaScript -->
    <script src="../js/custom.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugins -->
    <!-- ============================================================== -->
    <!-- chartist chart -->
    <script src="../assets/plugins/chartist-js/dist/chartist.min.js"></script>
    <script src="../assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js"></script>
    <!--c3 JavaScript -->
    <script src="../assets/plugins/d3/d3.min.js"></script>
    <script src="../assets/plugins/c3-master/c3.min.js"></script>
    <!-- Chart JS -->
    <script src="../js/dashboard1.js"></script>
</body>

</html>
