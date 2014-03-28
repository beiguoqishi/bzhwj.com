<?php echo $this->fetch('header.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_goods.js'; ?>" charset="utf-8"></script>
<script type="text/javascript">
var upimg   = '<?php echo $this->res_base . "/" . 'images/up.gif'; ?>';
var downimg = '<?php echo $this->res_base . "/" . 'images/down.gif'; ?>';
imgUping = new Image();
imgUping.src = upimg;

$(function(){
	$("#sort ul li").click(function(){
		//$("#sort ul").css("display","none");
		replaceParam('order', this.title);
        return false;
	});
	var title = '<?php echo $_GET['order']; ?>';
	if(title)
	{
		var arr = title.split(' ');
		if(arr[1]=='desc')
		{
			$("#sort b").addClass("desc");
		}
		else if(arr[1]=='asc')
		{
			$("#sort b").addClass("asc");
		}
		else
		{
			$("#sort b").addClass("none");
		}
		var txt = $("#sort ul li[title="+title+"]").text();
		$("#sort b").text(txt);
	}
	
	$("[ectype='ul_category'] dt").click(function(){
		$("[ectype='ul_category'] dt").each(function(){
			$("dl[ectype='ul_category']").removeClass("foc");
			$("dl[ectype='ul_category'] dt").removeClass("foc");
			$("dl[ectype='ul_category'] dd").removeClass("foc");
		});
		$(this).addClass("foc");
		$(this).parent().addClass("foc");
		$(this).next().addClass("foc");
	});
});
</script>


<div class="search w1200 clearfix">
	<?php echo $this->fetch('curlocal.html'); ?>
    <div class="content">
        <div class="left">            
                <div class="gcategory">
                    <h2><b><?php echo $this->_var['cate_name']; ?></b></h2>
                    <div class="content" <?php if (! $this->_var['cate_name']): ?> style="border-top:1px solid #D5DCEE" <?php endif; ?>>
                        <?php $_from = $this->_var['cate']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_category'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_category']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_category']['iteration']++;
?>
                        <dl class="clearfix pl10 <?php if ($this->_var['category']['open']): ?>foc<?php endif; ?>" ectype="ul_category">
                            <dt class="pl10 <?php if ($this->_var['category']['open']): ?>foc<?php endif; ?>"><a href="javascript:void(0);" id="<?php echo $this->_var['category']['cate_id']; ?>"><?php echo htmlspecialchars($this->_var['category']['cate_name']); ?></a></dt>
                           <dd  class="<?php if ($this->_var['category']['open']): ?> foc <?php endif; ?>">
                                <?php $_from = $this->_var['category']['child']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                                <span><a href="javascript:void(0);" id="<?php echo $this->_var['child']['cate_id']; ?>" class="<?php if ($_GET['cate_id'] == $this->_var['child']['cate_id']): ?> foc <?php endif; ?>"><?php echo htmlspecialchars($this->_var['child']['cate_name']); ?></a></span>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?> 
                           </dd> 
                        </dl>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </div>
                </div>
                <div class="hot_sale mt10">
                    <div class="title">热销排行 </div>
                    <ul class="clearfix">
                        <?php $_from = $this->_var['hot_sales']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');$this->_foreach['fe_goods'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods']['total'] > 0):
    foreach ($_from AS $this->_var['goods']):
        $this->_foreach['fe_goods']['iteration']++;
