<?php
session_start();
if ((!isset($_SESSION['usuario']) == true) and ( !isset($_SESSION['senha']) == true)) {
    unset($_SESSION['usuario']);
    unset($_SESSION['senha']);
    header('location:index.php');
}
?>

<!--header end-->
<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<!--sidebar end-->

<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-reset.css" rel="stylesheet">
<!--external css-->
<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_page.css" rel="stylesheet" />
<link href="assets/advanced-datatable/media/css/demo_table.css" rel="stylesheet" />
<link rel="stylesheet" href="assets/data-tables/DT_bootstrap.css" />

<link href="assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="css/gallery.css" />

<!-- Custom styles for this template -->
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet" />
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>

</br></br>
<section id="container" class="">

    <section id="main-content">
        <section class="wrapper site-min-height">

            <h1 style="font-weight: 300;"><span class="fa fa-comments"></span> BLOGS</h1>
            <hr style="border: 1px solid #333;">
            <div class="divider"></div>
            <div class="divider"></div>

            </br>

            <?php
            if (isset($_GET['resp'])) {
                if ($_GET['resp'] == "sucesso") {
                    ?>

                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>SUCESSO!</strong> Blog cadastrado com sucesso!
                    </div>
                    <?php
                } else if ($_GET['resp'] == "erro") {
                    ?>

                    <div class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>ERRO!</strong> Ocorreu um erro ao cadastrar o Blog
                    </div>
                    <?php
                }
            }
            ?>

            <?php
            if (isset($_GET['respe'])) {

                if ($_GET['respe'] == "sucesso") {
                    ?>

                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>SUCESSO!</strong> Blog alterado com sucesso!
                    </div>
                    <?php
                } else if ($_GET['respe'] == "erro") {
                    ?>

                    <div class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>ERRO!</strong> Ocorreu um erro ao alterar o Blog
                    </div>
                    <?php
                }
            }
            ?>


            <?php
            if (isset($_GET['respt'])) {

                if ($_GET['respt'] == "sucesso") {
                    ?>

                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>SUCESSO!</strong> Blog excluido com sucesso!
                    </div>
                    <?php
                } else if ($_GET['respt'] == "erro") {
                    ?>

                    <div class="alert alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>ERRO!</strong> Ocorreu um erro ao excluir o Blog
                    </div>
                    <?php
                }
            }
            ?>


            <div class="row">
                <div class="col-lg-12">

                    <section class="panel">

                        <header class="panel-heading">
                            <a href="blogs.php?tipo=insert"><button class="btn btn-primary"><span class="glyphicon glyphicon-plus">
                                    </span> BLOGS</button>
                            </a>
                        </header>

                        <div class="panel-body">
                            <div class="adv-table">
                                <table  class="display table table-bordered table-striped" id="example">
                                    <thead>
                                        <tr>
                                            <th style="text-align: left;">FOTO</th>
                                            <th style="text-align: center;">NOME DO BLOG</th>                                            <th style="text-align: center;">EDITAR</th>                                            <th style="text-align: center;">EXCLUIR</th>
                                            <th style="text-align: center;">POSTADO POR</th>

                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $seleciona_dados = "SELECT *, usuario.nome as usuario,blogs.nome as blogn FROM blogs INNER JOIN usuario
                                                            ON blogs.usuario_id = usuario.usuario_id
                                                            ORDER BY blogs_id DESC";

                                        $executa_seleciona_dados = mysql_query($seleciona_dados)or die(mysql_error());

                                        $cont = 1;
                                        $cont2 = 1;
                                        while ($array_dados = mysql_fetch_array($executa_seleciona_dados)) {
                                            ?>

                                            <tr class="gradeA" style="text-align: center;">

                                                <td style="text-align: center;">
                                                    <a class="fancybox" rel="<?php echo $array_dados['blogs_id']; ?>" href="imagens/blog/<?php echo $array_dados['img']; ?>">
                                                        <img src="imagens/blog/<?php echo $array_dados['img']; ?>" height="100" alt="" />
                                                    </a>
                                                </td>

                                                <td style="text-align: center;"><?php echo $array_dados['blogn']; ?></td>                                                <td><a href="blogs.php?tipo=edit&id=<?php echo $array_dados['blogs_id']; ?>"><img src="img/editar.png" alt="" /></a></td>                                                <td><a data-toggle="modal" href="#myModal2<?php echo $cont++; ?>"><img src="img/excluir.png" alt="" /></a></td>
                                                <td><?php echo $array_dados['nome']; ?></td>
                                            </tr>

                                        <div class="modal fade" id="myModal2<?php echo $cont2++; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                        <h4 class="modal-title">Excluir Blog</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        Deseja realmente excluir este blog?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button data-dismiss="modal" class="btn btn-default" type="button">Fechar</button>
                                                        <a href="php/exclui_blog.php?id=<?php echo $array_dados['blogs_id']; ?>"><button class="btn btn-warning" type="button"> Confirmar</button></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <?php
                                    }
                                    ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <!-- page end-->
        </section>
    </section>
    <!--main content end-->

</section>

<!--main content start-->
<section id="main-content">
    <section class="wrapper">


    </section>
</section>
<!--main content end-->

<!--footer start-->
<?php include './footer.php'; ?>
<!--footer end-->


<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="assets/fancybox/source/jquery.fancybox.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script type="text/javascript" language="javascript" src="assets/advanced-datatable/media/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="assets/data-tables/DT_bootstrap.js"></script>
<script src="js/respond.min.js" ></script>


<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page only-->

<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $('#example').dataTable({
            "aaSorting": [[4, "desc"]]
        });
    });
</script>
<script type="text/javascript">
    $(function () {
        //    fancybox
        jQuery(".fancybox").fancybox();
    });

</script>

</body>
</html>
