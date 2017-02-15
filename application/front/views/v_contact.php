<?php include('v_header.php'); $this->load->helper('html'); ?>

<div class="container contact">


    <div class=" text-center ">
        <h2 id="title_home">Contact</h2>
        <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque et finibus neque. Suspendisse finibus a quam in egestas. Nullam et nisl ut arcu sagittis cursus at ut mi. Morbi interdum odio vitae feugiat semper. Donec vestibulum tortor leo. Nam ipsum augue, ultricies non neque sed, facilisis cursus felis. Fusce rutrum neque risus, sed vehicula mauris rutrum non. Donec commodo ligula at est convallis vehicula. Duis molestie suscipit fringilla. Etiam porttitor neque sem, in blandit lectus posuere hendrerit.

            Aliquam id erat malesuada, viverra nibh ac, mollis sem. Aliquam et dapibus mi. Fusce feugiat pellentesque nisi id convallis. Cras rhoncus, purus vel tristique porttitor, mauris elit placerat lacus, non placerat libero sapien sed nunc. Vivamus consequat felis nec tellus vestibulum aliquam. Vestibulum ipsum ex, vestibulum ut enim ut, pharetra sodales enim. Ut quis cursus lacus, id pharetra erat. Quisque aliquam accumsan mauris, sed tristique ligula viverra quis. Nulla ac nibh a dui feugiat gravida eu eu erat. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. </p>
    </div>


    <div class="row">
        <?php echo form_open('c_contact/sendMail'); ?>
        <div class="col-md-10" >
            <div class="form-group col-sm-6">
                <label for="exampleInputLastName">Nom :</label>
                <input type="text" name='nom' class="form-control" id="exampleInputLastName" placeholder="Nom">
            </div>
            <div class="form-group col-sm-6">
                <label for="exampleInputFirstName">Prénom :</label>
                <input type="text" name='prenom' class="form-control" id="exampleInputFirstName" placeholder="Prénom">
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputFirstName">Adresse mail :</label>
                <input type="text" name='mail' class="form-control" id="exampleInputFirstName" placeholder="Adresse mail">
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputSubject">Sujet :</label>
                <input type="text" name='sujet' class="form-control" id="exampleInputSubject" placeholder="Sujet">
            </div>
            <div class="form-group col-sm-12">
                <label for="exampleInputMessage">Message</label>
                <textarea name='msg' class="form-control" rows="3"></textarea>
            </div>
            <div class="form-group col-sm-12 text-center">
                <button type="submit" class="btn btn-default">Envoyer</button>
            </div>
        </div>
    </div>
</div>
<?php include('v_footer.php'); $this->load->helper('html'); ?>