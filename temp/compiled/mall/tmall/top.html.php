<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<base href="<?php echo $this->_var['site_url']; ?>/" target="_blank"/>
<meta http-equiv="Content-Type" content="text/html; charset=<?php echo $this->_var['charset']; ?>" />
<?php echo $this->_var['page_seo']; ?>

<meta name="author" content="Cengnlaeng" />
<meta name="generator" content="Bluefish 2.2.2" />
<meta name="copyright" content="ShopEx Inc. All Rights Reserved" />

<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/header.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/footer.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/main.css'; ?>" rel="stylesheet" />
<link type="text/css" href="<?php echo $this->res_base . "/" . 'css/tmall.css'; ?>" rel="stylesheet" />

<script type="text/javascript" src="index.php?act=jslang"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'jquery.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'ecmall.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'cart.js'; ?>" charset="utf-8"></script>
<script type="text/javascript" src="<?php echo $this->res_base . "/" . 'js/main.js'; ?>" charset="utf-8"></script> 
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/kissy.js'; ?>"></script>
<script type="text/javascript" src="<?php echo $this->lib_base . "/" . 'kissy/build/switchable/switchable-pkg.js'; ?>"></script>
<!--[if lte IE 6]>
<script type="text/javascript" language="Javascript" src="<?php echo $this->res_base . "/" . 'js/hoverForIE6.js'; ?>"></script>
<![endif]-->

<script type="text/javascript">
//<!CDATA[
var SITE_URL = "<?php echo $this->_var['site_url']; ?>";
var REAL_SITE_URL = "<?php echo $this->_var['real_site_url']; ?>";
var PRICE_FORMAT = '<?php echo $this->_var['price_format']; ?>';
//]]>
</script>

<?php echo $this->_var['_head_tags']; ?>
<!--<editmode></editmode>-->
    <style type="text/css">
        .user-area {
            float: left;
            margin-right: 450px;
            margin-left: 15px;
        }
        .user-area .cur-city {
            color: #f30;
            font-weight: bold;
        }
        .user-area .switch-city {
            font-weight: bold;
            margin-left: 10px;
        }
        #site-nav .quick-menu li.login_area {
            margin-right: auto!important;
        }
        .zone-switch * ,.city-zones{
            color: #333!important;
            line-height: 1em;
        }
    </style>
</head>
<body>
<div id="site-nav" class="w-full">
   <div class="shoptop w clearfix">
      <div class="login_info">
         
      </div>
      <ul class="quick-menu" style="float: left">
      
         <li style="line-height:23px;" class="login_area">您好,
         <?php if (! $this->_var['visitor']['user_id']): ?>
         <?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></li>
         <li class="login_area">[<a class="ml5 mr5" href="<?php echo url('app=member&act=login&ret_url=' . $this->_var['ret_url']. ''); ?>">登录</a>]</li>
         <li style="margin-right: 738px" class="login_area">[<a class="ml5 mr5" href="<?php echo url('app=member&act=register&ret_url=' . $this->_var['ret_url']. ''); ?>">注册</a>]</li>
         <?php else: ?>
         <a href="<?php echo url('app=member'); ?>"><span><?php echo htmlspecialchars($this->_var['visitor']['user_name']); ?></span></a></li>
         <li class="login_area"><a href="<?php echo url('app=member&act=logout'); ?>">退出</a></li>
         <li style="margin-right: 730px" class="login_area"></li>
         <?php endif; ?>
          <?php if ($this->_var['cur_loc']): ?>
          <li class="user-area">
              <span class="cur-city" data-zid="<?php echo $this->_var['cur_loc']['zid']; ?>" data-pid="<?php echo $this->_var['cur_loc']['pid']; ?>" data-cid="<?php echo $this->_var['cur_loc']['cid']; ?>"><?php echo htmlspecialchars($this->_var['cur_city']); ?></span>
              <a href="javascript:void(0)" class="switch-city">切换城市</a>
              <span class="zone-switch" style="display: none">
                  <?php if ($this->_var['provinces']): ?>
              <select class="all-provinces">
                  <?php $_from = $this->_var['provinces']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'prov');if (count($_from)):
    foreach ($_from AS $this->_var['prov']):
