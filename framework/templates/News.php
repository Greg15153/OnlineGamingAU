<link rel="stylesheet" type="text/css" href="css/newsPosts.css" />
	
		
<?php
	global $mysql;
	if(!isset($_GET['id']) | @$_GET['id'] == ""){
		
		$sqlGetTitles = "SELECT * FROM  `newspost` ORDER BY newsDate DESC;";
		$result = $mysql -> getArray($sqlGetTitles);
		$totalPosts = count($result);
		echo "<div class='pageTitle'><h2>News Archive</h2></div>";
		echo "<table id='newsTable'>
			  <tr>
				<th>News Title</th>
				<th>News Poster</th>
				<th>Posted Date</th>
			  </tr>";
	
		for($i=0; $i<$totalPosts; $i++){
			$postDate = date('M d, Y' , strtotime($result[$i]['newsDate']));
			$sqlGetPoster = "SELECT username FROM `userInformation` WHERE userID = '".$result[$i]['newsPoster']."'";
			$result2 = $mysql ->getArray($sqlGetPoster);
	
			echo "<tr>
					<td><a href='?do=News&id=".$result[$i]['newsID']."'>".$result[$i]['newsTitle']."</a></td>
					<td><a href='?do=Profile&id='".$result[$i]['newsPoster']."'>".$result2[0]['username']."</a></td>
					<td>".$postDate."</td>
				  </tr>";
		}
			echo "</table>";
	}
	else{
		$sqlGetNews = "SELECT * FROM  `newspost` WHERE `newsID` = ".$_GET['id'].";";
		$result = $mysql -> getArray($sqlGetNews);
		
		$sqlGetPoster = "SELECT username FROM `userInformation` WHERE userID = '".$result[0]['newsPoster']."'";
		$result2 = $mysql ->getArray($sqlGetPoster);
		$postDate = date('M d, Y' , strtotime($result[0]['newsDate']));
		echo "<div class='newsContainer'>";
		echo "<div class='newsTitle'><a href='?do=News&id=".$result[0]['newsID']."'>".$result[0]['newsTitle']."</a>";
		echo "<div class='newsPoster'><a href='?do=Profile&id=".$result[0]['newsPoster']."'>".$result2[0]['username']." on ".$postDate."</a></div></div>";
		echo "<div class='newsContent'><p>&ensp;".$result[0]['newsContent']."</p></div>";
		echo "</div>";
	
		echo "<div class='pageTitle'><a href='?do=News'>Go back to archive</a></div>";
	
	}
?>