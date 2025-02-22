<?php $uri = current_url(true);
$session = session();
if (!$session->get('Username')) {
    header("Location: " . base_url() . "/login");
    die();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proda Dashboard</title>

    <link rel="stylesheet" href="dist/assets/css/bootstrap.css">

    <link rel="stylesheet" href="dist/assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="dist/assets/css/app.css">
    <link rel="shortcut icon" href="dist/assets/images/favicon.svg" type="image/x-icon">
  
  <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>


</head>

<body>
    <div id="app">
        <div id="sidebar" class='active'>
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
            STP2025
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">


                        <li class='sidebar-title'>Main Menu</li>



                        <li class="sidebar-item">

                            <a href="/dashboard" class='sidebar-link'>
                                <i data-feather="home" width="20"></i>
                                <span>Dashboard</span>
                            </a>


                        </li>









                        <li class="sidebar-item  ">

                            <a href="lihat" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Lihat Data</span>
                            </a>


                        </li>
                        <li class="sidebar-item  ">

                            <a href="unduh" class='sidebar-link'>
                                <i data-feather="layout" width="20"></i>
                                <span>Unduh Data</span>
                            </a>


                        </li>


                        <!-- <li class="sidebar-item  ">

                            <a href="user" class='sidebar-link'>
                                <i data-feather="layers" width="20"></i>
                                <span>User</span>
                            </a>


                        </li> -->







                    </ul>
                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>
        <div id="main">
            <nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ms-auto">

                        <li class="dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="d-none d-md-block d-lg-inline-block">Hi, <?php echo $session->get('Username'); ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="/logout"><i data-feather="log-out"></i> Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="main-content container-fluid">
                <div class="page-title">
                    <h3><?= $judul; ?></h3>
                    <p class="text-subtitle text-muted"><?= $caption; ?></p>
                </div>

                <?php
                $seg = $uri->getSegment(1);
                if ($seg == 'dashboard')
                    echo view('menu/dashboard');
                if ($seg == 'relawan')
                    echo view('menu/relawan');
                if ($seg == 'user')
                    echo view('menu/user');
                if ($seg == 'unduh')
                    echo view('menu/unduh');
                if ($seg == 'lihat')
                    echo view('menu/lihat');
                ?>
            </div>

            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2025 STP</p>
                    </div>
                    <div class="float-end">
                        <p>Crafted with <span class='text-danger'><i data-feather="heart"></i></span> by <a href="https://saugi.me">Saugi</a></p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="dist/assets/js/feather-icons/feather.min.js"></script>
    <script src="dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="dist/assets/js/app.js"></script>

    <script src="dist/assets/vendors/chartjs/Chart.min.js"></script>
    <script src="dist/assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="dist/assets/js/pages/dashboard.js"></script>

    <script src="dist/assets/js/main.js"></script>
    
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />
  
  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>

    
</body>

</html>