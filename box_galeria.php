<!-- GALERIA DE FOTOS -->                        <div class="ot-panel-block">                            <div class="title-block" style=" border-bottom-color:#F7931D;">                                <h2 style="color:#F7931D; padding: 10px; text-transform: none; "><i class="fa fa-camera" style="font-size:20px; margin-top:3px;"></i> Galeria de fotos</h2>                                <a href="list_albuns.php" class="item-button laranja" style="font-weight:600; float: right; margin-top: -15px;">todos os álbuns</a>                            </div>                            <div class="category-review-block" style=" width: 32%; float: left;">                                <div class="mini-banner-galeria">                                    <img src="images/banners/mini-banner.jpg" alt="" />                                </div>                                <?php                                $sql_album = " SELECT nome, img, album_fotos.album_id as albumid FROM album INNER JOIN album_fotos                                               ON album.album_id = album_fotos.album_id                                               WHERE capa_album = 1                                               ORDER BY album.album_id DESC LIMIT 1,2";                                $executa_sql_album = mysql_query($sql_album)or die(mysql_error());                                while ($array_album = mysql_fetch_array($executa_sql_album)) {                                    ?>                                    <div class="item" style="float: none;">                                        <a href="album_item.php?album=<?php echo $array_album['albumid']; ?>" class="image-effect">                                            <span class="article-featured-overlay">                                                <span class="featured-text">                                                    <span class="featured-overlay-title"><?php echo $array_album['nome']; ?></span>                                                </span>                                            </span>                                            <span class="image-hover"><img src="admin/imagens/fotos/<?php echo $array_album['img']; ?>" alt="" /></span>                                        </a>                                    </div>                                    <?php                                }                                ?>                                <br/>                            </div>                            <div class="full-block" style="max-width: 63%; float: left;">                                <div class="widget">                                    <?php                                    $sql_album_principal = "SELECT nome, img, legenda, album_fotos.album_id as albumid FROM album INNER JOIN album_fotos                                                            ON album.album_id = album_fotos.album_id                                                            WHERE capa_album = 1 ORDER BY album.album_id DESC LIMIT 0,1";                                    $executa_sql_album_principal = mysql_query($sql_album_principal)or die(mysql_error());                                    $dados_princial = mysql_fetch_array($executa_sql_album_principal);                                    $albu_id = $dados_princial['albumid'];                                    ?>                                    <div class="title-block">                                        <a class="laranja" href="album_item.php?album=<?php echo $albu_id; ?>"><h5 style="font-weight: 600; text-align: center; text-transform: none;"><?php echo $dados_princial['nome']; ?></h5></a>                                    </div>                                    <div class="ot-widget-gallery">                                        <div class="item" style="margin-top: 10px;">                                            <div class="item-header">                                                <a href="album_item.php?album=<?php echo $albu_id; ?>" alt="<?php echo $dados_principal['legenda']; ?>"><img style="padding: 6px;" src="admin/imagens/fotos/<?php echo $dados_princial['img']; ?>" alt="" /></a>                                            </div>                                            <div class="item-footer">                                                <a href="#galery-left"><i class="fa fa-caret-left"></i></a>                                                <a href="#galery-right"><i class="fa fa-caret-right"></i></a>                                                <div class="item-thumbnails">                                                    <div class="item-thumbnails-inner">                                                        <?php                                                        $sql_item_fotos = "SELECT * FROM album INNER JOIN album_fotos                                                               ON album.album_id = album_fotos.album_id                                                               WHERE album_fotos.album_id = $albu_id AND capa_album = 2";                                                        $executa_sql_item_fotos = mysql_query($sql_item_fotos)or die(mysql_error());                                                        while ($dados_fotosp = mysql_fetch_array($executa_sql_item_fotos)) {                                                            ?>                                                            <a href="admin/imagens/fotos/<?php echo $dados_fotosp['img']; ?>" data-href="album_item.php?album=<?php echo $albu_id; ?>" alt="<?php echo $dados_fotosp['legenda']; ?>" class="image-hover">                                                                <img src="admin/imagens/fotos/<?php echo $dados_fotosp['img']; ?>" alt="" />                                                            </a>                                                            <?php                                                        }                                                        ?>                                                    </div>                                                </div>                                            </div>                                        </div>                                    </div>                                    <hr/>                                </div>                            </div>                        </div>                        <!-- // GALERIA DE FOTOS-->