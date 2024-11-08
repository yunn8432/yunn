<?php require 'header.php'; ?>
<body id="search">
    <h1>検索</h1>
<form action="search-output.php" method="GET" class="si_form">
検索
<input type="text" name="search" placeholder="タイトル検索">
<button type="submit">本検索</button>
</form>
<hr>
<?php
    $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');

    if(isset($_GET['search']) && $_GET['search'] !== ''){
        // mb_convert_kanaで検索キーワードをカタカナに変換
        $search=mb_convert_kana($_GET['search'],'c','UTF-8');
        $search='%'.$search.'%';

        $query='SELECT list.title FROM list JOIN kana ON list.list_id = kana.kana_id WHERE (list.title LIKE ? OR ?="") AND (kana.kana LIKE ? OR ?="")';

        $sql=$pdo->prepare($query);
        $sql->execute([$search,$search]);
    } 
    else {
        $sql=$pdo->query('SELECT*FROM list');
    }
    foreach($sql as $row){
        echo '<h2><a href="detail.php?title='.htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'">'. htmlspecialchars($row['title'], ENT_QUOTES, 'UTF-8').'</a></h2>著者：'. htmlspecialchars($row['writer'],ENT_QUOTES,'UTF-8');
    }
    
    
?>

<p class="search_button"><button onclick="location.href='index.php'">ホームに戻る</button></p>
</body>
<? require 'footer.php'; ?>