<!--header end-->
<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<!--sidebar end-->

<script>
    $('.foto').click(function (e) {
        var f = $(this).parent().parent(),
                c = f.clone(true, true);
        c.insertAfter(f);
    });
</script>
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
                        <strong>SUCESSO!</strong> BLOG cadastrado com sucesso!
                    </div>
                    <?php
                }
            }
            ?>


            <section class="panel">

                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE BLOGS</strong></div>
                <div class="panel-body">


                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {
                            ?>

                            <form role="form" action="php/salva_blogs.php" method="POST" enctype='multipart/form-data'>

                                
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">TÍTULO</label>
                                    <input tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" name="titulo" type="text" class="form-control" data-placement="top">
                                </div>
                                
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">NOME DO BLOG</label>
                                    <input tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" name="nome_blog" type="text" class="form-control" data-placement="top">
                                </div>


                                <div class="form-group col-sm-12">

                                    <label for="exampleInputEmail1">Link do Blog</label>
                                    <input name="link_blog" id="link" tooltip="Colque aqui o link do BLOG" type="text" class="form-control" value="http://">

                                </div>



                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12 foto">
                                    <label class="col-sm-3">usar preferencialmente<br/> imagens com tam. padrão<h3 style="margin-top: -3px;"> 70 x 70 px</h3></label>
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
                                    </div>
                                </div>

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <input type="submit" class="btn btn-primary" value="SALVAR"></input>
                                </div>

                            </form>

                            <?php
                        } else if ($_GET['tipo'] == "edit") {

                            $id_blog = $_GET['id'];

                            $seleciona_dados_update = "SELECT * FROM blogs WHERE blogs_id = $id_blog";
                            $executa_seleciona_dados = mysql_query($seleciona_dados_update)or die(mysql_error());
                            $dados_update = mysql_fetch_array($executa_seleciona_dados);
                            ?>

                            <form role="form" action="php/update_blog.php" method="POST" enctype='multipart/form-data'>

                                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>

                                
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">TÍTULO</label>
                                    <input value="<?php echo $dados_update['titulo']; ?>" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" name="titulo" type="text" class="form-control" data-placement="top">
                                </div>
                                
                                <div class="form-group col-sm-12">
                                    <label for="exampleInputEmail1">NOME DO BLOG</label>
                                    <input value="<?php echo $dados_update['nome']; ?>" tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" name="nome_blog" type="text" class="form-control" data-placement="top">
                                </div>


                                <div class="form-group col-sm-12">

                                    <label for="exampleInputEmail1">Link do Blog</label>
                                    <input value="<?php echo $dados_update['link']; ?>" name="link_blog" id="link" tooltip="Colque aqui o link do BLOG" type="text" class="form-control" value="http://">

                                </div>



                                <div class="form-group col-sm-12">
                                    <hr/>
                                </div>

                                <div class="form-group col-sm-12 foto">
                                    <label class="col-sm-3">usar preferencialmente<br/> imagens com tam. padrão<h3 style="margin-top: -3px;"> 70 x 70 px</h3></label>
                                    <div class="form-group">
                                        <div class="col-md-4">
                                            <div class="fileupload fileupload-new" data-provides="fileupload">
                                                <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                                    <img src="imagens/blog/<?php echo $dados_update['img']; ?>" alt="" />
                                                    <input type="hidden" value="<?php echo $dados_update['img']; ?>" name="imagem"/>
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
                                    </div>
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

</body>
</html>
