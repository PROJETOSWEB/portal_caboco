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
                                $ideditoria = $_GET['editoria'];

                                $sql_sub = "SELECT * FROM editoria WHERE editoria_id = $ideditoria ";

                                $executa_sql_editoria = mysql_query($sql_sub)or die(mysql_error());
                                $dados_sql_editoria = mysql_fetch_array($executa_sql_editoria);
                                ?>


                                <div class="title-block" style=" border-bottom-color:#F7931D;">
                                    <h2><a href="#" class="<?php echo $dados_sql_editoria['class']; ?>"><?php echo $dados_sql_editoria['nome']; ?></a> </h2>
                                    <br/>
                                </div>


                                <div class="blog-articles">

                                    <?php
                                    $sql_sub_noticia = "SELECT * FROM noticia INNER JOIN
                                                        sub_editoriais ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                        INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id
                                                        WHERE editoria.editoria_id = $ideditoria ORDER BY noticia_id DESC";


                                    $executa_sub_noticia = mysql_query($sql_sub_noticia)or die(mysql_error());

                                    function limitarTexto($texto, $limite) {
                                        $texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' ')) . '...';
                                        return $texto;
                                    }

                                    while ($array_sub_categoria = mysql_fetch_array($executa_sub_noticia)) {
                                        ?>
                                        <!-- item categoria -->
                                        <div class="item">
                                          
                                            <div class="item-header">
                                                <a href="materias.php?idt=<?php echo $array_sub_categoria['noticia_id']; ?>" class="image-hover">
                                                    <img src="admin/imagens/noticia/<?php echo $array_sub_categoria['img']; ?>"  width="368"  alt="" >
                                                </a>
                                            </div>
                                            
                                            <div class="item-content">
                                            <p style="float: left; margin-right: 25px; font-weight: 600;"><?php echo $array_sub_categoria['sub_editora'];?><p> <!-- SUB-EDITORIA AQUI -->
                                                <i class="fa fa-clock-o"></i>&nbsp;&nbsp; <?php echo $array_sub_categoria['data_noticia']; ?>
                                                
                                                <h4><a href="materias.php?idt=<?php echo $array_sub_categoria['noticia_id']; ?>" class="<?php echo $array_sub_categoria['class']; ?>"><?php echo $array_sub_categoria['titulo']; ?></a></h4>

                                                <p>
                                                    <?php print(limitarTexto($array_sub_categoria['texto'], $limite = 160)); ?>
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
                                <a class="prev page-numbers" href="#"><i class="fa fa-caret-left"></i>anterior</a>
                                <a class="page-numbers" href="#">1</a>
                                <span class="page-numbers current">2</span>
                                <a class="page-numbers" href="#">3</a>
                                <a class="page-numbers" href="#">4</a>
                                <a class="next page-numbers" href="#">próxima<i class="fa fa-caret-right"></i></a>
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