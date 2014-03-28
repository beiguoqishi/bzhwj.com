<?php echo $this->fetch('header.html'); ?>
<?php echo $this->fetch('curlocal.html'); ?>
<script type="text/javascript">
//<!CDATA[
$(function (){
    var order = '<?php echo $_GET['order']; ?>';
    var arrow = '';

    switch (order){
        case 'credit_value desc' : order = '';
        arrow = '↓';
        break;
        default : order = 'credit_value desc';
    }
    $('#credit_grade').html('信用度' + arrow);
    $('#credit_grade').click(function(){query('order', order);return false;});
}
);
function query(name, value){
    $("input[name='"+name+"']").val(value);
    $('#search').submit();
}

//]]>
</script>
<div class="content w1200 clearfix">
    <div class="left">
            <div class="cate">
                <h2>店铺分类</h2>
                <div>
                        <?php $_from = $this->_var['scategorys']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'scategory');$this->_foreach['fe_scate'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_scate']['total'] > 0):
    foreach ($_from AS $this->_var['scategory']):
        $this->_foreach['fe_scate']['iteration']++;
?>
                        <dl <?php if (($this->_foreach['fe_scate']['iteration'] <= 1)): ?> style="border:none" <?php endif; ?>>
                            <dt><a href="<?php echo url('app=search&act=store&cate_id=' . $this->_var['scategory']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['scategory']['value']); ?></a></dt>
                            <?php $_from = $this->_var['scategory']['children']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'child');if (count($_from)):
    foreach ($_from AS $this->_var['child']):
?>
                            <dd><a href="<?php echo url('app=search&act=store&cate_id=' . $this->_var['child']['id']. ''); ?>"><?php echo htmlspecialchars($this->_var['child']['value']); ?></a></dd>
                            <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                        </dl>
                        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </div>
            </div>
    </div>
    <div id="storelist" class="right">
       <div class="title">
       <form id="search" method="GET" action="index.php" style="background:none">
           <input type="hidden" name="order" value="<?php echo htmlspecialchars($_GET['order']); ?>"/>
           <input type="hidden" name="app" value="search"/>
           <input type="hidden" name="act" value="store"/>
           <input type="hidden" name="cate_id" value="<?php echo htmlspecialchars($_GET['cate_id']); ?>"/>
             <span class="display_span">店铺名称：</span><input class="table_text" type="text" name="keyword" value="<?php echo htmlspecialchars($this->_var['query']['keyword']); ?>" />
             <span class="display_span">店主：</span><input class="table_text" type="text" name="user_name" value="<?php echo htmlspecialchars($this->_var['query']['user_name']); ?>" />
             <span class="display_span">所在地：</span>
             <select id="region_id" name="region_id" class="display_select">
             <option value="">所在地</option>
              <?php echo $this->html_options(array('options'=>$this->_var['regions'],'selected'=>$this->_var['query']['region_id'])); ?>
              </select>
             <input class="btn-search-store" type="submit" name="Submit" value="搜索" />
        </form> 
        <div class="pageinfo"><?php echo $this->fetch('page.top.html'); ?></div>         
        </div>
        <div style="margin-top:20px; clear:both">
                <table width="100%" cellpadding='0' cellspacing='1' bgcolor="#E5E5E5">
                    <tr>
                        <th colspan="2"bgcolor="#EBF4FB" height="30">店铺</th>
                        <th bgcolor="#EBF4FB">商品数量</th>
                        <th bgcolor="#EBF4FB">店主</th>
                        <th bgcolor="#EBF4FB"><a id="credit_grade" href="javascript:void(0);">信用度</a></th>
                        <th  bgcolor="#EBF4FB">所在地</th>
                    </tr>
                    <?php $_from = $this->_var['stores']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'store');if (count($_from)):
    foreach ($_from AS $this->_var['store']):
?>
                    <tr>
                        <td class="group_pic" bgcolor="#ffffff" width="70" align="center"><a target="_blank" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><img src="<?php echo $this->_var['store']['store_logo']; ?>" width="70" height="70" align="absmiddle" style="margin:5px;" /></a></td>
                        <td class="apellation" bgcolor="#ffffff" width="300" align="center"><a style="margin-left:10px;" href="<?php echo url('app=store&id=' . $this->_var['store']['store_id']. ''); ?>"><?php echo htmlspecialchars($this->_var['store']['store_name']); ?></a></td>
                        <td class="price" bgcolor="#ffffff" style="font-family:Arial" align="center"><?php echo $this->_var['store']['goods_count']; ?></td>
                        <td class="member" bgcolor="#ffffff" align="center"><p class="name"><?php echo htmlspecialchars($this->_var['store']['user_name']); ?></p><a target="_blank" class="email" href="<?php echo $this->_var['site_url']; ?>/index.php?app=message&amp;act=send&amp;to_id=<?php echo $this->_var['store']['user_id']; ?>" align="center"><img src="<?php echo $this->res_base . "/" . 'images/web_mail.gif'; ?>" alt="发站内信" /></a></td>
                        <td class="usershop" bgcolor="#ffffff" align="center">
                            <?php if ($this->_var['store']['credit_value'] >= 0): ?>
                            <img src="<?php echo $this->_var['store']['credit_image']; ?>" />
                            <?php else: ?>
                            <?php echo $this->_var['store']['credit_value']; ?>
                            <?php endif; ?>
                        </td>
                        <td class="time" bgcolor="#ffffff" align="center"><?php echo htmlspecialchars($this->_var['store']['region_name']); ?></td>
                    </tr>
                    <?php endforeach; else: ?>
                    <tr>
                        <td colspan="6" bgcolor="#ffffff" align="center">
                        <div style="line-height:30px;">没有你要找的店铺</div>
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
</div>

<?php echo $this->fetch('footer.html'); ?>