<?php 
    session_start();
    require 'header.php';
    require 'menu.php'; 

    $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');

    if(isset($_SESSION['customer'])){
        $quary='SELECT*FROM customer WHERE id!=? and login=?';

        $sql=$pdo->prepare($quary);
        $sql->execute([$_SESSION['customer']['id'],$_POST['login']]);
    } else {
        $sql=$pdo->prepare('SELECT*FROM customer WHERE login=?');
        $sql->execute([$_POST['login']]);
    }

    $result=$sql->fetchAll();    
    
    if(empty($result)){
        if(isset($_SESSION['customer'])){
            $quary='UPDATE customer SET name=?, address=?, login=?, password=? WHERE id=?';
            $sql=$pdo->prepare($quary);
            $sql->execute([$_POST['name'],$_POST['address'],$_POST['login'],$_POST['password'],$_SESSION['customer']['id']]);

            $_SESSION['customer']=['id'=>$_SESSION['customer']['id'],'name'=>$_POST['name'],'address'=>$_POST['address'],'login'=>$_POST['login'],'password'=>$_POST['password']];?>

            <p>お客様情報を更新しました。</p>
       
       <?php } else {
            $sql=$pdo->prepare('INSERT INTO customer VALUES(null,?,?,?,?)');
            $sql->execute([$_POST['name'],$_POST['address'],$_POST['login'],$_POST['password']]);?>

            <p>お客様情報を登録しました。</p>
       
       <?php }
    } else { ?>

        <p>すでにログイン名が使用されています。変更してください。</p>

    <?php } ?>
        
        <a href="index.php">ログイン画面に戻る</a>

<body>
    
</body>
<?php require 'footer.php'; ?>