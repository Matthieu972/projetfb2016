<?php include('v_header.php'); $this->load->helper('html'); ?>

    <div id="page-wrapper" class="">
        <div class="container-fluid gainsboro">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Personnalisation
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                        </li>
                        <li class="active">
                            <i class="fa fa-edit"></i> Personnalisation
                        </li>
                    </ol>
                </div>
            </div>  <!-- Row -->
            <div class="personnalisation-page">
                <form method="post" action="<?php echo base_url('C_form_management/index'); ?>" name="formulaire">
                    <div class="text-color">
                        <label class="border">Couleur du texte</label><br/><br/>
                        <input type="color" name="color-font">
                    </div>
                    <div class="miniatures">
                        <label class="border">Taille des miniatures </label><br/><br/>
                        <label> Largeur  </label> <input type="number" name="largeur" id="largeur">
                        <label>Hauteur  </label> <input type="number" name="hauteur" id="hauteur">
                    </div>
                    <div class="background-color">
                        <label class="border">Couleur d'arrière plan</label><br/><br/>
                        <input type="color" name="background">
                    </div>
                    <input class="valider" type="submit" name="valider" value="Valider">
                </form>
            </div>
        </div>  <!-- Container-fluid -->
    </div>  <!-- Page Wrapper -->
  </div>  <!-- Wrapper -->

<?php include('v_footer.php'); $this->load->helper('html'); ?> 