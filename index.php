<!DOCTYPE html>
<html lang="ru">
<head>
	<title>Форма обратной связи на php | Василий Кулик</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="keywords" content="">
	<meta name="description" content="">
	
	<link rel="stylesheet" href="style.css" />
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
</head>
<body>
	<h1>Напишите нам сообщение с сайта</h1>
	
	<div id="forma">
		<?php if(isset($_POST['sends'])){include 'send_form.php';}?>
		<form name="myform" action="index.php" method="post">
			<p><input type="text" name="fio" placeholder="Ваши ИФО *" /></p>
			<p><input type="text" name="email" placeholder="Ваш e-mail *" /></p>
			<p><input type="text" name="tema" placeholder="Тема письма *" /></p>
			<p><textarea name="mes" placeholder="Сообщение *"></textarea></p>
			<p><input type="submit" name="sends" value="Отправить" /></p>
		</form>
	</div>
</body>
</html>
