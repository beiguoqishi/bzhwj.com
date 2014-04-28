<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-7
 * Time: 下午4:01
 */

class ExperimentApp extends MallbaseApp {
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
        $page = intval($_GET['page']);
        $page = $page < 1 ? 1 : $page;
        $sort_type = trim($_GET['sort_type']);
        $sort_order = trim($_GET['sort_order']);
        $b_ctg = intval(trim($_GET['b_ctg']));
        $s_ctg = intval(trim($_GET['s_ctg']));
        $loc = $_GET['loc'];
        if (empty($loc)) {
            $cur_loc = $this->get_cur_location();
            $cur_loc = json_decode($cur_loc,true);
            $cur_loc = $cur_loc['cityinfo'];
            $loc = $cur_loc['city'];
        }

        if ($loc != 'all') {
            $store_ids = $this->_get_store_ids_by_loc($loc);
            $store_ids = implode(',',$store_ids);
        }

        $sort_type = empty($sort_type) ? 'newest' : $sort_type;
        $sort_order = $sort_order == 'asc' ? 'asc' : 'desc';

        $db =& db();
        $page_limit = 50;
        $offset = ($page - 1) * $page_limit;
        $keyword = trim($_GET['q']);
        $where = "where experiment = 1 ";
        if ($keyword) {
            $where .= " and goods_name like '%" . $keyword . "%'";
            $this->assign('keyword',$keyword);
        }
        if ($b_ctg) {
            $this->assign('b_ctg_id',$b_ctg);
            $where .= " and cate_id_1 = $b_ctg ";
        }
        if ($s_ctg) {
            $this->assign('s_ctg_id',$s_ctg);
            $where .= " and cate_id_2 = $s_ctg ";
        }
        if ($loc != 'all') {
            $where .= " and store_id in (" . $store_ids . ") ";
        }

        $conds = "select * from ecm_goods " . $where . " order by ";
        switch($sort_type) {
            case 'price':
                $conds .= " price ";
                break;
            case 'renqi':
                $conds .= " appoint_count ";
                break;
            case 'credit':
                $conds .= " credit_count ";
                break;
            default:
                $conds .= " experiment_update_date ";
                break;
        }
        $conds .= " " . $sort_order . " limit $offset,$page_limit";
        $data = $db->getall($conds);
        foreach ($data as $k => $v) {
            $data[$k]['address'] = $this->_get_store_address_by_id($v['store_id']);
        }
        $total = $db->getone('select count(*) from ecm_goods ' . $where);
        $total = $total % $page_limit == 0 ? $total / $page_limit : floor($total / $page_limit) + 1;
        $ctgs = $this->_get_category();
        $this->assign('ctgs',$ctgs);
        $this->assign('data',$data);
        $this->assign('sort_type',$sort_type);
        $this->assign('sort_order',$sort_order == 'desc' ? 'asc' : 'desc');
        $this->assign('exact_sort_order',$sort_order);
        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->assign('loc',$loc);
        $this->display('bzhwjexperiment_list.html');
    }

    function _get_category() {
        $db =& db();
        $ctgs = $db->getall('select cate_id,cate_name from ecm_gcategory where parent_id = 0 and if_show = 1');
        foreach ($ctgs as $k => $ctg) {
            $sub = $db->getall("select cate_id,cate_name from ecm_gcategory where parent_id = " . $ctg['cate_id'] . " and if_show = 1");
            $ctgs[$k]['sub_ctgs'] = $sub;
        }
        return $ctgs;
    }

    function _get_store() {
        $db =& db();
        $stores = $db->getall("select store_id,store_name,address from ecm_store");
    }

    function _get_store_address_by_id($store_id) {
        $db =& db();
        return $db->getone("select address from ecm_store where store_id = $store_id");
    }

    function _get_store_ids_by_loc($pos) {
        $db =& db();
        $sql = "select store_id from ecm_store where region_name like '%" . $pos . "%' or address like '%" . $pos . "%'";
        $ids = $db->getall($sql);
        $ret = array();
        foreach ($ids as $id) {
            $ret[] = $id['store_id'];
        }
        return $ret;
    }
}