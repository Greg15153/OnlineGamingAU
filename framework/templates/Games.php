	<? require_once ('framework/globals.php') ?>
	<?
		$game;
		$link;
		$linkTitle;
		$server;
		$overview;
	?>
	
<script>
	var previousID;

	$(document).ready(function(){
		$('.gameItem').click(function() {
			state = $("#gameInfo").css('display');
				if(state == "none"){
					
					$.post('index.php?do=gameInfo',{gameID : this.id},
					function (data, status){
						if(data != null){
							var data_array = $.parseJSON(data);
							previousID = data_array[4];
							$("#gameField").html(data_array[0]);
							$("#linkField").html(data_array[1]);
							$("#serverField").html(data_array[2]);
							$("#overviewField").html(data_array[3]);
						}
						else{
							alert("You broke it.");
						}
					});
					//Show div with new info
					$("#gameInfo").show("fast");
					}
				else if( this.id == previousID){
					$("#gameInfo").hide("fast");
				}
				else{
					$("#gameInfo").hide("fast");
					
					$.post('index.php?do=gameInfo',{gameID : this.id},
					function (data, status){
						if(data != null){
							var data_array = $.parseJSON(data);
							previousID = data_array[4];
							$("#gameField").html(data_array[0]);
							$("#linkField").html(data_array[1]);
							$("#serverField").html(data_array[2]);
							$("#overviewField").html(data_array[3]);
						}
						else{
							alert("You broke it.");
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
				<img id="LoL" class="gameItem" name="League of Legends" src="images/gameImages/lolLogo.png" />
				<img id="PS2" class="gameItem" name="Planetside 2" src="images/gameImages/planetsideLogo.png" />
				<img id="MC" class="gameItem" name="Minecraft" src="images/gameImages/minecraftLogo.png" />
				<img id="WoW" class="gameItem" name="World of Warcraft" src="images/gameImages/wowLogo.png" />
			</div>
			
			<div id='gameInfo' style="display:none;">
				
							<b>Game:</b> <span id="gameField" value=""> </span> <br />
							<b>Website:</b> <span id="linkField" value=""> </span><br />
							<b>Server:</b> <span id="serverField" value=""> </span><br /><br />
							<b>Overview:</b><br />
							<span id="overviewField"></span>
			</div>
		</div>
	</div>