
<?php echo form_open('Alumni/alumni_login'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Login</h1>
        <form>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" class="form-control" name="alumni_email" placeholder="Enter Your Email">
                <?php echo form_error('alumni_email', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control" name="alumni_pass" placeholder="Enter your password">
                <?php echo form_error('alumni_pass', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><span class="h3">Login</span></button>
        </form>
    </div>
</div>

<?php echo form_close(); ?>