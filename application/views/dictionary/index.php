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

    $("#vocab_search").click(() => {
        var vocab = $("#vocab").val();
        $.ajax({
            type: "post",
            url: "<?php echo base_url(); ?>index.php/dictionary/search",
            data: {
                "vocab": vocab
            },
            success: data => {
                // console.log(data);
                $('#definition').empty();
                [data] = data;
                $("#definition").append("<p>" + data.def + "</p>");
            }
        })
    })
</script>