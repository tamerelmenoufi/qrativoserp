<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    if($_POST['acao'] == 'status'){
        $q = "update os_fotos set situacao = '{$_POST['situacao']}' where codigo = '{$_POST['os']}'";
        mysqli_query($con, $q);
        exit();
    }

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

                    <div class="form-check form-switch m-3">
                        <input status="<?=$d->codigo?>" <?=(($d->situacao == '1')?'checked':false)?> class="form-check-input" type="checkbox" role="switch" id="status<?=$d->codigo?>">
                        <label class="form-check-label" for="status<?=$d->codigo?>">Ativar a Imagem para exibição nos relatórios</label>
                    </div>

                    <button excluir_foto="<?=$d->codigo?>" class="btn btn-danger btn-sm m-3">
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
        $("input[status]").change(function(){
            os = $(this).attr("status");
            if($(this).prop("checked") == true){
                situacao = '1';
            }else{
                situacao = '0';
            }
            $.ajax({
                url:"src/os/fotos_lista.php",
                type:"POST",
                data:{
                    os,
                    situacao,
                    acao:'status'
                },
                success:function(dados){
                    // console.log(dados);
                }
            });
        });


        $("button[excluir_foto]").click(function(){
            os = $(this).attr("excluir_foto");
            $.confirm({
                title:false,
                content:"Deseja realmente excluir o registro da imagem?",
                buttons:{
                    'SIM':function(){

                    },
                    'NÃO':function(){

                    }
                }
            });
        });
    })
</script>