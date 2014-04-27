<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-26
 * Time: 下午4:23
 */

class Bzhwj_baozhangApp extends MallbaseApp{
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
        $baozhang = $db->getrow("select * from app_bzhwj_baozhang");
        $this->assign('baozhang',$baozhang);
        $this->display('bzhwj_baozhang.html');
    }
} 