?>
                  <option value="<?php echo $this->_var['prov']['id']; ?>" <?php if ($this->_var['l_cur_pid'] == $this->_var['prov']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['prov']['name']); ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>

              <?php endif; ?>
              <?php if ($this->_var['cities']): ?>
              <select class="all-cities">
                  <?php $_from = $this->_var['cities']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'city');if (count($_from)):
    foreach ($_from AS $this->_var['city']):
?>
                  <option value="<?php echo $this->_var['city']['id']; ?>" <?php if ($this->_var['l_cur_cid'] == $this->_var['city']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['city']['name']); ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <?php endif; ?>
                  <button type="button" class="do-switch-city">确定</button>
              </span>
              <?php if ($this->_var['city_zones']): ?>
              <select class="city-zones">
                  <?php $_from = $this->_var['city_zones']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'zone');if (count($_from)):
    foreach ($_from AS $this->_var['zone']):
?>
                  <option value="<?php echo $this->_var['zone']['id']; ?>" <?php if ($this->_var['l_cur_zid'] == $this->_var['zone']['id']): ?>selected=""<?php endif; ?>><?php echo htmlspecialchars($this->_var['zone']['name']); ?></option>
                  <?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
              </select>
              <?php endif; ?>
          </li>
          <?php endif; ?>
     </ul>
       <ul class="quick-menu" style="float: right">
           <li class="service">
               <a href="/index.php?app=bzhwjbuilding">项目推荐</a>
           </li>
           <li class="service">
               <a href="/index.php?app=newestgoods">最新项目</a>
           </li>
           <li class="item">
               <div class="menu favorite">
                   <a class="menu-hd" href="<?php echo url('app=my_favorite'); ?>">收藏夹<b></b></a>
                   <div class="menu-bd">
                       <div class="menu-bd-panel">
                           <div>
                               <p><a href="<?php echo url('app=my_favorite'); ?>">收藏的宝贝</a></p>
                               <p><a href="<?php echo url('app=my_favorite&type=store'); ?>">收藏的店铺</a></p>
                           </div>
                       </div>
                   </div>
               </div>
           </li>
           <li class="service">
               <a href="/index.php?app=bzhwj_kefu">联系客服</a>
           </li>
       </ul>
   </div>
</div>
<script>
    $('.switch-city').on('click',function(e) {
        var $this = $(this);
        $this.hide();
        $('.zone-switch').show();
    });
    $('body').on('click','.zone-switch .do-switch-city',function(e) {
        $('.switch-city,.cur-city')
                .data('pid',$('.all-provinces').val())
                .data('cid',$('.all-cities').val())
                .data('zid',$('.city-zones').val())
                .show();

        $('.cur-city').text($('.all-cities').find('option:selected').text());
        $('.zone-switch').hide();
        var query = location.search || '',
                params = {};
            var arr = query.split("&"),item;
            $.each(arr,function(idx,el) {
                item = el.split('=');
                params[item[0]] = item[1];
            });
            params['c_pid'] = $('.all-provinces').val();
            params['c_cid'] = $('.all-cities').val();
        var search = '';
        $.each(params,function(k,v) {
            if (k) {
                search += k + '=' + v + '&';
            }
        });
        location.href = 'http://' + location.host + location.pathname + search + '#' + location.hash;
    }).on('change','.all-provinces',function(e) {
         var pid = $(this).val();
        $.post("/index.php?app=lbs&act=lbs_get_cities_by_pid",{
            pid:pid
        },function(d) {
            var allCities = $('.all-cities');
            allCities.empty();
            $.each(d,function(idx,el) {
                allCities.append(
                        $("<option>").val(el.id).text(el.name)
                );
                if (idx == 0) {
                    changeZone(pid,el.id);
                }
            });
        });
    }).on('change','.all-cities',function(e) {
         var cid = $(this).val(),
                 pid = $('.all-provinces').val();
            changeZone(pid,cid);
    });
    function changeZone(pid,cid) {
        $.post("/index.php?app=lbs&act=lbs_get_dist_by_pid_cid",{
            pid:pid,
            cid:cid
        },function(d) {
            var cityZones = $('.city-zones');
            cityZones.empty();
            $.each(d,function(idx,el) {
                cityZones.append(
                        $("<option>").val(el.id).text(el.name)
                )
            })
        })
    }
</script>