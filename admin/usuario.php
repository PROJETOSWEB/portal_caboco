<!--header end-->
<?php include './header.php'; ?>
<?php include './menu.php'; ?>
<!--sidebar end-->


<link rel="stylesheet" type="text/css" href="assets/bootstrap-fileupload/bootstrap-fileupload.css" />
<!--main content start-->
<section id="main-content">

    <section class="wrapper">
        <?php
        if (isset($_GET['erro'])) {
            if ($_GET['erro'] == "senha") {
                ?>

                <div class="alert alert-danger fade in">
                    <button data-dismiss="alert" class="close close-sm" type="button">
                        <i class="fa fa-times"></i>
                    </button>
                    <strong>ERRO!</strong> Verifique as senhas!
                </div>
                <?php
            }
        }
        ?>

        <div class="col-lg-7">
            <section class="panel">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> CADASTRO DE USUÁRIOS</strong></div>
                <div class="panel-body">

                    <?php
                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "insert") {
                            ?>
                            <form role="form" action="php/salva_usuario.php" method="POST">

                                <div class="form-group">
                                    <label for="exampleInputEmail1">NOME</label>
                                    <input name="nome" id="nome"
                                           placeholder = "seu nome completo"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "200" 
                                           required
                                           type="text" 
                                           class="form-control" 
                                           data-placement="top">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">LOGIN</label>
                                    <input name="login" id="login"
                                           placeholder = "escolha um login"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "12" 
                                           required
                                           type="text" 
                                           class="form-control" 
                                           data-placement="top">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">SEU EMAIL</label>
                                    <input name="email" id="email"
                                           placeholder = "seu email"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "200" 
                                           required
                                           type="email" 
                                           class="form-control" 
                                           data-placement="top">
                                </div>

                                <div class = "form-group">
                                    <label for="exampleInputEmail1">SENHA</label>
                                    <input type = "password"
                                           name = "senha"
                                           id = "senha"
                                           required
                                           class = "form-control">

                                </div>
                                <div class = "form-group">
                                    <label for = "">CONFIRME A SENHA</label>
                                    <input type = "password"
                                           name= "password"
                                           required
                                           class = "form-control">

                                </div>

                                </br>

                                <hr/>

                                <input type="submit" class="btn btn-primary" value="SALVAR"></input>

                            </form>

                            <?php
                        }
                    }


                    if (isset($_GET['tipo'])) {

                        if ($_GET['tipo'] == "edit") {

                            $id_usuario = $_GET['id'];

                            $select_editar = "SELECT * FROM usuario WHERE usuario_id = $id_usuario";
                            $executa_select_editar = mysql_query($select_editar)or die(mysql_error());
                            $linha_editar = mysql_fetch_array($executa_select_editar);
                            ?>
                            <form role="form" action="php/update_usuario.php" method="POST">
                             <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>"/>


                                <div class="form-group">
                                    <label for="exampleInputEmail1">NOME</label>
                                    <input name="nome" id="nome"
                                           placeholder = "seu nome completo"
                                           value ="<?php echo $linha_editar['nome']; ?>"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "200" 
                                           required
                                           type ="text" 
                                           class ="form-control" 
                                           data-placement ="top">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">LOGIN</label>
                                    <input name="login" id="login"
                                           placeholder = "escolha um login"
                                           value ="<?php echo $linha_editar['login']; ?>"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "12" 
                                           required
                                           type ="text" 
                                           class ="form-control" 
                                           data-placement ="top">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">SEU EMAIL</label>
                                    <input name="email" id="email"
                                           placeholder = "seu email"
                                           data-ng-minlength = "2"
                                           data-ng-maxlength = "200" 
                                           value ="<?php echo $linha_editar['email']; ?>"
                                           required
                                           type ="email" 
                                           class ="form-control" 
                                           data-placement ="top">
                                </div>

                                <div class = "form-group">
                                    <label for="exampleInputEmail1">SENHA</label>
                                    <input type = "password"
                                           name = "senha"
                                           value ="<?php echo $linha_editar['senha']; ?>"
                                           id = "senha"
                                           required
                                           class = "form-control">

                                </div>
                                <div class = "form-group">
                                    <label for = "">CONFIRME A SENHA</label>
                                    <input type = "password"
                                           name="password"
                                           value ="<?php echo $linha_editar['senha']; ?>"
                                           required
                                           class = "form-control">

                                </div>

                                </br>

                                <hr/>

                                <input type="submit" class="btn btn-primary" value="SALVAR"></input>

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
<script type="text/javascript" src="assets/bootstrap-fileupload/bootstrap-fileupload.js"></script>



<!--common script for all pages-->
<script src="js/common-scripts.js"></script>

<!--script for this page-->
<script src="js/sparkline-chart.js"></script>
<script src="js/easy-pie-chart.js"></script>
<script src="js/count.js"></script>

<script>

    //owl carousel

    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true,
            autoPlay: true

        });
    });

    //custom select box

    $(function () {
        $('select.styled').customSelect();
    });

</script>

</body>
</html>
