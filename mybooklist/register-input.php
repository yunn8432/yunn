<?php
    require 'header.php';
?>  
<body id="register">
<h1>My Book List</h1>
<form action="Register-output.php" method="POST" class="form">
    <p class="reg_1_title">題名<br>
    <input type="text" name="title" required></p>
    <p class="reg_2_kana">題名（かな）<br>
    <input type="text" name="kana" required></p>
    <p class="reg_3_writer">著者名<br>
    <input type="text" name="writer" required></p>
    <p class="reg_4_impression">あらすじ・感想<br>
    <textarea name="impression" required></textarea></p>

<p class="reg_5_button">
    <button style="--content: '登録';">
        <div class="left"></div>
        登録
        <div class="right"></div>
    </button>
</p>

</form>

<p class="reg_6_home"><button onclick="location.href='index.php'">ホームに戻る</button></p>
</body>

<?php
    require 'footer.php';
?>