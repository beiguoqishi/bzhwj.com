<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-6
 * Time: 上午10:50
 */

class AppointmentApp extends MallbaseApp {
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
        $store_id = $_GET['store_id'];
        $goods_id = $_GET['goods_id'];
        $user_id = $_GET['user_id'];
        if (empty($store_id) || empty($goods_id) || empty($user_id)) {
            header('Location:/index.php');
        }
        $ids = array(
            'store_id' => $store_id,
            'goods_id' => $goods_id,
            'user_id'  => $user_id
        );
        $db =& db();
        $ret = $db->getrow("select * from app_bzhwj_appointment where store_id = $store_id and goods_id = $goods_id and user_id = $user_id");
        $this->assign('data',$ret);
        $this->assign('ids',$ids);
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->display('bzhwjappointment.html');
    }

    function save() {
        $data = $_POST['data'];
        $db =& db();
        $conds = '';
        $fields = array();
        foreach($data as $key =>$val) {
            $fields[] = "$key = '".mysql_real_escape_string($val) . "'";
        }
        $conds .= implode(',',$fields) . ',create_at=' . time() . ',update_at=' . time();
        $conds .= ' on duplicate key update ' . implode(',',$fields) . ',update_at=' . time();
        $conds = 'insert app_bzhwj_appointment set ' . $conds;
        $data = $db->query($conds);
        header('Content-type:application/json;charset=UTF-8');
        echo json_encode($data);
    }
} 