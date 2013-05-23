<?
	global $mysql;
?>
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
	<div class="news">
<?
	$result = $mysql -> getArray("SELECT * FROM  newspost ORDER BY newsDate DESC LIMIT 5");
	foreach($result as $post){
		if($post['newsID'] != null){
		$postedBy = $post['newsPoster'];
		$result2 = $mysql->getArray("SELECT username FROM userInformation WHERE userID='$postedBy'");
		$postDate = date('M d, Y' , strtotime($post['newsDate']));
	?>
		<div class='newsContainer'>
			<div class='newsTitle'><a href='?do=News&id=<?=$post['newsID']?>'><?=$post['newsTitle']?></a>
			<div class='newsPoster'><a href='?do=Profile&id=<?=$post['newsPoster']?>'><?=$result2[0]['username']?> on <?=$postDate?></a></div></div>
			<div class='newsContent'><p>&ensp;<?=$post['newsContent']?></p></div>
		</div>
	<?
		}
	}
?>
	</div>