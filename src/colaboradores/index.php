<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    $query = "select *, if(situacao = '1', 'Liberado', 'Bloqueado') as situacao from colaboradores order by nome";
    $result = mysqli_query($con, $query);

?>
<div class="col">
    <div class="col d-flex justify-content-between">
        <div class="p-2"><h5>Colaboradores</h5></div>
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
            <th>Nome</th>
            <th>CPF</th>
            <th>Situação</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        while($d = mysqli_fetch_object($result)){
        ?>
        <tr linha='<?=$d->codigo?>'>
            <td><?=$d->nome?></td>
            <td><?=$d->cpf?></td>
            <td><?=$d->situacao?></td>
            <td>

                <div class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton2" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown button
                    </button>
                    <ul class="dropdown-menu dropdown-menu-dark" aria-labelledby="dropdownMenuButton2">
                        <li><a class="dropdown-item active" href="#">Action</a></li>
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

        $("button[offcanvasDireita]").click(function(){
            $.ajax({
                url:"src/colaboradores/form.php",
                success:function(dados){
                    $(".LateralDireita").html(dados);
                }
            });
        });


        $("tr[linha]").click(function(){
            colaborador = $(this).attr("linha");

            $.ajax({
                url:"src/colaboradores/form.php",
                type:"POST",
                data:{
                    colaborador,
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