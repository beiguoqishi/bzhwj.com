<?php echo $this->fetch('top.html'); ?>
<div id="header" class="w1200 clearfix">
	<div title="<?php echo $this->_var['site_title']; ?>" class="logo"><a href="index.php"><img src="<?php echo $this->_var['site_logo']; ?>"></a></div>
    <div class="search">
        <div class="search-box">
            <form method="GET" action="<?php echo url('app=search'); ?>">
                <div class="border">
                    <div class="select_js">
                        <p>搜索商品</p>
                        <div class="ico"></div>
                        <ul>
                            <li ectype="index">搜索商品</li>
                            <li ectype="store">搜索店铺</li>
                            <li ectype="groupbuy">搜索团购</li>
                        </ul>
                        <input type="hidden" name="act" value="index" />
                    </div>
                    <input type="text" name="keyword" class="search-input" value="<?php echo $_GET['keyword']; ?>"/>
                </div>
                <input type="hidden" name="app" value="search" />
                <input type="submit" name="Submit" value="搜索" class="search-btn"/>
            </form>
        </div>
        <div class="hot-word">
			热门搜索:
            <?php $_from = $this->_var['hot_keywords']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'keyword');if (count($_from)):
    foreach ($_from AS $this->_var['keyword']):
?>
            <a href="<?php echo url('app=search&keyword=' . $this->_var['keyword']. ''); ?>"><?php echo $this->_var['keyword']; ?></a>
            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </div>
    </div>
    <div class="topimg">
        <a target="_blank" href="http://www.tcwmall.com"><img width="200" height="50" src="ads/20120706dhl1_indexTopAd.gif"></a>        
    </div>
</div>

<div id="nav">
	<div class="w1200 nav index">
    	 <?php if (! $this->_var['index']): ?>
         <script type="text/javascript">
		 	$(function(){
				$("#allsort").hover(function(){
					$("#allsort i").addClass("ihover");
					$("#allsort-list").css("display","block");
				},function(){
					$("#allsort i").removeClass("ihover");
					$("#allsort-list").css("display","none");
				});
			});
		 </script>
         	<div id="allsort">
            	<h3>
                	<a target="_blank" href="<?php echo url('app=category'); ?>">all_cate</a>
					<i></i>
                </h3>
                <div class="category" id="allsort-list">
               <div class="content">
                  <?php $_from = $this->_var['gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'category');$this->_foreach['fe_gcate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_gcate']['total'] > 0):
    foreach ($_from AS $this->_var['category']):
        $this->_foreach['fe_gcate']['iteration']++;
?>
                  <div class="item">
                      <h2><a target="_blank" href="<?php echo url('app=search&cate_id=' . $this->_var['category']['id']. ''); ?>"><i></i><?php echo htmlspecialchars($this->_var['category']['value']); ?></a><div class="up"></div></h2>
                      <div class="out">
                          <div class="subcategory">
                                <?php $_from = $this->_var['category']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');$this->_foreach['fe_children'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_children']['total'] > 0):
    foreach ($_from AS $this->_var['child']):
        $this->_foreach['fe_children']['iteration']++;
?>
                                <dl class="clearfix" <?php if (($this->_foreach['fe_children']['iteration'] <= 1)): ?> style=" border:none;"<?php endif; ?>>
                                    <dt><a style="border:none;" title="<?php echo htmlspecialchars($this->_var['child']['value']); ?>" target="_blank" href="<?php echo url('app=search&cate_id=' . $this->_var['child']['id']. ''); ?>"><strong><?php echo htmlspecialchars($this->_var['child']['value']); ?></strong></a></dt>
                                    <dd>
                                   <?php $_from = $this->_var['child']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child2');$this->_foreach['fe_child2'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_child2']['total'] > 0):
    foreach ($_from AS $this->_var['child2']):
        $this->_foreach['fe_child2']['iteration']++;
?>
                                   <a target="_blank" <?php if (($this->_foreach['fe_child2']['iteration'] == $this->_foreach['fe_child2']['total'])): ?> class="nbd" <?php endif; ?> title="<?php echo $this->_var['child2']['value']; ?>" href="<?php echo url('app=search&cate_id=' . $this->_var['child2']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child2']['value']); ?></a>
                                   <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                                       &nbsp;
                                    </dd>
                                </dl>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                          </div>
                      </div>
                  </div>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
            </div>
          <?php else: ?>
          <div id="allsort">
            	<h3>
                	<a target="_blank" href="<?php echo url('app=category'); ?>">所有商品分类</a>
                </h3>
          </div>
         <?php endif; ?>
         <ul>
            <li><a class="<?php if ($this->_var['index']): ?>on<?php else: ?><?php endif; ?>" href="index.php" >首页</a></li>
            <?php $_from = $this->_var['navs']['middle']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
            	<li><a class="<?php if (! $this->_var['index'] && $this->_var['nav']['link'] == $this->_var['current_url']): ?>on<?php else: ?><?php endif; ?>" href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a></li>
    		<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        </ul>
        <div class="myCart">
            <div class="goodsNum">
            	<span class="tTitle">购物车: <strong><?php echo $this->_var['cart_goods_kinds']; ?></strong>jian</span>
            </div>
            <p class="navPay"><a href="<?php echo url('app=cart'); ?>">go_to_pay</a></p>
        </div>
	</div>
</div>