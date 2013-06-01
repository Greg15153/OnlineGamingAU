<script>
		//Makes the entire row goto the userID page. You can still click on the member username to go to other pages.
		function goToMembersPage(userID){
			window.location = "index.php?do=Members&userID="+userID;
		}
</script>
<div class="news">
<?php
	global $mysql;
	//Checks if userID variable is available. If not loads an members list.
	if(!isset($_GET['userID']) || $_GET['userID'] == ""){
		$result = $mysql->getArray("SELECT * FROM  userInformation ORDER BY username DESC");
?>
			<div class='pageTitle'><h2>Members List</h2></div>
			<table id='membersTable'>
				  <tr>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Class</th>
					<th>Join Date</th>
					<th>Position</th>
				  </tr>
		<?
			foreach($result as $userInfo){
				$joinDate = date('M d, Y' , strtotime($userInfo['joinDate']));
				$username = $userInfo['username'];
		?>
			<tr onClick="goToMembersPage('<?=$userInfo['userID']?>')">
						<td><a href='?do=Members&userID=<?=$userInfo['userID']?>'><?=ucwords($username)?></a></td>
						<td><?=ucwords($userInfo['firstName'])?></td>
						<td><?=ucwords($userInfo['lastName'])?></td>
						<td><?=ucwords($userInfo['class'])?></td>
						<td><?=$joinDate?></td>
						<td><?=ucwords($userInfo['position'])?></td>
			</tr>
		<?
			}
		?>
			</table>
		<?
		}
		else{
			//If ID exists, it loads that content instead of the archive.
			$currentUserID = $_GET['userID'];
			$result = $mysql -> getArray("SELECT * FROM  `userInformation` WHERE `userID` = ".$currentUserID.";");
			//If the ID is there but there is no information for the ID, loads error message and goes back to archive.
			if(count($result) == 0){
				header("Location: index.php?do=Members&msg=102");
			}
			else{
				$getUser = $mysql -> getArray("SELECT * FROM  `profilePage` WHERE `userID` = ".$currentUserID.";");
				foreach($getUser as $info){
			?>
			
			<div id="profileContainer">
				<div id="profileTitle"><?=$info['profileName']?></div>
				<div id="profileImageContainer"><img id="profileImage" align="left" src="<?=$info['profileImage']?>" /></div>
				<div id="profileInfo"> 
			<?
				foreach($result as $profileInfo){
					$birthday = date('M d, Y' , strtotime($profileInfo['birthday']));
			?>
					<span class="boldedText">Username:</span> <?=ucwords($profileInfo['username'])?> <br />
					<span class="boldedText">Name:</span> <?=ucwords($profileInfo['firstName'])?> <?=ucwords($profileInfo['lastName'])?> <br />
					<span class="boldedText">Class:</span> <?=ucwords($profileInfo['class'])?> <br />
					<span class="boldedText">Position:</span> <?=ucwords($profileInfo['position'])?> <br />
					<span class="boldedText">Birthday:</span> <?=$birthday?> <br />
					<span class="boldedText">Quote:</span> <?=$info['profileQuote']?> <br /><br /><br /><br />
				</div>
				<span class="boldedText">About <?=ucwords($profileInfo['firstName'])?></span><br />
					<?=$info['aboutMe']?>
			</div>
			<?
			}}}}
	?>
</div>