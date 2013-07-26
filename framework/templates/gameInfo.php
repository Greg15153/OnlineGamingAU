<?
	
	$gameID = $_POST['gameID'];
	$gameInfo = "blank";
	if($gameID == "LoL"){
		$game = "League of Legends";
		$link = "<a href='http://na.leagueoflegends.com'>NA League of Legends</a>";
		$server = "North America";
		$overview = "League of Legends is a competitive online game set in an imaginative world. Gamers take the role of a powerful Summoner, calling forth and controlling brave Champions in battle. League of Legends combines the best elements of session-based games with persistent elements of MMORPG's.";
		
		$gameInfo = array($game, $link, $server, $overview, $gameID);
	}
	else if($gameID == "WoW"){
		$game = "World of Warcraft";
		$link = "<a href='http://us.battle.net/wow/en/'>battle.net</a>";
		$server = "North America";
		$overview = "World of Warcraft is an online role-playing experience set in the award-winning Warcraft universe. Players assume the roles of Warcraft heroes as they explore, adventure, and quest across a vast world. Being Massively Multiplayer, World of Warcraft allows thousands of players to interact within the same world. Whether adventuring together or fighting against each other in epic battles, players will form friendships, forge alliances, and compete with enemies for power and glory.";
		
		$gameInfo = array($game, $link, $server, $overview, $gameID);
	}
	else if($gameID == "PS2"){
		$game = "Planet Side 2";
		$link = "<a href='https://www.planetside2.com/'>Planetside</a>";
		$server = "North America / Waterson / Terran Republic";
		$overview = "Battles take place not between dozens of troops, but thousands; with air and ground vehicles slugging it out alongside squads of troops. Whether in open fields, tightly packed urban centers or enormous structures, planning, teamwork and communication are essential.

PlanetSide 2 features incredible continent maps with dozens of square kilometers of seamless gameplay space; every inch of which is hand-crafted, contestable space. With the territorial control meta-game, landmass has intrinsic value.";
		
		$gameInfo = array($game, $link, $server, $overview, $gameID);
	}
	else if($gameID == "MC"){
		$game = "Minecraft";
		$link = "<a href='http://www.minecraft.net/'>Minecraft.net</a>";
		$server = "mc.cerealgamers.com";
		$overview = "The creative and building aspects of Minecraft allow players to build constructions out of textured cubes in a 3D procedurally generated world. Other activities in the game include exploration, gathering resources, crafting, and combat. Gameplay in its commercial release has two principal modes: survival, which requires players to acquire resources and maintain their health and hunger; and creative, where players have an unlimited supply of resources, the ability to fly, and no health or hunger. A third gameplay mode named hardcore is the same as survival, differing only in difficulty; it is set to hardest setting and respawning is disabled, forcing players to delete their worlds upon death.";
		
		$gameInfo = array($game, $link, $server, $overview, $gameID);
	}
	
		echo json_encode($gameInfo);
?>