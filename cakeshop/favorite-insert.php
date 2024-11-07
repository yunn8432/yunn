<?php 
    session_start();
    require 'header.php';
    require 'menu.php'; 
?>
<body id="favorite">
    <?php
    if(isset($_SESSION['customer'])){
        $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');

        if(isset($_GET['id'])){
            $product_id=$_GET['id'];
            $customer_id=$_SESSION['customer']['id'];

            $checkQuery='SELECT COUNT(*)FROM favorite WHERE customer_id=? AND product_id=?';
            $checkStmt=$pdo->prepare($checkQuery);
            $checkStmt->execute([$customer_id, $product_id]);

            $exists=$checkStmt->fetchColumn();
        
        if($exists){ ?>
            <p class="favorite">すでにお気に入り済みです。</p>
            <p class="favorite"><button onclick="location.href='list.php'">戻る</button></p>
        <?php } else {
            $insertQuery='INSERT INTO favorite VALUES(?,?)';
            $sql=$pdo->prepare($insertQuery);
            $sql->execute([$customer_id, $product_id]);
        
    ?>
    <p class="favorite">お気に入りに商品を追加しました。</p>
    <hr>
    <?php 
        require 'favorite.php'; 
    } }
} else { ?>
        <p class="favorite">ログインしてください。</p>
    <?php } ?>
</body>
<?php require 'footer.php'; ?>