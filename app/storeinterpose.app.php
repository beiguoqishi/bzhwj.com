<?php

/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-2-20
 * Time: 下午9:01
 */
class StoreInterposeApp extends StorebaseApp
{
    function __construct()
    {
        $this->StoreInterposeApp();
    }

    function StoreInterposeApp()
    {
        parent::__construct();
    }

    function index()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $this->display('store_interpose.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_grade() {
        if ($_SESSION['user_info']['user_name'] == 'admin') {
            $db =& db();
            $ret = $db->getall("select * from ecm_store");
            $this->assign('stores',json_encode($ret));
            $this->display('store_grade.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_op_list() {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $this->assign('store_id',intval($_SESSION['user_info']['store_id']));
            $this->display('store_op_list.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function company_op_list() {
        if ($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0) {
            $this->assign('store_id',intval($_SESSION['user_info']['user_id']));
            $this->display('company_op_list.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_list()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $page = intval($_GET['page']);
            $page = $page < 1 ? 1 : $page;
            if ($_SESSION['user_info']['user_name'] == 'admin') {
                $store_id = $store_id . "' or '1=1";
            }
            $goods_list = $this->_get_goods_list($store_id, $page, 20);
            $this->assign('goods_list', $goods_list);

            $this->display('store_interpose.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_edit()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $this->assign('username',$_SESSION['user_info']['user_name']);
            $id = intval($_GET['id']);
            if ($_SESSION['user_info']['user_name'] == 'admin') {
                $store_id = $store_id . "' or '1=1";
            }
            $this->assign('goods', $this->_get_goods_by_id($store_id,$id));
            $this->assign('goods_id',$id);
            $this->assign('ctg_list',$this->_get_goods_ctgs());
            $this->display('store_interpose_edit_goods.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_add()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            if ($_SESSION['user_info']['user_name'] == 'admin') {
                $store_id = $store_id . "' or '1=1";
            }
            $this->assign('goods', array());
            $this->assign('goods_id',0);
            $this->assign('ctg_list',$this->_get_goods_ctgs());
            $this->display('store_interpose_edit_goods.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_do_edit()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $goods = $_POST['goods'];
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $goods_id = intval($_POST['goods_id']);
            unset($goods['goods_id']);
            if ($_SESSION['user_info']['user_name'] == 'admin') {
                $store_id = $store_id . "' or '1=1";
            }
            $goods_mod =& bm('goods',array('_store_id' => $store_id));
            echo $goods_mod->edit(array('goods_id' => $goods_id),$goods);
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_archive_edit() {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $goods = $_POST['goods'];
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $this->assign('act','edit');
            $db =& db();
            $ret = $db->getrow("select * from ecm_store_archive where store_id = $store_id");
            if (empty($ret)) {
                $ret = array();
                $this->assign('act','add');
            }
            $ret['pics'] = json_decode($ret['pics'],true);
            $this->assign('archive',$ret);
            $this->display('store_archive.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_archive_do_edit() {
        header('Content-type:application/json;charset=UTF-8');
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $entity = $_POST['entity'];
            $store_id = intval($_SESSION['user_info']['store_id']);
            $type = $_GET['type'];
            $store_archive =& m('storearchive');
            if ($type == 'add') {
                $entity['store_id'] = $store_id;
                $ret = $store_archive->add($entity);
            } else {
                $ret = $store_archive->edit(array('store_id' => $store_id),$entity);
            }
            echo json_encode($ret);
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_do_add()
    {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $goods = $_POST['goods'];
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $goods_id = intval($_POST['goods_id']);
            unset($goods['goods_id']);
            $goods_mod =& bm('goods',array('_store_id' => $store_id));
            echo $goods_mod->add($goods);
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_goods_do_delete() {
        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            if ($_SESSION['user_info']['user_name'] == 'admin') {
                $store_id = $store_id . "' or '1=1";
            }
            $goods_id = intval($_GET['id']);
            $goods_mod =& bm('goods',array('_store_id' => $store_id));
            $goods_mod->edit(array('goods_id' => $goods_id),array('if_show' => 0));
            header('Location:/index.php?app=storeinterpose&act=store_goods_list');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_fengyun_people() {
        if ($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0) {
            $store_id = intval($_SESSION['user_info']['user_id']);
            $this->assign('store_id', $store_id);
            $cms = &m('tmall_cms');
            $people = $cms->get_bzhwj_people($store_id);
            $this->assign('people',$people);
            $this->display('store_people.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_fengyun_people_all() {
        $cms = &m('tmall_cms');
        $people = $cms->get_bzhwj_people(0);
        $this->assign('people',$people);
        $this->assign('store_id',0);
        $this->display('store_people.html');
    }

    function store_tuijian_goods() {
if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['user_id']) > 0)) {
            $store_id = intval($_SESSION['user_info']['user_id']);
            $this->assign('store_id', $store_id);
            $cms = &m('tmall_cms');
            $goods = $cms->get_bzhwj_tuijian_goods($store_id);
            $this->assign('goods_list',$goods);
            $this->display('store_tuijian_goods.html');
        } else {
            header('Location:/');
            exit;
        }
    }

    function store_tuijian_goods_all() {
        $cms = &m('tmall_cms');
        $people = $cms->get_bzhwj_tuijian_goods(0);
        $this->assign('goods_list',$people);
        $this->assign('store_id',0);
        $this->display('store_tuijian_goods.html');
    }

    function store_fengyun_people_do_delete() {
//        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $id = $_GET['id'];
            if (intval($id) > 0) {
                $id = intval($id);
                $db =& db();
                $db->select_database('ecmall');
                $db->query("delete from app_bzhwj_people where id = $id");
                $db->select_database('ecmall');
                $cms = &m('tmall_cms');
                $people = $cms->get_bzhwj_people(0);
                $this->assign('people',$people);
                $this->assign('store_id',0);
                $this->display('store_people.html');
            }
//        } else {
//            header('Location:/');
//            exit;
//        }
    }

    function store_tuijian_goods_do_delete() {
//        if (($_SESSION && $_SESSION['user_info'] && intval($_SESSION['user_info']['store_id']) > 0) || ($_SESSION['user_info']['user_name'] == 'admin')) {
            $store_id = intval($_SESSION['user_info']['store_id']);
            $this->assign('store_id', $store_id);
            $id = $_GET['id'];
            if (intval($id) > 0) {
                $id = intval($id);
                $db =& db();
                $db->select_database('ecmall');
                $db->query("delete from app_bzhwj_tuijian_goods where id = $id");
                $db->select_database('ecmall');
                $cms = &m('tmall_cms');
                $people = $cms->get_bzhwj_tuijian_goods(0);
                $this->assign('goods_list',$people);
                $this->assign('store_id',0);
                $this->display('store_tuijian_goods.html');
            }
//        } else {
//            header('Location:/');
//            exit;
//        }
    }

    function _get_goods_by_id($store_id, $id)
    {
        $goods_mod =& bm('goods',array('_store_id' => $store_id));
        $goods_list = $goods_mod->find(array(
            'conditions' => 'goods_id = ' . $id,
            'fields' => '*'
        ));
        $tmp = array();
        foreach ($goods_list as $key => $goods) {
            empty($goods['default_image']) && $goods_list[$key]['default_image'] = Conf::get('default_goods_image');
            $goods_list[$key]['pics'] = json_decode($goods['pics'],true);
            $tmp[] = $goods_list[$key];
        }

        return !empty($tmp[0]) ? $tmp[0] : array();
    }

    function _get_goods_list($store_id, $page = 1, $num = 20)
    {
        $goods_mod =& bm('goods', array('_store_id' => $store_id));
        $goods_list = $goods_mod->find(array(
            'conditions' => "closed = 0 AND if_show = 1",
            'fields' => '*',
            'limit' => ($page - 1) * $page . ',' . $num
        ));

        foreach ($goods_list as $key => $goods) {
            empty($goods['default_image']) && $goods_list[$key]['default_image'] = Conf::get('default_goods_image');
        }

        return $goods_list;
    }

    function _get_goods_ctgs() {
        $ctg_mod =& bm('gcategory');
        $parent_ctgs = $ctg_mod->find(array(
            'conditions'  => 'if_show = 1 and parent_id=0',
            'fields'      => 'cate_id,cate_name,parent_id'
        ));
        $ret = array();
        foreach($parent_ctgs as $k => $v) {
            $tmp = array();
            $tmp['parent'] = $v;

            $sub_ctgs = $ctg_mod->find(array(
                'conditions'  => 'if_show = 1 and parent_id=' . $v['cate_id'],
                'fields'      => 'cate_id,cate_name,parent_id'
            ));
            $tmp['children'] = json_encode($sub_ctgs);
            $ret[] = $tmp;
        }
        return $ret;
    }
}
