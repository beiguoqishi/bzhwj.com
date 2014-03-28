<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-3-3
 * Time: 下午9:00
 */

class BzhwjTuijiangoodsApp extends MallbaseApp{
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
        $person = $cms->get_bzhwj_tuijian_goods_front_end($id);
        $this->assign('goods',$person);
        $same_brands = $cms->get_manual_data('bzhwj_tuijian_goods',$id,'bzhwj_tuijian_goods_same_brand');
        $other_brands = $cms->get_manual_data('bzhwj_tuijian_goods',$id,'bzhwj_tuijian_goods_other_brand');
        $this->assign('same_brands',$same_brands);
        $this->assign('other_brands',$other_brands);

        $this->display('bzhwjtuijiangoods.html');
    }

    function incr_read_time() {
        $id = $_GET['id'];
        $cms = &m('tmall_cms');
        return $cms->person_incr_read_time($id);
    }

    function getOtherPeople($id) {
        $db =& db();
        $db->select_database('ecmall');
        $ret = $db->getall("select id,title,logo from app_bzhwj_people where id != $id order by id desc");
        $db->select_database('ecmall');
        return $ret;
    }
} 