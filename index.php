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
    <h1>Hello, world!</h1>

    <button class="btn btn-success" id="alerta">TESTE</button>

    <?php
    include("lib/footer.php");
    ?>

    <script>
        $(function(){

            $("#alerta").click(function(){
                $.alert('Tudo funcionando até aqui!')
            });

        })
    </script>

  </body>
</html>