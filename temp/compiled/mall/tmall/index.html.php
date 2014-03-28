<?php echo $this->fetch('header.html'); ?>
    <div class="mallBack mallBack1" id="style-0" style="opacity: 1;"></div>
	<div id="page-home" class="w clearfix">
        <div class="col-sub mallLeft" area="mallLeft" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'mallLeft')); ?>
        </div>
        <div class="col-main mallRight" area="mallRight" widget_type="area">
        <?php $this->display_widgets(array('page'=>'index','area'=>'mallRight')); ?>
        <?php echo $this->fetch('helper_footer.html'); ?>
        <div id="footer_index">
  		     Copyright 2014-2020 百真无假网 Inc.,All rights reserved.<br />
  			 Powered by 百真无假网 1.0
  <br />
   </div>
    	</div>
    <div id="footer">
    	<div class="footer-fixed">
			<a id="gotop" class="toTop" href="javascript:void(0);"></a>
    	</div>
    </div>
    <script type="text/javascript">
	$('.rightBanner div.j_MaskBanner').hover(function(){
		$(this).siblings().find('.black').css({'z-index':'10','background':'#000'});
		}, function(){
		$(this).siblings().find('.black').css({'z-index':'5','background':'#EFEBE6'});
	});
	$('.floorCon-img a.floorPro-img').hover(function(){
		$(this).stop().animate({"margin-left":"-50px"},300);
		}, function(){
		$(this).stop().animate({"margin-left":"110px"},200);
	});
	</script>
	</body>
</html>
