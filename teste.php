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

    <!-- BEGIN body -->
    <body>

        <!-- BEGIN .header -->


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
                                <div class="title-block" style=" border-bottom-color:#8CC63E;">
                                    <h2><a href="#" class="verde-ft">mais lidas do portal </a></h2>
                                    <br/>
                                </div>
                                <div class="blog-articles">

                                    <?php
                                  
                                    $p = $_GET["page"];
                                    if (isset($p)){$p = $p;}else{$p = 1;}

                                  
                                    $qnt = 5;
                                    $inicio = ($p * $qnt) - $qnt;



                                    $sql_noticias_mais = "SELECT * FROM noticia INNER JOIN sub_editoriais
                                                          ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                          INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id order by cliks DESC LIMIT $inicio, $qnt";

                                    $executa_sql_noticias_mais = mysql_query($sql_noticias_mais)or die(mysql_error());

                                    function limitarTexto($texto, $limite){$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...'; return $texto;}

                                    while ($mais_lidas = mysql_fetch_array($executa_sql_noticias_mais)) {
                                        ?>
                                        <!-- item categoria -->
                                        <div class="item">
                                            <span class="article-meta" style="font-size: 13px; float: left; margin-right: 20px;">
                                                <i></i> <?php echo $mais_lidas['nome']; ?> 
                                            </span>
                                            <span class="article-meta" style="font-size: 11px;">
                                                <i class="fa fa-clock-o"></i>&nbsp;&nbsp;<?php echo $mais_lidas['data_noticia']; ?>
                                            </span>
                                            <div class="item-content" style="margin-left: 5px;">
                                                <h4><a href="post.html" class="<?php echo $mais_lidas['class']; ?>"><?php echo $mais_lidas['titulo']; ?> </a></h4>

                                                <p>
                                                    <?php print(limitarTexto($mais_lidas['texto'], $limite = 250)); ?>
                                                </p>


                                            </div>
                                        </div>
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
                                    $sql_sub_noticia_count = "SELECT * FROM noticia INNER JOIN sub_editoriais
                                                              ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                              INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id order by cliks DESC";


                                    $sql_query_all = mysql_query($sql_sub_noticia_count)or die(mysql_error());
                                    $total_registros = mysql_num_rows($sql_query_all);
                                    $pags = ceil($total_registros / $qnt);

                                 
                                    $max_links = 5;


                                    if (isset($_GET['page'])) {


                                        if ($_GET['page'] == 1) {
                                            ?>
                                            <a class="prev page-numbers" href="list_mais_lidas.php?page=1"><i class="fa fa-caret-left"></i>anterior</a>

                                            <?php
                                        } else {
                                            ?>

                                            <a class="prev page-numbers" href="list_mais_lidas.php?page=<?php echo $p - 1; ?>"><i class="fa fa-caret-left"></i>anterior</a>

                                            <?php
                                        }
                                    } else {
                                        ?>

                                        <a class="prev page-numbers" href="list_mais_lidas.php?page=1"><i class="fa fa-caret-left"></i>anterior</a>
                                        <?php
                                    }
                                    ?>


                                    <?php
                                    for ($i = $p - $max_links; $i <= $p - 1; $i++) {

                                        if ($i <= 0) {

                                            
                                        } else {
                                            ?> 
                                            <a class="page-numbers" href="list_mais_lidas.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                            <?php
                                        }
                                    }


                                    echo $p;

                                    for ($i = $p + 1; $i <= $p + $max_links; $i++) {


                                        if ($i > $pags) {

                                           
                                        } else {
                                            ?>
                                            <a class="page-numbers" href="list_mais_lidas.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>

                                            <?php
                                           
                                        }
                                    }



                                    if (isset($_GET['page'])) {

                                        if ($_GET['page'] == $pags) {
                                            ?>
                                            <a class="next page-numbers" href="list_mais_lidas.php?page=<?php echo $pags ?>">pr�xima<i class="fa fa-caret-right"></i></a>

                                            <?php
                                        } else {
                                            ?>
                                            <a class="next page-numbers" href="list_mais_lidas.php?page=<?php echo $p + 1; ?>">pr�xima<i class="fa fa-caret-right"></i></a>

                                            <?php
                                        }
                                    } else {
                                        ?>
                                        <a class="next page-numbers" href="list_noticias_editorias.php?page=<?php echo $pags; ?>">pr�xima<i class="fa fa-caret-right"></i></a>


                                        <?php
                                    }
                                    ?>

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

        <!-- Scripts -->
        <script type="text/javascript" src="jscript/jquery-latest.min.js"></script>
        <script type="text/javascript" src="jscript/theme-scripts.js"></script>
        <script type="text/javascript" src="jscript/lightbox.js"></script>
        <script type="text/javascript" src="jscript/iscroll.js"></script>
        <script type="text/javascript" src="jscript/modernizr.custom.50878.js"></script>
        <script type="text/javascript" src="jscript/dat-menu.js"></script>
        <script type="text/javascript" src="jscript/SmoothScroll.min.js"></script>
        <script type="text/javascript" src="jscript/owl.carousel.min.js"></script>
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