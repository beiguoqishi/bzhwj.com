<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-3-13
 * Time: 上午9:09
 */

class BzhwjContactApp extends MallbaseApp{
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
        $this->display('bzhwjcontact.html');
    }
} 