<?php echo form_open('Configurations/get_configurations'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center"></h1>
        <form>
            <!-- clg_id -->
            <input type="hidden" name="clg_id" value="<?php echo $clg_id; ?>">
            <?php echo $clg_id; ?>

            <!-- field label  -->
            <div class="form-group">
                <label>Field Label</label>
                <input type="text" class="form-control" name="field_label" placeholder="Enter Field Label">
                <?php echo form_error('field_label', '<div class="text-danger">', '</div>'); ?>
            </div>
            
            <!-- Add post_name field -->
            <div class="form-group">
                <label>Post Name</label>
                <input type="text" class="form-control" name="post_name" placeholder="Enter Post Name">
                <?php echo form_error('post_name', '<div class="text-danger">', '</div>'); ?>
            </div>

            <!-- input type field -->
            <div class="form-group">
                <label>Input Type</label>
                <select id="input-type-select" class="form-control" name="input_type">
                    <option value="Textbox">Textbox</option>
                    <option value="Dropdown">Dropdown</option>
                </select>
                <?php echo form_error('input_type', '<div class="text-danger">', '</div>'); ?>
            </div>


            <!-- size field -->
            <div class="form-group" id="size-length-group" style="display: none;">
                <label>Size/Length</label>
                <input type="text" class="form-control" name="size_length" placeholder="Enter Size/Length">
                <?php echo form_error('size-length-group', '<div class="text-danger">', '</div>'); ?>
            </div>


            <!-- DropDown form fields -->
            <div class="form-group" id="dropdown-options-group" style="display: none;">
                <label>Dropdown Options</label>
                <div class="dropdown-option-fields">
                    <div class="dropdown-option-field">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="dropdown_option_name[]" placeholder="Option Name">
                            </div>
                            <div class="col-md-5">
                                <input type="text" class="form-control" name="dropdown_option_value[]" placeholder="Option Value">
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-sm btn-danger remove-option">Remove</button>
                            </div>
                        </div>
                    </div>
                    <?php echo form_error('dropdown-options-group', '<div class="text-danger">', '</div>'); ?>
                </div>
                <div class="row mt-2">
                    <div class="col-md-12">
                        <button type="button" class="btn btn-sm btn-secondary add-option">Add Option</button>
                    </div>
                </div>
            </div>

            <!-- is_required form fields -->

            <div class="form-group">
                <label>Required</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_required" value="1"> Yes
                    </label>
                </div>
            </div>

            <!-- Add priority field -->
            <div class="form-group">
                <label>Priority</label>
                <input type="number" class="form-control" name="priority" placeholder="Enter Priority" min="1">
                <?php echo form_error('dropdown-options-group', '<div class="text-danger">', '</div>'); ?>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-md-6">
                        <button type="submit" name="action" value="add-more" id="add-more-btn" class="btn btn-primary btn-block">Add More</button>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" name="action" value="save-configuration" class="btn btn-primary btn-block">Save Configuration</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<script>
    // JavaScript function to handle the visibility of "Size/Length" field
    function handleSizeVisibility() {
        var sizeLengthGroup = document.getElementById('size-length-group');
        var inputTypeSelect = document.getElementById('input-type-select');

        if (inputTypeSelect.value === 'Textbox') {
            sizeLengthGroup.style.display = 'block';
        } else {
            sizeLengthGroup.style.display = 'none';
        }
    }

    // Call the functions initially when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        handleSizeVisibility(); // Call the function to set initial visibility
        handleDropdownOptionsVisibility(); // Call the function to set initial visibility of dropdown options

        document.querySelector('.add-option').addEventListener('click', addOptionField);
    });

    // Listen for changes in the "Input Type" select
    document.getElementById('input-type-select').addEventListener('change', function() {
        handleSizeVisibility();
        handleDropdownOptionsVisibility();
    });


    // JavaScript function to handle the visibility of "Dropdown Options" field and option fields
    function handleDropdownOptionsVisibility() {
        var dropdownOptionsGroup = document.getElementById('dropdown-options-group');
        var inputTypeSelect = document.getElementById('input-type-select');
        
        if (inputTypeSelect.value === 'Dropdown') {
            dropdownOptionsGroup.style.display = 'block';
        } else {
            dropdownOptionsGroup.style.display = 'none';
        }
    }

    // JavaScript function to add a new option field
    function addOptionField() {
        var optionField = document.querySelector('.dropdown-option-field').cloneNode(true);
        var removeButton = optionField.querySelector('.remove-option');
        
        removeButton.addEventListener('click', function() {
            optionField.remove();
        });
        
        optionField.querySelector('input[name="dropdown_option_name[]"]').value = '';
        optionField.querySelector('input[name="dropdown_option_value[]"]').value = '';
        
        document.querySelector('.dropdown-option-fields').appendChild(optionField);
    }

    // Call the functions initially when the page loads
    document.addEventListener('DOMContentLoaded', function() {
        handleDropdownOptionsVisibility();
        
        document.querySelector('.add-option').addEventListener('click', addOptionField);
    });

    // Listen for changes in the "Input Type" select
    document.getElementById('input-type-select').addEventListener('change', function() {
        handleDropdownOptionsVisibility();
    });

</script>

<?php echo form_close(); ?>
