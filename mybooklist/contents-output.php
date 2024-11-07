<?php require 'header.php'; ?>
<body id="contents">
<h1>一覧</h1>
<hr>

<?php
$pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
    
    $select_kana=isset($_GET['index']) ? $_GET['index'] : '';

    if($select_kana){
        $quary="SELECT list.title title, list.writer , kana.kana FROM list JOIN kana ON list.list_id=kana.kana_id WHERE kana.kana Like :kana_prefix ORDER BY kana.kana ASC";
        // :kana_prefix  

        $stml=$pdo->prepare($quary);
        $stml->execute(['kana_prefix' => $select_kana.'%']);
        $result=$stml->fetchall();

        
    }
    foreach($result as $row){
        echo '<h2><a href="detail.php?title='. $row['title'].'">'. $row['title'].'</a></h2>';
        echo '<p>著者：'.$row['writer'].'</p>';
    }
?>
<p><input type="button" value="索引に戻る" onclick="location.href='contents-input.php'"></p>
</body>
<?php require 'footer.php'; ?>