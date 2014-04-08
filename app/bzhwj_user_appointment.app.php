<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-8
 * Time: 下午8:19
 */

class Bzhwj_user_appointmentApp extends MallbaseApp {
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

        $user_id = intval($_SESSION['user_info']['user_id']);
        $db =& db();
        $ret = $db->getall("select goods_id from app_bzhwj_appointment where user_id = $user_id");
        $ids = array();
        foreach($ret as $v) {
            $ids[] = $v['goods_id'];
        }
        $ret = $db->getall("select * from ecm_goods where goods_id in (" . implode(',',$ids) . ")");
        $this->assign('data',$ret);

        $this->assign('user_id',$user_id);
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->assign('tab','appointment');
        $this->display('bzhwj_user_appointment.html');
    }
    function remove() {
        header('Content-type:application/json;charset=utf-8');
        $store_id = intval($_POST['store_id']);
        $goods_id = intval($_POST['goods_id']);
        if (empty($store_id) || empty($goods_id)) {
            echo -1;
            exit;
        }
        echo 1;
    }
} 