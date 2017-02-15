<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=10">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>MARIO Admin - Facebook jeu concours</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/datepicker.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>assets/css/font-awesome.css" rel="stylesheet" type="text/css">    

    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>assets/css/mario-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo base_url(); ?>assets/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom date-container -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/date-container.css">  

    <!-- DataTables -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/css/dataTable.css">    

    <!-- Mon style.css -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/admin.css" type="text/css">

</head>

<body>
    <div id="wrapper">
        <!-- Barre de navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- MARIO Admin bouton accueil -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand" href="<?php echo base_url();?>">MARIO Admin</a>
            </div>
            <!-- Menu Mario Admin -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                        <?php echo $_SESSION['nomUser'].' '.$_SESSION['prenomUser']; ?> Admin 
                        <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="<?php echo site_url("C_login/logout"); ?>"><i class="fa fa-fw fa-power-off"></i>Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

	    <!-- Barre de Menu verticale -->
	    <div class="collapse navbar-collapse navbar-ex1-collapse">
	        <ul class="nav navbar-nav side-nav">
	            <li class="active">
	                <a href="<?php echo base_url();?>"><i class="fa fa-fw fa-dashboard"></i> Accueil</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_current_contest"><i class="fa fa-fw fa-bar-chart-o"></i> Concours actuel</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_contest_management"><i class="fa fa-fw fa-table"></i> Gestion du concours</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_contest_history"><i class="fa fa-fw fa-edit"></i> Historique</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_customization"><i class="fa fa-fw fa-desktop"></i> Personnalisation</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_rules"><i class="fa fa-fw fa-wrench"></i> Règlement du jeu</a>
	            </li>
	            <li>
	                <a href="<?php echo base_url();?>admin/c_general_terms"><i class="fa fa-fw fa-file"></i> CGU</a>

	            </li>
	        </ul>
	    </div>
	    <!-- /Barre navigation -->
        <!-- jQuery -->

