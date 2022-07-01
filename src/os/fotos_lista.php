<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>

</style>

<div class="row">
    <div class="col">
    <h4>Lista de fotos da OS #<?=$_POST['os']?></h4>
    <?php
    $query = "select a.*, b.nome as colaborador from os_fotos a left join usuarios b on a.colaborador = b.codigo where a.cod_os = '{$_POST['os']}'";
    $result = mysqli_query($con, $query);
    while($d = mysqli_fetch_object($result)){
    ?>
        <div class="card mt-3">
            <div class="row">
                <div class="col d-flex justify-content-end">

                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                        <label class="form-check-label" for="flexSwitchCheckDefault">Default switch checkbox input</label>
                    </div>

                    <button class="btn btn-danger btn-sm m-3">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </div>
            </div>
            <div class="row g-0">
                <div class="col-md-4">
                <img src="src/os/fotos/<?="{$d->cod_os}/$d->foto"?>" class="img-fluid rounded-start">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?=$d->titulo?></h5>
                    <p class="card-text"><?=$d->descricao?></p>
                    <p class="card-text" style="font-size:10px;"><small class="text-muted"><?="{$d->colaborador} em {$d->data_cadastro}"?></small></p>
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