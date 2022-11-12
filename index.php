<?php
session_start();
if(!isset($_SESSION['userInfo'])) {
    echo "<script>window.location.replace('signup.php')</script>";
}else{
    $_SESSION['username']=$_SESSION['userInfo']['First_Name']." ".$_SESSION['userInfo']['Second_Name'];
    $_SESSION['status']=$_SESSION['userInfo']['Role_ID'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rock Stars</title>
    <!--Google fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;1,500;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./assets/css/sb-admin-2.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--Bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
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
        <hr class="sidebar-divider text-light">

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
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=manageInstruments"><?php if($_SESSION['status']==2) echo "Manage";else echo "View" ?> Instruments</a>
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=statistics">Statistics</a>
                    <a class="collapse-item text-light font-weight-bold" href="index.php?page=addStock">Add Stock</a>
                </div>
            </div>
        </li>

        <?php if($_SESSION['status']==2)

            echo "
            <li class='nav-item'>
            <a class='nav-link collapsed' href='#' data-toggle='collapse' data-target='#collapseUtilities'
               aria-expanded='true' aria-controls='collapseUtilities'>
                <i class='fas fa-fw fa-user'></i>
                <span>Users</span>
            </a>
            <div id='collapseUtilities' class='collapse' aria-labelledby='headingUtilities'
                 data-parent=''#accordionSidebar'>
                <div class='py-2 collapse-inner rounded' style='background-color: var(--main-color)'>
                    <a class='collapse-item text-light font-weight-bold' href='index.php?page=manageStatus'>Manage Users Status</a>
                </div>
            </div>
        </li>"
            
            ?>
        <!-- Nav Item - Utilities Collapse Menu -->
        

        <!-- Divider -->
        <hr class="sidebar-divider text-light">

        <!-- Heading -->
        <div class="sidebar-heading">
            Addons
        </div>

        <!-- Divider -->

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
                       <a class="dropdown-item" href="./logout.php" style="cursor:pointer;">
                           <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           Logout
                       </a>
                   </div>
               </li>
               <?php if(isset($_SESSION['username'])) echo "<li class='nav-item dropdown no-arrow'><a class='nav-link text-dark' href='./logout.php'><span style='border: 1px solid black;border-radius: 50px;padding: 2px 20px;cursor: pointer'>Log Out</span></a></li>
            "?>
           </ul>

       </nav>

       <div id="ComponentContainer" class="container-fluid">
           <div class="d-flex">

               <div class="p-2" style="background-color: var(--light-color)">Categories</div>
               <button class="btn btn-light rounded-0" onclick="search('')">All</button>
               <button class="btn btn-light rounded-0" onclick="search('Bois')">Bois</button>
               <button class="btn btn-light rounded-0" onclick="search('Claviers')">Claviers</button>
               <button class="btn btn-light rounded-0" onclick="search('Cordes')">Cordes</button>
               <button class="btn btn-light rounded-0" onclick="search('Cuivres')">Cuivres</button>
               <button class="btn btn-light rounded-0" onclick="search('Percussions')">Percussions</button>
           </div>
            <?php if(isset($_GET['page'])){
                $page = $_GET['page'];
                if($page=="statistics"){
                    include_once('./includes/Components/statistics.component.php');
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
       <div class="modal fade" id="AddInstrumentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
           <div class="modal-dialog" role="document">
               <div class="modal-content">
                   <div class="modal-header">
                       <h5 class="modal-title" id="exampleModalLabel">Add Instrument</h5>
                       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                       </button>
                   </div>
                   <?php if(isset($_SESSION['err-uplaoding_img'])){
                       echo "<div class='alert alert-warning alert-dismissible fade show' role='alert'>
                              <strong>Uploading image failed !</strong>".$_SESSION['err-uplaoding_img']."
                              <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>×</span>
                              </button>
                            </div>";
                       unset($_SESSION['err-uplaoding_img']);
                   } ?>
                   <div class="modal-body">
                       <form action="./includes/instrumentHandler.php" class="needs-validation" method="post"  enctype="multipart/form-data" novalidate> <!--we use "multipart/form-data" when form contains file input  -> application/x-www-form-urlencoded (the default)-->
                           <div class="form-group">
                               <label for="intrument-name" class="col-form-label">Name:</label>
                               <input type="text" class="form-control" id="intrument-name" name="name" required>
                           </div>
                           <div class="d-flex justify-content-between">
                               <div class="form-group">
                                   <label for="message-text" class="col-form-label">Quantity:</label>
                                   <input type="number" class="form-control" id="message-text" name="quantity" required>
                               </div>
                               <div class="form-group">
                                   <label for="message-text" class="col-form-label">Price:</label>
                                   <input type="number" step="0.01" class="form-control" name="price" id="message-text" required>
                               </div>
                           </div>
                           <div class="d-flex justify-content-between">
                               <div class="form-group">
                                   <label for="category" class="col-form-label">Available:</label>
                                   <select class="form-select" name="available" id="available" required>
                                       <option value='1'>Yes</option>;
                                       <option value='0'>No</option>;
                                   </select>
                               </div>
                               <div class="form-group">
                                   <label for="message-text" class="col-form-label">Image: (optional)</label>
                                   <input type="file" class="form-control" id="message-text" name="image" >
                               </div>
                           </div>
                           <div class="form-group">
                               <label for="category" class="col-form-label">Category:</label>
                               <select class="form-select" name="category" id="category" required>
                                   <?php
                                   include_once ('./includes/instrumentHandler.php');
                                   $instrumentClass = new Instrument();
                                   $instrumentCategories=$instrumentClass->getCategories();
                                   foreach ($instrumentCategories as $category){
                                       echo "<option value='".$category['ID']."'>".$category['Name']."</option>";
                                   }
                                   ?>
                               </select>
                           </div>
                           <div class="form-group">
                               <label for="message-text" class="col-form-label">Description:</label>
                               <textarea  class="form-control" id="message-text" name="description" required></textarea>
                           </div>

                           <div class="modal-footer">
                               <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                               <button type="submit" name="addInstBtnForm" class="btn btn-primary">Add</button>
                           </div>
                       </form>
                   </div>

               </div>
           </div>
   </main>
</div>
</body>
<script src="./assets/js/sb-admin-2.min.js"></script>
<script src="./assets/js/jquery.min.js"></script>
<script src="./assets/js/bootstrap.min.js"></script>
<script src="./assets/js/scripts.js"></script>
<!--DATA TABLE--->
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</html>
