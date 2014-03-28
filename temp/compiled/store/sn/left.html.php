        <div class="user">
        	<h3>商家信息</h3>
            <div class="img">
            	<ul>
                    <li><a href="javascript:;">正品保障</a></li>
                    <li><a  href="javascript:;">提供发票</a></li>
                    <li><a  href="javascript:;">七天退换</a></li>
                </ul>
            </div>
            
            <div class="user_data">
                <p>
                    <span>店主: </span><?php echo htmlspecialchars($this->_var['store']['store_owner']['user_name']); ?>
                    <!--<a target="_blank" href="<?php echo url('app=message&act=send&to_id=' . htmlspecialchars($this->_var['store']['store_owner']['user_id']). ''); ?>"><img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="发站内信" /></a>-->
                </p>
                <p>
                    <span>信用度: </span><span class="fontColor1"><?php echo $this->_var['store']['credit_value']; ?></span>
                    <?php if ($this->_var['store']['credit_value'] >= 0): ?><img src="<?php echo $this->_var['store']['credit_image']; ?>" alt="" /><?php endif; ?>
                </p>
                <p>店铺等级: <?php echo $this->_var['store']['sgrade']; ?></p>
                <p>商品数量: <?php echo $this->_var['store']['goods_count']; ?></p>
                <p>所在地区: <?php echo htmlspecialchars($this->_var['store']['region_name']); ?></p>
                <p>创店时间: <?php echo local_date("Y-m-d",$this->_var['store']['add_time']); ?></p>
                <?php if ($this->_var['store']['certifications']): ?>
                <p>
                    <span>认证: </span>
                    <span>
                        <?php $_from = $this->_var['store']['certifications']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cert');if (count($_from)):
    foreach ($_from AS $this->_var['cert']):
?>
                        <?php if ($this->_var['cert'] == "autonym"): ?>
                        <a href="<?php echo url('app=article&act=system&code=cert_autonym'); ?>" target="_blank" title="实名认证"><img src="<?php echo $this->res_base . "/" . 'images/cert_autonym.gif'; ?>" /></a>
                        <?php elseif ($this->_var['cert'] == "material"): ?>
                        <a href="<?php echo url('app=article&act=system&code=cert_material'); ?>" target="_blank" title="实体店铺"><img src="<?php echo $this->res_base . "/" . 'images/cert_material.gif'; ?>" /></a>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </span>
                </p>
                <?php endif; ?>
                <?php if ($this->_var['store']['address']): ?>
                <p>详细地址: <?php echo htmlspecialchars($this->_var['store']['address']); ?></p>
                <?php endif; ?>
                <?php if ($this->_var['store']['tel']): ?>
                <p>联系电话: <?php echo htmlspecialchars($this->_var['store']['tel']); ?></p>
                <?php endif; ?>
            </div>
            <div class="other">
                <a class="enter_store" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"></a>
                <a class="collect_store" href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)">收藏该店铺</a>
			</div>
            
        
            <div class="clear"></div>
        </div>
        
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">商品分类</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="submenu">
                        <li><a class="none_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search'); ?>">全部商品</a></li>
                        <?php $_from = $this->_var['store']['store_gcates']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['gcategory']):
?>
                        <?php if ($this->_var['gcategory']['children']): ?>
                        <li>
                            <a class="block_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a>
                            <ul>
                                <?php $_from = $this->_var['gcategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child_gcategory');if (count($_from)):
    foreach ($_from AS $this->_var['child_gcategory']):
