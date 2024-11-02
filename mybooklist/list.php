<?php require 'header.php'; ?>
<body id="list">
<h1>一覧</h1>
<p><button onclick="location.href='contents-input.php'">索引検索</button></p>

<hr>

<?php
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
    foreach($pdo->query('SELECT*FROM list') as $row) {
        echo '<h2><a href="detail.php?title='.$row['title'].'">'.$row['title'].'</a></h2>';
        echo '<p>'.$row['writer'].'</p>';
    }
?>
    
<p><button onclick="location.href='index.php'">ホームに戻る</button></p>
</body>
<? require 'footer.php'; ?>
