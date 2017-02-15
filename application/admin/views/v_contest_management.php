<?php include('v_header.php'); $this->load->helper('html'); ?>
<?php echo form_open(base_url('/admin/c_contest_management')) ?>
    <!--  En cas d'erreur sur le formulaire -->       

    <div id="page-wrapper">
        <div class="container-fluid gainsboro breadcrumb">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                      Gestion du Concours
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <i class="fa fa-dashboard"></i>  <a href="<?php echo base_url(); ?>">Accueil</a>
                        </li>                        
                        <li class="active">
                            <i class="fa fa-dashboard"></i>
                            Gestion du Concours
                        </li>
                    </ol>
                </div>
                <span style='color:red'><?php if(isset($error)){ echo $error; } ?></span>
            </div>  <!-- Row -->
        </div>  <!-- Container-fluid -->        

        <div class="container-fluid breadcrumb">
          <div class="row">
            <div class="col-lg-12">
               <form class="form-inline" action="c_contest_management/index" method="post" accept-charset="utf-8" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="text-center">
                     <?php echo validation_errors(); ?> 
                    </div>                    
                    <label >Nom du concours</label>
                    <input type="text" class="form-control" name="contest_name" value="<?php if(isset($contest_name)){ echo $contest_name; } ?>" placeholder="<?php if(isset($contest_name)){ echo $contest_name; }else{ ?>6 caractères minimum<?php } ?>"/>
                  </div>

                  <div class="form-group">
                    <label>Description du concours</label>
                    <textarea class="form-control" rows="3" name="contest_description" value="<?php if(isset($contest_description)){ echo $contest_description; } ?>" placeholder="25 caractères minimum"><?php if(isset($contest_description)){ echo $contest_description; } ?></textarea>                    
                  </div>

                  <div class="form-group">
                    <label >Lot à gagner</label>
                    <input type="text" class="form-control" value="<?php if(isset($contest_name)){ echo $price; } ?>" name="price" value=""/>
                  </div>
                  <input accept="image/jpeg, image/jpg, image/png" type="file" class="btn btn-primary" name="price_pic"/>  
                  <div class="input-daterange input-group" id="datepicker">
                    <input type="date" value="<?php if(isset($start_date)){ echo $start_date; } ?>" class="input-sm form-control" name="start_date" />
                    <span class="input-group-addon">to</span>
                    <input type="date" value="<?php if(isset($end_date)){ echo $end_date; } ?>" class="input-sm form-control" name="end_date" />
                  </div>                                 
                
                <br>

          <div class="row">
            <div class="col-lg-12">  
                <button type="submit" class="btn btn-primary center-block" value="upload">Valider</button>                
            </div>
          </div>
                </form>
            </div> 
          </div>
        </div>
               
    </div>  <!-- Page Wrapper -->
  </div>  <!-- Wrapper -->

<?php include('v_footer.php'); $this->load->helper('html'); ?> 
