<?php

include '../conections/conexao.php';
$id_blogs = $_GET['id'];


$delete_usuario = "DELETE FROM blogs WHERE blogs_id = $id_blogs";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_blogs.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_blogs.php?respt=erro';
    </script>
    <?php

}

