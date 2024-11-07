<?php 
    require 'header.php'; 
    require 'menu.php';    
?>
<body id="list">
    <h1>商品一覧</h1>
    <table id="list" border="1">
        <tr><th>商品番号</th><th>商品名</th><th>価格</th><th>お気に入り</th></tr>
        
        <?php
        $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
        $query='SELECT*FROM product';
        $sql=$pdo->query($query);

        foreach($sql as $row){ ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><button onclick="location.href='favorite-insert.php?id=<?= $row['id'] ?>'">登録</button></td>
                </tr>
        <?php }?>
    </table>
</body>
<?php require 'footer.php'; ?>