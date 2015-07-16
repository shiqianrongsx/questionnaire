$(document).ready(function(){
	var mw = $(".mbox").width();
	var ml = $(".mbox").length;	
	$(".main").width(mw*ml);
	$(".main").css({background:"#7F7D57"})	
	$(".menu li").click(function(){
		var index = $(this).index();
		$(".menu li").css({color:"#FDC000"});
		$(".l"+(index+1)).css({color:"#ff4500"});
		if(!$(".main").is(":animated")){
			$(".main").animate({left:-mw*index},50)
		}
	
	})
});