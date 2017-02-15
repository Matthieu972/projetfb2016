<?php include('v_header.php'); $this->load->helper('html'); ?>

<div id="body_login">
    <div id="body_filtre">
        <div class="row">
            <div class="col-md-6" id="div_login">
                <span class="">Vous devez vous connecté pour accèder à l'application!!!</span>
                <a class="btn btn-block btn-social btn-lg btn-facebook" href="<?php echo $loginUrl; ?>">
                    <span class="fa fa-facebook"></span> Sign in with Facebook
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Button trigger modal --
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
    Launch demo modal
</button>

<!-- Modal --
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>-->
<?php include('v_footer.php'); $this->load->helper('html'); ?>
