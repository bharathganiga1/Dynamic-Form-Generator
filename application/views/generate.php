<h1><?php echo $title; ?></h1>

<?php echo form_open(''); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center">Generated Form</h1>
        <form>
        <?php foreach ($configurations as $configuration): ?>

            <!-- for input type = textbox -->
            <?php if ($configuration['input_type'] === 'Textbox'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <input type="text" class="form-control" name="<?php echo $configuration['post_name']; ?>" 
                        placeholder="Enter <?php echo $configuration['field_label']; ?>"
                        <?php if ($configuration['is_required'] === '1'): ?>required<?php endif; ?>>
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>           
                </div>
           
            <!-- for input type = textarea --> 
            <?php elseif ($configuration['input_type'] === 'Textarea'): ?>
                
            <?php endif; ?>

        <?php endforeach; ?>
        <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
        </form>
    </div>
</div>
