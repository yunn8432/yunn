<?php if(isset($_SESSION['customer'])): 
    
    $pdo=new PDO('mysql:host=localhost;dbname=xslive230801_chidori;charset=utf8','xslive230801_chi','livebusiness');
    $query='SELECT*FROM favorite INNER JOIN product ON product.id=favorite.product_id WHERE customer_id=?';

    $sql=$pdo->prepare($query);
    $sql->execute([$_SESSION['customer']['id']]);
?>

<table border="1">
    <tr>
        <th>商品番号</th>
        <th>商品名</th>
        <th>価格</th>
    </tr>

<?php 
foreach($sql as $row): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['price'] ?></td>
        <td><button onclick="location.href='delete.php?id=<?= $row['id'] ?>'">削除</button></td>
    </tr>
<?php 
    endforeach;
    endif;
?>
</table>