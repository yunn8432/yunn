<?php 
    session_start();
    require 'header.php';
    
    $name=$address=$login=$password='';

    if(isset($_SESSION['customer'])){
        $name=$_SESSION['customer']['name'];
        $address=$_SESSION['customer']['address'];
        $login=$_SESSION['customer']['login'];
        $password=$_SESSION['customer']['password'];
    }
?>
<body>
    <h1>新規登録</h1>
    <form action="new-output.php" method="POST" class="form">
        お名前
        <p><input type="text" name="name" value="<?= $name ?>"></p>
        住所
        <p><input type="text" name="address" value="<?= $address ?>"></p>
        ユーザー名
        <p><input type="text" name="login" value="<?= $login ?>"></p>
        パスワード
        <p><input type="password" name="password" value="<?= $password ?>"></p>
        <p><button>登録</button></p>
    </form>
    <p class="new"><button onclick="location.href='index.php'">ログイン画面に戻る</button></p>
</body>
<?php 
    require 'footer.php'; 
?>