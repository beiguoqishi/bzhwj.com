<div id="copyright">
     <p>
        <a target="_blank" href="http://www.tcwmall.com">关于我们</a>|
        <a target="_blank" href="http://www.tcwmall.com">联系我们</a>|
        <a target="_blank" href="http://www.tcwmall.com">诚聘英才</a>|
        <a target="_blank" href="http://www.tcwmall.com" >商家入驻</a>|
        <a target="_blank" href="http://www.tcwmall.com" >广告服务</a>|
        <a target="_blank" href="http://www.tcwmall.com">友情链接</a>|
        <a target="_blank" href="http://www.tcwmall.com">销售联盟</a>|
        <?php $_from = $this->_var['navs']['footer']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav');if (count($_from)):
    foreach ($_from AS $this->_var['nav']):
?>
         <a href="<?php echo $this->_var['nav']['link']; ?>"<?php if ($this->_var['nav']['open_new']): ?> target="_blank"<?php endif; ?>><?php echo htmlspecialchars($this->_var['nav']['title']); ?></a>|
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
        <a target="_blank" href="http://www.tcwmall.com">官方论坛</a>
     </p>
        <span>Powered by <a href="http://www.tcwmall.com" target="_blank">PSMB Mall <?php echo $this->_var['ecm_version']; ?></a> &copy; 2003-2009 <?php if ($this->_var['icp_number']): ?><?php echo $this->_var['icp_number']; ?><?php endif; ?> <a title="" target="_blank" href="http://www.tcwmall.com">出版物经营许可证XXX号</a><?php echo $this->_var['statistics_code']; ?></span>
    </div>
    <div id="subFooter">
        <span title="银联特约商户"><img alt="银联特约商户" src="ads/morelogo1.png"></span>
        <a title="可信网站示范单位" href="https://ss.cnnic.cn/verifyseal.dll?sn=2011060700100009557&amp;ct=ic&amp;pa=911439" target="_blank"><img src="ads/morelogo2.png"></a>
        <a target="_blank" title="诚信网站" href="http://search.cxwz.org/cert/l/CX20111018000608000610"><img src="ads/morelogo6.png"></a>
        <a target="_blank" title="电子营业执照" href="http://www.jsgsj.gov.cn:60101/keyLicense/verifKey.jsp?serial=320000163820111118100000007720&amp;signData=N4UZ9zQMSr/gTXN pgV58f7X D1DlCIOWCJ67CH0/5tF4w536vk2tbiyCBK4CKJavjuoGA9EBADR4tLTnd8TCVY7xe0oV/Zi jwNS4DZl1rGXzYTFWZsDEcyESeBzj4W7Xtq3yS9nv0qee4wYz2rURiIZEnJn80ywNhaT71vCbc=">
        <img src="ads/morelogo7.png">
        </a>
    </div>
</body>
</html>