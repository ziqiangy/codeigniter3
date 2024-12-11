<style>
    .box-father{
        display:flex;
        justify-content:center;
    }
    .box-child{   
        width:400px;
        height:300px;
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
            <h3>Update Category</h3>
        </div>


    
        <div class="text-father">
            <div class="text-child">            
                

            <?php echo form_open("flashcate/update") ?>
            <div class="form-group">
            <label for="name">Name:</label>
<input id="name" class="form-control" type="text" name="name" value="<?php echo $name ?>">

            </div>
<input type="hidden" name="id" value="<?php echo $id ?>">
<input class="btn btn-primary mt-2" type="submit" value="update">
</form>

<?php echo anchor("flashcate/delete/".strval($id),"delete",array("class"=>"btn btn-danger mt-2")) ?>
            


            </div>
        </div>
    </div>
</div>

