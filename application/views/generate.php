<?php 
    // Sort configurations based on priority
    usort($configurations, function($a, $b) {
        return $a['priority'] - $b['priority'];
    });
?>
<?php echo form_open('Alumni/submit_data/'.$this->session->userdata('alumni_id')); ?>
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
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <textarea name="<?php echo $configuration['post_name']; ?>" rows="3" class="form-control" 
                            <?php if ($configuration['is_required'] === '1'): ?>required<?php endif; ?>></textarea>
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>

            <!-- for input type = email --> 
            <?php elseif ($configuration['input_type'] === 'Email'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <input type="email" class="form-control" name="<?php echo $configuration['post_name']?>">
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>

            <!-- for input type = date --> 
            <?php elseif ($configuration['input_type'] === 'Date'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <input type="date" class="form-control" name="<?php echo $configuration['post_name']?>">
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>
            
            <!-- for input type = file --> 
            <?php elseif ($configuration['input_type'] === 'File'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <input type="file" class="form-control" name="<?php echo $configuration['post_name']?>">
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>

            <!-- for input type = dropdown --> 
            <?php elseif ($configuration['input_type'] === 'Dropdown'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                        <select name="<?php echo $configuration['post_name']; ?>" class="form-control"
                            <?php if ($configuration['is_required'] === '1'): ?>required<?php endif; ?>>
                            <?php
                            $options = json_decode($configuration['options'], true);
                            foreach ($options as $value => $label) {
                                echo '<option value="' . $value . '">' . $label . '</option>';
                            }
                            ?>
                        </select>
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>
            
            <!-- for input type = checkbox -->
            <?php elseif ($configuration['input_type'] === 'Checkbox'): ?>
                <div class="form-group">
                    <label><?php echo $configuration['field_label']; ?></label>
                    <?php
                    $options = json_decode($configuration['options'], true);
                    foreach ($options as $value => $label) {
                        echo '<div class="checkbox">';
                        echo '<label>';
                        echo '<input type="checkbox" name="' . $configuration['post_name'] . '[]" value="' . $value . '"> ' . $label;
                        echo '</label>';
                        echo '</div>';
                    }
                    ?>
                    <?php echo form_error($configuration['post_name'], '<div class="text-danger">', '</div>'); ?>
                </div>
            <?php endif; ?>
        <?php endforeach; ?> 
        <!-- display only for ALUMNI LOGIN-->
        <?php if($this->session->userdata('alumni_id')): ?> 
            <button type="submit" class="btn btn-primary btn-block">SUBMIT</button>
        <?php endif; ?>
        </form>
    </div>
</div>
<!-- display only for COLLEGE LOGIN -->
<?php if(!$this->session->userdata('alumni_id')): ?>
    <?php echo form_open('Configurations/edit_Priority/'.$clg_id); ?>
        <div class="form-group">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="col-md-6">
                        <button type="submit" name="action" value="edit" id="edit-btn" class="btn btn-primary btn-block">EDIT</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="action" value="add-more" id="add-btn" class="btn btn-primary btn-block">ADD MORE</button>
                    </div>
                </div>      
            </div>
        </div>
    <?php echo form_close(); ?>
<?php endif; ?>