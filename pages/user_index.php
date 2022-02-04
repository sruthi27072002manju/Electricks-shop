<?php
    session_start();

    if (!isset($_SESSION['id']) ||(trim ($_SESSION['id']) == '')) {
        header('location:user_login_page.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>E-commerce</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-kit.css?v=1.1.0" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />

    <!--     inserted     -->
    <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
    <link href="../assets/js/google-code-prettify/prettify.css" rel="stylesheet"/>
    <link href="../assets/css/bootstrap-responsive.css" rel="stylesheet"/>
    
    <link href="../assets/style.css" rel="stylesheet"/>
    <!--     inserted     -->
</head>

<body class="index-page sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top navbar-transparent " color-on-scroll="400">
        <div class="container">
            <div class="navbar-translate">
                <a href="user_index.php" class="navbar-brand" rel="tooltip" title="Designed and Coded by Serve(8) Web Solutions, Inc." data-placement="bottom" target="">
                    E-Commerce Website
                </a>
                <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar bar1"></span>
                    <span class="navbar-toggler-bar bar2"></span>
                    <span class="navbar-toggler-bar bar3"></span>
                    <span class="navbar-toggler-bar bar4"></span>
                </button>
            </div>
            <div class="collapse navbar-collapse justify-content-end" id="navigation" data-nav-image="../assets/img/blurred-image-1.jpg">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons users_circle-08"></i>
                            <p>
                                <?php
                                 include('../config/dbconn.php');
                                 $query=mysqli_query($dbconn,"SELECT * FROM `users` WHERE user_id='".$_SESSION['id']."'");
                                 $row=mysqli_fetch_array($query);
                                 echo ''.$row['firstname'].'';
                                ?>
                            </p>
                        </a>
                    </li>
					 <li class="nav-item">
                        <a href="admin_index.php" class="nav-link" onclick="scrollToDownload()">
                            <i class="now-ui-icons education_paper"></i>
                            <p>ADMIN PANEL</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_products.php">
                            <i class="now-ui-icons files_paper"></i>
                            <p>Electronic Products</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="user_cart.php" onclick="scrollToDownload()">
                            <i class="now-ui-icons shopping_cart-simple"></i>
                            <p>Shopping Cart</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="logout.php" class="nav-link" href="" onclick="scrollToDownload()">
                            <i class="now-ui-icons ui-1_lock-circle-open"></i>
                            <p>Logout</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Twitter" data-placement="bottom" href="https://twitter.com" target="_blank">
                            <i class="fa fa-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Like us on Facebook" data-placement="bottom" href="https://www.facebook.com" target="_blank">
                            <i class="fa fa-facebook-square"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" rel="tooltip" title="Follow us on Instagram" data-placement="bottom" href="https://www.instagram.com" target="_blank">
                            <i class="fa fa-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
        <div class="page-header clear-filter" filter-color="orange">
            <div class="page-header-image" data-parallax="true" style="background-image: url('../assets/img/ironman.jpg');">
            
                <div class="container">
                    <div class="content-center brand">
                        <img src="../assets/img/elogo.png" alt="Circle Image" class="rounded-circle">
                        <br><br>
                        <h3>Raspberry Pi, Arduino, Sensors, Modules, and Electronic components.</h3>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="main">
            <div class="section section-basic">
                <div class="container">
                    <br>
                    <div class="col-md-12">
                        <h2 class="title">Products</h2>
                        <div class="typography-line">
                            <p>
                            “The reason it seems that price is all your customers care about is that you haven’t given them anything else to care about.”-Seth Godin, American author, entrepreneur, marketer, and public speaker.
                            </p>
                        </div>
                        <br>


                       <center>
                        <label><b>Search Product: &nbsp</b></label>       
                                <form method="POST" action="user_index_search.php" >
                                    <input type="image" title="Search" src="../assets/img/search.png" alt="Search" />
                                    <input type="text" name="search" class="search-query" placeholder="Enter product name">
                                </form>
                        </center>
                    </div>
                    <br><hr color="orange">

                      <div class="tab-pane  active" id="">
                        <ul class="thumbnails">
                        <?php
                        $query = "SELECT * FROM products ORDER BY prod_name ASC";
                        $result = mysqli_query($dbconn,$query);
                        while($res = mysqli_fetch_array($result)) {  
                            $prod_id=$res['prod_id'];
                        
                    ?>   
                        <div class="row-sm-3">
                            <div class="thumbnail">
                                <?php if($res['prod_pic1'] != ""): ?>
                                <img src="../uploads/<?php echo $res['prod_pic1']; ?>" width="300px" height="200px">
                                <?php else: ?>
                                <img src="../uploads/default.png" width="300px" height="200px">
                                <?php endif; ?>
                            <div class="caption">
                              <h5><b><?php echo $res['prod_name'];?></b></h5>
                              <h6><a class="btn btn-success btn-round" title="Click for more details!" href="user_product_details.php?prod_id=<?php echo $res['prod_id'];?>"><i class="now-ui-icons gestures_tap-01"></i>View</a><medium class="pull-right">Php<?php echo $res['prod_price']; ?></medium></h6>
                            </div>

                            </div>
                          <hr color="orange">
                          </div>
                                 
                    <?php }?> 

                          </ul>
                      </div>


        </div>
    </div>     
</div>
        <footer class="footer" data-background-color="black">
            <div class="container">
                <nav>
                    <ul>
                       
						
						<li>Brought To You By <a href="https://code-projects.org/">code-projects</a> | Thanks to Billy Revellame</li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by Serve(8) Web Solutions, Inc.
                </div>
            </div>
        </footer>
    </div>
    <div class="bot-icon">
        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
width="40" height="40"
viewBox="0 0 172 172"
style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#ffffff"><path d="M58.78906,10.07813c-14.3489,0 -38.63281,2.83027 -38.63281,13.4375v57.10938c0,10.60723 24.28391,13.4375 38.63281,13.4375c9.61159,0 23.67166,-1.27422 31.91406,-5.30086v4.12508c0,4.35308 -3.54145,7.89453 -7.89453,7.89453h-55.93359c-5.55708,0 -10.07812,4.52105 -10.07812,10.07813c0,5.55708 4.52105,10.07813 10.07813,10.07813h55.93359c3.95357,0 7.23711,2.92137 7.80661,6.71875h-67.09958c-1.85538,0 -3.35937,1.50433 -3.35937,3.35938v23.51563c0,10.60723 24.28391,13.4375 38.63281,13.4375c14.3489,0 38.63281,-2.83027 38.63281,-13.4375v-23.51562v-2.18359c0,-8.0578 -6.55548,-14.61328 -14.61328,-14.61328h-55.93359c-1.85236,0 -3.35937,-1.50702 -3.35937,-3.35937c0,-1.85236 1.50702,-3.35937 3.35938,-3.35937h55.93359c8.0578,0 14.61328,-6.55548 14.61328,-14.61328v-12.26172v-57.10937c0,-10.60723 -24.28391,-13.4375 -38.63281,-13.4375zM58.78906,16.79688c8.54222,0 16.68309,0.89619 22.9238,2.52347c6.40573,1.67055 8.58724,3.53271 8.9568,4.19266c-0.00585,0.01075 -0.01087,0.02074 -0.01771,0.03215c-0.01366,0.02275 -0.03014,0.0469 -0.0479,0.07217c-0.01558,0.02218 -0.03297,0.04549 -0.05184,0.06955c-0.02288,0.02916 -0.04822,0.06006 -0.07611,0.09186c-0.02373,0.02706 -0.04993,0.05509 -0.07742,0.08398c-0.02868,0.03014 -0.0596,0.06112 -0.09251,0.09317c-0.03711,0.03611 -0.07805,0.07378 -0.12073,0.1122c-0.03436,0.03093 -0.07017,0.06212 -0.10826,0.09448c-0.04558,0.0387 -0.09523,0.07943 -0.14632,0.12007c-0.04728,0.03762 -0.09547,0.07563 -0.14763,0.11482c-0.0572,0.04298 -0.11981,0.08712 -0.18306,0.13188c-0.04971,0.03519 -0.09933,0.07072 -0.15288,0.10695c-0.07963,0.05386 -0.1662,0.10933 -0.25458,0.16534c-0.05223,0.03311 -0.10341,0.06592 -0.15878,0.09973c-0.09002,0.05495 -0.18819,0.11129 -0.28673,0.16797c-0.06887,0.03962 -0.13615,0.07902 -0.2093,0.11942c-0.09427,0.05205 -0.19699,0.10554 -0.29854,0.15878c-0.08584,0.045 -0.16997,0.09004 -0.26114,0.13582c-0.10647,0.05345 -0.22201,0.10766 -0.33594,0.16206c-0.10086,0.04817 -0.19892,0.09617 -0.30575,0.145c-0.10655,0.04869 -0.22265,0.09835 -0.33528,0.14763c-0.12874,0.05632 -0.25483,0.1123 -0.39171,0.16928c-0.09956,0.04145 -0.20836,0.08358 -0.31231,0.12532c-0.16171,0.06492 -0.32149,0.12937 -0.49407,0.19487c-0.11065,0.042 -0.23122,0.08445 -0.34644,0.12663c-0.1725,0.06315 -0.34196,0.12619 -0.5249,0.18962c-0.16739,0.05804 -0.34856,0.11637 -0.5249,0.17453c-0.1498,0.0494 -0.29306,0.09887 -0.44945,0.14828c-0.19472,0.06153 -0.40506,0.12229 -0.6102,0.18372c-0.15632,0.0468 -0.30469,0.09439 -0.46716,0.14107c-0.37277,0.10709 -0.76114,0.21363 -1.16725,0.31953c-6.24071,1.62728 -14.38158,2.52347 -22.9238,2.52347c-8.54222,0 -16.68309,-0.89619 -22.9238,-2.52347c-0.4013,-0.10465 -0.78474,-0.20978 -1.15348,-0.3156c-0.00477,-0.00137 -0.00901,-0.00257 -0.01378,-0.00394c-0.16248,-0.04668 -0.31085,-0.09426 -0.46716,-0.14107c-0.20513,-0.06143 -0.41548,-0.12218 -0.6102,-0.18372c-0.15639,-0.04942 -0.29965,-0.09888 -0.44945,-0.14828c-0.17634,-0.05816 -0.35751,-0.11649 -0.5249,-0.17453c-0.15457,-0.0536 -0.29644,-0.10669 -0.44354,-0.1601c-0.15042,-0.05461 -0.30536,-0.10972 -0.44814,-0.16403c-0.14337,-0.05455 -0.27557,-0.10857 -0.41139,-0.16272c-0.12636,-0.05038 -0.25666,-0.1003 -0.37662,-0.15025c-0.13617,-0.0567 -0.26162,-0.11257 -0.38974,-0.16862c-0.11199,-0.049 -0.22734,-0.09855 -0.33331,-0.14697c-0.12193,-0.05572 -0.2349,-0.1105 -0.34906,-0.16534c-0.09361,-0.04498 -0.1897,-0.09018 -0.2782,-0.13451c-0.10369,-0.05193 -0.19907,-0.1026 -0.29591,-0.15353c-0.09425,-0.04958 -0.19027,-0.09975 -0.2782,-0.14828c-0.07853,-0.04336 -0.15079,-0.08549 -0.2244,-0.12795c-0.0892,-0.05144 -0.17832,-0.10286 -0.26048,-0.15288c-0.07392,-0.04501 -0.1429,-0.08878 -0.21127,-0.13254c-0.06687,-0.0428 -0.13381,-0.08576 -0.19553,-0.12729c-0.06359,-0.04279 -0.12217,-0.08397 -0.18044,-0.12532c-0.06199,-0.04399 -0.12364,-0.08766 -0.17978,-0.12991c-0.05114,-0.0385 -0.09857,-0.07654 -0.145,-0.11351c-0.04769,-0.03798 -0.09492,-0.07526 -0.13779,-0.11154c-0.04211,-0.03565 -0.08115,-0.06974 -0.11876,-0.10367c-0.04119,-0.03716 -0.08083,-0.07393 -0.11679,-0.10892c-0.03199,-0.03114 -0.0619,-0.06121 -0.08989,-0.09055c-0.03037,-0.03183 -0.05882,-0.0629 -0.08464,-0.09251c-0.02412,-0.02767 -0.04663,-0.0544 -0.06692,-0.08005c-0.02116,-0.02675 -0.04059,-0.05231 -0.05774,-0.07677c-0.01731,-0.02468 -0.0332,-0.0486 -0.04659,-0.07086c-0.00685,-0.01141 -0.01187,-0.0214 -0.01772,-0.03215c0.36956,-0.65995 2.55107,-2.52211 8.9568,-4.19266c6.24071,-1.62728 14.38158,-2.52347 22.9238,-2.52347zM26.875,31.6608c0.11566,0.05645 0.23639,0.11063 0.35431,0.166c0.08302,0.03898 0.16521,0.07834 0.24933,0.11679c0.35493,0.16224 0.71824,0.32082 1.0918,0.47372c0.03922,0.01605 0.07999,0.03129 0.11942,0.04724c0.33615,0.13604 0.6803,0.26757 1.03012,0.3963c0.09635,0.03545 0.19202,0.07139 0.28935,0.10629c0.38728,0.1389 0.78034,0.2738 1.18234,0.40417c0.05937,0.01925 0.12011,0.03801 0.17978,0.05708c0.37193,0.11886 0.75005,0.23395 1.13313,0.34578c0.07869,0.02297 0.15707,0.04556 0.23621,0.06824c0.44137,0.12649 0.88827,0.24926 1.34244,0.36678c0.01282,0.00332 0.02588,0.00653 0.03871,0.00984c0.43193,0.11144 0.87025,0.21794 1.31226,0.3215c0.09704,0.02273 0.19384,0.04588 0.29132,0.06824c0.20214,0.04637 0.40756,0.08908 0.61151,0.13385c0.46792,0.10273 0.93963,0.20141 1.41592,0.29591c0.18513,0.03673 0.36951,0.07406 0.55574,0.10957c0.54032,0.10305 1.08446,0.20158 1.63244,0.2946c0.09574,0.01625 0.19014,0.03391 0.28607,0.04986c0.63126,0.10498 1.26652,0.20167 1.90408,0.29395c0.19538,0.02828 0.39082,0.0549 0.58658,0.08202c0.47104,0.06525 0.94238,0.12701 1.41461,0.18569c0.19617,0.02437 0.39169,0.04891 0.58789,0.07217c0.55614,0.06594 1.11171,0.12779 1.66657,0.18503c0.10344,0.01067 0.207,0.02309 0.31035,0.03346c0.00065,0.00007 0.00131,-0.00006 0.00197,0c0.64088,0.06433 1.27867,0.12126 1.91392,0.17453c0.17641,0.01479 0.35107,0.02803 0.52687,0.04199c0.47108,0.03742 0.93907,0.07205 1.40477,0.10367c0.20329,0.0138 0.40617,0.02796 0.60823,0.04068c0.59254,0.03733 1.18044,0.07136 1.76039,0.09973c0.02625,0.00128 0.05317,0.00333 0.07939,0.00459c0.00541,0.00026 0.011,0.0004 0.0164,0.00066c0.60858,0.02931 1.20611,0.05223 1.79713,0.07218c0.17209,0.00581 0.34072,0.0107 0.51113,0.01575c0.44062,0.01304 0.87476,0.02342 1.30307,0.03149c0.17532,0.00331 0.35051,0.00734 0.52359,0.00984c0.55961,0.00809 1.11104,0.01312 1.64491,0.01312c0.53387,0 1.0853,-0.00503 1.64491,-0.01312c0.17308,-0.0025 0.34827,-0.00654 0.52359,-0.00984c0.42831,-0.00808 0.86245,-0.01845 1.30307,-0.03149c0.17041,-0.00504 0.33903,-0.00994 0.51113,-0.01575c0.59102,-0.01995 1.18855,-0.04287 1.79713,-0.07218c0.00555,-0.00027 0.01085,-0.00039 0.0164,-0.00066c0.02621,-0.00127 0.05315,-0.00331 0.07939,-0.00459c0.57995,-0.02837 1.16785,-0.06241 1.76039,-0.09973c0.20206,-0.01272 0.40494,-0.02688 0.60823,-0.04068c0.4657,-0.03162 0.93369,-0.06625 1.40477,-0.10367c0.1758,-0.01396 0.35046,-0.0272 0.52687,-0.04199c0.63526,-0.05327 1.27305,-0.1102 1.91392,-0.17453c0.00065,-0.00006 0.00132,0.00007 0.00197,0c0.10335,-0.01037 0.20691,-0.02279 0.31035,-0.03346c0.55485,-0.05724 1.11042,-0.11909 1.66657,-0.18503c0.1962,-0.02326 0.39172,-0.0478 0.58789,-0.07217c0.47223,-0.05867 0.94357,-0.12043 1.41461,-0.18569c0.19576,-0.02711 0.3912,-0.05374 0.58658,-0.08202c0.63757,-0.09228 1.27282,-0.18897 1.90408,-0.29395c0.09593,-0.01595 0.19033,-0.03361 0.28607,-0.04986c0.54798,-0.09303 1.09213,-0.19155 1.63244,-0.2946c0.18623,-0.03552 0.37061,-0.07284 0.55574,-0.10957c0.47629,-0.09451 0.948,-0.19318 1.41592,-0.29591c0.20395,-0.04477 0.40937,-0.08748 0.61151,-0.13385c0.09748,-0.02236 0.19428,-0.0455 0.29132,-0.06824c0.442,-0.10356 0.88032,-0.21006 1.31226,-0.3215c0.01283,-0.00331 0.0259,-0.00653 0.03871,-0.00984c0.45417,-0.11752 0.90107,-0.24029 1.34244,-0.36678c0.07913,-0.02268 0.15751,-0.04527 0.23621,-0.06824c0.38308,-0.11183 0.7612,-0.22692 1.13313,-0.34578c0.05967,-0.01907 0.12041,-0.03783 0.17978,-0.05708c0.402,-0.13037 0.79506,-0.26527 1.18234,-0.40417c0.09733,-0.03491 0.193,-0.07084 0.28935,-0.10629c0.34982,-0.12873 0.69398,-0.26026 1.03012,-0.3963c0.03942,-0.01595 0.08019,-0.03119 0.11941,-0.04724c0.37355,-0.1529 0.73687,-0.31148 1.0918,-0.47372c0.08412,-0.03845 0.16631,-0.07781 0.24933,-0.11679c0.11792,-0.05537 0.23865,-0.10955 0.35431,-0.166v48.90056c-0.25162,0.59259 -2.35516,2.52851 -8.99027,4.25892c-6.24071,1.62728 -14.38158,2.52347 -22.9238,2.52347c-8.54222,0 -16.68309,-0.89619 -22.9238,-2.52347c-6.6351,-1.73041 -8.73865,-3.66633 -8.99027,-4.25892zM110.85938,40.3125c-1.85505,0 -3.35937,1.50399 -3.35937,3.35938v39.76726l-6.54684,19.63922c-0.47434,1.42337 0.05232,2.98883 1.29126,3.83572c0.57345,0.39238 1.23544,0.58592 1.89555,0.58592c0.76493,0 1.5277,-0.26055 2.1475,-0.77554l23.32929,-19.38071h31.63324c1.85505,0 3.35938,-1.50399 3.35938,-3.35937v-40.3125c0,-1.85538 -1.50433,-3.35937 -3.35937,-3.35937zM43.67188,43.67188c-3.70472,0 -6.71875,3.01403 -6.71875,6.71875c0,3.70472 3.01403,6.71875 6.71875,6.71875c3.70472,0 6.71875,-3.01403 6.71875,-6.71875c0,-3.70472 -3.01403,-6.71875 -6.71875,-6.71875zM73.90625,43.67188c-3.70472,0 -6.71875,3.01403 -6.71875,6.71875c0,3.70472 3.01403,6.71875 6.71875,6.71875c3.70472,0 6.71875,-3.01403 6.71875,-6.71875c0,-3.70472 -3.01403,-6.71875 -6.71875,-6.71875zM114.21875,47.03125h43.67188v33.59375h-29.4877c-0.78408,0 -1.54351,0.27432 -2.14685,0.77554l-15.20511,12.63178l2.99523,-8.98567c0.11422,-0.34232 0.17256,-0.70114 0.17256,-1.06227zM123.20311,53.75v20.15625h4.47282v-8.69894h7.33617v8.69894h4.44264v-20.15625h-4.44264v7.56975h-7.33617v-7.56975zM143.34033,53.75v20.15625h4.47217v-20.15625zM43.74995,63.82878c-1.18851,-0.02659 -2.35419,0.57972 -2.98932,1.68231c-0.92584,1.6078 -0.37296,3.6618 1.23484,4.58765c0.40413,0.2328 6.93002,3.89609 16.58822,3.89609c4.89931,0 10.60525,-0.9429 16.72536,-3.75436c1.68573,-0.77467 2.42483,-2.76904 1.65016,-4.45511c-0.77467,-1.68573 -2.76969,-2.42483 -4.45576,-1.65016c-14.9126,6.85111 -26.64696,0.4281 -27.16632,0.13516c-0.50201,-0.28649 -1.04694,-0.42949 -1.58717,-0.44158zM117.57813,104.14063c-1.85505,0 -3.35937,1.50433 -3.35937,3.35938c0,1.85505 1.50433,3.35938 3.35938,3.35938h36.95313c1.85505,0 3.35938,-1.50433 3.35938,-3.35937c0,-1.85505 -1.50433,-3.35937 -3.35937,-3.35937zM107.5,117.57813c-1.85505,0 -3.35937,1.50433 -3.35937,3.35938c0,1.85505 1.50433,3.35938 3.35938,3.35938h26.875c1.85505,0 3.35938,-1.50433 3.35938,-3.35937c0,-1.85505 -1.50433,-3.35937 -3.35937,-3.35937zM124.29688,131.01563c-1.85505,0 -3.35937,1.50433 -3.35937,3.35938c0,1.85505 1.50433,3.35938 3.35938,3.35938h33.59375c1.85505,0 3.35938,-1.50433 3.35938,-3.35937c0,-1.85505 -1.50433,-3.35937 -3.35937,-3.35937zM26.875,134.375h63.82813v20.09261c-0.25162,0.59293 -2.35516,2.52819 -8.99027,4.25827c-6.24071,1.62762 -14.38158,2.52412 -22.9238,2.52412c-8.54222,0 -16.68309,-0.89619 -22.9238,-2.52347c-6.6351,-1.73041 -8.73865,-3.666 -8.99027,-4.25892zM43.67188,144.45313v6.71875h6.71875v-6.71875zM53.75,144.45313v6.71875h6.71875v-6.71875zM63.82813,144.45313v6.71875h6.71875v-6.71875z"></path></g></g></svg>
        </div>
    <iframe class="bot" src='https://webchat.botframework.com/embed/sruthiqna-bot?s=36CdA4mQnuU.DMExkZCT7TG2tOf_0kTr8fVMDRmL0yHEbJhi-deYX9w'  style='min-width: 400px; min-height: 500px;' hidden></iframe>
    <style>
    .bot-icon{
        position: fixed;
    bottom: 0;
    right: 20px;
    transform: translate(-50%, -50%);
    width: 60px;
    height: 60px;
    z-index: 2;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    background-color: #f96332;
    box-shadow: 0 0 5px 2px rgba(0, 0, 0, 0.34);
    }

    .bot{
        min-width: 300px;
        max-width: 300px;
    min-height: 400px;
    position: fixed;
    bottom: 100px;
    right: 20px;
    }
</style>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="../assets/js/plugins/bootstrap-datepicker.js" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-kit.js?v=1.1.0" type="text/javascript"></script>
<script type="text/javascript">
    $(document).ready(function() {
        // the body of this function is in assets/js/now-ui-kit.js
        nowuiKit.initSliders();
    });

    function scrollToDownload() {

        if ($('.section-download').length != 0) {
            $("html, body").animate({
                scrollTop: $('.section-download').offset().top
            }, 1000);
        }
    }
</script>



   <!---  inserted  -->
    <script type="text/javascript" src="http://platform.twitter.com/widgets.js"></script>
    <script src="../assets/js/jquery.js"></script>
    <script src="../assets/js/google-code-prettify/prettify.js"></script>
    <script src="../assets/js/application.js"></script>
    <script src="../assets/js/bootstrap-transition.js"></script>
    <script src="../assets/js/bootstrap-modal.js"></script>
    <script src="../assets/js/bootstrap-scrollspy.js"></script>
    <script src="../assets/js/bootstrap-alert.js"></script>
    <script src="../assets/js/bootstrap-dropdown.js"></script>
    <script src="../assets/js/bootstrap-tab.js"></script>
    <script src="../assets/js/bootstrap-tooltip.js"></script>
    <script src="../assets/js/bootstrap-popover.js"></script>
    <script src="../assets/js/bootstrap-button.js"></script>
    <script src="../assets/js/bootstrap-collapse.js"></script>
    <script src="../assets/js/bootstrap-carousel.js"></script>
    <script src="../assets/js/bootstrap-typeahead.js"></script>
    <script src="../assets/js/bootstrap-affix.js"></script>
    <script src="../assets/js/jquery.lightbox-0.5.js"></script>
    <script src="../assets/js/bootsshoptgl.js"></script>
     <script type="text/javascript">
    $(function() {
        $('#gallery a').lightBox();
    });
    </script>

    <!-- SlimScroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../plugins/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../plugins/demo.js"></script>
    <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
    <script>
      $(function () {
        $("#example1").DataTable({
        });
      });
    </script>
     <!--  inserted  -->
     <script>
         $(".bot-icon").click(function(){
            if($(".bot").is(':hidden')){
                $(".bot").attr('hidden',false);
            }
            else{
                $(".bot").attr('hidden', true);
            }
         });
     </script>

</html>