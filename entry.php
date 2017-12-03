<?php 
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="js/script.js"></script>
	<title></title>
	<?php require_once'requests.php';?>
</head>
<body>
	<?php
		if (isset($_POST['comment']))
		{
			if ($_POST['author_name']!='' &&  $_POST['comment']!='')
			add_comment($_POST['author_name'],$_POST['comment'],$_GET['id']);
		
		}
	?>
	<div class="site_2">
		<?php
			select_by_id($_GET['id']);
		?>
	</div>
	<hr>
	<h2>Добавить навый коментарий:</h2>
	<div class="site_2 add">
		<form action= <?php echo 'entry.php?id='.$_GET['id']; ?> method="post">
			<p>Имя автора :<input name='author_name' type='text'></p>
			<p>Коментарий :</p>
			<textarea name="comment" cols="140" rows="3"></textarea></p>
			<p>
				<input type="button" name="refresh" value="Обновить форму">
				<input type="submit" name="submit" value="Отправить">
			</p>
		</form>
	</div>
</body>
</html>