<?php include './admin/conections/conexao.php'; ?><head>    <!-- Meta Tags -->    <meta http-equiv="Content-Type" content="text/html;  charset=UTF-8" />    <meta name="description" content="" />    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />    <!-- Favicon -->    <link rel="shortcut icon" href="images/ico-caboco.png" type="image/x-icon" />    <!-- Stylesheets -->    <link type="text/css" rel="stylesheet" href="css/reset.css" />    <link type="text/css" rel="stylesheet" href="css/font-awesome.min.css" />    <link type="text/css" rel="stylesheet" href="css/main-stylesheet.css" />    <link type="text/css" rel="stylesheet" href="css/lightbox.css" />    <link type="text/css" rel="stylesheet" href="css/shortcodes.css" />    <link type="text/css" rel="stylesheet" href="css/custom-fonts.css" />    <link type="text/css" rel="stylesheet" href="css/custom-colors.css" />    <link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />    <link type="text/css" rel="stylesheet" href="css/responsive.css" />    <link type="text/css" rel="stylesheet" href="css/animate.css" />    <link type="text/css" rel="stylesheet" href="css/dat-menu.css" />    <!--[if lte IE 8]>    <link type="text/css" rel="stylesheet" href="css/ie-ancient.css" />    <![endif]--></head><header class="header" style="background: url('images/bg-topo.png');">    <nav class="top-menu">        <!-- BEGIN .wrapper -->        <div class="wrapper">            <ul class="right load-responsive" rel="Top Menu">               <!-- <li><a href="#">missão</a></li>                <li><a href="#">objetivo</a></li>                <li><a href="#">expediente</a></li>-->                <li><a href="admin/index.php" target="_blank"><i class="fa fa-user" style="margin-top:5px;"></i></a></li>            </ul>            <div class="clear-float"></div>            <!-- END .wrapper -->        </div>    </nav>    <!-- BEGIN .wrapper -->    <div class="wrapper">        <div class="header-flex">            <div class="header-flex-box">                <!-- <h1><a href="index.html">MENU MOBILE</a></h1> -->                <a href="index.php"><img src="images/logo-coboco.png" alt="" /></a>            </div>            <?php            $sql_banner = "SELECT * FROM banner WHERE CURRENT_DATE <= data_final                           AND publicar = 1 AND formato = 'SUPER BANNER - HOME'                           ORDER by RAND() DESC LIMIT 0,1";                        $executa_sql_banner = mysql_query($sql_banner)or die(mysql_error());            $dados_banner = mysql_fetch_array($executa_sql_banner);            ?>            <div class="header-flex-box banner" style="max-width: 728px;">                <a href="<?php echo $dados_banner['link']; ?>" target="_blank"><img style="margin-left: 20px;" src="admin/imagens/publicidade/<?php echo $dados_banner['img']; ?>" alt="" /></a>            </div>			<?php include './tempo.php'; ?>        </div>        <!-- END .wrapper -->    </div>    <!-- <nav id="main-menu"> -->    <nav id="main-menu" class="willfix main-menu" style="border-top: 2px solid #DBDCDE; background-color: #fff;">        <!-- BEGIN .wrapper -->        <div class="wrapper">            <div class="right">                <!--<div class="menu-icon">                    <a href="https://www.facebook.com/oficialportaldocaboco" target="_blank" style="font-size:26px; "><i class="fa fa-facebook"></i></a>                </div>                <div class="menu-icon">                    <a href="#" style="font-size:26px;"><i class="fa fa-instagram"></i></a>                </div>                <div class="menu-icon">                    <a href="https://www.youtube.com/channel/UCs5oho09lc3PyXn9J1kAjjw" target="_blank" style="border-right:#CCC dotted 2px; font-size:26px; padding-right:30px;"><i class="fa fa-youtube"></i></a>                </div>-->                <div class="menu-icon">                    <a href="#"><i class="fa fa-search" style="padding-left:8px; margin-top: none;"></i></a>                    <div class="content content-search" style="background-color: #8CC63E; width: 400px;">                        <form action="list_busca.php" method="GET" style="height: 40px;" >                            <input type="search" name="pesquisa" class="head-search-input" value="" placeholder="procure sua notícia..." required>                            <input type="submit" class="button " style="background-color: #ED1C24; float: right; margin-top: -30px; " value="Buscar">                        </form>                    </div>                </div>            </div>            <ul class="load-responsive" rel="Main Menu">                <li><a href="list_noticias_editorias.php?editoria=1" class="roxo" style="border-bottom: 2px solid #91268F;"><span class="roxo">NOTÍCIAS</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                                                                        <li><a class="roxo-ft"  href="list_noticias_sub.php?edit=1&sub=18">MUNDO</a></li>                        <?php                        $sql_noticias = "SELECT * FROM sub_editoriais WHERE editoria_id = 1  AND sub_editora <> 'POLÍTICA' AND sub_editora <> 'MUNDO'";                        $executa_sql_noticias = mysql_query($sql_noticias)or die(mysql_error());                        while ($array_noticias = mysql_fetch_array($executa_sql_noticias)) {                            ?>                            <li><a class="roxo-ft"  href="list_noticias_sub.php?edit=1&sub=<?php echo $array_noticias['sub_editoriais_id']; ?>"><?php echo $array_noticias['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li><a href="list_noticias_editorias.php?editoria=3" class="azul" style="border-bottom: 2px solid #27A9E1;"><span>ESPORTES</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_esportes = "SELECT * FROM sub_editoriais WHERE editoria_id = 3";                        $executa_sql_esportes = mysql_query($sql_esportes)or die(mysql_error());                        while ($array_esportes = mysql_fetch_array($executa_sql_esportes)) {                            ?>                            <li><a class="azul-ft" href="list_noticias_sub.php?edit=3&sub=<?php echo $array_esportes['sub_editoriais_id']; ?>"><?php echo $array_esportes['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li><a href="list_noticias_editorias.php?editoria=4" class="laranja" style="border-bottom: 2px solid #F7931D;"><span>ENTRETENIMENTO</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_entretenimento = "SELECT * FROM sub_editoriais WHERE editoria_id = 4";                        $executa_sql_entretenimento = mysql_query($sql_entretenimento)or die(mysql_error());                        while ($array_entretenimento = mysql_fetch_array($executa_sql_entretenimento)) {                            ?>                            <li><a class="laranja-ft" href="list_noticias_sub.php?edit=4&sub=<?php echo $array_entretenimento['sub_editoriais_id']; ?>"><?php echo $array_entretenimento['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li><a href="list_noticias_editorias.php?editoria=5" class="verde" style="border-bottom: 2px solid #8CC63E;"><span>AMAZONAS</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_amazonia = "SELECT * FROM sub_editoriais WHERE editoria_id = 5";                        $executa_sql_amazonia = mysql_query($sql_amazonia)or die(mysql_error());                        while ($array_amazonia = mysql_fetch_array($executa_sql_amazonia)) {                            ?>                            <li><a class="verde-ft" href="list_noticias_sub.php?edit=5&sub=<?php echo $array_amazonia['sub_editoriais_id']; ?>"><?php echo $array_amazonia['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li><a href="list_noticias_editorias.php?editoria=6" class="vermelho" style="border-bottom: 2px solid #ED1C24;"><span>POLÍCIA</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_policia = "SELECT * FROM sub_editoriais WHERE editoria_id = 6";                        $executa_sql_policia = mysql_query($sql_policia)or die(mysql_error());                        while ($array_policia = mysql_fetch_array($executa_sql_policia)) {                            ?>                            <li><a class="vermelho-ft" href="list_noticias_sub.php?edit=6&sub=<?php echo $array_policia['sub_editoriais_id']; ?>"><?php echo $array_policia['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li><a href="list_noticias_editorias.php?editoria=7" class="marrom" style="border-bottom: 2px solid #A87B4F;"><span>CULTURA</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_cultura = "SELECT * FROM sub_editoriais WHERE editoria_id = 7";                        $executa_sql_cultura = mysql_query($sql_cultura)or die(mysql_error());                        while ($array_cultura = mysql_fetch_array($executa_sql_cultura)) {                            ?>                            <li><a class="marrom-ft" href="list_noticias_sub.php?edit=7&sub=<?php echo $array_cultura['sub_editoriais_id'] ?>"><?php echo $array_cultura['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li>                    <a href="list_noticias_editorias.php?editoria=8" class="amarelo-escuro" style="border-bottom: 2px solid #DABD00;"><span>RELIGIÃO</span></a>                    <ul class="sub-menu" style="font-size:12px; font-weight:600;">                        <?php                        $sql_religiao = "SELECT * FROM sub_editoriais WHERE editoria_id = 8";                        $executa_sql_religiao = mysql_query($sql_religiao)or die(mysql_error());                        while ($array_religiao = mysql_fetch_array($executa_sql_religiao)) {                            ?>                            <li><a class="amarelo-escuro-ft" href="list_noticias_sub.php?edit=8&sub=<?php echo $array_religiao['sub_editoriais_id']; ?>"><?php echo $array_religiao['sub_editora']; ?></a></li>                            <?php                        }                        ?>                    </ul>                </li>                <li>                    <a href="list_noticias_sub.php?edit=1&sub=13" class="roxo" style="border-bottom: 2px solid #91268F;">POLÍTICA</a>                  </li>				<li>                    <a href="contato.php" title="ENTRE EM CONTÁTO OU FAÇA UMA DENÚNCIA" class="preto" style="border-bottom: 2px solid #000;"><i class="fa fa-comments-o" style="font-size:25px; margin-top:3px;"></i></a>                  </li>            </ul>            <!-- END .wrapper -->        </div>    </nav>    <!-- END .header --></header>