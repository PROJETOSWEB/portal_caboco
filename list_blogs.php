<?php include './admin/conections/conexao.php'; ?><?php include './menu_caboco.php'; ?>
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
            .mais_blog {
            	display: none;
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
                                <div class="title-block" style=" border-bottom-color:#F7931D;">
                                    <h2><a href="#" class="laranja-ft">lista de blogs parceiros</h2>
                                    <br/>
                                </div>
                                <div class="blog-articles">

                                    <?php
                                    $sql_blogs = "SELECT * FROM blogs ORDER BY blogs_id DESC";
                                    $executa_blogs = mysql_query($sql_blogs)or die(mysql_error());

                                    while ($lista_blogs = mysql_fetch_array($executa_blogs)) {
                                        ?>

                                        <!-- item BLOG -->
                                        <div class="item">
                                            <div class="item-header" >
                                                <a href="#" 
                                                   class="image-hover" 
                                                   style="background-image:url(admin/imagens/blog/<?php echo $lista_blogs['img']; ?>); width: 70px; height: 70px; border-radius: 70px; background-position: left top; ">
                                                </a>
                                            </div> 
                                            <div class="item-content" style="padding-top: 15px; margin-left: 70px;">
                                                <h3><a class="laranja" href="<?php echo $lista_blogs['link']; ?>" target="_blank"><?php echo $lista_blogs['titulo']; ?></a></h3>
                                                <span class="article-meta" style="font-family: Raleway;">
                                                    <a href="#" class="meta-author"><?php echo $lista_blogs['nome']; ?></a>
                                                </span>
                                            </div>
                                        </div>
                                        <!-- // item BLOG -->


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