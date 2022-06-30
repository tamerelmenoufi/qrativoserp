<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>
    .Foto{
        position:relative;
        width:100%;
        height:120px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align:center;
        background-position:center;
        background-size:100% auto;
        background-repeat:no-repeat;
        cursor:pointer;
    }
    .Foto div{
        font-size:100px;
        color:#eee;
        position:absolute;
        width:100%;
    }
    p[msg]{
        font-size:10px;
        color:blue;
        position:relative;
        text-align:center;
    }
    .FileFoto{
        position:relative;
        left:0;
        top:0;
        bottom:0;
        width:100%;
        background:#eee;
        opacity:0;
        z-index:2;
    }
    .Apagar{
        position:relative;
        text-align:center;
        margin-top:-45px;
        width:100%;
        opacity:1;
        z-index:3;
    }
    .Apagar span{
        padding:2px 4px 3px 4px;
        border-radius:3px;
        background-color:red;
        color:#fff;
        font-size:10px;
        cursor:pointer;
        opacity:0;
    }
</style>

<div class="row">
    <div class="col-4">
        <div class="Foto">
            <div>
                <input type="file" class="FileFoto" />
                <input
                        type="hidden"
                        id="encode_file"
                        nome=""
                        tipo=""
                        value=""
                />
                <i class="fa-solid fa-image"></i>
            </div>
        </div>
        <div class="Apagar">
            <span>
                <i class="fa-solid fa-eraser"></i>
            </span>
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

<div class="row">
    <div class="col">
        <div class="ListarFotos">Sem Informações</div>
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

        $(".Foto, .Apagar").mouseover(function(){
            if($("#encode_file").attr("nome")){
                $(".Apagar span").css("opacity","1");
            }
        }).mouseout(function(){
            $(".Apagar span").css("opacity","0");
        });

        $(".Apagar span").click(function(){

            $("#encode_file").val('');
            $("#encode_file").attr("nome", '');
            $("#encode_file").attr("tipo", '');
            $(".Foto").css("background-image",'');
            $(".Foto div i").css("opacity","1");

        });


        if (window.File && window.FileList && window.FileReader) {

            $('input[type="file"]').change(function () {

                if ($(this).val()) {
                    var files = $(this).prop("files");
                    for (var i = 0; i < files.length; i++) {
                        (function (file) {
                            var fileReader = new FileReader();
                            fileReader.onload = function (f) {
                                var Base64 = f.target.result;
                                var type = file.type;
                                var name = file.name;

                                $("#encode_file").val(Base64);
                                $("#encode_file").attr("nome", name);
                                $("#encode_file").attr("tipo", type);

                                $(".Foto").css("background-image",`url(${Base64})`);
                                $(".Foto div i").css("opacity","0");

                            };
                            fileReader.readAsDataURL(file);
                        })(files[i]);
                    }
                }
            });
        } else {
        alert('Nao suporta HTML5');
        }



    })
</script>