<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

    if($_POST['acao'] == 'salvar'){
        if($_POST['codigo']){
            $query = "update empresas set
                                        cnpj='{$_POST['cnpj']}',
                                        razao_social='{$_POST['razao_social']}',
                                        situacao='{$_POST['situacao']}'
                        where codigo = '{$_POST['codigo']}'";
        }else{
            $query = "insert into from
                                    cnpj='{$_POST['cnpj']}',
                                    razao_social='{$_POST['razao_social']}',
                                    situacao='{$_POST['situacao']}',
                                    data_cadastro = NOW()";
        }
        mysqli_query($con, $query);
        exit();
    }

?>
<style>


</style>
<h2 class="Topo">Dados do Título do formulário</h2>
<div class="row">
    <div class="col">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="cnpj" placeholder="CNPJ">
            <label for="cnpj">CNPJ</label>
        </div>
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="razao_social" placeholder="Razão Social">
            <label for="razao_social">Razão Social</label>
        </div>
        <div class="form-floating mb-3">
            <select class="form-select" id="situacao" aria-label="Situação">
                <option value="1">Liberado</option>
                <option value="2">Bloqueado</option>
            </select>
            <label for="situacao">Situação</label>
        </div>
        <button class="btn btn-primary" type="button">Salvar</button>
        <button class="btn btn-danger" type="button">Cancelar</button>
    </div>
</div>

<script>
    $(function(){
        $("#cnpj").mask("99.999.999/9999-99");
    })
</script>
