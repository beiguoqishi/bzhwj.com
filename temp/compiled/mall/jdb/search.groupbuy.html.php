<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'search_groupbuy.js'; ?>" charset="utf-8"></script>
<div id="groupbuylist" class="w1200">
   <div class="title">
   <form method="get" action="index.php">
      <input type="hidden" name="app" value="search" />
      <input type="hidden" name="act" value="groupbuy" />
      活动名称
      <input class="table_text" name="keyword" type="text" value="<?php echo htmlspecialchars($_GET['keyword']); ?>" />
      状态
      <select class="display_select" ectype="state">
         <?php echo $this->html_options(array('options'=>$this->_var['state'],'selected'=>$_GET['state'])); ?>
      </select>
	  排序
	  <select ectype="order_by">
	    <option value="">排序</option>
		<option value="views desc">人气</option>
		<option value="end_time asc">剩余时间</option>
	  </select>
      <input class="btn-search-groupbuy" type="submit" name="Submit" value="搜索" />
    </form>
    <div class="pageinfo"><?php echo $this->fetch('page.top.html'); ?></div>
    <div class="clr"></div>             
    </div>
    <div style="margin-top:20px; text-align:center;">
            <table width="100%" cellpadding='0' cellspacing='1' bgcolor="#E5E5E5">
                <tr>
                    <th colspan="2"bgcolor="#EBF4FB" height="30">活动名称</th>
                    <th bgcolor="#EBF4FB">团购价</th>
                    <th bgcolor="#EBF4FB">订购 / 成团</th>
                    <th bgcolor="#EBF4FB">店铺</th>
                    <?php if ($_GET['state'] == 'on'): ?><th  bgcolor="#EBF4FB">剩余时间</th><?php endif; ?>
                </tr>
                <?php $_from = $this->_var['groupbuy_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'group');if (count($_from)):
    foreach ($_from AS $this->_var['group']):
?>
                <tr>
                    <td class="group_pic" bgcolor="#ffffff" width="70" align="center"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><img src="<?php echo $this->_var['group']['default_image']; ?>" alt="<?php echo htmlspecialchars($this->_var['group']['group_name']); ?>" width="70" height="70" align="absmiddle" style="margin:5px;" /></a></td>
                    <td class="apellation" bgcolor="#ffffff" width="300"><a target="_blank" href="<?php echo url('app=groupbuy&id=' . $this->_var['group']['group_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['group']['group_name']); ?></a></td>
                    <td class="price" bgcolor="#ffffff" style="font-family:Arial"><?php echo price_format($this->_var['group']['group_price']); ?></td>
                    <td class="member" bgcolor="#ffffff"><?php echo $this->_var['group']['quantity']; ?> / <?php echo $this->_var['group']['min_quantity']; ?></td>
                    <td class="usershop" bgcolor="#ffffff"><a target="_blank" href="<?php echo url('app=store&id=' . $this->_var['group']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['group']['store_name']); ?></a><br /><a target="_blank" class="email" target="_blank" href="<?php echo $this->_var['site_url']; ?>/index.php?app=message&amp;act=send&amp;to_id=<?php echo $this->_var['group']['store_id']; ?>"><br /><img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="发站内信" /></a></td>
                    <?php if ($_GET['state'] == 'on'): ?>
                    <td class="time" bgcolor="#ffffff"><?php echo $this->_var['group']['lefttime']; ?></td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; else: ?>
                <tr>
                    <td colspan="6" bgcolor="#ffffff">
                    <div style="line-height:30px;">没有找到相关团购活动</div>
                    </td>
                </tr>
                <?php endif; unset($_from); ?><?php $this->pop_vars();; ?>
            </table>
    </div>
    <div class="pageinfo">
         <?php echo $this->fetch('page.bottom.html'); ?>
         <div class="clr"></div>
    </div>
</div>
<?php echo $this->fetch('footer.html'); ?>