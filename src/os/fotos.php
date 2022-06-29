<?php
    include("{$_SERVER['DOCUMENT_ROOT']}/sis/lib/includes.php");
?>
<style>
    .Foto{
        width:100%;
        height:230px;
        border:solid 1px red;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align:center;
    }
    .Foto div{
        font-size:70px;
        color:#eee;
        position:relative;
    }
    .FileFoto{
        position:absolute;
        left:0;
        top:0;
        bottom:0;
        width:100%;
        background:#eee;
        opacity:0.9;
    }
</style>

<div class="row">
    <div class="col">
        <div class="Foto">
            <div>
                <input type="file" class="FileFoto" />
                <i class="fa-solid fa-image"></i>
            </div>
        </div>
    </div>
</div>