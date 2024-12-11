

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
        /* justify-content:center; */
    }
    .text-child{

    }
</style>

<style>
    table{
        table-layout:fixed;
        width:100%;
    }
    td:nth-child(1) {
        /* width:25%; */
        white-space: nowrap;
        overflow: hidden;
        text-overflow:ellipsis;
    }
    td:nth-child(2) {
        /* width:75%; */
        white-space: nowrap;
        overflow: hidden;
        text-overflow:ellipsis;
    }
</style>

<div class="box-father">
    <div class="box-child">
        <div class="h-title">
            <h3>List Cards</h3>
        </div>
    
        <div class="text-father">
            <div class="text-child">    
                
            

            <?php echo form_open('flashcard/displayCardsByCate'); ?>



            <select name="category_id">
                        <option value="" 
                        <?php  
                        if(empty($category_id)) echo "selected";
                        ?>
                        >No Category</option>
                        <?php foreach($fcs_data as $d){ ?>
                            <option value="<?php echo $d["id"] ?>" <?php if($category_id==$d["id"]) echo"selected";?>><?php echo $d["name"] ?></option>
                        <?php } ?>
                    </select>

            
            <input type="submit" value="Submit"/>


            </form>

                        
            <table>
                <tr>
                    <th>term</th>
                    <th>definition</th>
                    <!-- <th>category</th> -->
                </tr>
                <?php foreach($data as $d) { ?>
                        <tr class="">
                        <td><?php echo anchor("flashcard/updateView/".$d['id'],$d['term']) ?></td>
                            <td><?php echo $d['definition'] ?></td>
                            <!-- <td><?php echo empty($d['category_name']) ? "No Category" : $d['category_name']; ?></td> -->

                        </tr>
                    <?php } ?>
            </table>

            </div>
        </div>
    </div>
</div>



