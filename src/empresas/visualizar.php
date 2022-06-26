<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    if($_POST['codigo']){
        $query = "select *, if(situacao == '1', 'Ativa', 'Bloqueada') as situacao_descricao from empresas where codigo = '{$_POST['codigo']}'";
        $result = mysqli_query($con, $query);
        $d = mysqli_fetch_object($result);
    }

?>

<div class="card">
  <h5 class="card-header"><?=$d->razao_social?></h5>
  <div class="card-body">
    <h5 class="card-title"><?=$d->cnpj?></h5>
    <p class="card-text">Cadastrado em <?=$d->data_cadastro?></p>
    <a href="#" class="btn btn-<?=(($d->situacao == '1')?'primary':'danger')?>"><?=$d->situacao_descricao?></a>
  </div>
</div>