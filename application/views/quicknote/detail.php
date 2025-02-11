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
            <h3>View Quick note</h3>
        </div>



        <div class="text-father">
            <div class="text-child">

                <button class="btn btn-outline-secondary" onclick="history.back()">Go Back</button>

                <h5>Title</h5>
                <?php echo $data['title'] ?>
                <h5>Content</h5>
                <?php echo $data['content'] ?>


            </div>
        </div>
    </div>
</div>