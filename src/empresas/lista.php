<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<div class="col">
    <div class="col d-flex justify-content-between">
        <div class="p-2">Dados da tabel de Empresas (<?=$_POST['opc']?>)</div>
        <div class="p-2">
            <button class="btn btn-primary">
                <i class="fa-solid fa-plus"></i>
                Novo
            </button>
        </div>
    </div>
</div>
<table id="example" class="table table-hover" style="width:100%">
    <thead>
        <tr>
            <th>First name</th>
            <th>Last name</th>
            <th>Position</th>
            <th>Office</th>
            <th>Start date</th>
            <th>Salary</th>
        </tr>
    </thead>
</table>

<script>
    $(document).ready(function () {

    });
</script>