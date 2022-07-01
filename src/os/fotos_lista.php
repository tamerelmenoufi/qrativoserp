<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>

</style>

<div class="row">
    <div class="col">
    <h4>Lista de fotos da OS #<?=$_POST['os']?></h4>
    <?php
    $query = "select * from os_fotos where cod_os = '{$_POST['os']}'";
    $result = mysqli_query($con, $query);
    while($d = mysqli_fetch_object($result)){
    ?>
        <div class="card mt-3">
            <div class="row g-0">
                <div class="col-md-4">
                <img src="..." class="img-fluid rounded-start" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
</div>



<script>
    $(function(){

    })
</script>