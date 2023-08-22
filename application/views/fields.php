
<?php echo form_open('home/get_college'); ?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <h1 class="text-center"></h1>
        <form>
            <div class="form-group">
                <label>Field Label</label>
                <input type="text" class="form-control" name="field_label" placeholder="Enter Field Label">
            </div>
            <div class="form-group">
                <label>Input Type</label>
                <select class="form-control" name="input_type">
                    <option value="Textbox">Textbox</option>
                    <option value="Dropdown">Dropdown</option>
                    <option value="Checkbox">Checkbox</option>
                </select>
            </div>
            <div class="form-group">
                <label>Size/Length</label>
                <input type="text" class="form-control" name="size_length" placeholder="Enter Size/Length">
            </div>
            <div class="form-group">
                <label>Required</label>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="is_required" value="1"> Yes
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label>Dropdown Options (if applicable)</label>
                <textarea class="form-control" name="dropdown_options" rows="3" placeholder="Enter Dropdown Options"></textarea>
            </div>
            <!-- Add priority field -->
            <div class="form-group">
                <label>Priority</label>
                <input type="number" class="form-control" name="priority" placeholder="Enter Priority">
            </div>
            <!-- Add post_name field -->
            <div class="form-group">
                <label>Post Name</label>
                <input type="text" class="form-control" name="post_name" placeholder="Enter Post Name">
            </div>
            <!-- End of field configuration form fields -->
            <button type="submit" class="btn btn-primary btn-block">Save Configuration</button> 
        
        </form>
    </div>
</div>

<?php echo form_close(); ?>