<!-- POLITICA -->                        <div class="ot-panel-block" style="margin-bottom: 1px;">                            <div class="title-block" style=" border-bottom-color:#91268F;">                                <a href="list_noticias_editoria.php?sub=13">                                    <h2 style="color:#91268F; padding: 10px; text-transform: none; background-image: url(images/bg-listras.png);"><i class="fa fa-user" style="font-size:20px; margin-top:3px;"></i> Política</h2>                                </a>                                <span></span><a href="list_noticias_editoria.php?sub=13" class="item-button roxo" style="font-weight:600; float: right; margin-top: -15px;">+ POLÍTICA</a>                            </div>                            <div class="photo-gallery-blocks">                                <?php                                $sql_noticia_politica = "SELECT * FROM noticia WHERE sub_editoriais_id = 13                                                         AND publicar = 1                                                         ORDER BY noticia_id DESC LIMIT 0,3";                                $executa_noticia_politica = mysql_query($sql_noticia_politica)or die(mysql_error());                                while ($array_politica = mysql_fetch_array($executa_noticia_politica)) {                                    ?>                                    <!-- BEGIN .item -->                                    <div class="item">                                        <div class="item-header">                                            <a href="materias.php?idt=<?php echo $array_politica['noticia_id']; ?>" class="image-hover"><img src="admin/imagens/noticia/<?php echo $array_politica['img']; ?>" alt="" /></a>                                        </div>                                        <div class="item-content">                                            <h4 style="font-weight: 600;"><a href="materias.php?idt=<?php echo $array_politica['noticia_id']; ?>" class="roxo-ft"><?php echo $array_politica['titulo']; ?></a></h4>                                        </div>                                    </div>                                    <!-- END .item -->                                    <?php                                }                                ?>                            </div>                        </div>                        <!-- // POLITICA -->