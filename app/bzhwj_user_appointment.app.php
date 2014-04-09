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
        $ret = $db->getall("select goods_id,id from app_bzhwj_appointment where user_id = $user_id and status > 0");
        $res = array();
        foreach($ret as $v) {
            $data = $db->getrow("select * from ecm_goods where goods_id = " . $v['goods_id']);
            if (is_array($data)) {
                $data['appointment_id'] = $v['id'];
            }
            $res[] = $data;
        }

        $this->assign('data',$res);

        $this->assign('user_id',$user_id);
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->assign('tab','appointment');
        $this->display('bzhwj_user_appointment.html');
    }
    function remove() {
        header('Content-type:application/json;charset=utf-8');
        $ids = ($_POST['ids']);
        if (empty($ids)) {
            echo -1;
            exit;
        }
        $db =& db();
        $sql = "update app_bzhwj_appointment set status = 0 where id in (" . $ids . ")";
        $data = $db->query($sql);
        echo $data;
    }
} 