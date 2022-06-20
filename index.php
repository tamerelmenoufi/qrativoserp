<?php
    include("lib/includes.php");

    if($_SESSION['QrAtivosLogin']){
        $url = "src/home/index.php";
    }else{
        $url = "src/login/index.php";
    }
    $url = "src/login/index.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="img/icone.png">
    <title>ERP - QrAtivos</title>
    <?php
    include("lib/header.php");
    ?>
  </head>
  <body>
    <div class="CorpoApp"></div>

    <?php
    include("lib/footer.php");
    ?>

    <script>
        $(function(){

            $.ajax({
                url:"<?=$url?>",
                success:function(dados){
                    $(".CorpoApp").html(dados);
                }
            });
        })
    </script>

  </body>
</html>