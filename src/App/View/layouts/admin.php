<?php
use Del\Cdn;
use Del\Icon;
use Del\Image;
/**
 * @var \Del\Entity\User $user
 */
$person = $user->getPerson();
$image = $person->getImage() ? new Image('data/uploads/' . $person->getImage()) : null;

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <link rel="apple-touch-icon" sizes="120x120" href="/img/icons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/icons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/img/icons/favicon-16x16.png">
    <link rel="manifest" href="/img/icons/site.webmanifest">
    <link rel="mask-icon" href="/img/icons/safari-pinned-tab.svg" color="#5bbad5">
    <link rel="shortcut icon" href="/img/icons/favicon.ico">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="msapplication-config" content="/img/icons/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">

    <title><?= isset($title) ? $this->e($title) : 'The Lonergan Clinic';?></title>

    <!-- Bootstrap Core CSS -->
    <?= Cdn::bootstrapCssLink() ;?>
    <?= Cdn::delCssLink() ;?>
    <?= Cdn::fontAwesomeCssLink('4.7.1') ;?>
    <link rel="stylesheet" type="text/css" href="/css/jquery.datetimepicker.css"/ >
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />

    <!--Javascript -->
    <?= Cdn::jQueryJavascript() ?>

    <link rel="stylesheet" href="//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="/css/admin/adminlte.min.css">
    <link rel="stylesheet" href="/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="/plugins/daterangepicker/daterangepicker.css"
    <link rel="stylesheet" href="/plugins/summernote/summernote-bs4.css">

    <link rel="stylesheet" href="/plugins/fullcalendar/main.min.css">
    <link rel="stylesheet" href="/plugins/fullcalendar-daygrid/main.min.css">
    <link rel="stylesheet" href="/plugins/fullcalendar-timegrid/main.min.css">
    <link rel="stylesheet" href="/plugins/fullcalendar-bootstrap/main.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fa fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="/admin" class="nav-link">Home</a>
            </li>
        </ul>

        <form class="form-inline ml-3">
            <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-navbar" type="submit">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>

        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="fa fa-gear"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <a href="/user/edit-profile" class="dropdown-item text-center text-muted">
                        <i class="fa fa-user mr-2 pull-left"></i> Edit Profile
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/user/change-password" class="dropdown-item text-center text-muted">
                        <?= Icon::custom(Icon::SHIELD, 'mr-2 pull-left') ?>Change Password
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/user/change-email" class="dropdown-item text-center text-muted">
                        <?= Icon::custom(Icon::ENVELOPE, 'mr-2 pull-left') ?> Change Email
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/user/logout" class="dropdown-item text-center bg-danger"><?= Icon::SIGN_OUT ?> Sign Out</a>
                </div>
            </li>
        </ul>
    </nav>

    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <a href="/admin" class="brand-link">
            <img src="/img/tlc-logo-header.png" alt="AdminLTE Logo" class="brand-image "
                 style="opacity: .8">
            <span class="brand-text font-weight-light">Administration</span>
        </a>

        <div class="sidebar">
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= $image ? $image->outputBase64Src() : '' ?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="/admin" class="d-block"><?php
                        $name = $user->getEmail();
                        if ($person->getFirstname()) {
                            $name = $person->getLastname() ? $person->getFirstname() . ' ' . $person->getLastname() : $person->getFirstname();
                        }
                        echo $name;
                        ?></a>
                </div>
            </div>

            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item">
                        <a href="/admin/calendar" class="nav-link">
                            <i class="nav-icon fa fa-calendar"></i>
                            <p>Calendar<span class="badge badge-danger right">2</span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/self-referrals" class="nav-link">
                            <i class="nav-icon fa fa-phone"></i>
                            <p>Self Referrals</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/referrals" class="nav-link">
                            <i class="nav-icon fa fa-edit"></i>
                            <p>Referrals</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/messages" class="nav-link">
                            <i class="nav-icon fa fa-envelope"></i>
                            <p>Messages</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/patients" class="nav-link">
                            <i class="nav-icon fa fa-address-book"></i>
                            <p>Patients</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/dentists" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Dentists</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/dog" class="nav-link">
                            <i class="nav-icon fa fa-users"></i>
                            <p>Dogs</p>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </aside>

    <div class="content-wrapper">
        <?= $content ?>
    </div>


    <footer class="text-muted">
        <div class="container">
            <br>
            <p><?= Icon::HOME ?>  13 St Patrick's Avenue, Castlebar, Co. Mayo, Ireland | <?= Icon::PHONE ?> 09490 60645 | <?= Icon::ENVELOPE ?> <a href="mailto:info@thelonerganclinic.com">info@thelonerganclinic.com</a>.</p>
            <p>© 2020 <?= date('Y') > 2020 ? ' - ' . date('Y') : '' ?> The Lonergan Clinic | Site created by <a target="_blank" href="//mcleandigital.co.uk">McLean Digital Limited</a></p>
        </div>
    </footer>


    <aside class="control-sidebar control-sidebar-dark">
    </aside>
</div>

<script src="/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="/plugins/chart.js/Chart.min.js"></script>
<script src="/plugins/sparklines/sparkline.js"></script>
<script src="/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<script src="/plugins/jquery-knob/jquery.knob.min.js"></script>
<script src="/plugins/moment/moment.min.js"></script>
<script src="/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="/js/admin/adminlte.js"></script>
<script src="/js/jquery.datetimepicker.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.tt').tooltip();
        $('.datepicker').datetimepicker({
            "format": "d/m/Y",
            "timepicker": false
        });
        $('.datetimepicker').datetimepicker({
            "format": "d/m/Y H:i",
        });
    });
</script>
</body>
</html>
