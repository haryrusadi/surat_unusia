<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Login Persuratan</title>

    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <link href="images/logo_unusia.png') ?>" rel="shortcut icon">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/animations.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="plugins/font-awesome/css/font-awesome.min.css">

    <script src="src/jquery-1.11.1.min.js"></script>
    <script src="src/bootstrap.min.js"></script>
    <style>
        body {
            color: white;
            font-family: 'Oswald', sans-serif;
            letter-spacing: 1px;
            background:
            linear-gradient(27deg, #151515 5px, transparent 5px) 0 5px,
            linear-gradient(207deg, #151515 5px, transparent 5px) 10px 0px,
            linear-gradient(27deg, #222 5px, transparent 5px) 0px 10px,
            linear-gradient(207deg, #222 5px, transparent 5px) 10px 5px,
            linear-gradient(90deg, #1b1b1b 10px, transparent 10px),
            linear-gradient(#1d1d1d 25%, #1a1a1a 25%, #1a1a1a 50%, transparent 50%, transparent 75%, #242424 75%, #242424);
            background-color: #131313;
            background-size: 20px 20px;
        }
        .loginFrame {
            width: 25%;
            height: auto;
            text-align: center;
            margin: auto;
            position: absolute;
            top: 50%;
            left: 38%;
            transform: translate(0, -50%);
        }
        img.profile-img {
            width: 80%;
        }
        .lfChild {
            background-color: rgb(39,39,39);
            height: auto;
            padding-top: 15px;
        }
        .jarak {
            margin-top: 10px;
        }
        .btn {
            background-color: rgb(32, 142, 57);
            border: 1px solid rgb(249,228,15);
        }
        .copyright {
            text-align: center; font-size: 80%;
        }
        .label_indo{
            text-align: center; 
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="loginFrame">
        <img class="profile-img" src="images/logo_unusia.png">
        <p><h3 style="color:rgb(249,228,15)">SISTEM INFORMASI PERSURATAN</h3></p>
        <p><h4>UNUSIA JAKARTA</h4></p>
        
        <div class="row">
            <div class="col-md-12 lfChild">
                <form class="form-horizontal" action="aksi_login.php" method="POST">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input type="text" class="form-control" name="user" value="" placeholder="ID Pengguna" require autofocus />                                        
                    </div>
                    <div class="input-group jarak">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input type="password" class="form-control" name="pass" value="" placeholder="Kata Sandi" require>                                        
                    </div>
                    <div class="form-group jarak">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-primary btn-block"><i class="glyphicon glyphicon-log-in"></i> Masuk</button>                          
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <div class="copyright">
            &copy; Copyright 2019
           <br>Pusat Data dan Informasi
           <br>UNUSIA Jakarta
        </div>
    </div>