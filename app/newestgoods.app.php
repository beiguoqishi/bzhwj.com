<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-2-26
 * Time: 下午11:37
 */

class NewestGoodsApp extends MallbaseApp{
    function __construct()
    {
        $this->StoreRecommendGoodApp();
    }
    function StoreRecommendGoodApp()
    {
        parent::__construct();
    }
    function index() {
        $cms = &m('tmall_cms');
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $db =& db();
        $goods = $db->getall("select goods_id,goods_name,default_image from ecm_goods where if_show=1 and closed = 0 order by goods_id desc limit 100");
        $this->assign('goods_list',$goods);
        $this->display('newestgoods.html');
    }
} 