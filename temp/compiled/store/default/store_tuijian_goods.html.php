<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
</head>
<body>
<?php if ($this->_var['store_id'] > 0): ?>
<a href="http://admin.bzhwj.com/generaldata/page_interpose_intellij?table=app_bzhwj_tuijian_goods&app_id=3&custom_js=window.store_id=<?php echo $this->_var['store_id']; ?>" target="_blank">增加</a>
<?php endif; ?>
<div style="margin-top: 20px">
    <h1>推荐商品列表</h1>
    <?php if ($this->_var['goods_list']): ?>
    <ul>
        <?php $_from = $this->_var['goods_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'person');if (count($_from)):
    foreach ($_from AS $this->_var['person']):
?>
        <li>
            <a href="http://admin.bzhwj.com/generaldata/page_interpose_intellij?table=app_bzhwj_tuijian_goods&app_id=3&custom_js=window.store_id=<?php echo $this->_var['person']['store_id']; ?>&id=<?php echo $this->_var['person']['id']; ?>" target="_blank"><?php echo htmlspecialchars($this->_var['person']['title']); ?></a>
            <a style="margin-left: 20px" href="/index.php?app=storeinterpose&act=store_tuijian_goods_do_delete&id=<?php echo $this->_var['person']['id']; ?>">删除</a>
        </li>
        <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
    </ul>
    <?php endif; ?>
</div>
</body>
</html>
