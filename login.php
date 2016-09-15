<?php
echo '<html><head> <link rel="stylesheet" type="text/css" href="lepin.css">';
echo  "<h1>Sorry</h1><div class='inps'><img class='logo' src='lepin-logo.jpg' alt='lepin logo'></div><br />";
echo '</head>';


$msg = "";


if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){


  $name = $_POST['username'];
  $pass = $_POST['password'];

  //hard coded login information for ease of testing
  if ($name == 'admin' && $pass == 'admin') {

    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = 'admin';

    header('Location: home.html');
  }else {

    echo '<h1 class="wrong">Wrong username or password</h1>';
    header('Refresh: 1; URL = index.html');
  }


}else{
  header('Location: index.html');
}

include('footer.html');
?>