<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Форма обратной связи</title>
</head>
<body>		
<?php
$page = $_GET['page'];
if(!isset($_GET['page'])) $page = 1;
$pageBack = $page - 1;
$pageForward = $page + 1;
$linkBack = "/admin.php?page=".$pageBack;
$linkForward = "/admin.php?page=".$pageForward;

$d = "messages/".$page;
if(file_exists($d)) {
 $dir = "messages/".$page."/";
 $dirMessages = scandir($dir);
 $Message = '';
 foreach ($dirMessages as $file) {
 	if(!is_dir($file)) {
 		  $content = file_get_contents($dir.$file);     
      $contentSeparate = explode("\n", $content, 2);
      $name = $contentSeparate[0];
      $message = $contentSeparate[1];
        
      $layout = "<div class='container col-10'>";
      $layoutMessage = "<div class='row border-bottom mt-3'>
			 <div class='row'>@username</div>
			 <div class='row'>@message</div>
		   </div></div>";
       
      $search = ["@username","@message"];
      $replace = [$name, $message];
      $layoutMes = str_replace($search, $replace, $layoutMessage);
      $Message .= $layout.$layoutMes;
 	}
 }
} else {
	$urlback = htmlspecialchars($_SERVER['HTTP_REFERER']);
	echo "<div style='font-size: 20px; margin-top: 10em; text-align: center;'>Такой страницы не существует<p><a href='$urlback' style='font-size: 0.9em;'>Вернуться назад</a></p></div>";
}
if(file_exists($d)) {
 $layoutNav = "<nav aria-label='Навигация по страницам' class=' my-3'>
  <ul class='pagination justify-content-center'>
    <li class='page-item'>
      <a class='page-link' href='$linkBack' aria-label='Предыдущая'>
        <span aria-hidden='true'>&laquo; Назад</span>
      </a>
    </li>
    
      <a class='page-link' href='$linkForward' aria-label='Следующая'>
        <span aria-hidden='true'>Вперед &raquo;</span>
      </a>
    </li>
  </ul>
</nav>";
}
$fullMessage = $Message.$layoutNav;
echo $fullMessage;
?>
</body>
</html>

