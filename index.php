<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
	<title>Форма обратной связи</title>
</head>
<body>
	<div class="container col-10 col-md-6 col-lg-4 my-3 py-3 my-md-5 py-md-5">
		<form action="form.php" method="post">
			<div class="row my-3"><input type="text" name="name" maxlength="15" placeholder="Ваше имя"></div>
			<div class="row mb-3"><textarea name="message" id="message" cols="30" rows="10" placeholder="Текст сообщения"></textarea></div>
			<div class="row"><input type="submit" name="submit" class="btn btn-secondary mb-3" maxlength="100" name="submit" value="Отправить"></div>
		</form></div>
</body>
</html>