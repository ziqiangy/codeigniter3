<style>
    .box-father {
        display: flex;
        justify-content: center;
    }

    .box-child {
        width: 400px;
        /* height:300px; */
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

    /* add btn */
    #addBtn {

        display: inline-block;
        outline: 0;
        border: 0;
        cursor: pointer;
        border-radius: 8px;
        padding: 14px 24px 16px;
        font-size: 18px;
        font-weight: 700;
        line-height: 1;
        transition: transform 200ms, background 200ms;
        background: transparent;
        color: #000000;
        box-shadow: 0 0 0 3px #000000 inset;

        :hover {
            transform: translateY(-2px);
        }

    }
</style>


<div class="box-father">
    <div class="box-child">
        <div class="h-title">
            <h3>Insert Flashcards</h3>
        </div>



        <div class="text-father">
            <div class="text-child">


                <?php echo form_open('flashcard/insertMulti'); ?>

                <div id="insertList">

                    <div class="insertItem">
                        <div class="form-group">
                            <label for="term">Term:</label>
                            <input class="form-control" type="text" name="term[]" id="term" value="" />


                        </div>
                        <div class="form-group">
                            <label for="definition">Definition:</label>
                            <textarea class="form-control" name="definition[]" id="definition" rows="5"
                                cols="35"></textarea>

                        </div>

                        <div class="form-group">
                            <label for="category_id">Flashcard Categories</label>
                            <select class="form-control" name="category_id[]" id="category_id">
                                <option value="">No Category</option>
                                <?php foreach($data as $d) { ?>
                                <option
                                    value="<?php echo $d["id"] ?>">
                                    <?php echo $d["name"] ?>
                                </option>
                                <?php } ?>
                            </select>

                        </div>

                    </div>

                </div>

                <div class="btn btn-primary mt-2" id="addBtn">add</div>

                <input class="btn btn-primary" type="submit" value="Submit" />
                </form>


            </div>
        </div>
    </div>
</div>


<script>
    $('#addBtn').click(() => {
        let a = $('#insertList div:first').clone(true).each(function() {
            $(this).find('input,textarea').val('');
        });
        $('#insertList').append(a);
    })
</script>