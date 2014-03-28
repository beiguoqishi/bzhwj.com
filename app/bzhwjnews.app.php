<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-2-18
 * Time: 下午1:45
 */

class BzhwjNewsApp extends MallbaseApp{
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
        $news = $cms->get_bzhwj_news($id);
        $this->assign('news',$news);
        $last = $cms->get_last_news($id);
        $next = $cms->get_next_news($id);
        if (empty($last)) {
            $last = $news;
        }
        if (empty($next)) {
            $next = $news;
        }
        $this->assign('last',$last);
        $this->assign('next',$next);
        $this->assign('id',$id);
        $this->assign('newest_list',$this->getNewestGoods());
        $this->display('bzhwjnews.html');
    }

    function incr_read_time() {
        $id = $_GET['id'];
        $cms = &m('tmall_cms');
        return $cms->incr_read_time($id);
    }

    function getNewestGoods() {
        $db =& db();
        return $db->getall("select * from ecm_goods where if_show=1 and closed = 0 order by goods_id desc limit 6");
    }
} 