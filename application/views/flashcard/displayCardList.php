

<style>
    .box-father{
        display:flex;
        justify-content:center;
    }
    .box-child{   
        width:400px;
        /* height:300px; */
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
            <h1>List Cards</h1>
        </div>

        <?php echo anchor("flashcard/insertView","insert",["class"=>"btn btn-primary"]); ?>
    
        <div class="text-father">
            <div class="text-child">      

                        
            <table>
                <tr>
                    <th>term</th>
                    <th>definition</th>
                    <th>category</th>
                </tr>
                <?php foreach($data as $d) { ?>
                        <tr class="">
                        <td><?php echo anchor("flashcard/updateView/".$d['id'],$d['term']) ?></td>
                            <td><?php echo $d['definition'] ?></td>
                            <td><?php echo empty($d['category_name']) ? "No Category" : $d['category_name']; ?></td>

                        </tr>
                    <?php } ?>
            </table>

            </div>
        </div>
    </div>
</div>



