$(document).keydown(function(e) {    
    var item_width = $('#slider li').outerWidth(); 
    var left_value = item_width * (-1); 
	if(e.keyCode==37){
		var left_indent = parseInt($('#slider ul').css('left')) + item_width;
		$('#slider ul').animate({'left' : left_indent}, 200,function(){    
			$('#slider li:first').before($('#slider li:last'));           
			$('#slider ul').css({'left' : left_value});
		
		});
		return false;
	}
	else if(e.keyCode == 39) {
		var left_indent = parseInt($('#slider ul').css('left')) - item_width;
		$('#slider ul').animate({'left' : left_indent}, 200, function () {		
			$('#slider li:last').after($('#slider li:first'));                     
			$('#slider ul').css({'left' : left_value});
		});	 
		return false;
	}
});
$(document).ready(function() {
    var speed = 5000;
    var run = setInterval('rotate()', speed);    
    
    var item_width = $('#slider li').outerWidth(); 
    var left_value = item_width * (-1); 
        
    $('#slider li:first').before($('#slider li:last'));
    
    $('#slider ul').css({'left' : left_value});
   
    $('#prev').click(function() {
        var left_indent = parseInt($('#slider ul').css('left')) + item_width;
        $('#slider ul').animate({'left' : left_indent}, 200,function(){    
            $('#slider li:first').before($('#slider li:last'));           
            $('#slider ul').css({'left' : left_value});
        
        });
        return false;
    });

    $('#next').click(function() {
        
        var left_indent = parseInt($('#slider ul').css('left')) - item_width;
        
        $('#slider ul').animate({'left' : left_indent}, 200, function () {
            
            $('#slider li:last').after($('#slider li:first'));                     
            
            $('#slider ul').css({'left' : left_value});
        
        });
                 
        return false;
        
    });        
    
    $('#slider').hover(
        
        function() {
            clearInterval(run);
        }, 
        function() {
            run = setInterval('rotate()', speed);    
        }
    ); 
        
});
function rotate() {
    $('#next').click();
}
