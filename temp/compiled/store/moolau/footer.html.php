<div id="footer-service" class="w">
	<div class="qqww">
    	<?php $_from = $this->_var['store']['online_service']['qq']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'qq');$this->_foreach['fe_qq'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_qq']['total'] > 0):
    foreach ($_from AS $this->_var['qq']):
        $this->_foreach['fe_qq']['iteration']++;
?>
        QQ客服<?php echo $this->_foreach['fe_qq']['iteration']; ?>：<a href="http://wpa.qq.com/msgrd?V=1&amp;Uin=<?php echo htmlspecialchars($this->_var['qq']); ?>&amp;Site=<?php echo htmlspecialchars($this->_var['store']['store_name']); ?>&amp;Menu=yes" target="_blank"><img src="http://wpa.qq.com/pa?p=1:<?php echo htmlspecialchars($this->_var['qq']); ?>:1" alt="有事咨询我"align="absmiddle"></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
            
        <?php $_from = $this->_var['store']['online_service']['ww']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'ww');$this->_foreach['fe_ww'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_ww']['total'] > 0):
    foreach ($_from AS $this->_var['ww']):
        $this->_foreach['fe_ww']['iteration']++;
?>
        旺旺客服<?php echo $this->_foreach['fe_ww']['iteration']; ?>：<a target="_blank" href="http://amos.im.alisoft.com/msg.aw?v=2&uid=<?php echo urlencode($this->_var['ww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" ><img border="0" src="http://amos.im.alisoft.com/online.aw?v=2&uid=<?php echo urlencode($this->_var['ww']); ?>&site=cntaobao&s=1&charset=<?php echo $this->_var['charset']; ?>" alt="有事咨询我" align="absmiddle"/></a>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        
    </div>
    <div class="collect-store">
    	<a href="javascript:collect_store(<?php echo $this->_var['store']['store_id']; ?>)"></a>
    </div>
    <div class="backhome">
    	<a href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"></a>
    </div>
</div>
<!--<div id="footer" class="center auto mt10 w-full">
   <div class="foot-service w auto clearfix">
      <dl>
         <dt class="fts-1"></dt>
         <dd><a href="http://www.gymdw.com">官方认证商家</a></dd>
         <dd><a href="http://www.gymdw.com">100%全场正品</a></dd>
      </dl>
      <dl>
         <dt class="fts-2"></dt>
         <dd><a href="http://www.gymdw.com">新手指南</a></dd>
         <dd><a href="http://www.gymdw.com">官方微博</a></dd>
      </dl>
      <dl>
         <dt class="fts-3"></dt>
         <dd><a href="http://www.gymdw.com">客服专线：0518-86231116</a></dd>
         <dd><a href="http://www.gymdw.com">商家入驻：0518-86231116</a></dd>
      </dl>
      <dl>
         <dt class="fts-4"></dt>
         <dd><a href="http://www.gymdw.com">商家入驻</a></dd>
         <dd><a href="http://www.gymdw.com">了解天诚网</a></dd>
      </dl>
   </div>
   <div class="foot-nav w-full auto">
	  <a href="http://www.gymdw.com">关于本站</a>
	  <a href="http://www.gymdw.com">营销中心</a>
	  <a href="http://www.gymdw.com">合作伙伴</a>
	  <a href="http://www.gymdw.com">帮助中心</a>
	  <a href="http://www.gymdw.com">诚征英才</a>
	  <a href="http://www.gymdw.com">联系我们</a>
	  <a href="http://www.gymdw.com">网站地图</a>
	  <a href="http://www.gymdw.com">版权说明</a>
	  <a href="http://www.gymdw.com">加入商城</a>
	  <a href="http://www.gymdw.com">开放平台</a>
      <a href="http://www.gymdw.com">网站联盟</a>
      <a href="http://www.gymdw.com">手机版</a>
      <a href="http://www.gymdw.com">网站大学</a>
   </div>
   <div class="foot-group">
	<a href="http://www.gymdw.com">名店网</a>：天诚网络 - <a href="http://www.gymdw.com">中国站</a> <a href="http://www.gymdw.com">国际站</a> <a href="http://www.gymdw.com">日文站</a> |
	<a href="http://www.gymdw.com"> 名店网</a> |
	<a href="http://www.gymdw.com">支付宝</a> |
	<a href="http://www.gymdw.com">中国雅虎</a> |
	<a href="http://www.gymdw.com">口碑网</a> |
	<a href="http://www.gymdw.com">集团研究中心</a> |
    <a href="http://www.gymdw.com">阿里会展</a> |
	<a href="http://www.gymdw.com">名店天下</a> |
	<a href="http://www.gymdw.com">快乐天诚网</a>
   </div>
   <div class="copyright">Copyright &copy; 2003-2010 赣榆名店网 版权所有 <?php if ($this->_var['icp_number']): ?><br /><?php echo $this->_var['icp_number']; ?><?php endif; ?> <?php echo $this->_var['statistics_code']; ?> <?php echo $this->_var['async_sendmail']; ?></div>
   </div>-->
</div>
</body>
</html>