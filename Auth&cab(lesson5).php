<?php
require_once __DIR__ . '/functions.php';
if (isAuthorized()) {
    redirect('index');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (login($login, $password)) {
        $_SESSION['login'] = $login;
        $_SESSION['Autorized'] = true;
    }
    if ($login!="" and $password=="")
    {
        $_SESSION['Guest']=true;
        $_SESSION['NameGuest']=$login;
    }
    if ($_SESSION['Guest']==true)
        header('Location:list.php');
    if (login($login, $password)) {
        header('Location:list.php');
    } else {
        echo "Логин или пароль не верные. Авторизуйтесь или войдите как гость";
        $errors[] = 'Логин или пароль неверные';
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <title>Авторизация</title>
</head>
<body>
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">
                <div class="form-wrap">
                    <h1>Авторизация</h1>
                    <form method="POST" id="login-form" action="">
                        <div class="form-group">
                            <label for="lg" class="sr-only">Логин</label>
                            <input type="text" placeholder="Логин" name="login" id="lg" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="key" class="sr-only">Пароль</label>
                            <input type="password"  placeholder="Пароль" name="password" id="key" class="form-control">
                        </div>
                        <input type="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Войти">
                    </form>

                    <hr>
                </div>
            </div>
        </div>
    </div>
</section>
</body>
</html>
<?php
require_once __DIR__ . '/model.php';

if (isAuthorized()) {
   redirect('index');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    if (login($login, $password)) {
       $_SESSION['login'] = $login;
        $_SESSION['Autorized'] = true;
    }

    if ($login!="" and $password=="")
   {
        $_SESSION['Guest']=true;
        $_SESSION['NameGuest']=$login;
   }

    if ($_SESSION['Guest']==true)
        header('Location:list.php');

    if (login($login, $password)) {
        header('Location:list.php');
    } else {
        echo "Логин или пароль не верные. Авторизуйтесь или войдите как гость";
        $errors[] = 'Логин или пароль неверные';
    }
}
if(isset($good_id)){
$_SESSION['looked'][] = '<a title="'.$nazv.'" href="item.php?mod=cat&cat_id='.$cat.'_id&good_id='.$good_id.'"><img class="photo" src="pic/tov/sm_'.$picture.'"></a>';
 
 
$links = array_unique($_SESSION['looked']);
 
 
 
 
if (count($links)>5) {
 
 
array_shift($links );
 
 
$_SESSION['looked'] = $links;
 
 
}
 
 
 
 
//добавление
 
 
if (!in_array($new_link, $_SESSION['looked'])) {
 
 
$_SESSION['looked'][] = $new_link;
 
 
}
foreach($links as $value){
echo $value;
}
?>