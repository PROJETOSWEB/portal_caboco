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
$data = $_POST['data'];
$nome = $_POST['nome'];
$publicar = $_POST['publicar'];
$img = $_FILES['img'];


$fileName = $_FILES["img"]["name"];
$pathAndName = "../imagens/banner/" . $fileName;
$fileTmpLoc = $_FILES["img"]["tmp_name"];
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


$insert = "INSERT INTO banner (data_banner, nome_banner, img, publicar, usuario_id)VALUES('$data', '$nome', '$fileName', $publicar, $id_usuario)";
$executa_insert = mysql_query($insert)or die(mysql_error());


if ($executa_insert) {
    ?>

    <script>
        window.location.href = '../banner.php?respt=sucesso';
    </script>

    <?php
} else {
    ?>
    <script>
        window.location.href = '../banner.php?respt=erro';
    </script>
    <?php
}
?>
<!--<div class="alert alert-success fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
    </button>
    <strong>SUCESSO!</strong> Link cadastrado com sucesso!
</div>

<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
    </button>
    <strong>ERRO</strong> Link nao cadastrado.
</div>-->

<!--<div class="alert alert-block alert-danger fade in">
    <button data-dismiss="alert" class="close close-sm" type="button">
        <i class="fa fa-times"></i>
    </button>
    <strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>-->   