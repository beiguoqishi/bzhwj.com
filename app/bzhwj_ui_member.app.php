<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-15
 * Time: 下午10:33
 */

class Bzhwj_ui_memberApp extends MallbaseApp{
    function __construct()
    {
        $this->StoreRecommendGoodApp();
    }
    function StoreRecommendGoodApp()
    {
        parent::__construct();
    }
    function index() {
        $store_id = intval($_GET['store_id']);
        if (!$store_id) {
            header("Location:/");
            exit;
        }
        $comment = $this->_get_store_comment($store_id);
        $this->assign('comment',$comment);
    }

    function _get_store_comment($store_id) {
        $db =& db();
        $sql = "select * from app_bzhwj_comment where store_id = $store_id  and follower_id = 0 and status > 0";
        $comment = $db->getall($sql);
        foreach($comment as $k => $v) {
            $sql = "select * from app_bzhwj_comment where store_id = $store_id and follower_id = " . $v['id'] . " and status > 0";
            $comment[$k]['subs'] = $db->getall($sql);
        }
        return $comment;
    }
} 