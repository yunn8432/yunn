<?php require 'header.php'; ?>
<body id="contents">
    <h1>索引</h1>
    <hr>
<?php
    $pdo=new PDO('mysql:host=localhost;dbname=book;charset=utf8','book','password');
// $pdo->setAttribute(PDO::ATTOR_ERROMODE, PDO::ERROMODE_EXCEPTION);

    $indexes=['あ'=>['あ','い','う','え','お'], 
          'か'=>['か','き','く','け','こ'], 
          'さ'=>['さ','し','す','せ','そ'], 
          'た'=>['た','ち','つ','て','と'],
          'な'=>['な','に','ぬ','ね','の'],
          'は'=>['は','ひ','ふ','へ','ほ'],
          'ま'=>['ま','み','む','め','も'],
          'や'=>['や','','ゆ','','よ'],
          'ら'=>['ら','り','る','れ','ろ'],
          'わ'=>['わ','','を','','ん'],
          'が'=>['が','ぎ','ぐ','げ','ご'],
          'ざ'=>['ざ','じ','ず','ぜ','ぞ'],
          'だ'=>['だ','ぢ','づ','で','ど'],
          'ば'=>['ば','び','ぶ','べ','ぼ'],
          'ぱ'=>['ぱ','ぴ','ぷ','ぺ','ぽ'],
          ];
          
    echo '<div class="colum">';
    foreach($indexes as $index => $kana_chars){
        if($index==='が'){
            echo '</div><div class="colum">';
        }
        echo '<div class="row">';
        foreach($kana_chars as $kana){
            echo "<button onclick=\"location.href='contents-output.php?index=".urlencode($kana)."'\">$kana</button>";  
        }
        echo '</div>';
    }
    echo '</div>';
    ?>
</body>
<?php require 'footer.php'; ?>
