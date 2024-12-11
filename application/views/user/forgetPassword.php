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
            <h3>Forget My Password</h3>
        </div>
        <div class="text-father">
            <div class="text-child">  
    <?php if(isset($err)) echo $err ?>
    
    <?php echo form_open("user/forgetPassword"); ?>
    <div class="form-group">
    <label for="forgetEmail">please enter your email:</label>
    <input type="text" id="forgetEmail" class="form-control" name="email" value="">
    </div>
    
    <input class="btn btn-primary mt-2"type="submit" value="submit">
</form>
            </div>
        </div>
    </div>
</div>