<?php 
	require_once 'db.php';

	function select_all()
	{
		$query = "SELECT * FROM `entry` ORDER BY `data` desc";

		$res = mysql_query($query);

		while($row = mysql_fetch_array($res))
		{
			echo '<div class="entry" onclick="link_to('. $row['id'].');">';
			echo '<div class="head_p">';
			echo '<div class="author-name">';
			echo $row['authors_name'];
			echo '		</div>';
			echo '		<div class="data">';
			echo $row['data'];
			echo '		</div>';
			echo '	</div>';
			echo '	<div class="content">';
			$cont = mb_substr($row['content_list'], 0, 100);
			echo $cont;
			echo '	</div>';
			echo '	<hr>';
			echo '	<div class="comments">';
			$query_next = "SELECT count(*) FROM `entry`
						INNER JOIN `comments` on entry.id = comments.id_entry
						WHERE entry.id = ". $row['id'];
						;
			$res_next = mysql_query($query_next);
			while($row_next = mysql_fetch_array($res_next))
			echo $row_next[0];
			echo '	</div>';
			echo '<div class="id_m">';
			echo '</div>';
			echo '</div>';
		}
	}	

	function select_by_id($id) {
		$query = "SELECT * FROM `entry` WHERE entry.id = ". $id ." ORDER BY `data` desc";

		$res = mysql_query($query);

		while($row = mysql_fetch_array($res))
		{
			echo '<div class="head_p">';
			echo '<div class="author-name">';
			echo $row['authors_name'];
			echo '		</div>';
			echo '<div class="back">';
			echo '<input type="button" name="btn_back" value="back" class="back_btn" onclick="link_back()"';
			echo '</div>';
			echo '		<div class="data">';
			echo $row['data'];
			echo '		</div>';
			echo '	</div>';
			echo '	<div class="content">';
			echo $row['content_list'];
			echo '	</div>';
			echo '	<hr>';
			echo '<div class="comment_poligon">';
			
			$query_next = "SELECT * FROM `entry`
						INNER JOIN `comments` on entry.id = comments.id_entry
						WHERE entry.id = ". $row['id'];
			$res_next = mysql_query($query_next);
			while($row_next = mysql_fetch_array($res_next))
			{
				echo '<div class="full_auth_n">'.$row_next['author_name'].'</div>';
			
				echo '<div class="full_data">'. $row_next['data'] .'</div>';
				echo '	<div class="comment_full">';
				echo $row_next['coment'].'<br>';
				echo '	</div>';
			}
			
			echo '	</div>';
			echo '<div class="id_m">';
			echo '</div>';
		}
	}
	function add_comment($author,$com,$id)
	{
		$query = "INSERT INTO `comments` (`id`, `author_name`, `coment`, `data`, `id_entry`) VALUES ('', '".$author."', '".$com."', '".date('Y-m-d')."', '".$id."')";

		$res = mysql_query($query);

		echo "<script language='Javascript'>function reload() {location = 'entry.php?id=".$id."'}; setTimeout('reload()', 1);</script>";
		
	}

	function add_entry($author,$content)
	{
		$query = "INSERT INTO `entry` (`id`, `authors_name`, `content_list`, `data`) VALUES ('', '".$author."', '".$content."', '".date('Y-m-d')."')";
		$res = mysql_query($query);
		echo "<script language='Javascript'>function reload() {location = 'index.php'}; setTimeout('reload()', 1);</script>";
	}

	function view_slides()
	{
		$query = "SELECT *,count(id_entry) FROM `entry`
			INNER JOIN `comments` ON entry.id = comments.id_entry
			GROUP BY id_entry
			ORDER BY count(id_entry) DESC
			LIMIT 0,5";
		$res = mysql_query($query);
		while($row = mysql_fetch_array($res))
		{
			echo '<li class="slide">';
			echo $row['authors_name'];
			echo '<p>';
			echo mb_substr($row['content_list'], 0,100);
			echo '</p>';
			echo '</li>';
		}
	}
?>