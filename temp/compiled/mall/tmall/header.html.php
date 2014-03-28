<?php echo $this->fetch('top.html'); ?>
<script type="text/javascript">
	  $(function(){
			//首页左侧分类菜单
			var arr=$('li.each');
			$(".menu ul").find("li.each").each(
				function() {		
					$(this).hover(
						function() {
							menu = $("#" + this.id + "_menu");
							li_top = $(this).position().top;
							var i = li_top/2;
							menu.css("top", -i);
							
							menu.children('div.subView').removeClass('hidden');
							$(this).addClass("selected");
							menu.css('width','755px').css('display','block');
						},
						function() {
							$("#" + this.id + "_menu").css('width', '0');
							$("#" + this.id + "_menu").children('div.subView').addClass('hidden');
							$(this).removeClass("selected");
						}
					);
				}
			);
			$('.category').hover(
				function(){
					$(this).children('.header_menu').show();	
				},
				function(){
					$(this).children('.header_menu').hide();	
				}
			);
		});
		<?php if ($this->_var['index']): ?>
		$(function(){
			$('.mallLeft .category h2.title b').click(function (){
				$(this).addClass('selected').siblings('b').removeClass('selected');
				if($(this).hasClass('expandCat')){
				$('.menu ul li.each p.each-col').css({'height':'21px','line-height':'21px'});
				$('.menu ul li.each p.eachCol1').css('padding-top','6px');
				}
				else{
					$('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
					$('.menu ul li.each p.eachCol1').css('padding-top','0');
				}
			})
		});
		//左侧仿天猫分类
		window.onscroll=function cate()
		{
			 var a=$(document).scrollTop();
			 if(a>93){
				$('.category').css('position','fixed');
			 }
			 else{
				$('#category').css('position','relative');
			 }
			 if($('.mallLeft .category h2.title b.simpleCat').hasClass('selected'))
			 {
				$('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
				$('.menu ul li.each p.eachCol1').css('padding-top','0');
			 } 
			 else {
				var arr=$('.menu li.each').length;
				for(var i=1;i<=arr;i++){
					if(a>(70+i*80)){
							$('.menu ul li.each'+i+' p.each-col').css({'height':'0','line-height':'0'});
							$('.menu ul li.each'+i+' p.eachCol1').css('padding-top','0');
						}
					else{
						$('.menu ul li.each'+i+' p.each-col').css({'height':'21px','line-height':'21px'});
						$('.menu ul li.each'+i+' p.eachCol1').css('padding-top','6px');
					}
					if(a>(70+arr*80))
					{
						$('.mallLeft .category h2.title b').hide();
					}
					else{
						$('.mallLeft .category h2.title b').show();
					}
				}
				$('#J_BrandAd .brandRight').prev('.brandAd').addClass('none1');
			
			}
			
		}
		<?php endif; ?>
		$('body').click(mouseLocation);
		function mouseLocation(e)
		{
			var l=(document.body.clientWidth-1200)/2+575;
			if (e.pageX < l ||
				e.pageX > (l + $('.form-fields').outerWidth()-75) ||
				e.pageY < 53 ||
				e.pageY > (53+93 + $('.form-fields').outerHeight()))
			{
				$('.type_of_search').hide();
			}
		}
		$(function(){
			$('.type_of_search li').click(function(){
				var act=$(this).attr('entype');
				var v=$('[name=keyword]').val();
				window.location.href=REAL_SITE_URL+"/index.php?app=search&act="+act+"&keyword="+v
			});
			$('.heyword').focus(function(){
				$('.type_of_search').show();
			});
		})
		//针对中文输入法用鼠标选择时无法获取中文的情况 
		function getInputValue(val){
			$(function(){
				$('.type_of_search li b').html(val);
				if(val == '' || val == '搜索其实很容易')
				{
					$('.type_of_search').hide();
				}else{
					$('.type_of_search').show();					
				}
			})
		}
	</script>
<div id="header" class="w-full">
	<div class="shop-t w clearfix pb10 mb5 pt5">
      <div class="logo mt10">
         <a href="<?php echo $this->_var['site_url']; ?>" title="<?php echo $this->_var['site_title']; ?>"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a>
      </div>
      <div class="top-search">
         <div class="top-search-box clearfix">
             <div class="top-hot-re search-hot-re">
                 <?php if ($this->_var['recommend_search']): ?>
                 <?php $_from = $this->_var['recommend_search']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                 <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 <?php endif; ?>
            </div>
         	<div class="form-fields float-right search-hot-re">
           		<form method="GET" action="<?php echo url('app=search'); ?>">
               		<input type="hidden" name="app" value="search" />
               		<input type="hidden" name="act" value="index" />
               		<input type="text"  autocomplete="off" name="keyword" value="<?php if ($_GET['keyword']): ?><?php echo $_GET['keyword']; ?><?php else: ?>搜索其实很容易<?php endif; ?>" onfocus="if (this.value=='搜索其实很容易') this.value = '';"  class="keyword" style="color:#999;" oninput="getInputValue($(this).val());" onpropertychange="getInputValue($(this).val());"/>
               		<input type="submit" value="搜索" class="submit" hidefocus="true" />
            	</form>
                <ul class="type_of_search">
                    <li entype="index"><span>搜索“<b></b>”<strong>商品</strong></span></li>  
                	<li entype="store"><span>搜索“<b></b>”<strong>店铺</strong></span></li> 
                    <!--<li entype="groupbuy"><span>搜索“<b></b>”<strong>团购</strong></span></li>   -->
                </ul>
         	</div>
             <div class="btm-hot-re search-hot-re">
                 <?php if ($this->_var['recommend_search']): ?>
                 <?php $_from = $this->_var['recommend_search']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                 <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                 <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                 <?php endif; ?>
             </div>
         </div>
      </div>
   </div>
    <div style="top:0px;left:0px;" class="w-full mall-nav">
    	<ul class="w clearfix">
        	<li style="width:240px;height:30px;display:block;" class="float-left"></li>
            <li class="each float-left inline-block"><a class="<?php if ($this->_var['index']): ?>current<?php endif; ?>" href="<?php echo $this->_var['site_url']; ?>">首页</a></li>
            <li class="each float-left inline-block"><a class="" href="/index.php?app=bzhwjbuilding">体验店</a></li>
            <?php $_from = $this->_var['navs']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
            <li class="each float-left inline-block"><a class="<?php if (! $this->_var['index'] && $this->_var['nav']['link'] == $this->_var['current_url']): ?>current<?php endif; ?>" href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a></li>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    	</ul>
    </div>
    <?php if (! $this->_var['index']): ?>
    <div class="w"  style="height:0px;">
        <div class="category" id="category" style="position: relative; top:-30px;">
             <h2 class="title">
                <a href="index.php?app=category">所有商品分类</a>
             </h2>
             <div  style="background:#fff;display:none;" class="menu header_menu">
                 <ul>
                    <?php $_from = $this->_var['g_categories']['gcategories']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_cate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_cate']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_cate']['iteration']++;
?>
                    <li style="border-right: 1px solid #e6e6e6;" class="each each<?php echo $this->_foreach['fe_cate']['iteration']; ?> <?php if ($this->_foreach['fe_cate']['iteration'] % 2 == 0): ?>background<?php endif; ?>" id="cat_<?php echo $this->_foreach['fe_cate']['iteration']; ?>">
                               <h3 class="each-hd each-hd<?php echo $this->_foreach['fe_cate']['iteration']; ?>"><s></s><a class="first_cate" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><?php echo $this->_var['category']['value']; ?></a></h3>                  
                                  <p class="each-col eachCol1"> 
                                      <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
                                      <?php if ($this->_foreach['fe_child']['iteration'] <= 5): ?>
                                      <a href="index.php?app=search&cate_id=<?php echo $this->_var['child']['id']; ?>" title="<?php echo $this->_var['child']['value']; ?>" ><?php echo $this->_var['child']['value']; ?></a>
                                      <?php endif; ?>
                                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                      <b class="overlay odd" style="opacity: 0; visibility: hidden; box-shadow: 0px 2px 2px rgb(170, 170, 170);"></b>
                                  </p>
                                  <p class="each-col"> 
                                      <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_child'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_child']['iteration']++;
?>
                                      <?php if ($this->_foreach['fe_child']['iteration'] > 5 && $this->_foreach['fe_child']['iteration'] <= 10): ?>
                                      <a href="index.php?app=search&cate_id=<?php echo $this->_var['child']['id']; ?>" title="<?php echo $this->_var['child']['value']; ?>" ><?php echo $this->_var['child']['value']; ?></a>
                                      <?php endif; ?>
                                      <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>             
                                       <b class="overlay even" style="opacity: 0; visibility: hidden; box-shadow: 0px -2px 2px rgb(170, 170, 170);"></b>
                                  </p>
                                  <s class="menuIcon"></s> 
                           </li>
                           <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </ul>
                   </div>
            </div>
	</div>
    <?php endif; ?>
</div>
        
