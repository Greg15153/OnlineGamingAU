<script>
		function showGameInfo(gameName){
			var frame = $('#gameFrame'),
				src = frame.attr('src');
			frame.attr('src', 'gameInfo.php?game='+gameName+'');
		}
</script>
	
	<div id="gameContainer">

		<div id="content1">
			<div class="pageTitle"><h2>Games</h2>
			Click a game to find out more information!</div>
			
			<div id="games">
				<img class="gameItem" src="images/lolLogo.png" onClick="showGameInfo('League of Legends')" />
				<img class="gameItem" src="images/planetsideLogo.png" onClick="showGameInfo('Planetside 2')" />
				<img class="gameItem" src="images/minecraftLogo.png" onClick="showGameInfo('Minecraft')" />
				<img class="gameItem" src="images/wowLogo.jpg" onClick="showGameInfo('World of Warcraft')" />
				
			</div>
			<div id='gamePage'>
				<iframe id="gameFrame" src="gameInfo.php" width='860px' height='300px'></iframe>
			</div>
		</div>
	</div>