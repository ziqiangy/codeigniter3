
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
            <h3>Update a Flashcard</h3>
        </div>
    
        <div class="text-father">
            <div class="text-child">      
                
            <?php echo form_open('flashcard/updateOne'); ?>

            <div class="form-group">
            <label for="term">Term:</label>
                    <input class="form-control" type="text" name="term" value="<?php echo $user_data["term"] ?>"/>
                
            </div>
            <div class="form-group">
            <label for="definition">Definition:</label>
                    <textarea class="form-control" type="text" id="definition" name="definition" rows="5" cols="35"><?php echo $user_data["definition"] ?></textarea>

            </div>
            <div class="form-group">
                <label for="">Category Name:</label>
            <select class="form-control" name="category_id">
                        <option value="" 
                        <?php  
                        if(empty($user_data["category_id"])) echo "selected";
                        ?>
                        >No Category</option>
                        <?php foreach($fcs_data as $d){ ?>
                            <option value="<?php echo $d["id"] ?>" <?php if($user_data["category_id"]==$d["id"]) echo"selected";?>><?php echo $d["name"] ?></option>
                        <?php } ?>
                    </select>
                    
            </div>
            
                    <input type="hidden" name="id" value="<?php echo $user_data["id"] ?>"/>
                    <input class="btn btn-primary mt-2" type="submit" value="Update"/>

                </form>
                <?php echo anchor("flashcard/disable/".strval($user_data["id"]),"disable",array("class"=>"btn btn-secondary mt-2")); ?>
                
                <?php echo anchor("flashcard/delete/".strval($user_data["id"]),"delete",array("class"=>"btn btn-danger mt-2")); ?>


                
            </div>
        </div>
    </div>
</div>



