<style>
    .box {
        max-width: 400px;
        border: 3px solid black;
        background-color: #fff7d1;
        border-radius: 10px;
        padding: 15px;
        margin: auto;

    }





    .element {
        margin-top: 20px;
        margin-bottom: 20px;
        padding-bottom: 20px;
        border-bottom: 1px solid black;
        word-wrap: break-word;

    }
</style>



<div class="box">
    <div class="row">
        <div class="col">
            <?php echo anchor("quicknote/insert", "Add", array("class" => "btn btn-primary")); ?>
        </div>
        <div class="col">
            <h3 class="text-center">Notes</h3>
        </div>
        <div class="col">

        </div>
    </div>
    <div class="row">
        <div class="col-auto">
            <?php echo form_open("quicknote/list"); ?>
            <select class="form-control" name="c_id" id="">
                <option value="0">All</option>
                <?php
                foreach($cate as $c) {
                    if($c['id'] == $c_id) {

                        echo "<option value='".$c['id']."' SELECTED>".$c['name']."</option>";

                    } else {

                        echo "<option value='".$c['id']."'>".$c['name']."</option>";

                    }

                }
            ?>
            </select>


        </div>
        <div class="col-auto">

            <div class="form-check">
                <input type="radio" class="form-check-input" name="display" value="content" id="display_content" <?php if($display == "content") {
                    echo "CHECKED";
                } ?>>
                <label for="display_content" class="form-check-label">Content</label>

            </div>
            <div class="form-check">

                <input type="radio" class="form-check-input" name="display" value="title" id="display_title" <?php if($display == "title") {
                    echo "CHECKED";
                } ?>>
                <label for="display_title" class="form-check-label">Title</label>
            </div>


        </div>
        <div class="col-auto">
            <input type="submit" class="btn btn-primary" value="Search">
            </form>
        </div>
    </div>
    <div class="text">

        <?php foreach($note as $d) { ?>
        <?php
                                            if(strlen($d['content']) > 300) {
                                                $d['content'] = substr($d['content'], 0, 300)."...";
                                            }; ?>
        <div class="element">
            <?php
                                                echo "<div class='row'>";

            echo "<div class='col-9'>";
            if($display == "content") {

                echo $d['content'];

            } elseif($display == "title") {

                echo $d['title'];

            } else {
                echo $d['content'];
            }

            echo "</div>";
            echo "<div class='col-3' style='margin:auto;'>";
            echo anchor("quicknote/update/".$d['id'], "Edit", array("class" => "btn btn-outline-secondary"));
            echo "</div>";
            // echo anchor("quicknote/update/".$d['id'],$d['content']);
            echo "</div>";
            ?>
        </div>

        <?php } ?>
    </div>
</div>