<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Форма обратной связи</title>
</head>
<body>
	
<?php

if (!empty($_POST['name']) && !empty($_POST['message'])) {
	$name = trim(strip_tags($_POST['name']));
    $mes = trim(strip_tags($_POST['message']));
    if (iconv_strlen($name) > 15) {
    	echo "<div style=\"font-size: 24px; margin-top: 10em; text-align: center;\">Имя не должно превышать 15 символов!</div>";
    	exit;
    }
    if (iconv_strlen($mes) > 100) {
    	echo "<div style=\"font-size: 24px; margin-top: 10em; text-align: center;\">Сообщение не должно превышать 100 символов!</div>";
    	exit;
    }
    $message = "Сообщение: ".$_POST['message'];
    $subject = "Отправитель: ".$_POST['name']."\n";
    $random = mt_rand();
    $filename = $name.$random.'.txt';
    
    $openCount = fopen('count.txt', 'r+b');
    $valueCount = fread($openCount, filesize('count.txt'));
    $path = "messages/".$valueCount;
    
    if(!file_exists($path)) mkdir($path);

    $fCount = scandir($path);
 	$fileCount = count($fCount);
 	if ($fileCount > 20) {
    	$valueCount++;
    	file_put_contents('count.txt', $valueCount);
    }

    if(!file_exists($path)) mkdir($path);
    $fullpath = $path."/{$filename}";
    $f_hdl = fopen($fullpath, 'w');
    $text = $subject.$message;
    fwrite($f_hdl, $text);
    fclose($f_hdl);
    $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
 	echo "<div style=\"font-size: 24px; margin-top: 10em; text-align: center;\">Спасибо, что оставили сообщение!<p><a href='$urlback' style='font-size: 0.9em;'>Вернуться назад</a></p></div>"; 
 } 
 else {
   $urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
   echo "<div style=\"font-size: 24px; margin-top: 10em; text-align: center;\">Для отправки сообщения заполните все поля!<p><a href='$urlback' style=\"font-size: 0.9em;\">Вернуться назад</a></p></div>";
}
?>
</body>
</html>