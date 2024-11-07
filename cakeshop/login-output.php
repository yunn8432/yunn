<?php 
    session_start();
    require 'header.php';
    require 'menu.php';
?>
<body id="login">
<?php
    unset($_SESSION['customer']);
    $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
    
    $login=$_POST['login'];
    $password=$_POST['password'];
    $query='SELECT*FROM customer WHERE login=? AND password=?';

    $sql=$pdo->prepare($query);
    $sql->execute([$login,$password]);
    
    foreach($sql as $row){
        $_SESSION['customer']=['id'=>$row['id'],'name'=>$row['name'],'address'=>$row['address'],'login'=>$row['login'],'password'=>$row['password']];
    }
    if(isset($_SESSION['customer'])){ ?>
        <p class="log">ようこそ<?= $row['name'] ?>さん。</p>
    <?php } else { ?>
        <p class="log">ユーザー名、または、パスワードが間違っています。</p>
        <p class="log_button"><button onclick="location.href='index.php'">戻る</button></p>
   <?php }
?>
</body>
<?php require 'footer.php'; ?>
    
