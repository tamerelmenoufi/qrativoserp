<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    echo $query = "select
                    a.*,
                    if(a.situacao = '1', 'Liberado', 'Bloqueado') as situacao,
                    b.razao_social as nome_empresa
                left join empresas b on a.empresa = b.codigo
                from os a a.order by a.titulo";
    $result = mysqli_query($con, $query);

?>
<div class="col">
    <div class="col d-flex justify-content-between">
        <div class="p-2">Ordem de Serviços</div>
        <div class="p-2">
            <button
                class="btn btn-primary"
                data-bs-toggle="offcanvas"
                href="#offcanvasDireita"
                role="button"
                aria-controls="offcanvasDireita"
                offcanvasDireita
            >
                <i class="fa-solid fa-plus"></i>
                Novo
            </button>
        </div>
    </div>
</div>
<table id="TableColaboradores" class="table table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Situação</th>
            <!-- <th>Ações</th> -->
        </tr>
    </thead>
    <tbody>
        <?php
        while($d = mysqli_fetch_object($result)){
        ?>
        <tr linha='<?=$d->codigo?>'>
            <td><?=$d->titulo?></td>
            <td><?=$d->nome_empresa?></td>
            <td><?=$d->situacao?></td>
            <!-- <td>
                <button
                    editar="<?=$d->codigo?>"
                    class="btn btn-success btn-xs"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasDireita"
                    role="button"
                    aria-controls="offcanvasDireita"
                >
                    Ed
                </button>
                <button excluir="<?=$codigo?>" class="btn btn-danger btn-xs">ex</button>
            </td> -->
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {

        $("button[offcanvasDireita]").click(function(){
            $.ajax({
                url:"src/os/form.php",
                success:function(dados){
                    $(".LateralDireita").html(dados);
                }
            });
        });


        $("tr[linha]").click(function(){
            os = $(this).attr("linha");

            $.ajax({
                url:"src/os/form.php",
                type:"POST",
                data:{
                    os,
                },
                success:function(dados){
                    $(".LateralDireita").html(dados);

                    let myOffCanvas = document.getElementById('offcanvasDireita');
                    let openedCanvas = bootstrap.Offcanvas.getInstance(myOffCanvas);
                    openedCanvas.show();

                }
            });
        });



    });
</script>