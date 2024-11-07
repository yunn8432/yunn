<?php 
    session_start();
    require 'header.php';
    require 'menu.php'; 
?>
<body id="delete">
<?php
        if(isset($_SESSION['customer'])){
        $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
        $query='DELETE FROM favorite WHERE customer_id=? AND product_id=?';

        if(isset($_GET['id'])) {
        $sql=$pdo->prepare($query);
        $sql->execute([$_SESSION['customer']['id'],$_GET['id']]); } ?>

        <p class="delete">お気に入りから削除しました。</p>
        <hr>

    <?php 
        require 'favorite.php';    
    } else { ?>
        <p class="delete">お気に入りから削除するには、ログインしてください。</p>
    <?php } ?>
    </body>
    <?php require 'footer.php'; ?>