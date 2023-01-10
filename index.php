<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Survey Kepuasan Pelanggan</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/blog-post.css" rel="stylesheet">


</head>

<body background="">

    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">E-PROCUREMENT</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#login" data-toggle="modal"><button class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-log-in"></span> Masuk</button></a></li>
                    <li><a href="#daftar" data-toggle="modal"><button class="btn btn-success btn-sm"><span class="glyphicon glyphicon-user"></span> Daftar</button></a></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <div class="container">

        <div class="panel panel-default">
            <div class="panel-body" style="background-color:#e6e6e6;">
                <div class="col-lg-12">
                    <img class="img-responsive" src="./images/logo.png" alt="" style="height:300px;width:1290px">
                    <hr>
                </div>
                <div class="col-lg-12">
                    <p align="center" style="background-color:black; color:white;">
                        <font size="5">PENGUKURAN KUALITAS PERANGKAT LUNAK WEBSITE E-PROCUREMENT</font>
                    </p>
                </div>
            </div>
        </div>

    </div>
    <nav class="navbar navbar-inverse navbar-absolut-bottom" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="modal fade" id="login">
        <form name="login" action="./adminweb/cek_login.php" method="POST" onSubmit="return validasi(this)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" bgcolor="black">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">
                            <center>
                                <h4>Login E-Procurement</h4>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>

                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class=" control-label col-sm-3"></label>
                                <div class="col-sm-1">
                                    <button class="btn btn-primary" type="submit"><span class="glyphicon glyphicon-log-in"></span> Masuk</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>Copyright &copy; 2023<br> All rights reserved.</center>
                        <center>Created by Achmad Maulana Syaifullah.</center>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- Daftar Modal -->
    <div class="modal fade" id="daftar">
        <form name="login" action="./adminweb/aksi_daftar.php" method="POST" onSubmit="return validasi(this)">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header" bgcolor="black">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <div class="modal-title">
                            <center>
                                <h4>Daftar Akun E-Procurement</h4>
                            </center>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="form-horizontal">
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Username</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-user"></span>
                                        </div>
                                        <input type="text" class="form-control" name="username" placeholder="Username">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-5">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <span class="glyphicon glyphicon-lock"></span>

                                        </div>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class=" control-label col-sm-3"></label>
                                <div class="col-sm-2">
                                    <button class="btn btn-success" type="submit"><span class="glyphicon glyphicon-user"></span> Daftar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <center>Copyright &copy; 2023<br> All rights reserved.</center>
                        <center>Created by Achmad Maulana Syaifullah.</center>
                    </div>
                </div>
            </div>
        </form>
    </div>


    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>