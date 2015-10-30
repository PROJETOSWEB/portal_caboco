<!--header end-->
<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<!--sidebar end-->
<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script>
    $(document).ready(function () {

        $("select[name=tipo_editoria]").change(function () {
            $("select[name=sub_categoria]").html('<option value="0">Carregando...</option>');

            $.post("php/carrega_editoria.php",
                    {editoria: $(this).val()},
            function (valor) {
                //$("select[name=valorProduto]").html(valor);
                $("select[name=sub_categoria]").html(valor);
            }
            )

        });
    });
</script>



<link rel="stylesheet" type="text/css" href="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />

<!--<script src="//tinymce.cachefly.net/4.2/tinymce.min.js"></script>-->
<!--<script>tinymce.init({selector: 'textarea',
        plugins: "image",
        image_list: [
            {title: 'My image 1', value: 'http://www.tinymce.com/my1.gif'},
            {title: 'My image 2', value: 'http://www.moxiecode.com/my2.gif'}
        ]
    });</script>-->
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="col-lg-10">

            <?php
            if (isset($_GET['respt'])) {

                if ($_GET['respt'] == "sucesso") {
                    ?>

                    <div class="alert alert-success fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>SUCESSO!</strong> Notícia cadastrada com sucesso!
                    </div>
                    <?php
                }
            }
            ?>


            <section class="panel">

                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE NOTÍCIAS</strong></div>
                <div class="panel-body">

                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {

                            $sql_editoria = "SELECT * FROM editoria WHERE nome <> 'MUNDO' AND nome <> 'POLÍTICA'";
                            $executa_sql_editoria = mysql_query($sql_editoria)or die(mysql_error());
                            ?>

                            <form role="form" action="php/salva_noticia.php" method="POST" enctype='multipart/form-data'>

                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">ESCOLHA A EDITORIA</label>

                                    <select name="tipo_editoria" class="form-control m-bot15">

                                        <option value="">selecione a editoria</option>
                                        <?php
                                        while ($row_editoria = mysql_fetch_array($executa_sql_editoria)) {
                                            ?>
                                            <option value="<?php echo $row_editoria['editoria_id'] ?>"><?php echo $row_editoria['nome']; ?></option>


                                            <?php
                                        }
                                        ?>

                                    </select>
                                </div>

                                <div class="form-group col-lg-6">

                                    <label for="exampleInputEmail1">SUB-CATEGORIA</label>

                                    <select name="sub_categoria" required="sub_categoria" class="form-control m-bot15">
                                        <option value="">1º selecione a EDITORIA</option>
                                    </select>

                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input name="data" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">FONTE da NOTÍCIA</label>
                                    <input name="fonte" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS"  type="text" class="form-control" data-placement="top">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">TÍTULO</label>
                                    <input name="titulo" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" type="text" class="form-control" data-placement="top">
                                </div>

                                <div class="form-group col-sm-12">

                                    <label for="exampleInputEmail1">TEXTO</label>
                                    <textarea name="texto" id="" class="wysihtml5 form-control" rows="20"></textarea>

                                </div>
                                <!--
                                
                                                                <div class="form-group col-sm-12">
                                
                                                                    <div class=" col-sm-9">
                                                                        <label for="exampleInputEmail1">TEXTO DO DETALHE (não é obrigatório)</label>
                                                                        <textarea name="texto_detalhe"  tooltip="se você deseja um destaque no texto, digite aqui. máx 100 caracteres" name="" id="" class="form-control" rows="7" style="border-left: 5px solid #CE8611;"></textarea>
                                                                    </div>
                                
                                                                </div>-->

                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="col-sm-3">usar preferencialmente<br/> imagens com tam. padrão<h3 style="margin-top: -3px;"> 627 x 422 px</h3></label>
                                    <div class="form-group">

                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="img/sem-imagem.png" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> selecionar imagem</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> trocar</span>
                                                        <input type="file" name="img" class="default" />
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> excluir</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <label for="exampleInputEmail1">LEGENDA DA FOTO</label>
                                            <textarea name="legenda" id="" class="form-control" rows="1"></textarea>
                                            <br/>
                                            <label for="exampleInputEmail1">ALINHAMENTO DA FOTO</label>
                                            <div class="radios">

                                                <label class="label_radio" for="radio-01">
                                                    <input name="sample-radio" id="radio-01" value="1" type="radio" checked /><img src="img/ico-alinha-esquerda.png" width="50" style="margin-right: 10px;" alt="" /> Esquerda 
                                                </label>

                                                <label class="label_radio" for="radio-02">
                                                    <input name="sample-radio" id="radio-02" value="2" type="radio" /><img src="img/ico-alinha-centro.png" width="50" style="margin-right: 10px;"  alt="" /> Centro
                                                </label>

                                                <label class="label_radio" for="radio-03">
                                                    <input name="sample-radio" id="radio-03" value="3" type="radio" /><img src="img/ico-alinha-direita.png" width="50" style="margin-right: 10px;"  alt="" /> Direita 
                                                </label>

                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                                <!--
                                                                <a href="#"><div class="col-sm-6">+ clique para adicionar mais fotos</div></a>-->

                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">CÓDIGO DO VÍDEO NO YOUTUBE</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input name="codigo" tooltip="Poste o vídeo no youtube, copie o código de 11 dígitos gerado no link do vídeo após o sinal de igual (=), conforme o modelo abaixo" type="text" name="codigo" class="form-control" placeholder="1xq0gD-DIoc">
                                    </div>
                                </div>

                                <div class=" form-group col-sm-5">
                                    <label for="exampleInputEmail1">LEGENDA DO VÍDEO</label>
                                    <textarea name="legenda_video" id="" class="form-control" rows="1"></textarea>
                                </div>

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <label for="exampleInputEmail1">TAGs</label>
                                    <input name="tagsinput" id="tagsinput" class="tagsinput" value="Notícia" />

                                </div>


                                <div class="form-group col-sm-12">

                                    <hr/>

                                    <label style="margin-right: 20px;" class="col-sm-3 col-sm-3">DESTAQUE no BANNER</label>
                                    <div class="switch switch-square"
                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">
                                        <input name="destaque" value="1" type="checkbox" />
                                    </div>

                                    <hr/>

                                    <label style="margin-right: 20px;" class="col-sm-3 col-sm-3">PUBLICAR?</label>
                                    <div class="switch switch-square"
                                         data-off-label="<i class='fa fa-times'></i>"
                                         data-on-label="<i class=' fa fa-check'></i>">
                                        <input name="publicar" value="1" type="checkbox"  checked />
                                    </div>

                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="SALVAR"></input>
                                </div>

                            </form>


                            <?php
                        } else if ($_GET['tipo'] == "edit") {

                            $id_noticia = $_GET['id'];
                             $seleciona_dados_update = "SELECT *, noticia.sub_editoriais_id as idnot FROM noticia INNER JOIN sub_editoriais
                                                       ON noticia.sub_editoriais_id = sub_editoriais.sub_editoriais_id
                                                       INNER JOIN editoria ON editoria.editoria_id = sub_editoriais.editoria_id
                                                       WHERE noticia_id = $id_noticia";

                            $executa_seleciona_dados = mysql_query($seleciona_dados_update)or die(mysql_error());
                            $dados_update = mysql_fetch_array($executa_seleciona_dados);


                            $sql_editoria = "SELECT * FROM editoria WHERE nome <> 'MUNDO' AND nome <> 'POLÍTICA'";
                            $executa_sql_editoria = mysql_query($sql_editoria)or die(mysql_error());
                            ?>

                            <form role="form" action="php/update_noticia.php" method="POST" enctype='multipart/form-data'>

                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">ESCOLHA A EDITORIA</label>

                                    <select name="tipo_editoria" class="form-control m-bot15">

                                        <option value="<?php echo $dados_update['editoria_id'] ?>"><?php echo $dados_update['nome']; ?></option>

                                        <?php
                                        while ($row_editoria = mysql_fetch_array($executa_sql_editoria)) {
                                            ?>
                                            <option value="<?php echo $row_editoria['editoria_id'] ?>"><?php echo $row_editoria['nome']; ?></option>
                                            <?php
                                        }
                                        ?>
                                    </select>


                                </div>


                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">SUB-CATEGORIA</label>


                                    <select name="sub_categoria" required="sub_categoria" class="form-control m-bot15">
                                        <option value="<?php echo $dados_update['idnot'] ?>"><?php echo $dados_update['sub_editora']; ?></option>
                                        <option value="" disabled="disabled">Selecione uma sub-categoria</option>

                                    </select>


                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input value="<?php echo $dados_update['data_noticia']; ?>" name="data" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">FONTE da NOTÍCIA</label>
                                    <input value="<?php echo $dados_update['fonte']; ?>" name="fonte" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" type="text" class="form-control" data-placement="top">
                                </div>

                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">TÍTULO</label>
                                    <input value="<?php echo $dados_update['titulo']; ?>" name="titulo" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" type="text" class="form-control" data-placement="top">
                                </div>

                                <div class="form-group col-sm-12">

                                    <label for="exampleInputEmail1">TEXTO</label>
                                    <textarea name="texto" id="" class="wysihtml5 form-control" ><?php echo $dados_update['texto']; ?></textarea>

                                </div>
                                <!--
                                
                                                                <div class="form-group col-sm-12">
                                
                                                                    <div class=" col-sm-9">
                                                                        <label for="exampleInputEmail1">TEXTO DO DETALHE (não é obrigatório)</label>
                                                                        <textarea name="texto_detalhe"  tooltip="se você deseja um destaque no texto, digite aqui. máx 100 caracteres" name="" id="" class="form-control" rows="7" style="border-left: 5px solid #CE8611;"><?php echo $dados_update['texto_detalhe']; ?></textarea>
                                                                    </div>
                                
                                                                </div>-->

                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12">
                                    <label class="col-sm-3">usar preferencialmente<br/> imagens com tam. padrão<h3 style="margin-top: -3px;"> 627 x 422 px</h3></label>
                                    <div class="form-group">

                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="imagens/noticia/<?php echo $dados_update['img']; ?>" alt="" />
                                                    <input type="hidden" name="imagem" value="<?php echo $dados_update['img']; ?>"/>
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> selecionar imagem</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> trocar</span>
                                                        <input type="file" name="img" class="default" />
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> excluir</a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-5">
                                            <label for="exampleInputEmail1">LEGENDA DA FOTO</label>
                                            <textarea name="legenda" id="" class="form-control" rows="1"><?php echo $dados_update['legenda']; ?></textarea>
                                            <br/>
                                            <label for="exampleInputEmail1">ALINHAMENTO DA FOTO</label>
                                            <div class="radios">



                                                <label class="label_radio" for="radio-01">
                                                    <input name="sample-radio" id="radio-01" value="1" type="radio" <?php
                                                    if ($dados_update['posicao_img'] == "1") {
                                                        echo "checked";
                                                    }
                                                    ?> ><img src="img/ico-alinha-esquerda.png" width="50" style="margin-right: 10px;" alt="" /> Esquerda 
                                                </label>

                                                <label class="label_radio" for="radio-02">
                                                    <input name="sample-radio" id="radio-02" value="2" type="radio" <?php
                                                    if ($dados_update['posicao_img'] == "2") {
                                                        echo "checked";
                                                    }
                                                    ?> /><img src="img/ico-alinha-centro.png" width="50" style="margin-right: 10px;"  alt="" /> Centro
                                                </label>

                                                <label class="label_radio" for="radio-03">
                                                    <input name="sample-radio" id="radio-03" value="3" type="radio" <?php
                                                    if ($dados_update['posicao_img'] == "3") {
                                                        echo "checked";
                                                    }
                                                    ?> /><img src="img/ico-alinha-direita.png" width="50" style="margin-right: 10px;"  alt="" /> Direita 
                                                </label>


                                            </div>                                    
                                        </div>
                                    </div>
                                </div>
                                <!--
                                                                <a href="#"><div class="col-sm-6">+ clique para adicionar mais fotos</div></a>-->

                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">CÓDIGO DO VÍDEO NO YOUTUBE</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input value="<?php echo $dados_update['video']; ?>" name="codigo" tooltip="Poste o vídeo no youtube, copie o código de 11 dígitos gerado no link do vídeo após o sinal de igual (=), conforme o modelo abaixo" type="text" name="codigo" class="form-control" placeholder="1xq0gD-DIoc">
                                    </div>
                                </div>

                                <div class=" form-group col-sm-5">
                                    <label for="exampleInputEmail1">LEGENDA DO VÍDEO</label>
                                    <textarea name="legenda_video" id="" class="form-control" rows="1"><?php echo $dados_update['legenda_video']; ?></textarea>
                                </div>

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <label for="exampleInputEmail1">TAGs</label>
                                    <input name="tagsinput" id="tagsinput" class="tagsinput" value="<?php echo $dados_update['tags']; ?>" />

                                </div>


                                <div class="form-group col-sm-12">

                                    <hr/>

                                    <label style="margin-right: 20px;" class="col-sm-3 col-sm-3">DESTAQUE no BANNER</label>

                                    <div class="switch switch-square"

                                         data-on-label="<i class=' fa fa-check'></i>"
                                         data-off-label="<i class='fa fa-times'></i>">

                                        <input name = "destaque" value = "1" type = "checkbox" <?php if ($dados_update['destaque_banner'] == 1) echo "checked"; ?> />


                                    </div>

                                    <hr/>

                                    <label style="margin-right: 20px;" class="col-sm-3 col-sm-3">PUBLICAR?</label>
                                    <div class="switch switch-square"

                                         data-off-label="<i class='fa fa-times'></i>"
                                         data-on-label="<i class=' fa fa-check'></i>">
                                        <input name = "publicar" value = "1" type = "checkbox" <?php if ($dados_update['publicar'] == 1) echo "checked"; ?>/>

                                    </div>

                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12">
                                    <input type="submit" class="btn btn-primary" value="SALVAR"></input>
                                </div>

                            </form>
                            <?php
                        }
                    }
                    ?>







                </div>
            </section>
        </div>

    </section>
