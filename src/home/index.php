<div id="paginaHomeTopo"></div>
<div id="paginaHomeLateral"></div>
<script>

    function Abrir(u, l){
        $.ajax({
            url:u,
            success:function(dados){
                $(`#${l}`).html(dados);
            }
        });
    }

    $(function(){
        pags = [
            ['src/componentes/menu_topo/menu.php','paginaHomeTopo'],
            ['src/componentes/menu_lateral/menu.php','paginaHomeLateral'],
            ];

        for(i=0;i<pags.length;i++){
            url = pags[i][0];
            local = pags[i][1];
            Abrir(url, local);
        }

    })
</script>