<div class="ot-panel-block verde-bg">                    <div class="title-block" style=" border-bottom-color:#ED1C24;">                        <a href="list_noticias_editorias.php?editoria=6">                            <h2 style="color:#ED1C24; padding: 10px; text-transform: none; background-image: url(images/bg-listras.png);"><i class="fa fa-star" style="font-size:20px; margin-top:3px;"></i> Polícia</h2>                        </a>                        <span></span><a href="list_noticias_editorias.php?editoria=6" class="item-button vermelho" style="font-weight:600; float: right; margin-top: -15px;">+ POLÍCIA</a>                    </div>                    <div class="article-block" style="border-bottom:#CCC dotted 1px;">                        <div class="content-split">                            <?php                            $sql_policia = "SELECT * FROM noticia INNER JOIN                                                sub_editoriais ON noticia.sub_editoriais_id =sub_editoriais.sub_editoriais_id                                                INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id                                                WHERE sub_editoriais.editoria_id = 6                                                ORDER BY noticia_id DESC LIMIT 0,1";                            $executa_sql_policia = mysql_query($sql_policia)or die(mysql_error());                            $dados_policia = mysql_fetch_array($executa_sql_policia);                            ?>                            <div class="split-1-3">                                <div class="item featured">                                    <div class="item-header" style="background-image:url(admin/imagens/noticia/<?php echo $dados_policia['img']; ?>); background-position: <?php echo $dados_policia['posicao_img']; ?> top;">                                        <a href="materias.php?idt=<?php echo $dados_policia['noticia_id']; ?>" class="image-hover">                                            <div class="item-content">                                                <h4><a href="materias.php?idt=<?php echo $dados_policia['noticia_id']; ?>"><?php echo $dados_policia['titulo']; ?> </a></h4>                                            </div>                                            <img src="images/transparent-horiz-345.png" alt="" /></a>                                    </div>                                </div>                            </div>                            <div class="split-1-3">                                <?php                                $sql_policia1 = "SELECT * FROM noticia INNER JOIN                                                    sub_editoriais ON noticia.sub_editoriais_id =sub_editoriais.sub_editoriais_id                                                    INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id                                                    WHERE sub_editoriais.editoria_id = 6                                                    ORDER BY noticia_id DESC LIMIT 1,3";                                $executa_sql_policia1 = mysql_query($sql_policia1)or die(mysql_error());                                while ($dados_policia1 = mysql_fetch_array($executa_sql_policia1)) {                                    ?>                                    <div class="item">                                        <div class="item-header">                                            <a href="materias.php?idt=<?php echo $dados_policia1['noticia_id']; ?>" class="image-hover"><img src="admin/imagens/noticia/<?php echo $dados_policia1['img']; ?>" width="100"  alt="" /></a>                                        </div>                                        <div class="item-content">                                            <h4><a style="font-weight: 600;" href="materias.php?idt=<?php echo $dados_policia1['noticia_id']; ?>" class="vermelho-ft"><?php echo $dados_policia1['titulo']; ?></a></h4>                                        </div>                                    </div>                                    <?php                                }                                ?>                            </div>                            <div class="split-1-3">                                <?php                                $sql_policia2 = "SELECT * FROM noticia INNER JOIN                                                        sub_editoriais ON noticia.sub_editoriais_id =sub_editoriais.sub_editoriais_id                                                        INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id                                                        WHERE sub_editoriais.editoria_id = 6                                                        ORDER BY noticia_id DESC LIMIT 4,3";                                $executa_sql_policia2 = mysql_query($sql_policia2)or die(mysql_error());                                while ($dados_policia2 = mysql_fetch_array($executa_sql_policia2)) {                                    ?>                                    <div class="item">                                        <div class="item-header">                                            <a href="materias.php?idt=<?php echo $dados_policia2['noticia_id']; ?>" class="image-hover"><img src="admin/imagens/noticia/<?php echo $dados_policia2['img']; ?>" width="100"  alt="" /></a>                                        </div>                                        <div class="item-content">                                            <h4><a style="font-weight: 600;" href="materias.php?idt=<?php echo $dados_policia2['noticia_id']; ?>" class="vermelho-ft"><?php echo $dados_policia2['titulo']; ?></a></h4>                                        </div>                                    </div>                                    <?php                                }                                ?>                            </div>                        </div>                    </div>                </div>