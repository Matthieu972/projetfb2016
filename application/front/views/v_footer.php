
        <?php if(isset($_SESSION['facebook_access_token'])){ ?>
        <footer class="footer">
            <div class="container">
                <p class="text-muted">footer</p>
            </div>
        </footer>
        <?php } ?>
        <!--  Scripts-->
        
        <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/ajaxFront.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/front.js'); ?>"></script>

    </body>
</html>