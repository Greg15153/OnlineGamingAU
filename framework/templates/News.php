<div class="news">
<?php
	global $mysql;
	if(!isset($_GET['id']) || $_GET['id'] == ""){
		$result = $mysql->getArray("SELECT * FROM  newspost ORDER BY newsDate DESC");
?>
			<div class='pageTitle'><h2>News Archive</h2></div>
			<table id='newsTable'>
				  <tr>
					<th>News Title</th>
					<th>News Poster</th>
					<th>Posted Date</th>
				  </tr>
		<?
			foreach($result as $post){
				$postDate = date('M d, Y' , strtotime($post['newsDate']));
				$poster = $post['newsPoster'];
				$result2 = $mysql ->getArray("SELECT username FROM userInformation WHERE userID='$poster'");
		?>
			<tr>
						<td><a href='?do=News&id=<?=$post['newsID']?>'><?=$post['newsTitle']?></a></td>
						<td><a href='?do=Profile&id=<?=$post['newsPoster']?>'><?=$result2[0]['username']?></a></td>
						<td><?=$postDate?></td>
			</tr>
		<?
			}
		?>
			</table>
		<?
		}
		else{
			$result = $mysql -> getArray("SELECT * FROM  `newspost` WHERE `newsID` = ".$_GET['id'].";");
			$result2 = $mysql ->getArray("SELECT username FROM `userInformation` WHERE userID = '".$result[0]['newsPoster']."'");
			$postDate = date('M d, Y' , strtotime($result[0]['newsDate']));
		?>
		
			<div class='newsContainer'>
			<div class='newsTitle'><a href='?do=News&id=<?=$result[0]['newsID']?>'><?=$result[0]['newsTitle']?></a>
			<div class='newsPoster'><a href='?do=Profile&id=<?$result[0]['newsPoster=']?>'><?=$result2[0]['username']?> on <?=$postDate?></a></div></div>
			<div class='newsContent'><p>&ensp;<?=$result[0]['newsContent']?></p></div>
			</div>
		
			<div class='pageTitle'><a href='?do=News'>Go back to archive</a></div>
			
		<?
		}
	?>
</div>