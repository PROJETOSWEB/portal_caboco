

<!--header end-->
<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<!--sidebar end-->


<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<link rel="stylesheet" type="text/css" href="assets/bootstrap-datepicker/css/datepicker.css" />
<!--main content start-->
<section id="main-content">
    <section class="wrapper">

        <div class="col-lg-10">

            <section class="panel">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE FOTOS</strong></div>
                <div class="panel-body">

                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {
                            ?>

                            <form role="form" action="php/salva_fotos.php" method="POST" enctype='multipart/form-data'>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input name="data" required class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>

                                <input type="hidden" name="album_id" value="<?php echo $_GET['album'] ?>"></input>

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <label class="col-sm-3">usar imagens com tam. padrão 627x422px.<br/> postar até 3 fotos por vez</label>
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
                                            <textarea required name="legenda" id="" class="form-control" rows="3"></textarea>
                                        </div>

                                        <div class="col-sm-5">
                                            <hr/>
                                            <label style="margin-right: 20px;" class="col-sm-4">CAPA DO ÁLBUM</label>

                                            <div class="switch switch-square"
                                                 data-on-label="<i class=' fa fa-check'></i>"
                                                 data-off-label="<i class='fa fa-times'></i>">
                                                <input name="capa" value="1" type="checkbox"/>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <!--<a href="#"><div class="col-sm-6">+ clique para adicionar mais fotos</div></a>-->

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <input type="submit" class="btn btn-primary" value="SALVAR"></input>
                                </div>

                            </form>

                            <?php
                        } else if ($_GET['tipo'] == "edit") {

                            $id_fotos = $_GET['id'];

                            $seleciona_dados_update = "SELECT * FROM album_fotos WHERE album_fotos_id = $id_fotos";
                            $executa_seleciona_dados = mysql_query($seleciona_dados_update)or die(mysql_error());
                            $dados_update = mysql_fetch_array($executa_seleciona_dados);
                            ?>

                            <form role="form" action="php/update_foto.php" method="POST" enctype='multipart/form-data'>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input required value="<?php echo $dados_update['data'] ?>" name="data" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>



                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <label class="col-sm-3">usar imagens com tam. padrão 627x422px.<br/> postar até 3 fotos por vez</label>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="imagens/fotos/<?php echo $dados_update['img']; ?>" alt="" />
                                                </div>
                                                <div class="fileupload-preview fileupload-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 20px;"></div>
                                                <div>
                                                    <span class="btn btn-white btn-file">
                                                        <span class="fileupload-new"><i class="fa fa-paper-clip"></i> selecionar imagem</span>
                                                        <span class="fileupload-exists"><i class="fa fa-undo"></i> trocar</span>
                                                        <input type="file" name="img" class="default" />
                                                        <input type="hidden" value="<?php echo $dados_update['img']; ?> "name="imagem"/>
                                                        <input type="hidden" value="<?php echo $_GET['album'] ?> "name="album"/>
                                                        <input type="hidden" value="<?php echo $_GET['id'] ?> "name="id"/>
                                                    </span>
                                                    <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload"><i class="fa fa-trash"></i> excluir</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-5">
                                            <label for="exampleInputEmail1">LEGENDA DA FOTO</label>
                                            <textarea required name="legenda" id="" class="form-control" rows="3"><?php echo $dados_update['legenda']; ?></textarea>
                                        </div>

                                        <div class="col-sm-5">
                                            <hr/>
                                            <label style="margin-right: 20px;" class="col-sm-4">CAPA DO ÁLBUM</label>
                                            <div class="switch switch-square"
                                                 data-on-label="<i class=' fa fa-check'></i>"
                                                 data-off-label="<i class='fa fa-times'></i>">
                                                <input name="capa" value="1" type="checkbox"  <?php if ($dados_update['capa_album'] == 1) echo "checked"; ?> />
                                            </div>
                                        </div>

                                    </div>
                                </div>


                                <a href="#"><div class="col-sm-6">+ clique para adicionar mais fotos</div></a>

                                <div class="form-group col-sm-12">
                                    <hr/>
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

<!--this page plugins-->

<script type="text/javascript" src="assets/fuelux/js/spinner.min.js"></script>
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>
<script type="text/javascript" src="assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="assets/ckeditor/ckeditor.js"></script>

<!--common script for all pages-->
<script src="js/common-scripts.js"></script>
<!--this page  script only-->
<script src="js/advanced-form-components.js"></script>

</body>
</html>
