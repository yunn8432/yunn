<?php require 'header.php'; ?>
<body id="delete">
<?php  


if(isset($_GET['title'])):
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
    $pdo->beginTransaction();

    try{
        $query='DELETE FROM kana WHERE kana_id = (SELECT list_id FROM list WHERE title=?)';
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_GET['title']]);

        $query='DELETE FROM list WHERE title=?';
        $stmt=$pdo->prepare($query);
        $stmt->execute([$_GET['title']]);

        $pdo->commit();?>

    <h1>Successed!</h1><hr>
    <h2>データを削除しました。</h2>

    <?php
    } catch(PDOException $e) {
        $pdo->rollBack();?>

        <h1>Falsed...</h1><hr>
        <h2>データ削除に失敗しました。<?= $e->getMessage(); ?></h2>
        
<?php } ?>
    

<?php endif ?>
    <p class="delete"><button onclick="location.href='list.php'">検索に戻る</button></p>
</body>

<?php require 'footer.php'; ?>