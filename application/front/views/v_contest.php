<?php include('v_header.php'); $this->load->helper('html'); //var_dump($contest); ?>

    <!--Section: Products v.2-->
    <div class="container contest">
        <section class="section">
            <div id="contentVote">
                <div id="listVote">
                    <!--First row-->
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h2 id="title_home">Concours</h2>
                        </div>
                        <!--First column-->
                        <?php if (!empty($contests)){
                            foreach ($contests as $contest){ ?>
                        <div class="col-lg-4 col-md-6 col-sm-12 mb-r">
                            <!--Card-->
                            <div class="card card-cascade wider">
                                <!--Card image-->
                                <div class="view overlay hm-white-slight">
                                    <img src="<?php echo $contest['link_photo']; ?>" class="img-fluid" alt="">
                                    <a>
                                        <div class="mask waves-effect waves-light"></div>
                                    </a>
                                </div>
                                <!--/.Card image-->
                                <!--Card content-->
                                <div class="card-block text-center">
                                    <!--Category & Title-->
                                    <h5>Shoes</h5>
                                    <!--Card footer-->
                                    <div class="card-footer">
                                        <?php  if($contest['count'] == 0 || $contest['count'] == 1){  ?>
                                        <span class="left"><?php echo $contest['count']; ?> vote</span>
                                        <?php }else{ ?>
                                        <span class="left"><?php echo $contest['count']; ?> votes</span>
                                        <?php } ?>
                                        <span class="right">
                                            <!--<a class="" data-toggle="tooltip" data-placement="top" title="Quick Look"><i class="fa fa-share-alt"></i></a>-->
                                            <a class="<?php if(isset($contest['vote'])){ echo 'active'; } ?>" onClick="vote('<?php echo $_SESSION['idUser']; ?>','<?php echo $contest['id_participation']; ?>')" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><i class="fa fa-heart"></i></a>
                                        </span>
                                    </div>
                                </div>
                                <!--/.Card content-->
                            </div>
                            <!--/.Card-->
                        </div>
                        <!--/First column-->
                        <?php }
                        } ?>
                    </div>
                    <!--/First row-->
                </div>
            </div>
            
        </section>
    </div>
<?php include('v_footer.php'); $this->load->helper('html'); ?>