<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="SkyAdmin">
    <meta name="keyword" content="Sky admin, administrador de sites">
    <link rel="shortcut icon" href="img/ico-sky.png">

    <title>SKY admin 2.0</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
    <link rel="stylesheet" href="css/owl.carousel.css" type="text/css">
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
</head>

<!--sidebar end-->

<body class="login-body">

    <div class="container">



        <form method="post" class="form-signin" action="php/login.php">

            <?php
            if (isset($_GET['result'])) {

                if ($_GET['result'] == "erro") {
                    ?>

                    <div class="alert alert-block alert-danger fade in">
                        <button data-dismiss="alert" class="close close-sm" type="button">
                            <i class="fa fa-times"></i>
                        </button>
                        <strong>ERRO!</strong> Verifique o usuario e (ou) Senha."
                    </div>
                    <?php
                }
            }
            ?>




            <h2 class="form-signin-heading" style="background-image: url(img/bg-topo.png);">
                <img style="margin-left: 10px; margin-bottom: -20px;" src="img/logo-coboco.png" height="80" alt="" />
            </h2>
            <div class="login-wrap">
                <input type="text" name="usuario" class="form-control" placeholder="Usuário" autofocus>
                <input type="password" name="senha" class="form-control" placeholder="Senha">
                <label class="checkbox">
                    <span class="pull-right ">
                        <a data-toggle="modal" href="#myModal"> Esqueceu a senha?</a>

                    </span>
                </label>
                <button class="btn btn-lg btn-login btn-block" type="submit">Entrar</button>
                <hr/>
                <div class="registration" style="align-content: center;">
                    <img src="img/logo-sky-admin-footer.png" width="50%" alt="" />

                </div>

            </div>

            <!-- Modal -->
            <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header" style="background-color: #312A1F;">
                            <h4 class="modal-title">Esqueceu a senha?</h4>
                        </div>
                        <div class="modal-body">
                            <p>coloque seu email, para mandar-mos um lembrete</p>
                            <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-primary" type="button">Lembrar</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

        </form>

    </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>
</html>
