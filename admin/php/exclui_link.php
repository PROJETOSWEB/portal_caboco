<?php

include '../conections/conexao.php';
$id_link = $_GET['id'];


$delete_usuario = "DELETE FROM links WHERE links_id = $id_link";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../vlinks.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../vlinks.php?respt=erro';
    </script>
    <?php

}

