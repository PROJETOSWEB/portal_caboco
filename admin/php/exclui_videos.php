<?php

include '../conections/conexao.php';
$id_videos = $_GET['id'];


$delete_usuario = "DELETE FROM videos WHERE videos_id = $id_videos";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_videos.php?respt=sucesso';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_videos.php?respt=erro';
    </script>
    <?php

}

