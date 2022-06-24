<div id="paginaHome"></div>
<script>
    $(function(){
        pags = [
            'src/componentes/menu_topo/menu.php',
            'src/componentes/menu_lateral/menu.php',
            ];

        for(i=0;i<pags.length;i++){
            $.ajax({
                url:pags[i],
                success:function(dados){
                    $("#paginaHome").append(dados);
                }
            });
        }

    })
</script>