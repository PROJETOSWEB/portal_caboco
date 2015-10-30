<?php

include '../conections/conexao.php';
$id_fotos = $_GET['id'];
$album = $_GET['album'];


$delete_usuario = "DELETE FROM album_fotos WHERE album_fotos_id = $id_fotos";
$executa_delete = mysql_query($delete_usuario)or die(mysql_error());


if ($executa_delete) {
    ?>

    <script>
        window.location.href = '../list_fotos_album.php?respt=sucesso&id=<?php echo $album;?>';
    </script>
    <?php

} else {
    ?>

    <script>
        window.location.href = '../list_fotos_album.php?respt=erro&<?php echo $album; ?>';
    </script>
    <?php

}

