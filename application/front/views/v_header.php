<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
        <title>Mario facebook</title>

        <!-- CSS  -->
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap-social.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/menu_front.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/front.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/css/contest.css'); ?>" />



        <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAwuNhtgxb7NEAiYP95WmSZklqIo5GDbMk"></script>
        
        
        <script>
            var lien = '<?php echo base_url(); ?>';
        </script>
    </head>
    <body>
    <?php if(isset($_SESSION['facebook_access_token'])){ ?>
        <div id="section-topbar">
            <div id="topbar-inner">
                <div class="container">
                    <div class="row">
                        <div class="dropdown">
                            <ul id="nav" class="nav">
                                <li class="menu-item"><a class="smoothScroll" href="<?php echo base_url("C_login"); ?>" title="Accueil"><i class="fa fa-home"></i></a></li>
                                <li class="menu-item"><a class="smoothScroll" href="<?php echo site_url("C_contest"); ?>" title="Concours"><i class="fa fa-thumbs-o-up"></i></a></li>
                                <li class="menu-item"><a class="smoothScroll" href="<?php echo site_url("C_participation"); ?>" title="Participer"><i class="fa fa-picture-o"></i></a></li>
                                <li class="menu-item"><a class="smoothScroll" href="<?php echo site_url("C_contact"); ?>" title="Contact"><i class="fa fa-user"></i></a></li>
                                <li class="menu-item"><a class="smoothScroll" href="<?php echo site_url("C_login/logout"); ?>" title="Déconnexion"><i class="fa fa-sign-out"></i></a></li>
                            </ul><!--/ uL#nav -->
                        </div><!-- /.dropdown -->

                        <div class="clear"></div>
                    </div><!--/.row -->
                </div><!--/.container -->

                <div class="clear"></div>
            </div><!--/ #topbar-inner -->
        </div><!--/ #section-topbar -->
        <!--
        <div class="brand"><a id="logo" href="<?php echo site_url("Home"); ?>">Mario Facebook</a></div>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <!-- Brand and toggle get grouped for better mobile display --
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed --
                    <a class="navbar-brand" href="index.html">Business Casual</a>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling --
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav" id="menu">
                        <li><a href="<?php //echo base_url("C_login"); ?>">Accueil</a></li>
                        <li><a href="<?php //echo site_url("C_contest"); ?>">Concours</a></li>
                        <li><a href="<?php //echo site_url("C_participation"); ?>">Participer</a></li>
                        <li><a href="<?php //echo site_url("C_contact"); ?>">Contact</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse --
            </div>
        <!-- /.container
        </nav>-->
    <?php } ?>
