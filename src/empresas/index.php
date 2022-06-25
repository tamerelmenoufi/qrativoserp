<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>
    .tab-content{
        border:solid 1px red;
        width:100%;
    }
    .nav-link{
        white-space:nowrap;
    }
</style>
<div class="col">
    <div class="m-3">
        <h5>Gerenciamento de Empresas</h5>
        <div class="d-flex align-items-start">
            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link active"><i class="fa-solid fa-building"></i> Emresas</a>
                <a class="nav-link"><i class="fa-solid fa-list-check"></i> Dados da empresa</a>
                <a class="nav-link"></i> Contatos / Representantes</a>
                <a class="nav-link"><i class="fa-solid fa-location-dot"></i> Endereços / Filiais</a>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade show active">...</div>
            </div>
        </div>
    </div>
</div>

<script>
    $(function(){

        $(".nav-link").click(function(){
            $(".nav-link").removeClass("active");
            $(this).addClass("active");

            opc = $(this).text();
            $.ajax({
                url:"src/empresas/lista.php",
                type:"POST",
                data:{
                    opc
                },
                success:function(dados){
                    $(".tab-pane").html(dados);
                }
            });
        });

    })
</script>