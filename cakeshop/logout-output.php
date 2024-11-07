<?php 
    session_start();
    require 'header.php';
    require 'menu.php';
?>
<body id="logout"> 
<?php
if(isset($_SESSION['customer'])) {
    unset($_SESSION['customer']); ?>

    <p class="logout">ログアウトしました。</p>

<?php } else { ?>
    <p class="logout">すでにログアウトしています。</p>
<?php }
?>
<p class="logout"><button onclick="location.href='index.php'">ログイン画面に戻る</button></p>
</body>
<?php require 'footer.php'; ?>
