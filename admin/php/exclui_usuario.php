<?php

include '../conections/conexao.php';
$id_usuario = $_GET['id'];


$delete_usuario = "DELETE FROM usuario WHERE usuario_id = $id_usuario";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_usuario.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_usuario.php?respt=sucesso';
    </script>
    <?php

}

