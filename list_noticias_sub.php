<?php include './admin/conections/conexao.php'; ?>
<?php include './menu_caboco.php'; ?>
<!DOCTYPE HTML>
<!-- BEGIN html -->
<html lang = "en">
    <!-- BEGIN head -->
    <head>
        <title>Portal do Caboco</title>

        <!-- Meta Tags -->
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />

        <!-- Favicon -->
        <link rel="shortcut icon" href="images/ico-caboco.png" type="image/x-icon" />

        <!-- Stylesheets -->
        <link type="text/css" rel="stylesheet" href="css/reset.css" />
        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />
        <link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />
        <link type="text/css" rel="stylesheet" href="css/lightbox.css" />
        <link type="text/css" rel="stylesheet" href="css/shortcodes.css" />
        <link type="text/css" rel="stylesheet" href="css/custom-fonts.css" />
        <link type="text/css" rel="stylesheet" href="css/custom-colors.css" />
        <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
        <link type="text/css" rel="stylesheet" href="css/responsive.css" />
        <link type="text/css" rel="stylesheet" href="css/animate.css" />
        <link type="text/css" rel="stylesheet" href="css/dat-menu.css" />
        <!--[if lte IE 8]>
        <link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />
        <![endif]-->


        <!-- END head -->
        <style type="text/css">
            body {
                background-color: #FFF;
            }
        </style>
    </head>

