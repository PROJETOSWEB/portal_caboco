<?php include './admin/conections/conexao.php'; ?><?php include './menu_caboco.php'; ?><!DOCTYPE HTML><!-- BEGIN html --><html lang = "en">    <!-- BEGIN head -->    <head>        <title>Portal do Caboco</title>        <!-- Meta Tags -->        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />        <meta name="description" content="" />        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />        <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />        <!-- Favicon -->        <link rel="shortcut icon" href="images/ico-caboco.png" type="image/x-icon" />        <!-- Stylesheets -->        <link type="text/css" rel="stylesheet" href="css/reset.css" />        <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />        <link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />        <link type="text/css" rel="stylesheet" href="css/lightbox.css" />        <link type="text/css" rel="stylesheet" href="css/shortcodes.css" />        <link type="text/css" rel="stylesheet" href="css/custom-fonts.css" />        <link type="text/css" rel="stylesheet" href="css/custom-colors.css" />        <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />        <link type="text/css" rel="stylesheet" href="css/responsive.css" />        <link type="text/css" rel="stylesheet" href="css/animate.css" />        <link type="text/css" rel="stylesheet" href="css/dat-menu.css" />        <!--[if lte IE 8]>        <link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />        <![endif]-->        <!-- END head -->        <style type="text/css">            body {                background-color: #FFF;            }        </style>    </head>    <div id="fb-root"></div>    <script>(function (d, s, id) {            var js, fjs = d.getElementsByTagName(s)[0];            if (d.getElementById(id))                return;            js = d.createElement(s);            js.id = id;            js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.5";            fjs.parentNode.insertBefore(js, fjs);        }(document, 'script', 'facebook-jssdk'));</script>    <!-- BEGIN .boxed -->    <div class="boxed">        <!-- BEGIN .content -->        <section class="content">            <!-- BEGIN .wrapper -->            <div class="wrapper">                <!-- BEGIN .split-block -->                <div class="split-block" style="margin-top:30px;">                    <!-- BEGIN .main-content -->                    <div class="main-content">                        <!-- <div class="ot-panel-block panel-dark dark-texture"> -->                        <div class="ot-panel-block">                            <?php                            $http_client_ip = $_SERVER['HTTP_CLIENT_IP'];                            $http_x_forwarded_for = $_SERVER['HTTP_X_FORWARDED_FOR'];                            $remote_addr = $_SERVER['REMOTE_ADDR'];                            /* VERIFICO SE O IP REALMENTE EXISTE NA INTERNET */                            if (!empty($http_client_ip)) {                                $ip = $http_client_ip;                                /* VERIFICO SE O ACESSO PARTIU DE UM SERVIDOR PROXY */                            } elseif (!empty($http_x_forwarded_for)) {                                $ip = $http_x_forwarded_for;                            } else {                                /* CASO EU NÃO ENCONTRE NAS DUAS OUTRAS MANEIRAS, RECUPERO DA FORMA TRADICIONAL */                                $ip = $remote_addr;                            }                            $idnoticia = $_GET['idt'];                            $Sql_seleciona_contador = "SELECT cliks FROM noticia WHERE noticia_id = $idnoticia";                            $executa_seleciona_contador = mysql_query($Sql_seleciona_contador)or die(mysql_error());                            $dado = mysql_fetch_array($executa_seleciona_contador);                            $contador = $dado['cliks'] + 1;                            $update_contador = "UPDATE noticia SET cliks = $contador WHERE noticia_id = $idnoticia ";                            $executa_update_contador = mysql_query($update_contador)or die(mysql_error());                            $sql_noticia = "SELECT sub_editoriais.sub_editoriais_id as subid, titulo, img, class, texto, sub_editora, nome, fonte, video, legenda_video, tags, data_noticia, legenda FROM noticia INNER JOIN sub_editoriais                                            ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id                                            INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id                                            WHERE noticia_id = $idnoticia";                            $executa_sql_noticiam = mysql_query($sql_noticia)or die(mysql_error());                            $dados_materias = mysql_fetch_array($executa_sql_noticiam);                            ?>                            <div class="title-block" style=" border-bottom-color:#F7931D;">                                <h4 class="<?php echo $dados_materias['class']; ?>"><?php echo $dados_materias['nome']; ?> / <?php echo $dados_materias['sub_editora']; ?> </h4>                                <br/>                            </div>                            <br/>                            <div class="shortcode-content">                                <div class="article-header">                                    <h1 style="line-height: 50px;"><?php echo $dados_materias['titulo']; ?></h1>                                    <br/>                                    <br/>                                    <div class="wp-caption aligncenter">                                        <img class="size-thumbnail" alt="" src="admin/imagens/noticia/<?php echo $dados_materias['img']; ?>" width="100%" />                                        <p class="wp-caption-text" style="text-align: center; color: #A7A9AC;"><?php echo $dados_materias['legenda']; ?></p>                                    </div>                                    <?php                                    if ($dados_materias['video'] <> "") {                                        ?>                                        <div class="wp-caption aligncenter">                                            <iframe width="100%" height="400" src="https://www.youtube.com/embed/<?php echo $dados_materias['video']; ?>" frameborder="0" allowfullscreen></iframe>                                            <p class="wp-caption-text" style="text-align: center; color: #A7A9AC; margin-top: 10px;"><?php echo $dados_materias['legenda_video']; ?></p>                                        </div>                                        <?php                                    }                                    ?>                                    <div class="article-header-meta">                                        <div class="right">                                            <span class="article-meta-block"><i class="fa fa-text-height"></i>aumente a fonte <a href="#" class="font-meta-down">-</a><span class="font-meta-num">16</span><a href="#" class="font-meta-up">+</a></span>                                        </div>                                        <div class="fb-like"></div>                                        <p class="article-meta-block"><i class="fa fa-clock-o"></i><?php echo $dados_materias['data_noticia']; ?></p>                                    </div>                                </div>                                <p style="text-align: justify; color: #000;" ><?php echo $dados_materias['texto']; ?> </p><br/>                                <?php                                $valort = count($array = explode(",", $dados_materias['tags']));                                ?>                                <div class = "tags-cats">                                    <div class = "right tags-cats-tags">                                        <span><i class = "fa fa-tags"></i> Tags</span>                                        <?php                                        for ($i = 0; $i <= $valort; $i++) {                                            ?>                                            <?php print $array[$i]; ?>,                                            <?php                                        }                                        ?>                                    </div>                                    <div class="tags-cats-cats">                                        <span><i class="fa fa-user"></i> FONTE: </span>                                        <?php echo $dados_materias['fonte']; ?>                                    </div>                                </div>                                <br/>                                <hr/>                                <br/>                                <!--<div class="fb-comments" data-href="https://www.facebook.com/oficialportaldocaboco" data-width="100%" data-numposts="10"></div>                                <div class="about-author"></div>-->                            </div>                        </div>                        <div class="ot-panel-block">                            <div class="title-block">                                <h3 style="color: #000;">leia mais notícias de <?php echo $dados_materias['sub_editora']; ?>  </h3>                                <br/>                            </div>                            <div class="related-articles">                                <div class="related-articles-inherit">                                    <?php                                    $id_sub = $dados_materias['subid'];                                    $sql_relacionadas = "SELECT * FROM noticia"                                            . " INNER JOIN sub_editoriais ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id "                                            . " INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id"                                            . " WHERE noticia.sub_editoriais_id = $id_sub"                                            . " AND noticia_id <> $idnoticia ORDER BY noticia_id DESC LIMIT 0,4 ";                                    $executa_sql_relacionadas = mysql_query($sql_relacionadas)or die(mysql_error());                                    while ($dados_relacionadas = mysql_fetch_array($executa_sql_relacionadas)) {                                        ?>                                        <div class="item">                                            <a href="materias.php?idt=<?php echo $dados_relacionadas['noticia_id']; ?>" class="image-hover-main">                                                <img src="admin/imagens/noticia/<?php echo $dados_relacionadas['img']; ?>" width="100%" alt="" /></span>                                                <strong class="<?php echo $dados_relacionadas['class']; ?>" style="text-transform: none;"><?php echo $dados_relacionadas['titulo']; ?></strong>                                            </a>                                        </div>                                        <?php                                    }                                    ?>                                </div>                            </div>                        </div>                        <!-- END .main-content -->                    </div>                    <!-- BEGIN #sidebar -->                    <?php include './coluna_lateral.php'; ?>                    <!-- END .split-block -->                </div>                <!-- END .wrapper -->            </div>            <!-- BEGIN .content -->        </section>        <!-- BEGIN .footer -->        <?php include './menu_caboco_footer.php'; ?>        <!-- END .boxed -->    </div><!-- Scripts --><script type="text/javascript" src="jscript/jquery-latest.min.js"></script><script type="text/javascript" src="jscript/theme-scripts.js"></script><script type="text/javascript" src="jscript/lightbox.js"></script><script type="text/javascript" src="jscript/iscroll.js"></script><script type="text/javascript" src="jscript/modernizr.custom.50878.js"></script><script type="text/javascript" src="jscript/dat-menu.js"></script><script type="text/javascript" src="jscript/SmoothScroll.min.js"></script><script type="text/javascript" src="jscript/owl.carousel.min.js"></script><script type="text/javascript" src="jscript/script.js"></script><script type="text/javascript" src="jscript/instafeed.min.js"></script>    <script>        jQuery(document).ready(function () {            jQuery(".ot-slider").owlCarousel({                items: 1,                autoplay: true,                nav: true,                lazyload: true,                responsive: true,                dots: true,                stopOnHover: true,                margin: 15            });            jQuery(".big-pic-random .slider-items").owlCarousel({                items: 1,                autoplay: false,                nav: false,                lazyload: false,                dots: false,                margin: 15            });            jQuery(".related-articles-inherit").owlCarousel({                items: 4,                autoplay: false,                nav: true,                lazyload: false,                dots: true,                margin: 15,                responsive: {                    0: {                        items: 1,                        nav: true                    },                    400: {                        items: 2,                        nav: false                    },                    700: {                        items: 4,                        nav: true,                        loop: false                    }                }            });        });    </script>    <!-- END body --></body><!-- END html --></html>