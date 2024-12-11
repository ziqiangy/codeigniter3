
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
            <h1>Login</h1>
        </div>
    
        <div class="text-father">
            <div class="text-child">            
                

                <?php if(isset($_SESSION['auth'])) echo $_SESSION['auth'] ?>
                <?php if(isset($err)) echo $err ?>

                <?php echo form_open('user/login') ?>
                <div class="form-group">
                <label for="username">Username or Email</label>
                <input type="text" class="form-control" name='username' id="username" value=''>
                
                </div>

                <div class="form-group">
                <label for="password">Password</label>
                <input class="form-control" type="password" name='password' id="password" value=''>
                
                </div>
                <input class="btn btn-primary mt-2" type="submit" value='login'>

                </form>

                <?php echo anchor('user/register','Don\'t have an account? Go Register'); ?>
                <br>
                <?php echo anchor('user/forgetPassword','Forget your password? Go Forget Password'); ?>  
            </div>
        </div>
    </div>
</div>