?>
                        <li class="clearfix">
                            <i class="foc"><?php echo $this->_foreach['fe_goods']['iteration']; ?></i>
                            <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>">
                            <img width="60" height="60" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" src="<?php echo $this->_var['goods']['default_image']; ?>">
                            </a>
                            <div>
                                <p class="name"><a name="rcmd_trd_c1" target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a></p>
                                <p class="price"><b>￥</b><?php echo $this->_var['goods']['price']; ?></p>
                            </div>
                        </li>  
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>              
                    </ul>
                </div>
        </div>
    
        <div class="right clearfix">
            <div class="search_recom clearfix">
                <ul class="tab">
                    <li>本类推荐商品</li>
                </ul>
                <div class="carousel">
                  <div class="prev_next">
                    <a class="prev" href="javascript:;"></a>
                    <a class="next" href="javascript:;"></a> 
                  </div>
                  <div class="scroller">
                     <ul class="ks-content ks-switchable-content">
                        <?php $_from = $this->_var['rec_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <li>
                            <a target="_blank" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>"><img width="100" height="100" src="<?php echo $this->_var['goods']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>"></a>
                            <div>
                                <span>
                                <a title="<?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?>" target="_blank" href="prd_10052_10051_-7_1211575_.html"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></a>
                                </span>
                                <p><b>￥</b><?php echo $this->_var['goods']['price']; ?></p>
                            </div>
                       </li>       
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                      </ul>
                    </div>
                 </div>
                <script>
                    KISSY.use("switchable", function(S) {
                    var tiny_slide = new S.Carousel('.carousel', {
                    steps:4,
                    effect: 'scrollx',
                    easing: 'easeOutStrong',
                    circular: true,
                    prevBtnCls: 'prev',
                    nextBtnCls: 'next',
                    disableBtnCls: 'disable',
                    interval:4,
                    aria:false,
                    autoplay:true,
                    lazyDataType: 'img-src' //延迟加载图片？
                    });
                    });
                </script>
            </div>
            <div class="module_filter">
                <div class="module_filter_line">
                    <div class="filterCond">商品筛选&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($this->_var['filters']): ?><a id="dorpall" title="<?php echo $_GET['cate_id']; ?>" href="javascript:void(0)">重置筛选条件</a><?php endif; ?>				                </div>
                    <?php if ($this->_var['brands']): ?>
                    <div class="contain_list" ectype="dropdown_filter_content" ecvalue="brand">
                        <div class="title">品牌:</div>
                        <ul ectype="ul_brand">
                            <?php if ($this->_var['filters']['brand']): ?>
                            <li><a class="foc" href="javascript:void(0);" title="brand"><?php echo htmlspecialchars($this->_var['filters']['brand']['value']); ?></a></li>
                            <?php else: ?>
                                <?php $_from = $this->_var['brands']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                                <li><a class="no" href="javascript:void(0);" title="<?php echo $this->_var['row']['brand']; ?>" id="<?php echo urlencode($this->_var['row']['brand']); ?>"><?php echo htmlspecialchars($this->_var['row']['brand']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['price_intervals'] || $this->_var['filters']['price']): ?>
                    <div class="contain_list" ectype="dropdown_filter_content" ecvalue="price">
                        <div class="title">价格: </div>
                        <ul ectype="ul_price">
                            <?php if ($this->_var['filters']['price']): ?>
                            <li><a class="foc" href="javascript:void(0);" title="price"><?php echo $this->_var['filters']['price']['value']; ?></a></li>
                            <?php else: ?>
                                <?php $_from = $this->_var['price_intervals']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                                <li><a class="no" href="javascript:void(0);" title="<?php echo $this->_var['row']['min']; ?> - <?php echo $this->_var['row']['max']; ?>"><?php echo price_format($this->_var['row']['min']); ?> - <?php echo price_format($this->_var['row']['max']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                             <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                    <?php if ($this->_var['regions']): ?>
                    <div class="contain_list" ectype="dropdown_filter_content" ecvalue="region">
                        <div class="title">所在地区:</div>
                        <ul ectype="ul_region">
                            <?php if ($this->_var['filters']['region_id']): ?>
                            <li><a class="foc" href="javascript:void(0);" title="region_id"><?php echo htmlspecialchars($this->_var['filters']['region_id']['value']); ?></a></li>
                            <?php else: ?>
                                <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                                <li><a class="no" href="javascript:void(0);" id="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"><?php echo htmlspecialchars($this->_var['row']['region_name']); ?> (<?php echo $this->_var['row']['count']; ?>)</a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            <?php endif; ?>
                        </ul>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="shop_con_list">
                <div class="conditions">
                  <div class="bar clearfix">
                  	 <span class="floatl">
                         <a class="type" href="javascript:;" ectype="display_mode" ecvalue="list">切换到列表</a>
                         <a href="javascript:;" ectype="display_mode" ecvalue="squares" class="type square">切换到大图</a>
                         <div id="sort" class="mr10 clearfix">
                            <b title="<?php echo $_GET['order']; ?>">默认排序</b>
                            <ul>
                                <li class="desc" title="sales desc">销量从高到低</li>
                                <li class="desc" title="credit_value desc">信用度从高到低</li>
                                <li class="asc" title="price asc">价格从低到高</li>
                                <li class="desc" title="price desc">价格从高到低</li>
                                <li class="desc" title="views desc">按浏览量排序</li>
                                <li class="desc" title="add_time desc">按发布时间排序</li>
                                <li class="none" title="">默认排序</li>
                            </ul>
                            <i class="arrow"></i>
                         </div>
                         <span class="region">
                             所在地区：
                             <select ectype="select_region">
                                <option value="">请选择</option>
                                <?php $_from = $this->_var['regions']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'row');if (count($_from)):
    foreach ($_from AS $this->_var['row']):
?>
                                <option value="<?php echo $this->_var['row']['region_id']; ?>" title="<?php echo htmlspecialchars($this->_var['row']['region_name']); ?>"<?php if ($_GET['region_id'] == $this->_var['row']['region_id']): ?> selected="selected"<?php endif; ?>><?php echo htmlspecialchars($this->_var['row']['region_name']); ?></option>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                             </select>
                         </span>
                     </span>	
                      <?php if ($this->_var['goods_list']): ?>
                        <?php echo $this->fetch('page.top.html'); ?>
                     <?php endif; ?>
                  </div>
               </div>
                <div class="<?php echo $this->_var['display_mode']; ?>" ectype="current_display_mode">
                    <?php if ($this->_var['goods_list']): ?>
                    <div class="list_pic">
                        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods');if (count($_from)):
    foreach ($_from AS $this->_var['goods']):
?>
                        <dl>
                             <p><a hidefocus="true" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><img width="160" height="160" src="<?php echo $this->_var['goods']['default_image']; ?>" /></a></p>
                             <dt><a hidefocus="true" href="<?php echo url('app=goods&id=' . $this->_var['goods']['goods_id']. ''); ?>" target="_blank"><?php echo sub_str(htmlspecialchars($this->_var['goods']['goods_name']),40); ?></a></dt>
                             <dd class="price">&yen; <em><?php echo $this->_var['goods']['price']; ?></em><span>最近成交 <?php echo ($this->_var['goods']['sales'] == '') ? '0' : $this->_var['goods']['sales']; ?> 件</span></dd>
                             <!--<dd class="opre"><a href="javascript:add_to_cart('',1);">购买</a><a href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);">收藏</a><a class="cart">加入购物车</a></dd>-->
                        </dl>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    
                        <div class="clear"></div>
                    </div>
                    <?php else: ?>
                    <div class="no_results">很抱歉! 没有找到相关商品</div>
                    <?php endif; ?>
                </div>
            </div>
            <?php if ($this->_var['goods_list']): ?>
             <div class="shop_list_page">
                    <?php echo $this->fetch('page.bottom.html'); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

</div>
<?php echo $this->fetch('service.html'); ?>
<?php echo $this->fetch('footer.html'); ?>
