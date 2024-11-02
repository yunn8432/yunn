<?php require 'header.php' ?>
<body>
<h1>一覧</h1>
<hr>
<?php
$pdo=new PDO('mysql:host=localhost;dbname=book;charset-utf8','book','password');

foreach($pdo->query('SELECT*FROM list') as $row){
    echo '<p><a href="#">'.$row['title'].'</a></p>';
    echo '<p>'.$row['writer'].'</p>';
    echo '<p>'.$row['impression'].'</p>';   
}
?>
</body>
<?php require 'footer.php' ?>