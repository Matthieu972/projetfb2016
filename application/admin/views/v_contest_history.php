<?php include('v_header.php'); $this->load->helper('html'); ?>

    <div id="page-wrapper">
        <div class="container-fluid gainsboro breadcrumb">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Historique
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Accueil</a>
                        </li>                        
                        <li class="active">
                            <i class="fa fa-dashboard"></i>
                            Historique 
                        </li>
                    </ol>
                </div>
            </div>  <!-- Row -->
        </div>  <!-- Container-fluid -->


        <div class="container">         
          <div class="row "> <!--  Affichage dataTable  -->
			<div class="col-lg-12">  
                <!--  Tableau dynamique en français, Recherche filtre et pagination de l'historique des concours  -->
                <table id="contest_history" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>Nom</th>
                                <th>Date de début</th>
                                <th>Date de fin</th>
                            </tr>
                        </thead>
                        <tbody>                
            				<?php if (!empty($liste)) 
                            {
                                foreach($liste as $row)
                                { ?>
                                <tr>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['date_start']; ?></td>
                                    <td><?php echo $row['date_end']; ?></td>
                                </tr>
                        <?php  }
                            }
                             ?>
                         </tbody>
                </table>
			</div>
		  </div>           
		</div>
				
    </div>  <!-- Page Wrapper -->
  </div>  <!-- Wrapper -->

<?php include('v_footer.php'); $this->load->helper('html'); ?> 