<div id="fb-root"></div><script>(function (d, s, id) {        var js, fjs = d.getElementsByTagName(s)[0];        if (d.getElementById(id))            return;        js = d.createElement(s);        js.id = id;        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";        fjs.parentNode.insertBefore(js, fjs);    }(document, 'script', 'facebook-jssdk'));</script>

    <!-- BEGIN .boxed -->
    <div class="boxed">

        <!-- BEGIN .content -->
        <section class="content">



            <!-- BEGIN .wrapper -->
            <div class="wrapper">



                <!-- BEGIN .split-block -->
                <div class="split-block" style="margin-top:30px;">

                    <!-- BEGIN .main-content -->

                    <div class="main-content">


                        <!-- <div class="ot-panel-block panel-dark dark-texture"> -->
                        <div class="ot-panel-block">

                            <?php
                            $ideditoria = $_GET['edit'];
                            $subeditoria = $_GET['sub'];

                            $select_categoria = "SELECT * FROM sub_editoriais INNER JOIN editoria
                                                    ON sub_editoriais.editoria_id = editoria.editoria_id
                                                    WHERE editoria.editoria_id = $ideditoria AND sub_editoriais_id = $subeditoria";


                            $executa_select_categoria = mysql_query($select_categoria)or die(mysql_error());
                            $dados_categoria = mysql_fetch_array($executa_select_categoria);
                            ?>


                            <div class="title-block <?php echo $dados_categoria['class']; ?>">
                                <h2><a href="#" class="<?php echo $dados_categoria['class']; ?>"><?php echo $dados_categoria['nome']; ?></a> / <?php echo $dados_categoria['sub_editora']; ?></h2>
                                <br/>
                            </div>

                            <div class="blog-articles">

                                <?php
                                //PEGANDO PAGINA ATUAL
                                $p = $_GET["page"];
                                if (isset($p)) {
                                    $p = $p;
                                } else {
                                    $p = 1;
                                }

                                //DEFININDO A QUANTIDADE DE REGISTROS POR PAGINA

                                $qnt = 5;
                                $inicio = ($p * $qnt) - $qnt;



                                $select_noticia_categoria = "SELECT * FROM sub_editoriais INNER JOIN editoria
                                                             ON sub_editoriais.editoria_id = editoria.editoria_id
                                                             INNER JOIN noticia ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                             WHERE sub_editoriais.editoria_id = $ideditoria AND noticia.sub_editoriais_id = $subeditoria
                                                             ORDER BY noticia_id DESC LIMIT $inicio, $qnt";

                                $executa_noticia_categoria = mysql_query($select_noticia_categoria)or die(mysql_error());

                                function limitarTexto($texto, $limite) {
                                    $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
                                    return $texto;
                                }

                                while ($array_notcategoria = mysql_fetch_array($executa_noticia_categoria)) {
                                    ?>

                                    <!-- item categoria -->
                                    <div class="item">
                                        <div class="item-header">
                                            <a href="materias.php?idt=<?php echo $array_notcategoria['noticia_id']; ?>" class="image-hover">
                                                <img src="admin/imagens/noticia/<?php echo $array_notcategoria['img']; ?>"  width="368"  alt="" >
                                            </a>
                                        </div>
                                        <div class="item-content">

                                            <i class="fa fa-clock-o"></i>&nbsp;&nbsp; <?php echo $array_notcategoria['data_noticia']; ?>


                                            <h4><a href="materias.php?idt=<?php echo $array_notcategoria['noticia_id']; ?>" class="<?php echo $array_notcategoria['class']; ?>"><?php echo $array_notcategoria['titulo']; ?> </a></h4>

                                            <p style="text-align: justify;">
                                                <?php
                                                print(limitarTexto($array_notcategoria['texto'], $limite = 160));
                                                ?>
                                            </p>

                                        </div>
                                    </div>
                                    <div style="border-bottom: 1px solid #F1F2F2; margin: 15px;"></div>
                                    <!-- // item categoria -->
                                    <?php
                                }
                                ?>

                            </div>
                        </div>

                        <hr>
                        <div class="ot-panel-block">

                            <div class="pagination">



                                <?php
                                $sql_sub_noticia_count = "SELECT * FROM sub_editoriais INNER JOIN editoria
                                                          ON sub_editoriais.editoria_id = editoria.editoria_id
                                                          INNER JOIN noticia ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                          WHERE sub_editoriais.editoria_id = $ideditoria AND noticia.sub_editoriais_id = $subeditoria
                                                          ORDER BY noticia_id DESC";

                                $sql_query_all = mysql_query($sql_sub_noticia_count)or die(mysql_error());
                                $total_registros = mysql_num_rows($sql_query_all);
                                $pags = ceil($total_registros / $qnt);
                             
                               
                                // Número máximos de botões de paginação 
                                $max_links = 5;


                                if (isset($_GET['page'])) {

                                    if ($_GET['page'] == 1) {
                                        ?>
                                        <a class="prev page-numbers" href="list_noticias_sub.php?page=1&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria ?>"><i class="fa fa-caret-left"></i>anterior</a>

                                        <?php
                                    } else {
                                        ?>

                                        <a class="prev page-numbers" href="list_noticias_sub.php?page=<?php echo $p - 1; ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>"><i class="fa fa-caret-left"></i>anterior</a>

                                        <?php
                                    }
                                } else {
                                    ?>

                                    <a class="prev page-numbers" href="list_noticias_sub.php?page=1&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>"><i class="fa fa-caret-left"></i>anterior</a>
                                    <?php
                                }
                                ?>


                                <?php
                                for ($i = $p - $max_links; $i <= $p - 1; $i++) {

                                    if ($i <= 0) {

                                        //FAZ NADA
                                    } else {
                                        ?> 
                                        <a class="page-numbers" href="list_noticias_sub.php?page=<?php echo $i; ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>"><?php echo $i; ?></a>
                                        <?php
                                    }
                                }


                                echo $p;

                                for ($i = $p + 1; $i <= $p + $max_links; $i++) {


                                    if ($i > $pags) {

                                        //FAZ NADA
                                    } else {
                                        ?>
                                        <a class="page-numbers" href="list_noticias_sub.php?page=<?php echo $i; ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>"><?php echo $i; ?></a>

                                        <?php
                                    }
                                }



                                if (isset($_GET['page'])) {

                                    if ($_GET['page'] == $pags) {
                                        ?>
                                        <a class="next page-numbers" href="list_noticias_sub.php?page=<?php echo $pags ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>">próxima<i class="fa fa-caret-right"></i></a>

                                        <?php
                                    } else {
                                        ?>
                                        <a class="next page-numbers" href="list_noticias_sub.php?page=<?php echo $p + 1; ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>">próxima<i class="fa fa-caret-right"></i></a>

                                        <?php
                                    }
                                } else {
                                    ?>
                                    <a class="next page-numbers" href="list_noticias_sub.php?page=<?php echo $pags ?>&edit=<?php echo $ideditoria; ?>&sub=<?php echo $subeditoria; ?>">próxima<i class="fa fa-caret-right"></i></a>


                                    <?php
                                }
                                ?>




<!--                                <a class="prev page-numbers" href="#"><i class="fa fa-caret-left"></i>anterior</a>
                                <a class="page-numbers" href="#">1</a>
                                <span class="page-numbers current">2</span>
                                <a class="page-numbers" href="#">3</a>
                                <a class="page-numbers" href="#">4</a>
                                <a class="next page-numbers" href="#">próxima<i class="fa fa-caret-right"></i></a>-->
                            </div>

                        </div>


                        <!-- END .main-content -->
                    </div>




                    <?php include './coluna_lateral.php'; ?>

                    <!-- END .split-block -->
                </div>


                <!-- END .wrapper -->
            </div>

            <!-- BEGIN .content -->
        </section>

        <!-- BEGIN .footer -->
        <?php include './menu_caboco_footer.php'; ?>

        <!-- END .boxed -->
    </div>
    <!-- Scripts -->    <script type="text/javascript" src="jscript/jquery-latest.min.js"></script>    <script type="text/javascript" src="jscript/theme-scripts.js"></script>    <script type="text/javascript" src="jscript/lightbox.js"></script>    <script type="text/javascript" src="jscript/iscroll.js"></script>    <script type="text/javascript" src="jscript/modernizr.custom.50878.js"></script>    <script type="text/javascript" src="jscript/dat-menu.js"></script>    <script type="text/javascript" src="jscript/SmoothScroll.min.js"></script>    <script type="text/javascript" src="jscript/owl.carousel.min.js"></script>    <script type="text/javascript" src="jscript/script.js"></script>    <script type="text/javascript" src="jscript/instafeed.min.js"></script>    
    <script>
        jQuery(document).ready(function () {
            jQuery(".ot-slider").owlCarousel({
                items: 1,
                autoplay: true,
                nav: true,
                lazyload: true,
                responsive: true,
                dots: true,
                stopOnHover: true,
                margin: 15
            });

            jQuery(".big-pic-random .slider-items").owlCarousel({
                items: 1,
                autoplay: false,
                nav: false,
                lazyload: false,
                dots: false,
                margin: 15
            });

            jQuery(".related-articles-inherit").owlCarousel({
                items: 4,
                autoplay: false,
                nav: true,
                lazyload: false,
                dots: true,
                margin: 15,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    400: {
                        items: 2,
                        nav: false
                    },
                    700: {
                        items: 4,
                        nav: true,
                        loop: false
                    }
                }
            });
        });
    </script>

    <!-- END body -->
</body>
<!-- END html -->
</html>
