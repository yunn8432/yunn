<?php require 'header.php'; ?>
<body id="delete">
<?php  


if(isset($_GET['title'])):
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
    $query='DELETE FROM list WHERE title=?';
    
    $sql=$pdo->prepare($query);
    $sql->execute([$_GET['title']]);
?>
    <h1>Successed!</h1>
    <h2><?= 'データを削除しました。' ?></h2>

<?php endif ?>
<form action="list.php" method="POST">
    <p><button>戻る</button></p>
</form>
</body>

<?php require 'footer.php'; ?>