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


$insert = "INSERT INTO sub_editoriais (editoria_id, sub_editora, usuario_id)VALUES('$tipo_editora', '$legenda', $id_usuario)";
$executa_insert = mysql_query($insert)or die(mysql_error());

if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_editorias.php?resp=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_editorias.php?resp=erro';
    </script>
    <?php

}
?>
