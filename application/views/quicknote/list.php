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
    <hr>
    <?php echo form_open("");?>
    <div class="row">
        <div class="col-auto">
            <div class="form-floating">

                <select class="form-control" name="c_id" id="c_id">
                    <option value="0">All</option>
                    <?php
                foreach ($cate as $c) {
                    if ($c['id'] == $c_id) {

                        echo "<option value='".$c['id']."' SELECTED>".$c['name']."</option>";

                    } else {

                        echo "<option value='".$c['id']."'>".$c['name']."</option>";

                    }

                }
            ?>
                </select>
                <label for="c_id">categories</label>
            </div>
        </div>
        <div class="col-auto">

            <div class="form-check">
                <input type="radio" class="form-check-input" name="display" value="content" id="display_content" <?php if ($display == "content") {
                    echo "CHECKED";
                } ?>>
                <label for="display_content" class="form-check-label">Content</label>

            </div>
            <div class="form-check">

                <input type="radio" class="form-check-input" name="display" value="title" id="display_title" <?php if ($display == "title") {
                    echo "CHECKED";
                } ?>>
                <label for="display_title" class="form-check-label">Title</label>
            </div>


        </div>
        <div class="col-auto">
            <div class="form-floating">
                <input class="form-control" id="keyword" name="keyword" value="<?php if (isset($keyword) && !empty($keyword)) {
                    echo $keyword;
                } ?>">
                <label for="keyword">Keyword</label>
            </div>
        </div>
        <!-- <div class="col-auto">
            <div class="form-floating">

                <select class="form-control" disabled name="limitPerPage" id="limitPerPage">
                    <option value="<?php echo $limitPerPage; ?>">
        <?php echo $limitPerPage; ?>
        </option>

        </select>
        <label for="limitPerPage">limitPerPage</label>
    </div>
</div> -->


<input type="hidden" class="form-control" id="pageAt" name="pageAt" value="1">

<div class="col-auto">
    <input type="submit" class="btn btn-primary" value="Search">

</div>
</div>
</form>
<div class="text">

    <?php foreach ($data as $d) { ?>
    <?php
            if (strlen($d['content']) > 300) {
                $d['content'] = substr($d['content'], 0, 300)."...";
            }; ?>
    <div class="element">
        <?php
            echo "<div class='row'>";

        echo "<div class='col-8'>";


        if ($display == "content") {

            echo $d['content'];

        } elseif ($display == "title") {

            echo $d['title'];

        } else {
            echo $d['content'];
        }



        echo "</div>";



        echo "<div class='col-2' style='margin:auto;'>";
        echo anchor("quicknote/detail/".$d['id'], '<i class="bi bi-arrow-right-square-fill"></i>', array("class" => "btn btn-outline-secondary"));
        echo "</div>";




        echo "<div class='col-2' style='margin:auto;'>";
        echo anchor("quicknote/update/".$d['id'], '<i class="bi bi-pencil-square"></i>', array("class" => "btn btn-outline-secondary"));
        echo "</div>";


        echo "</div>";
        ?>
    </div>

    <?php } ?>
</div>


<div>
    <?php
        echo '<nav aria-label="Page navigation example">';
            echo '  <ul class="pagination">';
            echo '<li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>';

            foreach ($pageOptions as $d) {
                if ($d == $pageAt) {

                    // echo '<li class="page-item active"><a class="page-link" href="">'.$d.'</a></li>';
                    echo '<li class="page-item active">';
                    echo anchor("quicknote/list/".$d."/".$c_id."/".$keyword."/".$display, $d, array("class" => "page-link"));
                    echo '</li>';

                } else {

                    echo '<li class="page-item">';
                    echo anchor("quicknote/list/".$d."/".$c_id."/".$keyword."/".$display, $d, array("class" => "page-link"));
                    echo '</li>';

                }
            }

            echo '<li class="page-item disabled"><a class="page-link" href="#">Next</a></li>';

            echo '</ul>';
            echo '</nav>';
            ?>
</div>
</div>