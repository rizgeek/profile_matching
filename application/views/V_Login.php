
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title><?=nama_aplikasi?></title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
        <link href="<?=base_url("assets/")?>plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="<?=base_url("assets/")?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?=base_url("assets/")?>plugins/icomoon/style.css" rel="stylesheet">
        <link href="<?=base_url("assets/")?>plugins/uniform/css/default.css" rel="stylesheet"/>
        <link href="<?=base_url("assets/")?>plugins/switchery/switchery.min.css" rel="stylesheet"/>

        
        <!-- sweat alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <!-- Theme Styles -->
        <link href="<?=base_url("assets/")?>css/space.min.css" rel="stylesheet">
        <link href="<?=base_url("assets/")?>css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <script><?=$this->session->flashdata("PESAN");?></script>
        
    
        <!-- Page Container -->
        <div class="page-container">
                <!-- Page Inner -->
                <div class="page-inner login-page">
                    <div id="main-wrapper" class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6 col-md-3 login-box">
                                <h4 class="login-title"><?=nama_aplikasi?></h4>
                                <form method="post" action="<?=base_url("Login/validasiLogin")?>">
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input required autocomplete="off" type="text" class="form-control" id="username" name="username" placeholder="Masukan Username Anda">
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input required autocomplete="off" type="password" class="form-control" id="password" name="password" placeholder="Masukan Password Anda">
                                    </div>
                                    <button type="submit"href="index.html" class="btn btn-primary">Login</button>
                                    <a onclick="lupaPassword()" href="#" class="forgot-link">Forgot password?</a>
                                </form>
                            </div>
                        </div>
                    </div>
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="<?=base_url("assets/")?>plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="<?=base_url("assets/")?>plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url("assets/")?>plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?=base_url("assets/")?>plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="<?=base_url("assets/")?>plugins/switchery/switchery.min.js"></script>
        <script src="<?=base_url("assets/")?>js/space.min.js"></script>
    </body>
</html>

<script>
    function lupaPassword() {
        Swal.fire(
            "Lupa Password ?",
            "Hubungi Admin System",
            "question"
        );
    }
</script>