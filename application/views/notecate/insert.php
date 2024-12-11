<h1>add a note category</h1>
<?php echo form_open('quicknote/addnotecate') ?>
<label for="name">Note Category name:</label>
<input type="text" id="name" name="name">
<input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
<input type="submit" value="add">

</form>