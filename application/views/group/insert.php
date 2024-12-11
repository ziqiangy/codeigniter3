<?php echo form_open("group/insert"); ?>
<div class="form-group">
    <label for="name">Group name</label>
    <input class="form-control" type="text" id="name" name="name" value="">
</div>

<?php foreach($users as $user): ?>
<?php //var_dump($user);?>
<div class="form-check">
    <input type="checkbox" name="user_id[]"
        value="<?php echo $user['id'] ?>"
        id="<?php echo $user['id'] ?>"
        class="form-check-input" />
    <label
        for="<?php echo $user['id'] ?>"><?php echo $user['firstname']." ".$user['lastname']; ?></label>
</div>

<?php endforeach ?>
<input type="submit" class="btn btn-primary" value="Create Group">

</form>