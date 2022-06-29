<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>
    .Foto{
        width:100%;
        height:120px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align:center;
    }
    .Foto div{
        font-size:100px;
        color:#eee;
        position:relative;
    }
    p[msg]{
        font-size:10px;
        color:blue;
        position:relative;
        text-align:center;
    }
    .FileFoto{
        position:absolute;
        left:0;
        top:0;
        bottom:0;
        width:100%;
        background:#eee;
        opacity:0;
    }
</style>

<div class="row">
    <div class="col-4">
        <div class="Foto">
            <div>
                <input type="file" class="FileFoto" />
                <i class="fa-solid fa-image"></i>
            </div>
        </div>
        <p msg>Selecione a imagem</p>
    </div>
    <div class="col-8">
        <div class="form-floating mb-3">
            <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Título" value="<?=$d->titulo?>">
            <label for="titulo">Título</label>
        </div>
        <div class="form-floating mb-3">
            <textarea name="descricao" id="descricao" class="form-control" style="height:120px;" placeholder="Descrição"><?=$d->descricao?></textarea>
            <label for="descricao">Descricão</label>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div style="display:flex; justify-content:end">
            <button class="btn btn-success btn-ms">Salvar</button>
        </div>
    </div>
</div>

<div style="position:absolute; bottom:0; left:0; width:100%; overflow-y: scroll; border:solid 1px red;">
    <div class="row">
        <div class="col">
            <div class="ListarFotos"></div>
        </div>
    </div>
</div>


<script>
    $(function(){
        $.ajax({
            url:"src/os/fotos_lista.php",
            success:function(dados){
                $(".ListarFotos").html(dados);
            }
        });
    })
</script>