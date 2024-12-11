<table>
  <tr>
    <th>firstname</th>
    <th>lastname</th>
    <th>username</th>
    <th>email</th>
  </tr> <?php foreach($data['users'] as $user): ?> <tr>
    <td> <?php echo $user['firstname']; ?> </td>
    <td> <?php echo $user['lastname']; ?> </td>
    <td> <?php echo $user['username']; ?> </td>
    <td> <?php echo $user['email']; ?> </td>
    <td>
    <?php echo form_open('user/updateUserRole'); ?>    
    <label for="roles">Assign a role</label>
        <select name="role" id="roles">
            <?php foreach($data['roles'] as $role): ?>
            <option value="<?php echo $role['id']; ?>" <?php if($role['id']==$user['role_id']){echo 'selected';} ?>><?php echo $role['name'];?></option>
            <?php endforeach; ?>
            <?php 
            if(empty($user['role_id'])||$user['role_id']==0){
                echo "<option value='0' selected>no roles</option>";
            }
            ?>
        </select>
        <input type="hidden" name="user_id" value="<?php echo $user['id']; ?>">
        <input type="submit" value="update">
            </form>
</td>
  </tr> <?php endforeach; ?>
</table>