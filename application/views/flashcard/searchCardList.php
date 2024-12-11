
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
            <h3>Search Flashcards by Category Name</h3>
        </div>


    
        <div class="text-father">
            <div class="text-child">            
                

            <?php echo form_open('flashcard/displayCardsByCate'); ?>
<div class="form-group">

<select class="form-control" name="category_id">
                <option value="">No Category</option>
            <?php foreach($data as $d){ ?>
                <option value="<?php echo $d["id"] ?>"><?php echo $d["name"] ?></option>
            <?php } ?>
    </select>
    
</div>
    <input type="submit" class="btn btn-primary mt-2" value="Submit"/>
</form>


            </div>
        </div>
    </div>
</div>