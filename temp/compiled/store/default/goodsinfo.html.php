<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'goodsinfo.js'; ?>" charset="utf-8"></script>

<h2 class="ware_title"><?php echo htmlspecialchars($this->_var['goods']['goods_name']); ?></h2>

<div class="ware_info">
    <div class="ware_pic">
        <div class="big_pic">
            <a href="javascript:;"><span class="jqzoom"><img src="<?php echo ($this->_var['goods']['pics']['0']['pic'] == '') ? $this->_var['default_image'] : $this->_var['goods']['pics']['0']['pic']; ?>" width="300" height="300" jqimg="<?php echo $this->_var['goods']['pics']['0']['pic']; ?>" /></span></a>
        </div>

        <div class="bottom_btn">
            <a class="collect" href="javascript:collect_goods(<?php echo $this->_var['goods']['goods_id']; ?>);" title="收藏该商品"></a>
            <div class="left_btn"></div>
            <div class="right_btn"></div>
            <div class="ware_box">
                <ul>
                    <?php $_from = $this->_var['goods']['pics']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'goods_image');$this->_foreach['fe_goods_image'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['fe_goods_image']['total'] > 0):
    foreach ($_from AS $this->_var['goods_image']):
        $this->_foreach['fe_goods_image']['iteration']++;
?>
                    <li <?php if (($this->_foreach['fe_goods_image']['iteration'] <= 1)): ?>class="ware_pic_hover"<?php endif; ?> bigimg="<?php echo $this->_var['goods_image']['pic']; ?>"><img src="<?php echo $this->_var['goods_image']['pic']; ?>" width="55" height="55" /></li>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </div>
        </div>
        <script>
            $(function(){
                var btn_list_li = $("#btn_list > li");
                btn_list_li.hover(function(){
                    $(this).find("ul:not(:animated)").slideDown("fast");
                },function(){
                    $(this).find("ul").slideUp("fast");
                });
            });
        </script>
    </div>

    <div class="ware_text">
        <div class="rate">
            <span class="letter1">价格: </span><span class="fontColor3" ectype="goods_price"><?php echo price_format($this->_var['goods']['price']); ?></span><br />
            <span class="letter1">品牌: </span><?php echo htmlspecialchars($this->_var['goods']['brand']); ?><br />
            标签(TAG):&nbsp;&nbsp;<?php $_from = $this->_var['goods']['tags']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'tag');if (count($_from)):
    foreach ($_from AS $this->_var['tag']):
?><?php echo $this->_var['tag']; ?>&nbsp;&nbsp;&nbsp;<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?><br />
            <span class="letter1">功效:</span><?php echo htmlspecialchars($this->_var['goods']['effect']); ?><br/>
            <span class="letter1">适用人群:</span><?php echo htmlspecialchars($this->_var['goods']['suit_people']); ?><br/>
            <!--销售情况: <?php echo $this->_var['sales_info']; ?><?php echo $this->_var['comments']; ?><br />-->
            所在地区: <?php echo htmlspecialchars($this->_var['store']['region_name']); ?>
        </div>
        <?php if ($this->_var['goods']['lianbao']): ?>
        <div style="padding-left: 20px">
            <span style="padding: 8px 12px;border-radius: 3px;font-size: 14px;color: white;background:-moz-linear-gradient(top,#f50,#f00);background: -webkit-gradient(linear,0 0,0 50%,from(#f50),to(#f00));background: -o-linear-gradient(top,#f50,#f00);">百真联保</span>
        </div>
        <?php endif; ?>
        <?php if (! $this->_var['share']): ?>
        <ul id="btn_list">
            <li id="btn_list1" title="收藏该商品">
                <ul class="drop_down">
                    <?php $_from = $this->_var['share']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                    <?php if ($this->_var['item']['type'] == 'collect'): ?><li><?php if ($this->_var['item']['logo']): ?><img src="<?php echo $this->_var['item']['logo']; ?>" /><?php endif; ?><a target="_blank" href="<?php echo $this->_var['item']['link']; ?>"><?php echo htmlspecialchars($this->_var['item']['title']); ?></a></li><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </li>
            <li id="btn_list2" title="分享该商品">
                <ul class="drop_down">
                    <?php $_from = $this->_var['share']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'item');if (count($_from)):
    foreach ($_from AS $this->_var['item']):
?>
                    <?php if ($this->_var['item']['type'] == 'share'): ?><li><?php if ($this->_var['item']['logo']): ?><img src="<?php echo $this->_var['item']['logo']; ?>" /><?php endif; ?><a target="_blank" href="<?php echo $this->_var['item']['link']; ?>"><?php echo htmlspecialchars($this->_var['item']['title']); ?></a></li><?php endif; ?>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                </ul>
            </li>
        </ul>
        <?php endif; ?>
    </div>

    <div class="clear"></div>
</div>