<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    if($_POST['empresa']) $_SESSION['empresa'] = $_POST['empresa'];

    if($_SESSION['empresa']){
        $query = "select *, if(situacao = '1', 'Ativa', 'Bloqueada') as situacao_descricao from empresas where codigo = '{$_SESSION['empresa']}'";
        $result = mysqli_query($con, $query);
        $d = mysqli_fetch_object($result);
    }

?>

<div class="card">
  <h5 class="card-header"><?=$d->razao_social?></h5>
  <div class="card-body">
    <h5 class="card-title"><?=$d->cnpj?></h5>
    <p class="card-text">Cadastrado em <?=$d->data_cadastro?></p>
    <a editar class="btn btn-<?=(($d->situacao == '1')?'primary':'danger')?>"><?=$d->situacao_descricao?></a>
  </div>
</div>

<script>
  $(function(){

    $("a[editar]").click(function(){
            codigo = $(this).attr("editar");
            $.ajax({
                url:"src/empresas/form.php",
                type:"POST",
                data:{
                    codigo,
                },
                success:function(dados){
                    $(".LateralDireita").html(dados);
                }
            });
        });

  })
</script>