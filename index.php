<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script type="text/javascript" src="js/script.js"></script>
	<title></title>
	<?php
		require_once 'requests.php';
	?>
</head>
<body>
	<?php
		if(isset($_POST['content_text']))
		{
			if ($_POST['author_name_text']!='' &&  $_POST['content_text']!='')
				add_entry($_POST['author_name_text'],$_POST['content_text']);
		}
	?>
	<div id="site">
		<div class="slider">
		    <ul class='slidewrapper' data-current=0>
		        <?php view_slides();?>
		    </ul>
		</div>
		<?php
		select_all();
		?>
		<div class="entry">
			<form actiion="index.php" method="post">
				<h2><p>Добавить новую запись:</p></h2>
				<p>Имя автора :<input name='author_name_text' type='text'></p>
				<p>Коментарий :</p>
				<textarea name="content_text" cols="150" rows="3"></textarea></p>
				<p>
					<input type="submit" name="submit_text" value="Отправить">
				</p>
			</form>
		</div>
	</div>
</body>
</html>