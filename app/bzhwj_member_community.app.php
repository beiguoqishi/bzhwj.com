<?php

/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-21
 * Time: 下午10:45
 */
class Bzhwj_member_communityApp extends MallbaseApp
{
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
        $store_comments = $this->_get_member_store_comments($user_id);
        echo '<meta charset="utf-8">';
        print_r($store_comments);
        $this->assign('store_comments',$store_comments);
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->display('bzhwj_member_community.html');
    }

    function _get_member_store_comments($user_id) {
        $sql = "select store_id from app_bzhwj_store_member where user_id = $user_id and status > 0";
        $db =& db();
        $s_ids = $db->getall($sql);
        if (!(is_array($s_ids) && count($s_ids) > 0)) {
            return array();
        }
        $ret = array();
        foreach($s_ids as $v) {
            $store_id = $v['store_id'];
            $tmp = $this->_get_store_by_id($store_id);
            $tmp['comments'] = $this->_get_store_comments($store_id,$user_id);
            $ret[] = $tmp;
        }
        return $ret;
    }

    function _get_store_comments($store_id,$user_id) {
        $sql = "select * from app_bzhwj_comment where store_id = $store_id and user_id = $user_id and follower_id = 0 and status > 0";
        $db =& db();
        $data = $db->getall($sql);
        foreach($data as $k => $v) {
            $sub_sql = "select * from app_bzhwj_comment where follower_id = " . $v['id'] . " and status > 0";
            $data[$k]['sub_comments'] = $db->getall($sub_sql);
        }
        return $data;
    }

    function _get_store_by_id($store_id) {
        $db =& db();
        return $db->getrow("select store_id,store_name,number from ecm_store where store_id = $store_id");
    }
} 