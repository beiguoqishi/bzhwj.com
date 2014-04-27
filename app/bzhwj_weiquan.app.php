<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-26
 * Time: 下午4:23
 */

class Bzhwj_weiquanApp extends MallbaseApp{
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

        if ($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0) {
            $user_id = intval($_SESSION['user_info']['user_id']);
            $pending_list = $this->_get_weiquan_list($user_id,1);
            $finished_list = $this->_get_weiquan_list($user_id,2);
            print_r($pending_list);
            print_r($finished_list);
            $this->assign('pending_list',$pending_list);
            $this->assign('finished_lish',$finished_list);
            $this->display('bzhwj_weiquan.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function _get_weiquan_list($user_id,$status = 1) {
        $db =& db();
        $sql = "select * from app_bzhwj_weiquan where user_id = $user_id and status = $status";
        return $db->getall($sql);
    }

    function _get_weiquan_by_store_name($store_name,$status = 1) {
        $db =& db();
        $sql = "select * from app_bzhwj_weiquan where store_name = '" . mysql_real_escape_string($store_name) . "' and status = $status";
        return $db->getall($sql);
    }

    function _get_store_name_by_id($store_id) {
        $db =& db();
        $sql = "select store_name from ecm_store where store_id = $store_id";
        return $db->getone($sql);
    }

    function admin_weiquan() {
        if ($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) {
            $store_id = intval($_SESSION['user_info']['user_id']);
            $store_name = $this->_get_store_name_by_id($store_id);
            $pending = $this->_get_weiquan_by_store_name($store_name,1);
            $finished = $this->_get_weiquan_by_store_name($store_name,2);
            print_r($pending);
            print_r($finished);
            $this->assign('pending',$pending);
            $this->assign('finished',$finished);
            $this->display('cms_bzhwj_weiquan.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function save_weiquan() {
        if ($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0) {
            $user_id = intval($_SESSION['user_info']['user_id']);
            $db =& db();
            $sql = "insert app_bzhwj_weiquan set user_id=" . $user_id . ",goods_name='" . mysql_real_escape_string($_POST['goods_name']) . "',"
                ."store_name='" . mysql_real_escape_string($_POST['store_name']) . "',"
                ."price=" . $_POST['price'].",reason='" . mysql_real_escape_string($_POST['reason']) . "',"
                ."pic='" . $_POST['pic']."',actual_name='" . mysql_real_escape_string($_POST['actual_name']) . "',"
                ."phone='" . mysql_real_escape_string($_POST['phone'])."',email='" . mysql_real_escape_string($_POST['email'])."',"
                ."create_at=" . time() . ",update_at=".time();
            echo $db->query($sql);
        } else {
            header('Location:/');
            exit;
        }
    }
}