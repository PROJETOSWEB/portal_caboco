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


$img = $_FILES['img'];

$fileName = $_FILES["img"]["name"];
$pathAndName = "../imagens/blog/" . $fileName;
$fileTmpLoc = $_FILES["img"]["tmp_name"];
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


$insert = "INSERT INTO blogs (nome, titulo, link, img, usuario_id)VALUES('$nome_blog', '$titulo', '$link_blog', '$fileName', $id_usuario)";
$executa_insert = mysql_query($insert)or die(mysql_error());



if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../list_blogs.php?resp=sucesso';
    </script>

    <?php

} else {
    ?>
    <script>
        window.location.href = '../list_blogs.php?resp=erro';
    </script>
    <?php

}
?>
