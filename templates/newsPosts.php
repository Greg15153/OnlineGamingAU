<link rel="stylesheet" type="text/css" href="css/newsPosts.css" />



<?php
				$sqlGetNews = "SELECT * FROM  `newspost` ORDER BY newsDate DESC LIMIT 5;";
				$query = $conn -> query($sqlGetNews);
				while($row = $query -> fetch_assoc()){
					$sqlGetPoster = "SELECT username FROM `userInformation` WHERE userID = '".$row['newsPoster']."'";
					$query2 = $conn ->query($sqlGetPoster);
					$row2 = $query2 -> fetch_assoc();
					$postDate = date('M d, Y' , strtotime($row['newsDate']));

					echo "<div class='newsContainer'>";
					echo "<div class='newsTitle'><a href='news.php?id=".$row['newsID']."'>".$row['newsTitle']."</a>";
					echo "<div class='newsPoster'><a href='memberProfile.php?id=".$row['newsPoster']."'>".$row2['username']." on ".$postDate."</a></div></div>";
					echo "<div class='newsContent'><p>&ensp;".$row['newsContent']."</p></div>";
					echo "</div>";
				}
?>
