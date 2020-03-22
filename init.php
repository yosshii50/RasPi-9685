<?php

//file_put_contents("sample.txt", "HELLO WORLD");

//$file = './people.txt';

// ファイルをオープンして既存のコンテンツを取得します
//$current = file_get_contents($file);

// 新しい人物をファイルに追加します
//$current .= "John Smith\n";

// 結果をファイルに書き出します
//file_put_contents($file, $current);


//$cmd = 'ls -la > ls.txt';
$cmd = 'sudo ./init.sh';
//$cmd = 'i2cset -y 1 0x40 12 236';
exec($cmd);
 

?>
