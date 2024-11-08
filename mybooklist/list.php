<?php require 'header.php'; ?>
<body id="list">
<h1>一覧</h1>
<p class="list"><button onclick="location.href='contents-input.php'">索引検索</button></p><hr>

<?php
    $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
    foreach($pdo->query('SELECT*FROM list') as $row) {
        echo '<h2><a href="detail.php?title='.$row['title'].'" class="hover-animation">'.$row['title'].'</a></h2>';
        echo '<p>著者：'.$row['writer'].'</p>';
    }
?>
<p class="list_home"><button onclick="location.href='index.php'">ホームに戻る</button></p>
</body>
<? require 'footer.php'; ?>
