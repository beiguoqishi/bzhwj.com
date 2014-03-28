<?php echo $this->fetch('top.html'); ?>
<script type="text/javascript">
    $(function(){
        //首页左侧分类菜单
        var arr=$('li.each');
        $(".menu ul").find("li.each").each(
                function() {
                    $(this).hover(
                            function() {
                                menu = $("#" + this.id + "_menu");
                                li_top = $(this).position().top;
                                var i = li_top/2;
                                menu.css("top", -i);

                                menu.children('div.subView').removeClass('hidden');
                                $(this).addClass("selected");
                                menu.css('width','755px').css('display','block');
                            },
                            function() {
                                $("#" + this.id + "_menu").css('width', '0');
                                $("#" + this.id + "_menu").children('div.subView').addClass('hidden');
                                $(this).removeClass("selected");
                            }
                    );
                }
        );
        $('.category').hover(
                function(){
                    $(this).children('.header_menu').show();
                },
                function(){
                    $(this).children('.header_menu').hide();
                }
        );
    });
    <?php if ($this->_var['index']): ?>
    $(function(){
        $('.mallLeft .category h2.title b').click(function (){
            $(this).addClass('selected').siblings('b').removeClass('selected');
            if($(this).hasClass('expandCat')){
                $('.menu ul li.each p.each-col').css({'height':'21px','line-height':'21px'});
                $('.menu ul li.each p.eachCol1').css('padding-top','6px');
            }
            else{
                $('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
                $('.menu ul li.each p.eachCol1').css('padding-top','0');
            }
        })
    });
    //左侧仿天猫分类
    window.onscroll=function cate()
    {
        var a=$(document).scrollTop();
        if(a>93){
            $('.category').css('position','fixed');
        }
        else{
            $('#category').css('position','relative');
        }
        if($('.mallLeft .category h2.title b.simpleCat').hasClass('selected'))
        {
            $('.menu ul li.each p.each-col').css({'height':'0','line-height':'0'});
            $('.menu ul li.each p.eachCol1').css('padding-top','0');
        }
        else {
            var arr=$('.menu li.each').length;
            for(var i=1;i<=arr;i++){
                if(a>(70+i*80)){
                    $('.menu ul li.each'+i+' p.each-col').css({'height':'0','line-height':'0'});
                    $('.menu ul li.each'+i+' p.eachCol1').css('padding-top','0');
                }
                else{
                    $('.menu ul li.each'+i+' p.each-col').css({'height':'21px','line-height':'21px'});
                    $('.menu ul li.each'+i+' p.eachCol1').css('padding-top','6px');
                }
                if(a>(70+arr*80))
                {
                    $('.mallLeft .category h2.title b').hide();
                }
                else{
                    $('.mallLeft .category h2.title b').show();
                }
            }
            $('#J_BrandAd .brandRight').prev('.brandAd').addClass('none1');

        }

    }
    <?php endif; ?>
    $('body').click(mouseLocation);
    function mouseLocation(e)
    {
        var l=(document.body.clientWidth-1200)/2+575;
        if (e.pageX < l ||
                e.pageX > (l + $('.form-fields').outerWidth()-75) ||
                e.pageY < 53 ||
                e.pageY > (53+93 + $('.form-fields').outerHeight()))
        {
            $('.type_of_search').hide();
        }
    }
    $(function(){
        $('.type_of_search li').click(function(){
            var act=$(this).attr('entype');
            var v=$('[name=keyword]').val();
            window.location.href=REAL_SITE_URL+"/index.php?app=search&act="+act+"&keyword="+v
        });
        $('.heyword').focus(function(){
            $('.type_of_search').show();
        });
    })
    //针对中文输入法用鼠标选择时无法获取中文的情况
    function getInputValue(val){
        $(function(){
            $('.type_of_search li b').html(val);
            if(val == '' || val == '搜索其实很容易')
            {
                $('.type_of_search').hide();
            }else{
                $('.type_of_search').show();
            }
        })
    }
</script>
<div id="header" class="w-full">
    <div class="shop-t w clearfix pb10 mb5 pt5">
        <div class="logo mt10">
            <a href="<?php echo $this->_var['site_url']; ?>" title="<?php echo $this->_var['site_title']; ?>"><img alt="<?php echo $this->_var['site_title']; ?>" src="<?php echo $this->_var['site_logo']; ?>" /></a>
        </div>
        <div class="top-search">
            <div class="top-search-box clearfix">
                <div class="top-hot-re search-hot-re">
                    <?php if ($this->_var['recommend_search']): ?>
                    <?php $_from = $this->_var['recommend_search']['0']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                    <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                </div>
                <div class="form-fields float-right search-hot-re">
                    <form method="GET" action="<?php echo url('app=search'); ?>">
                        <input type="hidden" name="app" value="search" />
                        <input type="hidden" name="act" value="index" />
                        <input type="text"  autocomplete="off" name="keyword" value="<?php if ($_GET['keyword']): ?><?php echo $_GET['keyword']; ?><?php else: ?>搜索其实很容易<?php endif; ?>" onfocus="if (this.value=='搜索其实很容易') this.value = '';"  class="keyword" style="color:#999;" oninput="getInputValue($(this).val());" onpropertychange="getInputValue($(this).val());"/>
                        <input type="submit" value="搜索" class="submit" hidefocus="true" />
                    </form>
                    <ul class="type_of_search">
                        <li entype="index"><span>搜索“<b></b>”<strong>商品</strong></span></li>
                        <li entype="store"><span>搜索“<b></b>”<strong>店铺</strong></span></li>
                        <!--<li entype="groupbuy"><span>搜索“<b></b>”<strong>团购</strong></span></li>   -->
                    </ul>
                </div>
                <div class="btm-hot-re search-hot-re">
                    <?php if ($this->_var['recommend_search']): ?>
                    <?php $_from = $this->_var['recommend_search']['1']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 're');if (count($_from)):
    foreach ($_from AS $this->_var['re']):
?>
                    <a href="<?php echo htmlspecialchars($this->_var['re']['link']); ?>"><?php echo htmlspecialchars($this->_var['re']['title']); ?></a>
                    <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>