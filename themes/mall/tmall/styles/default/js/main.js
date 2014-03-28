$(function(){
	$("#gotop").hide();
	$('#gotop').click(function(){
		$('html,body').animate({scrollTop: '0px'}, 2000);
	});
   
	$(window).scroll(function(){
		if($(window).scrollTop()>320){
			$("#gotop").fadeIn();
		}else{
			$("#gotop").fadeOut();
		}
	});
   $('.top-search .keyword').focus(function(){
	   	$(this).attr('style','');
   }) 
   
   $('.login-register .form .input').focus(function(){
		$(this).removeClass('hover');
		$(this).addClass('focus');
	});
	$('.login-register .form .input').hover(function(){
		$(this).removeClass('hover');
		$(this).addClass('hover');
	},function(){
		$(this).removeClass('hover');
	});
	$('.login-register .form .input').blur(function(){
		$(this).removeClass('hover');
		$(this).removeClass('focus');
	});	
})

function poshytip_message(obj,className,showOn,alignTo,alignX,offsetX,offsetY)
{
	if(obj==undefined) return;
	if(className==undefined) className = 'tip-yellowsimple';
	if(showOn==undefined) showOn = 'focus';
	if(alignTo==undefined) alignTo = 'target';
	if(alignX==undefined) alignX = 'inner-left';
	if(offsetX==undefined) offsetX = 0;
	if(offsetY==undefined) offsetY = 5;
		
	obj.poshytip({
		className: className,
		showOn: showOn,
		alignTo: alignTo,
		alignX: alignX,
		offsetX: offsetX,
		offsetY: offsetY
	});
}
 //首页大幅幻灯图片
$(function() {
	var len = $("#J_Slide ul.slide-list li").length; //获取焦点图个数
	var index = 0;
	var picTimer;

	//为小按钮添加鼠标滑入事件，以显示相应的内容
	$(".slide-nav .dot").mouseenter(function() {
		index = $(".slide-nav .dot").index(this);
		showPics(index);
	}).eq(0).trigger("mouseenter");
	//鼠标滑上焦点图时停止自动播放，滑出时开始自动播放
	$("#J_Slide").hover(function() {
		clearInterval(picTimer);
	},function() {
		picTimer = setInterval(function() {
			showPics(index);
			index++;
			if(index == len) {index = 0;}
		},5000); //此4000代表自动播放的间隔，单位：毫秒
	}).trigger("mouseleave");
	
	//显示图片函数，根据接收的index值显示相应的内容
	function showPics(index) { //普通切换
		$(".slide-nav .dot").removeClass("selected").eq(index).addClass("selected"); //为当前的按钮切换到选中的效果
		if($("#J_Slide ul.slide-list li").eq(index).is(":animated")){
		$("#J_Slide ul.slide-list li").eq(index).stop();
		$("#J_Slide ul.slide-list li").eq(index).css({'opacity':'1','z-index':'9'});
		}
		else{
			$("#J_Slide ul.slide-list li").eq(index).css({'opacity':'1','z-index':'9'});
		}
		$("#J_Slide ul.slide-list li").eq(index).siblings().css('z-index','1').stop().animate({opacity:"0"},1000);	
		var s = $("#J_Slide ul.slide-list li").eq(index).find('div.modelLayer a img').attr('src');
		$('div.mallBack1').css('background', 'url('+ s +') repeat-x center top');
	}
});


//首页楼层框架切换的js
function myfocus(config){
	var sWidth = $(config.wrapper).width(); //获取焦点图的宽度（显示面积）
	var len = $(config.wrapper+' '+config.element).length; //获取焦点图个数
	var index = config.startindex;
	var picTimer;
	var selecter_span = config.wrapper+' '+config.index;
	$(selecter_span).mouseover(function() {
		index = $(selecter_span).index(this);
		showPics(index,sWidth,config);
	}).eq(0).trigger("mouseover");

	$(config.wrapper+" ul.element").css("width",sWidth * (len));
}
function showPics(index,sWidth,config) { //普通切换
	var nowLeft = -index*sWidth; //根据index值计算ul元素的left值
	$(config.wrapper+" ul.element").stop(true,false).animate({"left":nowLeft},config.time); 
	var selecter = config.wrapper+' '+config.index;
	$(selecter).removeClass(config.tmclass).eq(index).addClass(config.tmclass); //为当前的按钮切换到选中的
}