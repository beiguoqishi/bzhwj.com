<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-3-2
 * Time: 下午10:15
 */

class BzhwjPeopleApp extends MallbaseApp{
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
        $person = $cms->get_bzhwj_person($id);
        $this->assign('person',$person);
        $last = $cms->get_last_person($id);
        $next = $cms->get_next_person($id);
        if (empty($last)) {
            $last = $person;
        }
        if (empty($next)) {
            $next = $person;
        }
        $this->assign('last',$last);
        $this->assign('next',$next);
        $this->assign('id',$id);
        $this->assign('other_people_list',$this->getOtherPeople($id));
        $this->display('bzhwjpeople.html');
    }

    function incr_read_time() {
        $id = $_GET['id'];
        $cms = &m('tmall_cms');
        return $cms->person_incr_read_time($id);
    }

    function getOtherPeople($id) {
        $db =& db();
        $db->select_database('ecmall');
$store_id = $db->getone("select store_id from app_bzhwj_people where id = $id");
        $ret = $db->getall("select id,title,logo from app_bzhwj_people where id != $id and store_id = "."$store_id order by id desc");
        $db->select_database('ecmall');
        return $ret;
    }
} 
