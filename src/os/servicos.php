<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    if($_POST['servico']) $_SESSION['servico'] = $_POST['servico'];

    $e = mysqli_fetch_object(mysqli_query($con, "select a.*, if(a.situacao = '1', 'Ativa','Desativada') as situacao, b.razao_social, b.cnpj from os a left join empresas b on a.empresa = b.codigo where a.codigo = '{$_SESSION['servico']}'"));

    $query = "select
                    a.*,
                    if(a.situacao = '1', 'Liberado', 'Bloqueado') as situacao,
                    b.razao_social as nome_empresa
                from os a
                left join empresas b on a.empresa = b.codigo
                where vinculo = '{$_SESSION['servico']}'
                order by a.titulo";
    $result = mysqli_query($con, $query);

?>
<div class="col">
    <div class="col d-flex justify-content-between">
        <div class="p-2"><h5>Ordem de Serviços</h5></div>
        <div class="p-2">
            <button
                class="btn btn-secondary"
                voltar
            >
                <i class="fa-solid fa-plus"></i>
                Voltar
            </button>
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

<div class="row">
    <div col>


        <div class="card">
            <h5 class="card-header"><?=$e->razao_social?> <?=$e->cnpj?></h5>
            <div class="card-body">
                <h5 class="card-title"><?=$e->titulo?></h5>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><?=$e->descricao?></li>
                <li class="list-group-item"><?=$e->situacao?></li>
            </ul>
        </div>

    </div>
</div>

<table id="TableColaboradores" class="table table-hover" style="width:100%">
    <thead>
        <tr>
            <th>Título</th>
            <th>Empresa</th>
            <th>Tipo</th>
            <th>Situação</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($d = mysqli_fetch_object($result)){
        ?>
        <tr>
            <td><?=$d->titulo?></td>
            <td><?=$d->nome_empresa?></td>
            <td><?=$d->tipo?></td>
            <td><?=$d->situacao?></td>
            <td>

                <div class="dropdown">
                    <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="acoesOs" data-bs-toggle="dropdown" aria-expanded="false">
                        Ações
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="acoesOs">
                        <li linha='<?=$d->codigo?>'><a class="dropdown-item">Editar</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Separated link</a></li>
                    </ul>
                </div>

                <!-- <button
                    editar="<?=$d->codigo?>"
                    class="btn btn-success btn-xs"
                    data-bs-toggle="offcanvas"
                    href="#offcanvasDireita"
                    role="button"
                    aria-controls="offcanvasDireita"
                >
                    Ed
                </button>
                <button excluir="<?=$codigo?>" class="btn btn-danger btn-xs">ex</button> -->
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<script>
    $(document).ready(function () {

        $("button[voltar]").click(function(){
            $.ajax({
                url:"src/os/index.php",
                success:function(dados){
                    // $(".LateralDireita").html(dados);
                    $(".tab-pane").html(dados);
                }
            });
        });

        $("button[offcanvasDireita]").click(function(){
            $.ajax({
                url:"src/os/form.php",
                success:function(dados){
                    $(".LateralDireita").html(dados);
                }
            });
        });


        $("li[linha]").click(function(){
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