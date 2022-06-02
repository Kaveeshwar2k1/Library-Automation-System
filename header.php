<?php

//header.php

$connect = new PDO("mysql:host=localhost; dbname=lms", "root", "");

?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <meta name="generator" content="">
        <title>Online Library Management System in PHP</title>
        <link rel="canonical" href="">
        <!-- Bootstrap core CSS -->
        <link href="<?php echo base_url(); ?>asset/css/cred.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>asset/css/simple-datatables-style.css" rel="stylesheet" />
        <link href="<?php echo base_url(); ?>asset/css/styles.css" rel="stylesheet" />
        <script src="<?php echo base_url(); ?>asset/js/font-awesome-5-all.min.js" crossorigin="anonymous"></script>
        <!-- Favicons -->
        <link rel="apple-touch-icon" href="" sizes="180x180">
        <link rel="icon" href="<?php echo base_url(); ?>upload/icon.png" sizes="200x200" type="image/png">
        <link rel="icon" href="<?php echo base_url(); ?>upload/icon.png" sizes="200x200" type="image/png">
        <link rel="manifest" href="">
        <link rel="mask-icon" href="" color="#7952b3">
        <meta name="theme-color" content="#7952b3">
        <style>
            .bd-placeholder-img {
                font-size: 1.125rem;
                text-anchor: middle;
                -webkit-user-select: none;
                -moz-user-select: none;
                user-select: none;
            }
            @media (min-width: 768px) {
                .bd-placeholder-img-lg {
                    font-size: 3.5rem;
                }
            }
        </style>
    </head>

    <?php 

    if(is_admin_login())
    {

    ?>
    <body class="sb-nav-fixed">

        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark px-3">
            <!-- Navbar Brand-->
            <i class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><img src="<?php base_url()?>/upload/icon.png" alt="" width="60" height="60"></i>
            <a class="navbar-brand ps-3" href="index.php">Library Management System</a>
            <!-- Sidebar Toggle-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                
            </form>
            <!-- Navbar-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <ul class="nav nav-pills">
                        <li class="nav-item"><a class="btn btn-light nav-link text-white" href="profile.php">Profile</a></li>
                        <li class="nav-item"><a class="btn btn-danger nav-link text-danger" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="category.php">Category</a>
                            <a class="nav-link" href="author.php">Author</a>
                            <!--<a class="nav-link" href="location_rack.php">Location Rack</a>-->
                            <a class="nav-link" href="book.php">Book</a>
                            <a class="nav-link" href="e_material.php">E Materials</a>
                            <a class="nav-link" href="user.php">User</a>
                            <a class="nav-link" href="issue_book.php">Issue Book</a>

                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                       
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>


    <?php 
    }
    else if(is_user_login())
    {
    ?>

    <body>

    	<main>
            
        <nav class="navbar sticky-top navbar-dark bg-dark px-3">
        <a class="navbar-brand" href="index.php"><img src="./upload/icon.png" alt="" width="60" height="60">
            <span style="font-family:cursive;font-size:17px;" class="align-text-center">
                <b>Library Management System</b>
            </span>
        </a>
  <ul class="nav nav-pills">
    <li class="nav-item"><a class="btn btn-light nav-link text-white" href="issue_book_details.php">Issue Book</a></li>
    <li class="nav-item"><a class="btn btn-light nav-link text-white" href="search_book.php">Search Book</a></li>
    <li class="nav-item"><a class="btn btn-light nav-link text-white" href="e_materials.php">E-materials</a></li>
    <li class="nav-item"><a class="btn btn-light nav-link text-white" href="profile.php">Profile</a></li>
    <li class="nav-item"><a class="btn btn-danger nav-link text-danger" href="logout.php">Logout</a></li>
</ul>
</nav>
    <nav class="navbar navbar-light bg-light px-5 text-align-center">
        <h6>Credit Score : <span class="badge bg-dark">
            <?php 
                echo get_cred($connect);
            ?></span></h6>
        <h6>User ID : <span class="badge bg-dark"><?php echo $_SESSION['user_id']; ?></span></h6>
    </nav>
<?php 
}
else
{
    ?>

    <body>

    	<main>

    		<div class="container">

    			<header class="pb-0 mb-3 border-bottom">
                    <div class="row">
        				<div class="col-md-6">
                        <a class="navbar-brand" href="index.php">
                            <img src="./upload/icon.png" alt="" width="80" height="80">
                        </a>
                        <span style="font-family:cursive;font-size:20px;" class="align-text-center"><b>Library Management System</b></span>
                        </div>
                    </div>

    			</header>
            
    <?php 
    }
    ?>
    			