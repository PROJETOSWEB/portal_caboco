<?php

include '../conections/conexao.php';
$id_noticia = $_GET['id'];


$delete_usuario = "DELETE FROM noticia WHERE noticia_id = $id_noticia";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_noticias.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_noticias.php?respt=erro';
    </script>
    <?php

}

