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
        $this->assign('store_comments',$store_comments);
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->display('bzhwj_member_community.html');
    }
    function publish_comment() {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0)) {
            $store_id = $_POST['store_id'];
            $user_id  = intval($_SESSION['user_info']['user_id']);
            $cnt      = $_POST['cnt'];
            $db =& db();
            $sql = "insert app_bzhwj_comment set store_id=$store_id,user_id=$user_id,cnt='" . mysql_real_escape_string($cnt) . "',create_at=" . time() . ",update_at=" . time();
            echo $db->query($sql);
        } else {
            echo -1;
        }
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
        $sql = "select * from app_bzhwj_comment where store_id = $store_id and user_id = $user_id and follower_id = 0 and status > 0 order by id desc ";
        $db =& db();
        $data = $db->getall($sql);
        $data = $this->_format_comments($data);
        foreach($data as $k => $v) {
            $sub_sql = "select * from app_bzhwj_comment where follower_id = " . $v['id'] . " and status > 0";
            $sub_comments = $db->getall($sub_sql);
            $sub_comments = $this->_format_comments($sub_comments);
            $data[$k]['sub_comments'] = $sub_comments;
        }
        return $data;
    }

    function _get_store_by_id($store_id) {
        $db =& db();
        return $db->getrow("select store_id,store_name,number from ecm_store where store_id = $store_id");
    }

    function _get_user_name_by_id($user_id) {
        $db =& db();
        return $db->getone("select user_name from ecm_member where user_id=$user_id");
    }

    function _format_comments($comments) {
        foreach($comments as $k => $v) {
            $comments[$k]['user_name'] = $this->_get_user_name_by_id($v['user_id']);
        }
        return $comments;
    }
} 