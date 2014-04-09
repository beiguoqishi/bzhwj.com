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
        $sort_type = empty($sort_type) ? 'newest' : $sort_type;
        $sort_order = $sort_order == 'asc' ? 'asc' : 'desc';

        $db =& db();
        $page_limit = 20;
        $offset = ($page - 1) * $page_limit;
        $conds = "select * from ecm_goods where experiment = 1 order by ";
        switch($sort_type) {
            case 'price':
                $conds .= " price ";
                break;
            default:
                $conds .= " experiment_update_date ";
                break;
        }
        $conds .= " " . $sort_order . " limit $offset,$page_limit";
        $data = $db->getall($conds);
        $total = $db->getone('select count(*) from ecm_goods where experiment = 1');
        $total = $total % $page_limit == 0 ? $total / $page_limit : floor($total / $page_limit) + 1;
        $this->assign('data',$data);
        $this->assign('sort_type',$sort_type);
        $this->assign('sort_order',$sort_order == 'desc' ? 'asc' : 'desc');
        $this->assign('exact_sort_order',$sort_order);
        $this->assign('page',$page);
        $this->assign('total',$total);
        $this->display('bzhwjexperiment_list.html');
    }
}