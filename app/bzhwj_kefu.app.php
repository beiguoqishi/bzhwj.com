<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-26
 * Time: 下午4:23
 */

class Bzhwj_kefuApp extends MallbaseApp{
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
        $common_question = $cms->get_manual_data('bzhwj',0,'common_question');
        $newest_notice = $cms->get_manual_data('bzhwj',0,'newest_notice');
        print_r($common_question);
        print_r($newest_notice);
        $this->assign('common_question',$common_question);
        $this->assign('newest_notice',$newest_notice);
        $this->display('bzhwj_kefu.html');
    }
}