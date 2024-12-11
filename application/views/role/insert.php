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
            <h1>Create a Role</h1>
        </div>
        <div class="text-father">
            <div class="text-child">

                <fieldset>

                <?php echo form_open("user/insertrole"); ?>

                <div class="form-group">
                    <label for="name">Role Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="" />
                </div>

                <div class="form-group">
                    <label for="desc">Role Description</label>
                    <input type="text" class="form-control" id="desc" name="desc" value="" />
                </div>
                                
                    <input type="submit" class="btn btn-primary mt-2" value="Create" />
                </form>
                </fieldset>                            
            </div>
        </div>
    </div>
</div>