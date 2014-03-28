<div id="copyright">
     <p>
        <a target="_blank" href="http://www.0851it.com/index.php?app=article&act=view&article_id=19">关于网站帮</a>|
        <a target="_blank" href="http://www.0851it.com/index.php?app=article&act=view&article_id=24">联系我们</a>|
        <a target="_blank" href="http://www.0851it.com/index.php?app=article&act=view&article_id=17">诚聘英才</a>|
        <a target="_blank" href="http://www.0851it.com/index.php?app=article&act=view&article_id=16" >商家入驻</a>|
        <a target="_blank" href="http://www.0851it.com" >广告服务</a>|
        <a target="_blank" href="http://www.0851it.com">友情链接</a>|
        <a target="_blank" href="http://www.0851it.com">大事记</a>|
        <?php $_from = $this->_var['navs']['footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
         <a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a>|
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <a target="_blank" href="http://bbs.0851it.com">网站帮论坛</a>
     </p>
        <span><a href="http://www.0851it.com" target="_blank">网站帮 <?php echo $this->_var['ecm_version']; ?></a> &copy; 2012-2013 <?php if ($this->_var['icp_number']): ?><?php echo $this->_var['icp_number']; ?><?php endif; ?> <a title="" target="_blank" href="http://www.viming.net">网站运营：网站帮信息技术有限公司</a><?php echo $this->_var['statistics_code']; ?></span>
    </div>
    <div id="subFooter">
        <span title="银联特约商户"><img alt="银联特约商户" src="ads/morelogo1.png"></span><span title="EC金质服务奖"><img src="ads/Service-Logo.jpg" height="35" /></span><span title="3C创新力量传媒大奖"><img src="ads/3C.jpg" height="35" /></span><span title="网上交易保障中心"><img src="ads/315new.gif" height="35" /></span>      <span title="网上交易保障中心"><img src="ads/morelogo2.png"></span><span title="网上交易保障中心"><img src="ads/morelogo6.png"></span>
        <a target="_blank" title="电子营业执照" href="http://www.0851it.com/ads/yyzz.jpg">
        <img src="ads/morelogo7.png">        </a>    </div>
</body>
</html>