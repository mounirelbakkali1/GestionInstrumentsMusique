<?php
session_start();
if(!isset($_SESSION['username'])) {
    echo "<script>window.location.replace('signup.php')</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Stars</title>
    <link rel="stylesheet" href="./assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient sidebar sidebar-dark accordion  md-sm-dis shadow" id="accordionSidebar" style="background-color: var(--main-color)">


        <!-- Nav Item - Dashboard -->
        <li class="nav-item active mt-5">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Home</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Dashboard
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed border-left-1" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Admin</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded"  style="background-color: var(--main-color)">
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=manageInstruments">Manage Instruments</a>
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=statistics">Statistics</a>
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=addStock">Add Stock</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user"></i>
                <span>Users</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="py-2 collapse-inner rounded" style="background-color: var(--main-color)">
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=addUser">Add User</a>
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=manageStatus">Manage Users Status</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
   <main class="flex-grow-1">
       <nav class="navbar navbar-expand navbar-light bg-white topbar static-top mb-3 flex-grow-1 shadow">

           <!-- Sidebar Toggle (Topbar) -->
           <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
               <i class="fa fa-bars"></i>
           </button>

           <!-- Topbar Search -->
           <form
                   class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
               <div class="input-group">
                   <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                          aria-label="Search" aria-describedby="basic-addon2">
                   <div class="input-group-append">
                       <button class="btn" type="button" style="background-color: var(--main-color)">
                           <i class="fas fa-search fa-sm" style="color: white"></i>
                       </button>
                   </div>
               </div>
           </form>

           <!-- Topbar Navbar -->
           <ul class="navbar-nav ml-auto">

               <!-- Nav Item - Search Dropdown (Visible Only XS) -->
               <li class="nav-item dropdown no-arrow d-sm-none">
                   <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-search fa-fw"></i>
                   </a>
                   <!-- Dropdown - Messages -->
                   <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                        aria-labelledby="searchDropdown">
                       <form class="form-inline mr-auto w-100 navbar-search">
                           <div class="input-group">
                               <input type="text" class="form-control bg-light border-0 small"
                                      placeholder="Search for..." aria-label="Search"
                                      aria-describedby="basic-addon2">
                               <div class="input-group-append">
                                   <button class="btn btn-primary" type="button">
                                       <i class="fas fa-search fa-sm"></i>
                                   </button>
                               </div>
                           </div>
                       </form>
                   </div>
               </li>

               <!-- Nav Item - Alerts -->
               <li class="nav-item dropdown no-arrow mx-1">
                   <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-bell fa-fw"></i>
                       <!-- Counter - Alerts -->
                       <span class="badge badge-danger badge-counter">3+</span>
                   </a>

               </li>

               <!-- Nav Item - Messages -->
               <li class="nav-item dropdown no-arrow mx-1">
                   <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <i class="fas fa-envelope fa-fw"></i>
                       <!-- Counter - Messages -->
                       <span class="badge badge-danger badge-counter">7</span>
                   </a>
                   <!-- Dropdown - Messages -->
               </li>

               <div class="topbar-divider d-none d-sm-block"></div>

               <!-- Nav Item - User Information -->
               <li class="nav-item dropdown no-arrow">
                   <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                      data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                       <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['username']?></span>
                       <img class="img-profile rounded-circle"
                            src="./assets/imges_uploaded/default_user_img.png">
                   </a>
                   <!-- Dropdown - User Information -->
                   <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                       <a class="dropdown-item" href="index.php?page=profil">
                           <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                           Profile
                       </a>
                       <div class="dropdown-divider"></div>
                       <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           Logout
                       </a>
                   </div>
               </li>
               <?php if(isset($_SESSION['username'])) echo "<li class='nav-item dropdown no-arrow'><a class='nav-link text-dark'><span style='border: 1px solid black;border-radius: 50px;padding: 2px 20px'>Log Out</span></a></li>
            "?>
           </ul>

       </nav>

       <div id="ComponentContainer" class="container-fluid">
           <div class="d-flex">
               <div class="p-2" style="background-color: var(--light-color)">Categories</div>
               <button class="btn btn-light rounded-0">Bois</button>
               <button class="btn btn-light rounded-0">Claviers</button>
               <button class="btn btn-light rounded-0">Cordes</button>
               <button class="btn btn-light rounded-0">Cuivres</button>
               <button class="btn btn-light rounded-0">Percussions</button>
           </div>
            <?php if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page=="statistics"){
                    include_once('./includes/Components/statistics.component.php');
                }elseif ($page=="addUser"){
                    include_once('./includes/Components/addUSer.component.php');
                }elseif ($page=="manageInstruments"){
                    include_once('./includes/Components/manageInstruments.component.php');
                }elseif ($page=="manageStatus"){
                    include_once('./includes/Components/manageUserStatus.php');
                }elseif ($page=="addStock"){
                    include_once('./includes/Components/addStock.component.php');
                }elseif ($page=="profil"){
                    include_once './includes/Components/profil.component.php';
                }
            }else{
                echo "<div class='mt-3 p-5 shadow' style='height: 81vh;background-color: var(--main-color)'>
                <div class='row h-50 mb-5 align-items-center'>
                    <div class='col-6' id='find'>
                        <h2 class='h2 text-light'>Find an instrument</h2>
                        <input class='form-control mt-3' type='text' placeholder='search in stock'>
                    </div>
                    <div class='col-6 '>
                        <img src='./assets/img/home_img.png' style='width: 90%;' alt='home page image'>
                    </div>
                </div>
               <div class='row h-50 mt-5 text-light align-items-center'>
                   <div class='col'>
                       <div class='p-2'>
                           <div class='row p-2 shadow' style='background-color: var(--card-color)'>
                               <div class='col-2'>
                                   <span class='rounded-circle' style='background-color: var(--main-color);padding: 5px 10px!important;'>1</span>
                               </div>
                               <div class='col-9 pl-0'>
                                   <h5 class='h5'>List Instruments</h5>
                                   <p class='small'>Lorem ipsum dolor sit amet,dolores error molestias nulla quos repudiandae dolores error molestias nulla quos repudiandae.</p>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class='col'>
                       <div class='p-2'>
                           <div class='row p-2 shadow' style='background-color: var(--card-color)'>
                               <div class='col-2'>
                                   <span class='rounded-circle' style='background-color: var(--main-color);padding: 5px 10px!important;'>2</span>
                               </div>
                               <div class='col-9 pl-0'>
                                   <h5 class='h5'>Manage Stock</h5>
                                   <p class='small'>Lorem ipsum dolor sit amet,dolores error molestias nulla quos repudiandae.dolores error molestias nulla quos repudiandae</p>
                               </div>
                           </div>
                       </div>
                   </div>
                   <div class='col'>
                       <div class='p-2'>
                           <div class='row p-2 shadow' style='background-color: var(--card-color)'>
                               <div class='col-2'>
                                   <span class='rounded-circle' style='background-color: var(--main-color);padding: 5px 10px!important;'>3</span>
                               </div>
                               <div class='col-9 pl-0'>
                                   <h5 class='h5'>Track sells</h5>
                                   <p class='small'>Lorem ipsum dolor sit amet,dolores error molestias nulla quos repudiandae.dolores error molestias nulla quos repudiandae</p>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>";
            }
                // page default
                //include_once('./includes/Components/manageInstruments.component.php');
            ?>

       </div>
   </main>
</div>
</body>
<script src="./assets/js/sb-admin-2.min.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/scripts.js"></script>
</html>
