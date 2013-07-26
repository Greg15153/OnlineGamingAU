	<? require_once ('framework/globals.php') ?>
	<?
		$game = "Blank";
		$link = "Blank";
		$linkTitle = "Blank";
		$server = "Blank";
		$overview = "Blank";
	?>
	
<script>
	$(document).ready(function(){
		$('.gameItem').click(function() {
			state = $("#gameInfo").css('display');
				if(state == "none"){
					
					$.post('gameInfo.php',{gameID : this.id},
					function (data, status){
						if(data==1){
							alert(data);
						}
						else{
							alert("Wtf");
						}
					});
					//Show div with new info
					$("#gameInfo").show("fast");
					}
				else{
					$("#gameInfo").hide("fast");
					
					$.post('gameInfo.php',{gameID : this.id},
					function (data, status){
						if(data==1){
							alert(data);
						}
						else{
							alert("Wtf");
						}
					});
					
					$("#gameInfo").show("fast");
					}
		});
		
	});
	

</script>
	
	<div id="gameContainer">

		<div id="content1">
			<div class="pageTitle"><h2>Games</h2>
			Click a game to find out more information!</div>
	
			<div id="games">
				<img id="LoL" class="gameItem" name="League of Legends" src="images/gameImages/lolLogo.png"/>
				<img id="PS2" class="gameItem" name="Planetside 2" src="images/gameImages/planetsideLogo.png" />
				<img id="MC" class="gameItem" name="Minecraft" src="images/gameImages/minecraftLogo.png" />
				<img id="WoW" class="gameItem" name="World of Warcraft" src="images/gameImages/wowLogo.png" />
			</div>
			
			<div id='gameInfo' style="display:none;">
				
							<b>Game:</b> <? echo $game ?> <br />
							<b>Website:</b> <a href="<? echo $link ?>"><? echo $linkTitle ?></a> <br />
							<b>Server:</b> <? echo $server ?> <br /><br />
							<b>Overview:</b><br />
							<? echo $overview ?>
			</div>
		</div>
	</div>