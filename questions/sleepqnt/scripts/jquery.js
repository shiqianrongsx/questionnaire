$(function(){
var mw = $(".mbox").width();
var ml = $(".mbox").length;	
$(".main").width(mw*ml);
$(".main").css({background:"#7F7D57"})	
$(".menu li").click(function(){
	var index = $(this).index();
	if(index==0){
		$(".main").css({background:"#7F7D57",opacity:0.5})			
		$(".menu li").css({color:"#FDC000"})
		$(".l1").css({color:"#ff4500"})
	}
	if(index==1){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l2").css({color:"#ff4500"})
	}
	if(index==2){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l3").css({color:"#ff4500"})
	}
	if(index==3){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l4").css({color:"#ff4500"})
	}
	if(index==4){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l5").css({color:"#ff4500"})
	}
	if(index==5){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l6").css({color:"#ff4500"})
	}
	if(index==6){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l7").css({color:"#ff4500"})
	}
	if(index==7){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l8").css({color:"#ff4500"})
	}
	if(index==8){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l9").css({color:"#ff4500"})
	}
	if(index==9){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l10").css({color:"#ff4500"})
	}
	if(index==10){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l11").css({color:"#ff4500"})
	}
	if(index==11){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l12").css({color:"#ff4500"})
	}
	if(index==12){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l13").css({color:"#ff4500"})
	}
	if(index==13){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l14").css({color:"#ff4500"})
	}
	if(index==14){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l15").css({color:"#ff4500"})
	}
	if(index==15){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l16").css({color:"#ff4500"})
	}
	if(index==16){
		$(".main").css({background:"#7F7D57",opacity:0.5})	
		$(".menu li").css({color:"#FDC000"})
		$(".l17").css({color:"#ff4500"})
	}
	if(!$(".main").is(":animated")){
		$(".main").animate({left:-mw*index,opacity:1},50)
	}
	
})
})