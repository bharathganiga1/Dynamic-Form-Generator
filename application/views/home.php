
<?php echo form_open('home/get_college'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Enter College Details</h1>
        <form>
            <div class="form-group">
                <label>NAME</label>
                <input type="text" class="form-control" name="clg_name" placeholder="Enter college Name">
                <?php echo form_error('clg_name', '<div class="text-danger">', '</div>'); ?>            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="email" class="form-control" name="clg_email" placeholder="Enter College Email">
                <?php echo form_error('clg_email', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>CONTACT NUMBER</label>
                <input type="tel" class="form-control" name="clg_phno" pattern="[0-9]{10}" placeholder="Enter Contact Number">
                <?php echo form_error('clg_phno', '<div class="text-danger">', '</div>'); ?>
            </div>
            <div class="form-group">
                <label>ADDRESS</label>
                <textarea class="form-control" name="clg_adr" rows="4" placeholder="Enter College Address"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-block"><span class="h3">Get Started --></span></button>
        </form>
    </div>
</div>

<?php echo form_close(); ?>