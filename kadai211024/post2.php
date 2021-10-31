<?php
// var_dump($_POST);
// exit();
$name = $_POST["name"];
$mail = $_POST["mail"];
$bango = $_POST["bango"];

$str = $name . " ," . $mail . " ," . $bango;
// $write_data = "{$deadline} {$todo}\n"; // スペース区切りで最後に改行
$file = fopen('data/data.csv', 'a'); // ファイルを開く 引数はa
flock($file, LOCK_EX); // ファイルをロック
fwrite($file, $str . "\n"); // データに書き込み,
flock($file, LOCK_UN); // ロック解除
fclose($file); // ファイルを閉じる
// header("Location:todo_txt_input.php"); // 入力画面に移動
// <?php
// $str = ''; // 出力用の空の文字列
// $file = fopen('data/todo.txt', 'r'); // ファイルを開く(読み取り専用)
// flock($file, LOCK_EX); // ファイルをロック
// if ($file) {
//   while ($line = fgets($file)) { // fgets()で1行ずつ取得→$lineに格納
//     $str .= "<tr><td>{$line}</td></tr>"; // 取得したデータを$strに入れる
//   }
// }
// flock($file, LOCK_UN); // ロック解除
// fclose($file); // ファイル閉じる

// var_dump($str);
// exit();
// ($strに全部の情報が入る!)


?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>結果</title>
</head>

<body>
    <legend>
        <h1>結果</h1>
        <fieldset>
    </legend>
    <a href="post.php">入力画面</a>
    <h3><?php echo $name; ?>さんの送信内容</h3>
    <table>
        <thead>
            <tr>
                <!-- <li><?php echo $mail; ?> </li>
                <li><?php echo $bango ?></li>
                <th>todo</th> -->
            </tr>
        </thead>
        <tbody>
            <?= $str ?>
        </tbody>
    </table>
    </fieldset>
</body>

</html>