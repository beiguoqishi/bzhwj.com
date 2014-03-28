<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-2-27
 * Time: 上午12:03
 */

class RecommendGoodsApp extends MallbaseApp{
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
//        $recom_mod =& m('recommend');
//        $goods = $recom_mod->get_recommended_goods(11, 100, true, 0);
        $goods = $cms->get_bzhwj_tuijian_goods(0);
        $this->assign('goods_list',$goods);
        $this->display('recommendgoods.html');
    }
} 