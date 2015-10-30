<?php

include '../conections/conexao.php';
$id_sub_editoriais = $_GET['id'];


$delete_usuario = "DELETE FROM sub_editoriais WHERE sub_editoriais_id = $id_sub_editoriais";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_editorias.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_editorias.php?respt=erro';
    </script>
    <?php

}

