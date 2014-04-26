<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-26
 * Time: 下午4:23
 */

class Bzhwj_xinshouApp extends MallbaseApp{
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
        $this->display('bzhwj_xinshou.html');
    }
}