<?php
include('header.html');
$msg = "";


if (isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password'])){


  $name = $_POST['username'];
  $pass = $_POST['password'];

  if ($name == 'guest' && $pass == 'guest') {

    $_SESSION['valid'] = true;
    $_SESSION['timeout'] = time();
    $_SESSION['username'] = 'guest';

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