<div id="paginaHomeTopo"></div>
<div id="paginaHomeLateral"></div>
<script>
    $(function(){
        pags = [
            ['src/componentes/menu_topo/menu.php','paginaHomeTopo'],
            ['src/componentes/menu_lateral/menu.php','paginaHomeLateral'],
            ];

        for(i=0;i<pags.length;i++){
            $.ajax({
                url:pags[i][0],
                success:function(dados){
                    $(`#${pags[i][1]}`).append(dados);
                }
            });
        }

    })
</script>