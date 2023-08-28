<?php echo form_open('Configurations/update_priorities/'.$clg_id); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Edit Form Element Priorities</h1>
        
        <?php foreach ($configurations as $configuration): ?>
            <div class="form-group">
                <label><?php echo $configuration['field_label']; ?></label>
                <input type="number" class="form-control" name="priority[<?php echo $configuration['config_id']; ?>]"
                       value="<?php echo $configuration['priority']; ?>">
            </div>
        <?php endforeach; ?>
        
        <button type="submit" class="btn btn-primary btn-block">Update Priorities</button>
    </div>
</div>
<?php echo form_close(); ?>
