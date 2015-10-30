<?php

include '../conections/conexao.php';
$id_album = $_GET['id'];


$delete_usuario = "DELETE FROM album WHERE album_id = $id_album";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_albuns.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_albuns.php?respt=erro';
    </script>
    <?php

}

