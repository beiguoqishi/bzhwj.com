<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-3-11
 * Time: 下午11:12
 */

class BzhwjBuildingApp extends MallbaseApp{
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
        $this->display('bzhwjbuilding.html');
    }
} 