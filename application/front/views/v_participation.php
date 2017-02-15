<?php include('v_header.php'); $this->load->helper('html'); ?>

<div class="container participation">

    <div class="row">
        <div class="col-lg-12 text-center">
            <h2 id="title_home">Participation</h2>
            <span><?php if(isset($nomContest)){ echo 'Concours '.$nomContest ; }else{ echo 'Pas de concours disponible'; }?></span>
        </div>
        <h3>Albums</h3>
        <?php
        if (isset($albums)) {
            foreach ($albums as $row) { ?>
            <div class="col-lg-3 col-md-4 col-xs-6 listAlbum" id="id_albums">
                <div class="albums">
                    <div class="thumbAlbum" style="background-image:url(<?php echo $row['picture']['data']['url']; ?>)">
                    </div>
                    <a class="thumbnailModif" href="<?php echo $row['id']; ?>"  >
                        <span><?php echo $row['name']; ?></span>
                    </a>
                </div>
            </div>
            <?php }
        }else{ ?>

        <h4>Vous n'avez aucun album.</h4>
        <?php }  ?>
        <!--
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>
        <div class="col-lg-3 col-md-4 col-xs-6 thumb">
            <a class="thumbnail" href="#">
                <img class="img-responsive" src="http://placehold.it/400x300" alt="">
            </a>
        </div>-->
    </div>
    <div class="modal">
        <p>Second AJAX Example!</p>
    </div>
    <div id="containerlist">
        <div class="row" id="listPhotos">

            <h3>Photos</h3>
            <?php
            if (isset($photos)) {
                if ($photos['data'] != null) {
                foreach ($photos['data'] as $row) { ?>
                    <div class="col-lg-3 col-md-4 col-xs-6">
                        <div class="thumb thumbPhoto " onClick="showPhoto('<?php echo $row['images'][0]['source']; ?>');" style="background-image:url(<?php echo $row['images'][0]['source']; ?>)">
                            <!--<a class="" href="#">-->
                                <img class="img-responsive" src="<?php echo $row['images'][0]['source']; ?>" alt="">
                           <!-- </a>-->
                        </div>
                    </div>
                <?php }
            }else{ ?>
                <h4>Vous n'avez pas de photo dans cette album</h4>
            <?php }
            } ?>
        </div>

    </div><br />
    <div class="row">
        <h3>Uploader une nouvelle photo</h3>
        <form id="uploadimage" action="" method="post" class="form_participation" enctype="multipart/form-data" >
            <div class="form-group">
                <label for="exampleInputFile">Charger une photo</label>
                <input type="file" name="fileImage" accept="image/jpeg, image/jpg, image/png" id="exampleInputFile">
            </div>
            <button type="submit" class="btn btn-default">Envoyer</button>
        </form>
    </div>
    <div class="popup">
        <h2>This is my popup</h2>
        <button name="close">Close popup</button>
    </div>
    <hr>
</div>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content"><!--
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>-->
            <div class="modal-body">
                <img src="">
            </div>
            <div id="msg-error-participation"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" id="bt_participer" data-dismiss="modal">Participer</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
</div>

<?php include('v_footer.php'); $this->load->helper('html'); ?>