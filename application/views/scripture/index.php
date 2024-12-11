<style>
    .border-left-primary {
        border-left: .25rem solid #4e73df !important;
    }

    .border-left-success {
        border-left: .25rem solid #1cc88a !important;
    }

    .border-left-info {
        border-left: .25rem solid #36b9cc !important;
    }

    .border-left-warning {
        border-left: .25rem solid #f6c23e !important;
    }

    .card {

        --bs-card-border-width: 0px;
        --bs-card-border-color: #fff;

    }

    a {
        color: #4e73df;
        text-decoration: none;
        background-color: transparent
    }
</style>

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Scriptures</h1>
</div>

<!-- Content Row -->
<div class="row">


    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Scriptures</div>
                            <div class="row g-2">
                                <div class="col-auto">
                                    <div class="form-floating">
                                    <select class="form-select" id="volume" name="volume" aria-label="Floating label select example">
                                    </select>
                                    <label for="volume">Volume</label>
                                    </div>
                                </div>
                            
                                <div class="col-auto">
                                    <div class="form-floating">
                                    <select class="form-select" id="book" name="book" aria-label="Floating label select example">
                                    </select>
                                    <label for="book">Book</label>
                                    </div>
                                </div>
                            
                                <div class="col-auto">
                                    <div class="form-floating">
                                    <select class="form-select" id="chapter" name="chapter" aria-label="Floating label select example">
                                    </select>
                                    <label for="chapter">Chapter</label>
                                    </div>
                                </div>
                            
                                <div class="col-auto">
                                    <div class="form-floating">
                                    <select class="form-select" id="verse" name="verse" aria-label="Floating label select example">
                                    </select>
                                    <label for="verse">From</label>
                                    </div>
                                </div>
                            
                                <div class="col-auto">
                                    <div class="form-floating">
                                    <select class="form-select" id="to-verse" name="to-verse" aria-label="Floating label select example">
                                    </select>
                                    <label for="to-verse">To</label>
                                    </div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <input id="s_v_btn" class="btn btn-primary" type="submit" value="search verse">
                                </div>
                            </div>

                            



                            <!-- <div>
                                <select name="volume" id="volume" placeholder="Volume"></select>
                                <select name="book" id="book" placeholder="Book"></select>
                                <select name="chapter" id="chapter" placehholder="Chapter"></select>
                                <select name="verse" id="verse" placeholder="FromVerse"></select>
                                <select name="to-verse" id="to-verse" placeholder="ToVerse"></select>

                                <input id="s_v_btn" type="submit" value="search verse">
                            </div> -->
                            <div id="verse_output">

                            </div>
                        


                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>






















<script type="text/javascript">
    $('#volume').empty();

    $.ajax({
        type: "get",
        url: '<?php echo base_url(); ?>index.php/scriptures/search_v_json',

        success: function(data) {
            $("#volume").append('<option value=""></option>');
            data.forEach((item, index, arr) => {
                var row = item;
                $("#volume").append('<option value="' + row.id + '">' + row.volume_title +
                    '</option>');
            });


        }

    });


    $("#volume").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_b_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#book').empty();
                $('#chapter').empty();
                $('#verse').empty();
                $("#book").append('<option value=""></option>');
                data.forEach((e) => {
                    var row = e;
                    $("#book").append('<option value="' + row.id + '">' + row.book_title +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

    $("#book").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_c_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#chapter').empty();
                $('#verse').empty();
$("#chapter").append('<option value=""></option>');
                data.forEach((e) => {
                    var row = e;
                    $("#chapter").append('<option value="' + row.id + '">' + row
                        .chapter_number +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

    $("#chapter").bind("change", function() {
        var id = $(this).find("option:selected").attr("value");
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_ve_json",
            data: {
                "id": id
            },
            success: function(data) {
                $('#verse').empty();
                $("#verse").append('<option value=""></option>');
                data.forEach((e) => {
                    var row = e;
                    $("#verse").append('<option value="' + row.id +'" verse_number="'+row.verse_number+ '">' + row
                        .verse_number +
                        '</option>');
                })
            },
            error: function(data) {

            }
        });
    });

        $("#verse").bind("change", function() {
        var id = $("#chapter").find("option:selected").attr("value");
        
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_ve_json",
            data: {
                "id": id
            },
            success: function(data) {
                $("#to-verse").empty();
                $("#to_verse").append('<option value=""></option>');
                var start_v_num = $("#verse").find("option:selected").attr("verse_number");
                // console.log(data);
                data.forEach((e) => {
                    if(Number(e.verse_number)>=Number(start_v_num)){


                        // console.log(e.verse_number);
                        $("#to-verse").append('<option value="' + e.id +'" verse_number="'+e.verse_number+ '">' + e.verse_number +'</option>');
                    }
                    })
            
            },
            error: function(data) {

            }
        });
    });

    $("#s_v_btn").click(function(){
        var vid = $("#verse").find("option:selected").attr("value");
        var cid = $("#chapter").find("option:selected").attr("value");
        var v_to_id = $("#to-verse").find("option:selected").attr("verse_number");
        var v_from_id = $("#verse").find("option:selected").attr("verse_number");
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/scriptures/search_verse_api",
            data: {
                "vid": vid,
                "cid": cid,
                "from_num":v_from_id,
                "to_num":v_to_id
            },
            success: function(data) {
                $('#verse_output').empty();
                if(data.length==1){
                [data] = data;
                $("#verse_output").append("<p>"+data.verse_number +". "+data.scripture_text+"</p>");
                }else if(data.length>1){
                    data.forEach((item)=>{
                        $("#verse_output").append("<p>"+item.verse_number+". "+item.scripture_text+"</p>");
                    })
                }
            },
            error: function(data) {

            }
        });

    })
</script>