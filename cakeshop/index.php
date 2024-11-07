<?php require 'header.php'; ?>
<body id="index">
    <h1>Login</h1>
    <form action="login-output.php" method="POST" class="form">
    <p>ユーザー名</p>
    <input type="text" name="login" required>
    <p>パスワード</p>
    <input type="password" name="password" requireds>
    <p><a href="new-input.php">新規登録</a></p>
    <p><button>ログイン</button></p>
    </form>
</body>
<?php require 'footer.php'; ?>