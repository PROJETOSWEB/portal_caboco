<?php

include '../conections/conexao.php';
$id_banner = $_GET['id'];


$delete_usuario = "DELETE FROM banner WHERE banner_id = $id_banner";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../vbanner.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../vbanner.php?respt=erro';
    </script>
    <?php

}

