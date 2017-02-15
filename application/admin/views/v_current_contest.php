<?php include('v_header.php'); $this->load->helper('html'); ?>

    <div class="wrapper">
       <div id="page-wrapper">
        <div class="container-fluid gainsboro breadcrumb">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Concours Actuel
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Accueil</a>
                        </li>
                        <li class="active">
                            <i class="fa "></i>
                            Concours Actuel
                        </li>
                    </ol>
                    <div class="text-center">
                      <label>Nombre de participants : <?php if($count != 0){ echo $count; }else{ echo '0';} ?> </label>
                    </div>
                    <div class="text-center">
                      <label>Date de fin du concours : <?php if(!empty($date)){ foreach($date as $row){ echo $row['date_end']; }} ?></label>                     
                    </div>
                </div>
            </div>  <!-- Row -->
        </div>  <!-- Container-fluid -->

        <div class="container-fluid">
          <div class="row">
              <div class="col-lg-8">
                  <div class="panel panel-primary">
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> <?php if(!empty($lastContest)){ foreach($lastContest as $row){ echo $row['name']; }} ?> </h3>
                      </div>
                      <div class="panel-body">
            						<div class="col-lg-6">
            							<img src="http://placehold.it/350x315" class="img-responsive" alt="Responsive image">						
            						</div>
            						<div class="col-lg-6">
            							<p>
                            <?php if(!empty($lastContest)){ foreach($lastContest as $row){ echo $row['description']; }} ?>
            							</p>
            							<span class="glyphicon glyphicon-user">								
            							</span>
            						</div>  <!-- col-lg-6 -->											
                      </div>  <!-- Panel body -->
                  </div>  <!-- panel primary -->
              </div>  <!-- col-lg-8 -->
			  
              <div class="col-lg-4">
                  <div class="panel panel-yellow">
                      <div class="panel-heading">
                          <h3 class="panel-title"><i class="glyphicon glyphicon-user"></i> Participants</h3>
                      </div>
                      <div class="row">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Publié par</th>
                                            <th>Votes des utilisateurs</i></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10/10/2013</td>
                                            <td>Mathis</td>
                                            <td>3<i class="glyphicon glyphicon-euro"></td>
                                        </tr>
                                        <tr>
                                            <td>18/10/2013</td>
                                            <td>Quentin</td>
                                            <td>4<i class="fa fa-user"></td>
                                        </tr>
                                        <tr>
                                            <td>10/21/2013</td>
                                            <td>Robert</td>
                                            <td>4<i class="fa fa-user"></td>
                                        </tr>
                                        <tr>
                                            <td>10/21/2013</td>
                                            <td>Alfredo</td>
                                            <td>4<i class="fa fa-user"></td>
                                        </tr>
                                        <tr>
                                            <td>10/10/2013</td>
                                            <td>Mathis</td>
                                            <td>3<i class="fa fa-user"></td>
                                        </tr>
                                        <tr>
                                            <td>18/10/2013</td>
                                            <td>Quentin</td>
                                            <td>4<i class="fa fa-user"></td>
                                        </tr>
                                        <tr>
                                            <td>10/21/2013</td>
                                            <td>Robert</td>
                                            <td>4<i class="fa fa-user"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>  <!-- table-responsive -->
                            <div class="text-right">
                                <a href="#">Exportation des candidats <i class="fa fa-arrow-circle-right"></i></a>
                            </div>
                        </div> <!-- Panel body -->
                      </div> <!-- row -->
                  </div>  <!-- Panel yellow -->
              </div>  <!-- col-lg-4 -->			  			 
          </div><!-- /.row -->
        </div>  <!-- container-fluid -->
      </div>  <!-- Page Wrapper -->
    </div>  <!-- Wrapper -->
    
<?php include('v_footer.php'); $this->load->helper('html'); ?> 