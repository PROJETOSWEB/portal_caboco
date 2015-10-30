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

                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE VÍDEOS</strong></div>
                <div class="panel-body">


                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {
                            ?>

                            <form role="form" action="php/salva_videos.php" method="POST" enctype='multipart/form-data'>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input name="data" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">EDITORIA DO VÍDEO</label>
                                    <select name="editoria" class="form-control m-bot15">
                                        <option value="POLÍCIA">POLÍCIA</option>
                                        <option value="ESPORTES">ESPORTES</option>
                                        <option value="BIZARRO">BIZARRO</option>
                                    </select>
                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">CÓDIGO DO VÍDEO NO YOUTUBE</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input name="codigo" tooltip="Poste o vídeo no youtube, copie o código de 11 dígitos gerado no link do vídeo após o sinal de igual (=), conforme o modelo abaixo" type="text" name="codigo" class="form-control" placeholder="1xq0gD-DIoc">
                                    </div>
                                </div>

                                <div class=" form-group col-sm-6">
                                    <label for="exampleInputEmail1">LEGENDA DO VÍDEO</label>
                                    <textarea name="legenda" id="" class="form-control" rows="1"></textarea>
                                </div>


                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <input type="submit" class="btn btn-primary" value="SALVAR"></input>
                                </div>

                            </form>


                            <?php
                        } else if ($_GET['tipo'] == "edit") {

                            $id_videos = $_GET['id'];
                            $seleciona_dados_update = "SELECT * FROM videos WHERE videos_id = $id_videos";
                            $executa_seleciona_dados = mysql_query($seleciona_dados_update)or die(mysql_error());
                            $dados_update = mysql_fetch_array($executa_seleciona_dados);
                            ?>
                            <form role="form" action="php/update_videos.php" method="POST" enctype='multipart/form-data'>

                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">SELECIONE A DATA</label>
                                    <input value="<?php echo $dados_update['data_video']; ?>" name="data" class="form-control form-control-inline input-medium default-date-picker"  size="16" type="text" value="" />
                                </div>

                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">EDITORIA DO VÍDEO</label>
                                    <select name="editoria" class="form-control m-bot15">

                                        <?php
                                        if ($dados_update['editoria'] == "POLÍCIA") {
                                            ?>
                                            <option value="POLÍCIA">POLÍCIA</option>
                                            <option value="ESPORTES">ESPORTES</option>
                                            <option vaue="BIZARRO">BIZARRO</option>

                                            <?php
                                        } else if ($dados_update['editoria'] == "ESPORTES") {
                                            ?>
                                            <option value="ESPORTES">ESPORTES</option>
                                            <option value="POLÍCIA">POLÍCIA</option>
                                            <option vaue="BIZARRO">BIZARRO</option>

                                            <?php
                                        } else if ($dados_update['editoria'] == "BIZARRO") {
                                            ?>
                                            <option vaue="BIZARRO">BIZARRO</option>
                                            <option value="ESPORTES">ESPORTES</option>
                                            <option value="POLÍCIA">POLÍCIA</option>
                                            <?php
                                        }
                                        ?>
                                    </select>
                                </div>


                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">CÓDIGO DO VÍDEO NO YOUTUBE</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">https://www.youtube.com/watch?v=</span>
                                        <input value="<?php echo $dados_update['codigo']; ?>" name="codigo" tooltip="Poste o vídeo no youtube, copie o código de 11 dígitos gerado no link do vídeo após o sinal de igual (=), conforme o modelo abaixo" type="text" name="codigo" class="form-control" placeholder="1xq0gD-DIoc">
                                    </div>
                                </div>

                                <div class=" form-group col-sm-6">
                                    <label for="exampleInputEmail1">LEGENDA DO VÍDEO</label>
                                    <textarea name="legenda" id="" class="form-control" rows="1"><?php echo $dados_update['legenda']; ?></textarea>
                                </div>


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

<!--script for this page-->
<script src="js/form-component.js"></script>

</body>
</html>
