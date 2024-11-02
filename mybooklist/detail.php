<?php require 'header.php' ?>
<body id="detail">
<?php  
    $title=0;
    if (isset($_GET['title'])) {
        $title = $_GET['title'];
    }
    
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
    $query='SELECT*FROM list WHERE title=?';

    $sql=$pdo->prepare($query);
    $sql->execute([$title]);

    if($row=$sql->fetch()){
        echo '<h1>'.$row['title'].'</h1>';
        echo '<p>著者：'.$row['writer'].'</p>';
        echo '<p>'.$row['impression'].'</p>';
    }
?>

<form action="delete.php" method="GET">
    <input type="hidden" name="title" value="<?= $row['title'] ?>">
    <p class="detail_button"><button type="submit">削除</button></p>
</form>
<p><button onclick="location.href='list.php'">一覧に戻る</button></p>
<p><button onclick="location.href='search-input.php'">検索に戻る</button></p>
</body>
<?php require 'footer.php' ?>