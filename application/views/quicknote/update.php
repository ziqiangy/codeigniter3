<style>
    .box-father {
        display: flex;
        justify-content: center;
    }

    .box-child {
        width: 400px;
        border: 3px solid black;
        background-color: #fff7d1;
        border-radius: 10px;
        padding: 15px;

    }

    .h-title {
        text-align: center;
    }

    .text-father {
        display: flex;
        justify-content: center;
    }
</style>


<div class="box-father">
    <div class="box-child">
        <div class="h-title">
            <h3>Update Quick note</h3>
        </div>



        <div class="text-father">
            <div class="text-child">


                <?php echo form_open("quicknote/update") ?>
                <div class="form-group">
                    <label for="note-content">Note:</label>
                    <textarea class="form-control" id="note-content" name="content" cols="30"
                        rows="10"><?php echo $data['content'] ?></textarea>
                </div>

                <label for="note_cate">Note Category</label>
                <div class="row">
                    <div class="col-9">
                        <select class="form-control" name="cate_id" id="note_cate">
                            <?php foreach($note_cates as $cate): ?>
                            <option
                                value="<?php echo $cate['id']; ?>"
                                <?php if($cate['id'] == $data['cate_id']) {
                                    echo "selected";
                                } ?>><?php echo $cate['name']; ?>
                            </option>
                            <?php endforeach ?>
                        </select>

                    </div>
                    <div class="col-3">
                        <?php echo anchor("quicknote/addnotecate", "Add", array("class" => "btn btn-primary")); ?>

                    </div>

                </div>




                <div class="form-group"><label for="title">Note Title</label>
                    <input type="text" name="title" class="form-control" id="title" value="<?php if(isset($data['title']) && !empty($data['title'])) {
                        echo $data['title'];
                    } ?>">
                </div>




                <div id="blog-note" style="display:block;">
                    <div class="form-group"><label for="archive_date">Archive_date</label>
                        <input type="date" name="archive_date" class="form-control" id="archive_date" value="<?php if(isset($data['archive_date']) && !empty($data['archive_date'])) {
                            echo date('Y-m-d', strtotime($data['archive_date']));
                        } ?>">
                    </div>
                </div>


                <div id="task-note" style="display:block">
                    <div class="form-group"><label for="due_date">Due Date</label>
                        <input type="date" name="due_date" class="form-control" id="due_date" value="<?php if(isset($data['due_date']) && !empty($data['due_date'])) {
                            echo date('Y-m-d', strtotime($data['due_date']));
                        } ?>">
                    </div>
                    <label>Is this important?</label>
                    <div class="form-check">

                        <input type="radio" value="1" id="is_important" class="form-check-input" name="is_important"
                            <?php echo $data["is_important"] === "1" ? "checked" : "";?>
                        >
                        <label for="is_important" class="form-check-label">is important</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" value="0" id="is_not_important" class="form-check-input" name="is_important"
                            <?php echo $data["is_important"] === "0" ? "checked" : "";?>
                        >
                        <label for="is_not_important" class="form-check-label">is not important</label>
                    </div>
                </div>




                <input type="hidden" name="id"
                    value="<?php echo $data['id'] ?>">
                <input class="btn btn-primary mt-2" type="submit" value="submit">
                </form>

                <?php echo anchor("quicknote/delete/".strval($data['id']), "delete", array("class" => "btn btn-danger mt-2")) ?>



            </div>
        </div>
    </div>
</div>