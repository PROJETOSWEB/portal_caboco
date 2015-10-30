<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.php');
}

$id_usuario = $_SESSION['id'];


include '../conections/conexao.php';

//PEGANDO DADOS POR POST
$tipo_editora = $_POST['tipo_editora'];
$legenda = $_POST['subeditora'];
$id_sub_editoriais = $_POST['id'];


$update = "UPDATE sub_editoriais SET editoria_id = '$tipo_editora', sub_editora = '$legenda' WHERE sub_editoriais_id = $id_sub_editoriais";
$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_editorias.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_editorias.php?respe=erro';
    </script>
    <?php

}
?>
