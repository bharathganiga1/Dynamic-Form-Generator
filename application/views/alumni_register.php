<?php echo form_open('Alumni/alumni_register'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Enter Details</h1>
        <form>
            <div class="form-group">
                <label>NAME</label>
                <input type="text" class="form-control" name="alumni_name" placeholder="Enter Your Name">
                <?php echo form_error('alumni_name', '<div class="text-danger">', '</div>'); ?>           
            </div>
            <div class="form-group">
                <label >EMAIL</label>
                <input type="email" class="form-control" name="alumni_email" placeholder="Enter Your Password">
                <?php echo form_error('alumni_email', '<div class="text-danger">', '</div>'); ?> 
            </div>
            <div class="form-group">
                <label >COLLEGE ID</label>
                <input type="number" min="1" class="form-control" name="clg_id" placeholder="Enter Your college Id">
                <?php echo form_error('clg_id', '<div class="text-danger">', '</div>'); ?> 
            </div>
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control" name="alumni_pass" placeholder="Enter password">
                <?php echo form_error('almni_pass', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>CONFIRM PASSWORD</label>
                <input type="password" class="form-control" name="alumni_pass2" placeholder="confirm password">
                <?php echo form_error('almni_pass2', '<div class="text-danger">', '</div>'); ?>
            </div>

            <button type="submit" class="btn btn-primary btn-block"><span class="h3">Register</span></button>
        </form>
    </div>
</div>
<?php echo form_close(); ?>