<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>
    .tab-content{
        border:solid 1px red;
        width:100%;
    }
</style>
<div class="col">
    <div class="m-3">
        <h5>Gerenciamento de Empresas</h5>
        <div class="d-flex align-items-start">
        <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active" id="v-pills-home-tab" data-bs-toggle="pill" data-bs-target="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><i class="fa-solid fa-building"></i> Emresas</a>
            <a class="nav-link" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" role="tab" aria-controls="v-pills-home" aria-selected="false" ><i class="fa-solid fa-list-check"></i> Dados da empresa</a>
            <a class="nav-link" id="v-pills-disabled-tab" data-bs-toggle="pill" data-bs-target="#v-pills-disabled" role="tab" aria-controls="v-pills-home" aria-selected="false" ><i class="fa-solid fa-id-badge"></i> Contatos / Representantes</a>
            <a class="nav-link" id="v-pills-messages-tab" data-bs-toggle="pill" data-bs-target="#v-pills-messages" role="tab" aria-controls="v-pills-home" aria-selected="false" ><i class="fa-solid fa-location-dot"></i> Endereços / Filiais</a>
        </div>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab" tabindex="0">...</div>
        </div>
        </div>
    </div>
</div>

<script>
    $(function(){

        $(".nav-link").click(function(){
            opc = $(this).text();
            $.ajax({
                url:"src/empresas/lista.php",
                type:"POST",
                data:{
                    opc
                },
                success:function(dados){
                    $("#v-pills-home").html(dados);
                }
            });
        });

    })
</script>