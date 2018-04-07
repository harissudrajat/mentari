<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Admin Kampoeng Jelok Resto</title>
<link rel="stylesheet" href="css_login/style.default.css" type="text/css" />
</head>

<body class="loginpage" style="background:url(img/bg.png)">

<div class="loginpanel">
    <div class="loginpanelinner">
        <div class="logo animate0 bounceIn"><img src="img/logo.png" alt="" /></div>
        <form id="login" action="cek_login.php" method="post">
            <div class="inputwrapper login-alert">
                <div class="alert alert-error">Username Dan Password Masih Kosong</div>
            </div>
            <div class="inputwrapper animate1 bounceIn">
                <input type="text" name="username" id="username" placeholder="Username" />
            </div>
            <div class="inputwrapper animate2 bounceIn">
                <input type="password" name="password" id="password" placeholder="Password" />
            </div>
            <div class="inputwrapper animate3 bounceIn">
                <button name="submit">LOGIN</button>
            </div>
        </form>
    </div>
</div>

<div class="loginfooter">
    <p>Copyright 2018. Kampoeng Jelok Resto</p>
</div>

</body>
</html>
