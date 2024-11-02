<?php require 'header.php'; ?>
<body>

<?php
    if(empty($_POST['title']) || empty($_POST['kana']) || empty($_POST['writer']) || empty($_POST['impression'])){ ?>
            <h1><?='Falsed...'?></h1>
            <p><?='すべて入力してください。'?></p>
<?php 
    exit;
    } else {
        $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');

        $title=htmlspecialchars($_POST['title'],ENT_QUOTES,'UTF-8');
        $kana=htmlspecialchars($_POST['kana'],ENT_QUOTES,'UTF-8');
        $writer=htmlspecialchars($_POST['writer'],ENT_QUOTES,'UTF-8');
        $impression=htmlspecialchars($_POST['impression'],ENT_QUOTES,'UTF-8');

        $check=$pdo->prepare('SELECT list.title FROM list JOIN kana ON list.list_id = kana.kana_id WHERE list.title=? AND list.writer=? AND kana.kana=?');
        $check->execute([$title,$writer,$kana]);
    }
    if($check->rowCount()>0) {
        $update=$pdo->prepare('UPDATE list SET impression=? WHERE title=? AND writer=?');
        $update->execute([$impression,$title,$writer]);
        
        $list_id=$pdo->lastInsertId('list');
?>
        <h1><?= 'Successed!' ?></h1>
        <h2 class="reg_7_uodate"><?= '更新が完了しました！' ?></h2>
<?php 
    } else {
    $insertlist=$pdo->prepare('INSERT INTO list(title,writer,impression) VALUES(?,?,?)');
    $insertlist->execute([$title,$writer,$impression]);

    $list_id=$pdo->lastInsertId();

    $insertkana=$pdo->prepare('INSERT INTO kana (kana_id, kana) VALUES (?,?)');
    $insertkana->execute([$list_id, $kana]);
?>
        <h1><?= 'Successed!' ?></h1>
        <h2 class="reg_8_registration"><?= '登録完了しました！' ?></h2>
<?php } ?>

<form action="register-input.php" method="POST">
    <p class="reg_9_home"><button>戻る</button></p>
</form>
</body>
<?php require 'footer.php'; ?>