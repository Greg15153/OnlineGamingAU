	
	<div id="sliderContainer">
		<div id="slider">
			<div id="slides">
			<div id="buttons">
					<a href="#" id="prev">prev</a>
					<a href="#" id="next">next</a>
				</div>
				
				<ul>
					<li><img class="sliderImage" src="images/slider/Slider/officers.png" alt="2013-2014 Officers"/>
						<div class="textOverlay">Meet the Officers for the 2013-2014 school year!</div></li>
					
					<li><img class="sliderImage" src="images/slider/Slider/lanParty1.png" />
						<div class="textOverlay">March 23rd, 2013 Lan Party overview</div> </li>
					
					<li><img class="sliderImage" src="images/slider/Slider/teemoHats.png" />
						<div class="textOverlay">Upcoming event: March 23rd, 2013 League of Legends tournement</div></li>
				</ul>
				
			</div>
		</div>
	</div>
	
	<link rel="stylesheet" type="text/css" href="css/newsPosts.css" />

<?php
	global $mysql;
	$sqlGetNews = "SELECT * FROM  `newspost` ORDER BY newsDate DESC LIMIT 5;";
	$result = $mysql -> getArray($sqlGetNews);
	for($i = 0; $i<=5; $i++){
		if(@$result[$i]['newsID'] != null){
		$sqlGetPoster = "SELECT username FROM `userInformation` WHERE userID = '".$result[$i]['newsPoster']."'";
		$result2 = $mysql ->getArray($sqlGetPoster);
		$postDate = date('M d, Y' , strtotime($result[$i]['newsDate']));
		echo "<div class='newsContainer'>";
		echo "<div class='newsTitle'><a href='?do=news.php?id=".$result[$i]['newsID']."'>".$result[$i]['newsTitle']."</a>";
		echo "<div class='newsPoster'><a href='?do=memberProfile.php?id=".$result[$i]['newsPoster']."'>".$result2[0]['username']." on ".$postDate."</a></div></div>";
		echo "<div class='newsContent'><p>&ensp;".$result[$i]['newsContent']."</p></div>";
		echo "</div>";
		}
	}
?>

		
		