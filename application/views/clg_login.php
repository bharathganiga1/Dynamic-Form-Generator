
<?php echo form_open('Home/clg_login'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Login</h1>
        <form>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" class="form-control" name="clg_email" placeholder="Enter College Email">
                <?php echo form_error('clg_email', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>PASSWORD</label>
                <input type="password" class="form-control" name="clg_pass" placeholder="Enter password">
                <?php echo form_error('clg_pass', '<div class="text-danger">', '</div>'); ?>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><span class="h3">Login</span></button>
        </form>
    </div>
</div>

<?php echo form_close(); ?>