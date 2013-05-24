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
			$currentNewsID = mysql_real_escape_string($_GET['id']);
			$result = $mysql -> getArray("SELECT * FROM  `newspost` WHERE `newsID` = ".$currentNewsID.";");
			if(count($result) == 0){
		?>
			<div class="pageTitle">No news post found, returning to archive in 5 seconds...</div>
		<?
			header( "refresh:5;url=?do=News" );
			}
			else{
			$result2 = $mysql ->getArray("SELECT username FROM `userInformation` WHERE userID = '".$result[0]['newsPoster']."'");
			$postDate = date('M d, Y' , strtotime($result[0]['newsDate']));
		?>
		
			<div class='newsContainer'>
			<div class='newsTitle'><a href='?do=News&id=<?=$result[0]['newsID']?>'><?=$result[0]['newsTitle']?></a>
			<div class='newsPoster'><a href='?do=Profile&id=<?$result[0]['newsPoster=']?>'><?=$result2[0]['username']?> on <?=$postDate?></a></div></div>
			<div class='newsContent'><p>&ensp;<?=$result[0]['newsContent']?></p></div>
			</div>
		
			<div class='pageTitle'>
		<?
			//Checks if there is a news post when clicking previous button, if not, continues to search till hits 0.
			if($currentNewsID != 1){
				$prevNewsID = $currentNewsID-1;
				$prevResult = $mysql -> getArray("SELECT * FROM  `newspost` WHERE `newsID` = $prevNewsID;");
				while(count($prevResult) == 0){
					$prevNewsID = $prevNewsID-1;
					$prevResult = $mysql -> getArray("SELECT * FROM  `newspost` WHERE `newsID` = $prevNewsID;");
				}
		?>
			<a style='float: left;' href='?do=News&id=<?=$prevNewsID?>'>Previous Article</a>
		<?
			}
		?>
			<a href='?do=News'>Go back to archive</a>
			
		<?
			$total = $mysql -> getMax("newspost", "newsID");
			
			if($total[0]['MAX(newsID)'] > $currentNewsID){
				$nextNewsID = $currentNewsID+1;
				$nextResult = $mysql -> getArray("SELECT * FROM `newspost` WHERE `newsID` = $nextNewsID;");
				while(count($nextResult) == 0){
					$nextNewsID = ($nextNewsID+1);
					$nextResult = $mysql -> getArray("SELECT * FROM  `newspost` WHERE `newsID` = $nextNewsID;");
				}
		
		?>
			<a style='float: right' href='?do=News&id=<?=$nextNewsID?>'>Next Article</a></div>
		<?
		}}}
	?>
</div>