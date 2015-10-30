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
$nome_blog = $_POST['nome_blog'];
$titulo = $_POST['titulo'];
$link_blog = $_POST['link_blog'];
$id_blog = $_POST['id'];



$fileName = $_FILES["img"]["name"];

if ($fileName == "") {

    $nova_imagem = $_POST['imagem'];
} else {

    $nova_imagem = $fileName;
    $pathAndName = "../imagens/blog/" . $fileName;
    $fileTmpLoc = $_FILES["img"]["tmp_name"];
    $moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);
}

$update = "UPDATE blogs SET nome = '$nome_blog', titulo = '$titulo', link = '$link_blog', img = '$nova_imagem' "
        . "WHERE blogs_id = $id_blog";

$executa_update = mysql_query($update)or die(mysql_error());

if ($executa_update) {
    ?>

    <script>
        window.location.href = '../list_blogs.php?respe=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_blogs.php?respe=erro';
    </script>
    <?php

}