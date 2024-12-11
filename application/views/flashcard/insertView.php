
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
            <h3>Insert One</h3>
        </div>


    
        <div class="text-father">
            <div class="text-child">            
                

            <?php echo form_open('flashcard/insertOne'); ?>
            <div class="form-group">
            <label for="inputTerm">Term:</label>
            <input type="text" class="form-control" name="term" id="inputTerm" value=""/>
            </div>

            <div class="form-group">
            <label for="definition">Definition:</label>
            <textarea name="definition" class="form-control" id="definition" rows="5" cols="35"></textarea>
    
            </div>

            <div class="form-group">
            <label for="selectCate">Flashcard Categories</label>
    <select class="form-control" name="category_id" id="selectCate">
        <option value="">No Category</option>
        <?php foreach($data as $d){ ?>
            <option value="<?php echo $d["id"] ?>"><?php echo $d["name"] ?></option>
        <?php } ?>
    </select>
    
            </div>

            <div class="form-group mt-3">
            <input class="btn btn-primary" type="submit" value="Submit"/>
            </div>
    
</form>


            </div>
        </div>
    </div>
</div>