<?php
    require 'header.php';
?>  
<body id="register">
<h1>My Book List</h1>
<form action="Register-output.php" method="POST" class="form">
    <p class="reg_1_title">題名</p>
    <input type="text" name="title" required>
    <p class="reg_2_kana">題名（かな）</p>
    <input type="text" name="kana" required>
    <p class="reg_3_writer">著者名</p>
    <input type="text" name="writer" required>
    <p class="reg_4_impression">あらすじ・感想</p>
    <textarea name="impression" required></textarea>
    <p class="reg_5_button"><button>登録</button></p>
</form>

<p class="reg_6_home"><button onclick="location.href='index.php'">ホームに戻る</button></p>
</body>

<?php
    require 'footer.php';
?>