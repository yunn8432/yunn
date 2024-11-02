<?php require 'header.php'; ?>
<body id="search">
<h1>検索結果</h1>
<hr>
<?php
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
    
    if(isset($_GET['search']) && $_GET['search'] !== ''){
        // mb_convert_kanaで検索キーワードをカタカナに変換
        $search=mb_convert_kana($_GET['search'],'c','UTF-8');
        $search='%'.$search.'%';

        $sql=$pdo->prepare('SELECT list.title, list.writer FROM list JOIN kana ON list.list_id = kana.kana_id WHERE (list.title LIKE ? OR ?="") OR (kana.kana LIKE ? OR ?="")');
        $sql->execute([$search,$search,$search,$search]);

        foreach($sql as $row){ ?>
            <h2><a href="detail.php?title=<?=$row['title']?>"><?= $row['tilte'] ?></a></h2>
            <p><?= $row['writer'] ?></p>
<?php } }

    if(empty($_GET['search'])){ ?>
        <h3>タイトルを入力してください。</h3>
        <p><button onclick="location.href='search-input.php'">検索に戻る</button></p>
<?php } ?>
</body>
<?php  require 'footer.php'; ?>