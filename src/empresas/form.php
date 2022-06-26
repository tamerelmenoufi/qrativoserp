<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

print_r($_POST);

    if($_POST['acao'] == 'salvar'){

        $data = $_POST;
        $attr = [];

        unset($data['codigo']);
        unset($data['acao']);

        foreach ($data as $name => $value) {
            $attr[] = "{$name} = '" . mysqli_real_escape_string($con, $value) . "'";
        }
        $attr = implode(', ', $attr);

        if($_POST['codigo']){
            echo $query = "update empresas set {$attr} where codigo = '{$_POST['codigo']}'";
        }else{
            echo $query = "insert into empresas set data_cadastro = NOW(), {$attr}";
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
        <form id="form-<?= $md5 ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="CNPJ">
                <label for="cnpj">CNPJ</label>
            </div>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="razao_social" name="razao_social" placeholder="Razão Social">
                <label for="razao_social">Razão Social</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" id="situacao" name="situacao" aria-label="Situação">
                    <option value="1">Liberado</option>
                    <option value="2">Bloqueado</option>
                </select>
                <label for="situacao">Situação</label>
            </div>
            <input type="hidden" name="codigo" value="<?=$d->codigo?>">
            <button salvar class="btn btn-primary" type="submit">Salvar</button>
            <button cancelar class="btn btn-danger" type="button">Cancelar</button>
        </form>
    </div>
</div>

<script>
    $(function(){
        $("#cnpj").mask("99.999.999/9999-99");

        $('#form-<?=$md5?>').submit(function (e) {
            e.preventDefault();

            var codigo = $('#codigo').val();
            var campos = $(this).serializeArray();

            if (codigo) {
                campos.push({name: 'codigo', value: codigo})
            }

            campos.push({name: 'acao', value: 'salvar'})
            console.log(campos);
            $.ajax({
                url: 'src/empresas/form.php',
                type:"POST",
                data: campos,
                success: function (dados) {
                    console.log("Dados:" + dados);
                }
            })


        });
    })
</script>
