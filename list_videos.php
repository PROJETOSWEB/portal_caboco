<?php include './admin/conections/conexao.php'; ?><?php include './menu_caboco.php'; ?><!DOCTYPE HTML><!-- BEGIN html --><html lang = "en">    <!-- BEGIN head -->    <head>        <title>Portal do Caboco</title>        <!-- Meta Tags -->        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        <meta name="description" content="" />        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />        <!-- Favicon -->        <link rel="shortcut icon" href="images/ico-caboco.png" type="image/x-icon" />        <!-- Stylesheets -->        <link type="text/css" rel="stylesheet" href="css/reset.css" />        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />        <link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />        <link type="text/css" rel="stylesheet" href="css/lightbox.css" />        <link type="text/css" rel="stylesheet" href="css/shortcodes.css" />        <link type="text/css" rel="stylesheet" href="css/custom-fonts.css" />        <link type="text/css" rel="stylesheet" href="css/custom-colors.css" />        <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />        <link type="text/css" rel="stylesheet" href="css/responsive.css" />        <link type="text/css" rel="stylesheet" href="css/animate.css" />        <link type="text/css" rel="stylesheet" href="css/dat-menu.css" />        <!--[if lte IE 8]>        <link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />        <![endif]-->        <!-- Demo Only -->        <link type="text/css" rel="stylesheet" href="css/demo-settings.css" />        <!-- END head -->        <style type="text/css">            body {                background-color: #FFF;            }        </style>    </head>    <div id="fb-root"></div><script>(function (d, s, id) {        var js, fjs = d.getElementsByTagName(s)[0];        if (d.getElementById(id))            return;        js = d.createElement(s);        js.id = id;        js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";        fjs.parentNode.insertBefore(js, fjs);    }(document, 'script', 'facebook-jssdk'));</script>    <!-- BEGIN .boxed -->    <div class="boxed">        <!-- BEGIN .content -->        <section class="content">            <!-- BEGIN .wrapper -->            <div class="wrapper">                <!-- BEGIN .full-block -->                <div class="full-block">                    <div class="ot-panel-block">                        <div class="title-block" style=" border-bottom-color:#F7931D;">                            <h2>Múltimidia</h2>                            <span>veja os videos mais interessantes da internet</span>                        </div>                        <div class="photo-gallery-blocks">                            <?php                                                        //PEGANDO PAGINA ATUAL                            $p = $_GET["page"];                            if (isset($p)) {                                $p = $p;                            } else {                                $p = 1;                            }                            //DEFININDO A QUANTIDADE DE REGISTROS POR PAGINA                            $qnt = 9;                            $inicio = ($p * $qnt) - $qnt;                            $sql_videos = "SELECT * FROM videos order by videos_id DESC LIMIT $inicio, $qnt";                            $executa_sql_videos = mysql_query($sql_videos)or die(mysql_error());                            while ($array_videos = mysql_fetch_array($executa_sql_videos)) {                                ?>                                <!-- item ALBUM -->                                <div class="item">                                    <div class="item-header">                                        <iframe width="100%" height="200" src="https://www.youtube.com/embed/<?php echo $array_videos['codigo']; ?>" frameborder="0" allowfullscreen></iframe>                                    </div>                                    <span class="article-meta" style="font-size: 11px;">                                        <i class="fa fa-clock-o"></i><?php echo $array_videos['data_video']; ?>                                    </span>                                    <div class="item-content">                                        <h3><?php echo $array_videos['legenda']; ?></h3>                                    </div>                                    <hr/>                                </div>                                <!-- // item ALBUM -->                                <?php                            }                            ?>                        </div>                    </div>                    <div class="ot-panel-block">                        <div class="pagination">                            <?php                            $sql_sub_noticia_count = "SELECT * FROM videos order by videos_id DESC";                            $sql_query_all = mysql_query($sql_sub_noticia_count)or die(mysql_error());                            $total_registros = mysql_num_rows($sql_query_all);                            $pags = ceil($total_registros / $qnt);                            // Número máximos de botões de paginação                             $max_links = 5;                            if (isset($_GET['page'])) {                                if ($_GET['page'] == 1) {                                    ?>                                    <a class="prev page-numbers" href="list_videos.php?page=1"><i class="fa fa-caret-left"></i>anterior</a>                                    <?php                                } else {                                    ?>                                    <a class="prev page-numbers" href="list_videos.php?page=<?php echo $p - 1; ?>"><i class="fa fa-caret-left"></i>anterior</a>                                    <?php                                }                            } else {                                ?>                                <a class="prev page-numbers" href="list_videos.php?page=1"><i class="fa fa-caret-left"></i>anterior</a>                                <?php                            }                            ?>                            <?php                            // echo "<a href='list_noticias_editorias?page=1&editoria=$ideditoria' target='_self'>primeira pagina</a> ";                            for ($i = $p - $max_links; $i <= $p - 1; $i++) {                                if ($i <= 0) {                                    //FAZ NADA                                } else {                                    ?>                                     <a class="page-numbers" href="list_videos.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>                                    <?php                                    //echo "<a href='list_noticias_editorias.php?page=$i&editoria=$ideditoria' target='_self'>$i</a> ";                                }                            }                            echo $p;                            for ($i = $p + 1; $i <= $p + $max_links; $i++) {                                if ($i > $pags) {                                    //FAZ NADA                                } else {                                    ?>                                    <a class="page-numbers" href="list_videos.php?page=<?php echo $i; ?>"><?php echo $i; ?></a>                                    <?php                                }                            }                            if (isset($_GET['page'])) {                                if ($_GET['page'] == $pags) {                                    ?>                                    <a class="next page-numbers" href="list_videos.php?page=<?php echo $pags ?>">próxima<i class="fa fa-caret-right"></i></a>                                    <?php                                } else {                                    ?>                                    <a class="next page-numbers" href="list_videos.php?page=<?php echo $p + 1; ?>">próxima<i class="fa fa-caret-right"></i></a>                                    <?php                                }                            } else {                                ?>                                <a class="next page-numbers" href="list_videos.php?page=<?php echo $pags; ?>">próxima<i class="fa fa-caret-right"></i></a>                                <?php                            }                            ?>                        </div>                    </div>                    <!-- END .full-block -->                </div>                <!-- END .wrapper -->            </div>            <!-- BEGIN .content -->        </section>        <!-- BEGIN .footer -->        <?php include './menu_caboco_footer.php'; ?>        <!-- END .boxed -->    </div>    <!-- Scripts --><!-- Scripts --><script type="text/javascript" src="jscript/jquery-latest.min.js"></script><script type="text/javascript" src="jscript/theme-scripts.js"></script><script type="text/javascript" src="jscript/lightbox.js"></script><script type="text/javascript" src="jscript/iscroll.js"></script><script type="text/javascript" src="jscript/modernizr.custom.50878.js"></script><script type="text/javascript" src="jscript/dat-menu.js"></script><script type="text/javascript" src="jscript/SmoothScroll.min.js"></script><script type="text/javascript" src="jscript/owl.carousel.min.js"></script><script type="text/javascript" src="jscript/script.js"></script><script type="text/javascript" src="jscript/instafeed.min.js"></script>    <script>        jQuery(document).ready(function () {            jQuery(".ot-slider").owlCarousel({                items: 1,                autoplay: true,                nav: true,                lazyload: true,                responsive: true,                dots: true,                stopOnHover: true,                margin: 15            });            jQuery(".big-pic-random .slider-items").owlCarousel({                items: 1,                autoplay: false,                nav: false,                lazyload: false,                dots: false,                margin: 15            });            jQuery(".related-articles-inherit").owlCarousel({                items: 4,                autoplay: false,                nav: true,                lazyload: false,                dots: true,                margin: 15,                responsive: {                    0: {                        items: 1,                        nav: true                    },                    400: {                        items: 2,                        nav: false                    },                    700: {                        items: 4,                        nav: true,                        loop: false                    }                }            });        });    </script>    <!-- END body --></body><!-- END html --></html>