?>
                                <li><a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['child_gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child_gcategory']['value']); ?></a></li>
                                <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                            </ul>
                        </li>
                        <?php else: ?>
                        <li><a class="none_ico" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. '&act=search&cate_id=' . $this->_var['gcategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['gcategory']['value']); ?></a></li>
                        <?php endif; ?>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php if ($this->_var['store']['hot_saleslist'] || $this->_var['store']['collect_goodslist']): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">商品排行榜</span></span>
            </h2>
            <div class="wrap">
                  <div id="sale_list">
                     <ul class="ks-switchable-nav">
                        <li class="ks-active">热门销售排行</li>
                    	<li>热门收藏排行</li>
                     </ul>
                     <div class="ks-switchable-content">
                         <ul>
                            <?php $_from = $this->_var['store']['hot_saleslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'h_goods');$this->_foreach['fe_saleslist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_saleslist']['total'] > 0):
    foreach ($_from AS $this->_var['h_goods']):
        $this->_foreach['fe_saleslist']['iteration']++;
?>
                            <li <?php if (($this->_foreach['fe_saleslist']['iteration'] == $this->_foreach['fe_saleslist']['total'])): ?>style="border:0;"<?php endif; ?> class="clearfix">
                               <div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['h_goods']['goods_id']. ''); ?>">
                                  <img width="40" height="40" src="<?php echo $this->_var['h_goods']['default_image']; ?>"alt="<?php echo htmlspecialchars(sub_str($this->_var['h_goods']['goods_name'],20)); ?>" title="<?php echo htmlspecialchars($this->_var['h_goods']['goods_name']); ?>" /></a>
                               </div>
                               <div class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['h_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['h_goods']['goods_name']); ?></a></div>
                               <div class="price"><strong><?php echo $this->_var['h_goods']['price']; ?>元</strong></div>
                               <div class="sale"><i></i>已售出 <strong><?php echo $this->_var['h_goods']['sales']; ?></strong> 件</div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                         </ul>
                         <ul style="display:none;">
                            <?php $_from = $this->_var['store']['collect_goodslist']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'c_goods');$this->_foreach['fe_collectlist'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_collectlist']['total'] > 0):
    foreach ($_from AS $this->_var['c_goods']):
        $this->_foreach['fe_collectlist']['iteration']++;
?>
                            <li <?php if (($this->_foreach['fe_collectlist']['iteration'] == $this->_foreach['fe_collectlist']['total'])): ?>style="border:0;"<?php endif; ?> class="clearfix">
                               <div class="pic"><a href="<?php echo url('app=goods&id=' . $this->_var['c_goods']['goods_id']. ''); ?>">
                                  <img width="40" height="40" src="<?php echo $this->_var['c_goods']['default_image']; ?>" alt="<?php echo htmlspecialchars(sub_str($this->_var['c_goods']['goods_name'],20)); ?>" title="<?php echo htmlspecialchars($this->_var['c_goods']['goods_name']); ?>" /></a>
                               </div>
                               <div class="desc"><a href="<?php echo url('app=goods&id=' . $this->_var['c_goods']['goods_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['c_goods']['goods_name']); ?></a></div>
                               <div class="price"><strong><?php echo $this->_var['c_goods']['price']; ?>元</strong></div>
                               <div class="collecter"><i></i>收藏人气&nbsp;&nbsp;<?php echo $this->_var['c_goods']['collects']; ?></div>
                            </li>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                         </ul>
                     </div>
                  </div>
          	</div>
        </div>
         <script>
			KISSY.ready(function(S) {
				var tabs = new S.Tabs('#sale_list',{
							aria:true
						});
		
			});
		</script>
        <?php endif; ?>
        <?php if ($_GET['app'] == "store" && $_GET['act'] == "index"): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">友情链接</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="submenu">
                        <?php $_from = $this->_var['partners']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'partner');if (count($_from)):
    foreach ($_from AS $this->_var['partner']):
?>
                        <li><a class="link_ico" href="<?php echo $this->_var['partner']['link']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['partner']['title']); ?></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>
        <?php if ($_GET['app'] == "goods"): ?>
        <div class="module_common">
            <h2 class="common_title veins1">
                <div class="ornament1"></div>
                <div class="ornament2"></div>
                <span class="ico1"><span class="ico2">浏览历史</span></span>
            </h2>
            <div class="wrap">
                <div class="wrap_child">
                    <ul class="annals">
                        <?php $_from = $this->_var['goods_history']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'gh_goods');if (count($_from)):
    foreach ($_from AS $this->_var['gh_goods']):
?>
                        <li><a href="<?php echo url('app=goods&id=' . $this->_var['gh_goods']['goods_id']. ''); ?>"><img src="<?php echo $this->_var['gh_goods']['default_image']; ?>" width="50" height="50" alt="<?php echo htmlspecialchars(sub_str($this->_var['gh_goods']['goods_name'],20)); ?>" title="<?php echo htmlspecialchars($this->_var['gh_goods']['goods_name']); ?>" /></a></li>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php endif; ?>