</section>
<!--main content end-->

<!--footer start-->
<?php include './footer.php'; ?>
<!--footer end-->

</section>


<!-- js placed at the end of the document so the pages load faster -->
<script src="js/jquery.js"></script>
<script src="js/jquery-1.8.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script class="include" type="text/javascript" src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/jquery.scrollTo.min.js"></script>
<script src="js/jquery.nicescroll.js" type="text/javascript"></script>
<script src="js/jquery.sparkline.js" type="text/javascript"></script>
<script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="js/owl.carousel.js" ></script>
<script src="js/jquery.customSelect.min.js" ></script>
<script src="js/respond.min.js" ></script>
<!--custom switch-->
<script src="js/bootstrap-switch.js"></script>
<!--custom tagsinput-->
<script src="js/jquery.tagsinput.js"></script>
<!--this page plugins-->

<script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-datetimepicker/js/bootstrap-datetimepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/moment.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="assets/jquery-multi-select/js/jquery.multi-select.js"></script>
<script type="text/javascript" src="assets/jquery-multi-select/js/jquery.quicksearch.js"></script>

<!--<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>-->

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<!--this page  script only-->
<script src="js/advanced-form-components.js"></script>

<!--script for this page-->
<script src="js/form-component.js"></script>

</body>
</html>
