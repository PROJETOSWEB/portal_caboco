<!-- BEGIN #sidebar --><aside id="sidebar" class="ot-scrollnimate" data-animation="fadeInUpSmall">    <!-- BLOGS -->    <div class="widget" class="mais_blog" style="margin-top: 10px;">        <!-- <div class="widget"> -->        <div class="title-block" style=" border-bottom-color:#F7931D;">            <h2 style="color:#000;"><i class="fa fa-comment"></i> blogs</h2>            <span></span>        </div>        <div class="article-block">            <?php            $sql_blogs = "SELECT * FROM blogs ORDER BY blogs_id DESC limit 0,4";            $executa_blogs = mysql_query($sql_blogs)or die(mysql_error());            while ($linha_blog = mysql_fetch_array($executa_blogs)) {                ?>                <div class="item">                    <div class="item-header" >                        <a href="#"                            class="image-hover"                            style="background-image:url(admin/imagens/blog/<?php echo $linha_blog['img']; ?>); width: 70px; height: 70px; border-radius: 70px; background-position: left top; ">                        </a>                    </div>                     <div class="item-content" style="padding-top: 5px;">                        <h3><a class="laranja" href="<?php echo $linha_blog['link']; ?>" target="_blank"><?php echo $linha_blog['titulo']; ?></a></h3>                        <span class="article-meta">                            <a href="#" class="meta-author"><?php echo $linha_blog['nome']; ?></a>                        </span>                    </div>                </div>                <?php            }            ?>            <a href="list_blogs.php" class="item-button">+ blogs</a>        </div>    </div>    <!-- // BLOGS -->    <?php    $sql_banner1 = "SELECT * FROM banner WHERE CURRENT_DATE <= data_final                    AND publicar = 1 AND formato = 'SQUARE BANNER - HOME'                    ORDER by RAND() DESC LIMIT 0,1";    $executa_sql_banner1 = mysql_query($sql_banner1)or die(mysql_error());    $dados_banner1 = mysql_fetch_array($executa_sql_banner1);    ?>    <!-- PUBLICIDADE -->    <div class="widget">        <div class="ot-widget-banner">            <a href="#" target="_blank"><img src="admin/imagens/publicidade/<?php echo $dados_banner1['img']; ?>" alt="" /></a>        </div>    </div>    <!-- // PUBLICIDADE -->    <!-- <div class="sidebar-fixed">fixed -->    <div class="widget">        <div class="title-block" style=" border-bottom-color:#F7931D;">            <h2 style="color:#000;">mais lidas...</h2>            <span></span>        </div>        <div class="article-block">            <?php            $sql_mais_lidas = "SELECT * FROM noticia order by cliks DESC LIMIT 0,6";            $executa_mais_lidas = mysql_query($sql_mais_lidas)or die(mysql_error());            while ($dados_mais_lidas = mysql_fetch_array($executa_mais_lidas)) {                ?>                <div class="item">                    <div class="item-header">                        <a href="materias.php?idt=<?php echo $dados_mais_lidas['noticia_id']; ?>" class="image-hover"><img src="admin/imagens/noticia/<?php echo $dados_mais_lidas['img']; ?>" width="80" alt="" /></a>                    </div>                    <div class="item-content">                        <h4><a class="<?php echo $dados_mais_lidas['class']; ?>" href="materias.php?idt=<?php echo $dados_mais_lidas['noticia_id']; ?>"><?php echo $dados_mais_lidas['titulo']; ?></a></h4>                    </div>                </div>                <?php            }            ?>            <a href="lista_mais_lidas.php" class="item-button">ver tudo ... </a>        </div>    </div>    <!--INSTAGRAM-->     <div class="widget"  style=" background-image: url(images/bg-listras.png); border-radius: 4px; padding: 10px;">        <div class="title-block" style=" border-bottom-color:#8B5E3C;">            <h2 style="color:#8B5E3C;"><i class="fa fa-instagram"></i> instagram</h2>            <span style="color:#000;">veja os mais populares e divira-se</span>        </div>        <div class="ot-widget-gallery">            <div class="item">                <ul id="instagram-feed">                </ul>            </div>        </div>    </div>     <!-- // INSTAGRAM --> <div class="sidebar-fixed">     <!--FACEBOOK-->     <div class="widget"  style=" background-image: url(images/bg-listras.png); border-radius: 4px; padding: 10px;">        <div class="title-block" style=" border-bottom-color:#1C75BC;">            <h2 style="color:#1C75BC;">facebook</h2>            <span style="color:#000;">nos siga no facebook</span>        </div>        <div class="ot-widget-gallery">            <div class="item">                <div class="fb-page" data-href="https://www.facebook.com/oficialportaldocaboco" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="false" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/oficialportaldocaboco"><a href="https://www.facebook.com/oficialportaldocaboco" target="_blank">Portal do Caboco: Do jeito da gente; simples, verdadeiro e objetivo</a></blockquote></div></div>            </div>        </div>    </div>     <!-- // FACEBOOK --></div> <!--// FIXED--> <!-- END #sidebar --></aside>