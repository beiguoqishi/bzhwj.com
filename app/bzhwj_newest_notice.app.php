<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-27
 * Time: 上午10:14
 */

class Bzhwj_newest_noticeApp extends MallbaseApp{
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
        $id = $_GET['id'];
        if (empty($id)) {
            return array();
        }
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $news = $cms->get_bzhwj_newest_notice($id);
        $this->assign('news',$news);
        $last = $cms->get_last_newest_notice($id);
        $next = $cms->get_next_newest_notice($id);
        if (empty($last)) {
            $last = $news;
        }
        if (empty($next)) {
            $next = $news;
        }
        $this->assign('last',$last);
        $this->assign('next',$next);
        $this->assign('id',$id);
        $this->display('bzhwj_newest_notice.html');
    }
} 