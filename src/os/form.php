<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");

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
            $query = "update os set {$attr} where codigo = '{$_POST['codigo']}'";
            mysqli_query($con, $query);
            $cod = $_POST['codigo'];
        }else{
            $query = "insert into os set data_cadastro = NOW(), {$attr}";
            mysqli_query($con, $query);
            $cod = mysqli_insert_id($con);
        }

        $retorno = [
            'status' => true,
            'codigo' => $cod
        ];

        echo json_encode($retorno);

        exit();
    }


    if($_POST['os']){
        $query = "select * from os where codigo = '{$_POST['os']}'";
        $result = mysqli_query($con, $query);
        $d = mysqli_fetch_object($result);
    }


?>
<style>


</style>
<h2 class="Topo">Dados da O.S.</h2>
<div class="row">
    <div class="col">
        <form id="form-<?= $md5 ?>">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="<?=$d->titulo?>">
                <label for="titulo">Título</label>
            </div>
            <div class="form-floating mb-3">
                <textarea name="descricao" id="descricao" class="form-control" placeholder="Descrição"><?=$d->descricao?></textarea>
                <label for="descricao">Descricão</label>
            </div>
            <div class="form-floating mb-3">
                <select class="form-select" name="empresa" id="empresa">
                    <option value="">::Selecione::</option>
                    <?php
                    $q = "select * from empresas where situacao = '1' order by razao_social";
                    $r = mysqli_query($con, $q);
                    while($e = mysqli_fetch_object($r)){
                    ?>
                    <option value="<?=$e->codigo?>"><?=$e->razao_social?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="empresa">Descricão</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="empresa_responsavel" id="empresa_responsavel">
                    <option value="">::Selecione::</option>
                    <?php
                    $q = "select * from empresas_contatos where situacao = '1' order by nome";
                    $r = mysqli_query($con, $q);
                    while($e = mysqli_fetch_object($r)){
                    ?>
                    <option value="<?=$e->codigo?>"><?=$e->nome?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="empresa_responsavel">Responsável pela Empresa</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="empresa_endereco" id="empresa_endereco">
                    <option value="">::Selecione::</option>
                    <?php
                    $q = "select * from empresas_enderecos where situacao = '1' order by nome";
                    $r = mysqli_query($con, $q);
                    while($e = mysqli_fetch_object($r)){
                    ?>
                    <option value="<?=$e->codigo?>"><?=$e->nome?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="empresa_endereco">Localização da Empresa</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="tipo" id="tipo">
                    <option value="solicitacao">Ordem de Serviço</option>
                    <option value="servico">Solicitação de Serviço</option>
                </select>
                <label for="tipo">Tipo da Solicitação</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" name="responsavel" id="responsavel">
                    <option value="">::Selecione::</option>
                    <?php
                    $q = "select * from colaboradores where situacao = '1' order by nome";
                    $r = mysqli_query($con, $q);
                    while($e = mysqli_fetch_object($r)){
                    ?>
                    <option value="<?=$e->codigo?>"><?=$e->nome?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="responsavel">Responsável pela Solicitação</label>
            </div>


            <div class="form-floating mb-3">
                <select class="form-select" name="executor" id="executor">
                    <option value="">::Selecione::</option>
                    <?php
                    $q = "select * from colaboradores where situacao = '1' order by nome";
                    $r = mysqli_query($con, $q);
                    while($e = mysqli_fetch_object($r)){
                    ?>
                    <option value="<?=$e->codigo?>"><?=$e->nome?></option>
                    <?php
                    }
                    ?>
                </select>
                <label for="executor">Executor da Solicitação</label>
            </div>

            <div class="form-floating mb-3">
                <select class="form-select" id="situacao" name="situacao" aria-label="Situação">
                    <option value="1" <?=(($d->situacao == '1')?'selected':false)?> >Liberado</option>
                    <option value="0" <?=(($d->situacao == '0')?'selected':false)?>>Bloqueado</option>
                </select>
                <label for="situacao">Situação</label>
            </div>
            <input type="hidden" name="codigo" id="codigo" value="<?=$d->codigo?>">
            <button
                salvar
                class="btn btn-primary"
                type="submit"
                data-bs-toggle="offcanvas"
                href="#offcanvasDireita"
                role="button"
                aria-controls="offcanvasDireita"
            >
                Salvar
            </button>
            <button
                cancelar
                class="btn btn-danger"
                type="button"
                data-bs-toggle="offcanvas"
                href="#offcanvasDireita"
                role="button"
                aria-controls="offcanvasDireita"
            >
                Cancelar
            </button>
        </form>
    </div>
</div>

<script>
    $(function(){
        $("#telefone").mask("(99) 9 9999-9999");
        $("#cpf").mask("999.999.999-99");

        $('#form-<?=$md5?>').submit(function (e) {
            e.preventDefault();

            var codigo = $('#codigo').val();
            var campos = $(this).serializeArray();

            if (codigo) {
                campos.push({name: 'codigo', value: codigo})
            }

            campos.push({name: 'acao', value: 'salvar'})
            $.ajax({
                url: 'src/os/form.php',
                type:"POST",
                dataType:"json",
                data: campos,
                success: function (dados) {
                    empresa = dados.codigo;
                    $.ajax({
                        url:"src/os/index.php",
                        type:"POST",
                        success:function(dados){
                            $("#paginaHome").html(dados);
                        }
                    });

                }
            })


        });
    })
</script>
