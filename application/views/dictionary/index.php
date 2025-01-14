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
    <h1 class="h3 mb-0 text-gray-800">Dictionary</h1>
</div>

<!-- Content Row -->
<div class="row">


    <div class="col-xl-6 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                            Dictionary</div>
                        <div class="row g-3">
                            <div class="col-auto">
                                <div class="form-floating">
                                    <input type="text" class="form-control" id="vocab" placeholder="">
                                    <label for="vocab">Search</label>
                                </div>
                            </div>
                            <div class="col-auto align-self-center">
                                <input class="btn btn-primary" type="submit" id="vocab_search" value="Search">
                            </div>
                            <div class="col-auto align-self-center">

                                <input class="btn btn-primary" type="submit" id="add_card" value="Add Card">

                            </div>
                        </div>


                        <div id="definition"></div>
                    </div>

                </div>
            </div>
        </div>
    </div>



</div>




<script type="text/javascript">
    // #vocab
    // #vocab_search
    // #definition

    $("#add_card").hide()

    $("#vocab_search").click(() => {
        function ajaxSearch(){
            var vocab = $("#vocab").val();
            return $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/dictionary/search",
            data: {
                "vocab": vocab
            }
            
        });
        }




        $.when(ajaxSearch())
        .then(
            function(data){
                $('#definition').empty();
                [data] = data;
                $("#definition").append("<p>" + data.def + "</p>");
            }
        )
        .then(
            $("#add_card").show()
        )
        .then(

            // var vocab = $("#vocab").val();
            //     var def = $("#definition p:first").text();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/dictionary/word_saved",
                    data: {
                        "term": $("#vocab").val()
                    },
                    success: data => {
                        if(data.exist==1){
                            //exist word, disable button
                            $("#add_card").attr("value","Card Added");
                            $("#add_card").addClass("disabled");
                            $("#add_card").removeClass("class btn-primary").addClass("class btn-secondary");

                        }else{
                             $("#add_card").attr("value","Add to Card");
                             $("#add_card").removeClass("disabled");
                             $("#add_card").removeClass("class btn-secondary").addClass("class btn-primary");
                        }

                    }

                })
            
            
        )
    })


    
                $("#add_card").click(() => {
                var vocab = $("#vocab").val();
                var def = $("#definition p:first").text();
                $.ajax({
                    type: "post",
                    url: "<?php echo base_url(); ?>index.php/dictionary/word_saved",
                    data: {
                        "term": vocab
                    },
                    success: data => {
                        if(data.exist==1){
                            //exist word, disable button
                            $("#add_card").attr("value","Card Added");
                            $("#add_card").addClass("disabled");
                            $("#add_card").removeClass("class btn-primary").addClass("class btn-secondary");

                        }else if(data.exist==0){
                            //new word, save data then disable button
                            $.ajax({
                                type:"post",
                                url:"<?php echo base_url();?>index.php/dictionary/addcard",
                                data:{
                                    "vocab":vocab,
                                    "def":def
                                },
                                success: ()=>{
                                    $("#add_card").attr("value","Card Added");
                                    $("#add_card").addClass("disabled");
                                    $("#add_card").removeClass("class btn-primary").addClass("class btn-secondary");

                                }

                            })
                        }
                    }
                })
                
                })


</script>