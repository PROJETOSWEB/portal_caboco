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


            <section class="panel">

                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE SUB-EDITORIAS</strong></div>
                <div class="panel-body">


                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {
                            ?>

                            <form role="form" class=" form-validation" action="php/salva_sub_editorias.php" data-ng-submit="submitForm()" method="POST" enctype='multipart/form-data'>
                                <?php
                                $sql_editoria = "SELECT * FROM editoria WHERE nome <> 'MUNDO' AND nome <> 'POLÍTICA'";
                                $executa_sql_editoria = mysql_query($sql_editoria)or die(mysql_error());
                                ?>


                                <div class = "form-group col-lg-6">
                                    <label for = "exampleInputEmail1">ESCOLHA A EDITORIA</label>
                                    <select data-ng-model = "sub.editoria" required name = "tipo_editora" class = "form-control m-bot15">


                                        <?php
                                        while ($array_editoria = mysql_fetch_array($executa_sql_editoria)) {
                                            ?>
                                            <option value="<?php echo $array_editoria['editoria_id'] ?>"><?php echo $array_editoria['nome']; ?></option>
                                            <?php
                                        }
                                        ?>



                                    </select>
                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">NOVA SUB-EDITORIA</label>
                                    <input 
                                        data-ng-model="sub.nova" 
                                        required 
                                        name="subeditora" 
                                        tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" 
                                        name="titulo" 
                                        type="text" 
                                        class="form-control" 
                                        data-placement="top" style="text-transform: uppercase;">
                                </div>

                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <input data-ng-disabled="!canSubmit()" type="submit" class="btn btn-primary " value="SALVAR"></input>
                                </div>

                            </form>

                            <?php
                        } else if ($_GET['tipo'] == "edit") {

                            $id_sub_editoriais = $_GET['id'];
                            $seleciona_dados_update = " SELECT *, sub_editoriais.editoria_id as edit FROM sub_editoriais INNER JOIN editoria
                                                        ON sub_editoriais.editoria_id = editoria.editoria_id 
                                                        WHERE sub_editoriais_id = $id_sub_editoriais";

                            $executa_seleciona_dados = mysql_query($seleciona_dados_update)or die(mysql_error());
                            $dados_update = mysql_fetch_array($executa_seleciona_dados);


                            $ide = $dados_update['edit'];
                            $sql_edit = "SELECT * FROM editoria WHERE editoria_id <> $ide ";
                            $executa_sql_edit = mysql_query($sql_edit)or die(mysql_error());
                            ?>

                            <form role="form" class=" form-validation" action="php/update_sub_editorias.php" data-ng-submit="submitForm()" method="POST" enctype='multipart/form-data'>

                                <input type="hidden" value="<?php echo $_GET['id']; ?>" name="id"/>

                                <div class="form-group col-lg-6">
                                    <label for="exampleInputEmail1">ESCOLHA A EDITORIA</label>
                                    <select data-ng-model="sub.editoria" required name="tipo_editora" class="form-control m-bot15">

                                        <option value="<?php echo $dados_update['edit']; ?>"><?php echo $dados_update['nome']; ?></option>


                                        <?php
                                        while ($array_resposta = mysql_fetch_array($executa_sql_edit)) {
                                            ?>
                                            <option value="<?php echo $array_resposta['editoria_id']; ?>"><?php echo $array_resposta['nome']; ?></option>

                                            <?php
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="form-group col-sm-6">
                                    <label for="exampleInputEmail1">NOVA SUB-EDITORIA</label>
                                    <input 
                                        data-ng-model="sub.nova" 
                                        required 
                                        name="subeditora" 
                                        tooltip="Título do seu artigo, EVITE TÍTULOS LONGOS" 
                                        name="titulo" 
                                        type="text" 
                                        value="<?php echo $dados_update['sub_editora']; ?>"
                                        class="form-control" 
                                        data-placement="top" style="text-transform: uppercase;">
                                </div>



                                <div class="form-group col-sm-12">
                                    <hr/>
                                    <input data-ng-disabled="!canSubmit()" type="submit" class="btn btn-primary " value="SALVAR"></input>
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
