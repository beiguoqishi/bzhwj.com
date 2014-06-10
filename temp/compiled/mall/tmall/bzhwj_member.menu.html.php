<div id="left">
    <h2>
        <strong title="用户中心"></strong>
        <div class="adorn1"></div>
        <div class="adorn2"></div>
    </h2>
    <dl>
        <dt>我的收藏</dt>
        <dd>
            <a href="/index.php?app=my_favorite&type=store" class="normal" target="_self"><span class="ico11">收藏的美容院</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=my_favorite" class="normal" target="_self"><span class="ico8">收藏的项目</span></a>
        </dd>
    </dl>
    <dl>
        <dt>预约体验</dt>
        <dd>
            <a href="/index.php?app=bzhwj_user_appointment" class="cur normal" target="_self"><span class="ico10">我的预约体验</span></a>
        </dd>
    </dl>
    <dl>
        <dt>会员社区</dt>
        <dd>
            <a href="/index.php?app=bzhwj_member_community" class="cur normal" target="_self"><span class="ico4">会员社区</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=bzhwj_weiquan" class="cur normal" target="_self"><span class="ico15">维权退款</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=bzhwj_xinshou" class="cur normal" target="_self"><span class="ico5">新手上路</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=bzhwj_lianxi" class="cur normal" target="_self"><span class="ico3">联系我们</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=bzhwj_kefu" class="cur normal" target="_self"><span class="ico10">联系客服</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=bzhwj_online_help" class="cur normal" target="_self"><span class="ico11">在线帮助</span></a>
        </dd>
        <dd>
            <a href="/index.php?app=member&act=profile" class="cur normal" target="_self"><span class="ico11">个人信息</span></a>
        </dd>
    </dl>
    <?php if ($this->_var['_member_menu']['overview']): ?>
    <div class="application">
        <!--<p>您目前不是卖家，您可以: </p>-->
        <!--<a href="<?php echo $this->_var['_member_menu']['overview']['url']; ?>" title="<?php echo $this->_var['_member_menu']['overview']['text']; ?>"></a>-->
    </div>
    <div class="clear"></div>
    <?php endif; ?>
    <div class="adorn_bottom"></div>
</div>
