<style>
    .box-father{
        display:flex;
        justify-content:center;
    }
    .box-child{   
        width:400px;
        border:3px solid black;
        background-color:#fff7d1;
        border-radius:10px;
        padding:15px;
        
    }

    .h-title{
        text-align:center;
    }
    .text-father{
        display:flex;
        justify-content:center;
    }
</style>


<div class="box-father">
    <div class="box-child">
    <div class="h-title">
            <h1>Register</h1>
        </div>
        <div class="text-father">
            <div class="text-child">

                <?php echo validation_errors(); ?>
                <fieldset>

                <?php echo form_open("user/register"); ?>

                <div class="form-group">
                <label for="firstname">first name</label>

<input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo set_value('firstname'); ?>" />

                </div>


                <div class="form-group">
                <label for="lastname">last name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo set_value('lastname'); ?>" />

                </div>
                <div class="form-group">
                <label for="email">email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>" />

                </div>
                <div class="form-group">
                <label for="username">username</label>
                    <input type="text" class="form-control" id="username" name="username" value="<?php echo set_value('username'); ?>" />

                </div>
                <div class="form-group">
                <label for="password">password</label>
                    <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password'); ?>" />
                    <small class="form-text text-muted">Has minimum 8 characters in length.</small>
                    <small class="form-text text-muted">At least one uppercase English letter.</small>
                    <small class="form-text text-muted">At least one lowercase English letter.</small>
                    <small class="form-text text-muted">At least one digit.</small>
                    <small class="form-text text-muted">At least one special character, #?!@$%^&*-~</small>
                </div>

                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="weakpassword" name="weakpassword" >
                    <label for="weakpassword">Confirm using weak password</label>
                </div>
                    
                    <input type="submit" class="btn btn-primary mt-2" value="Register" />

                </form>

                </fieldset>

            

                <?php echo anchor('user/login','Already have a account? Go Login') ?>
                            
            </div>
        </div>
    </div>
</div>