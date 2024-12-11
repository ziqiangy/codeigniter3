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
            <h3>Password Reset</h3>
        </div>
        <div class="text-father">
            <div class="text-child"> 
                <?php if(isset($_SESSION['auth'])) echo $_SESSION['auth'] ?>
                    
                    <?php echo form_open("user/newPassword"); ?>
                    <div class="form-group">
                        <label for="newPass">please enter your new Password:</label>
                    <input type="password" class="form-control" id="newPass" name="password" value="">
                    <small class="form-text text-muted">Has minimum 8 characters in length.</small>
                    <small class="form-text text-muted">At least one uppercase English letter.</small>
                    <small class="form-text text-muted">At least one lowercase English letter.</small>
                    <small class="form-text text-muted">At least one digit.</small>
                    <small class="form-text text-muted">At least one special character, #?!@$%^&*-~</small>
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $id ?>">
                    <input type="submit" class="btn btn-primary mt-2" value="submit">
                </form>
                
            </div>
        </div>
    </div>
</div>