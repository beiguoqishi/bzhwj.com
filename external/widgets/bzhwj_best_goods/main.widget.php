<?php

/**
 * 精品推荐挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Bzhwj_best_goodsWidget extends BaseWidget
{
    var $_name = 'bzhwj_best_goods';
    var $_ttl  = 1800;
    var $_num  = 100;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
//        $ret= $cache_server->get($key);
        if(empty($ret))
        {
$ret = array();
//            $recom_mod =& m('recommend');
//            $data = $recom_mod->get_recommended_goods($this->options['img_recom_id'], $this->_num, true, $this->options['img_cate_id']);
//$ret['model_name'] = $this->options['model_name'];
//$ret['keywords'] = explode(' ',$this->options['keyword']);
            $cms = &m('tmall_cms');
            $data = $cms->get_manual_data('bzhwj',0,'bzhwj_index_jing_pin_tuijian_goods');
$ret['data'] = $data;
//            $cache_server->set($key, $ret, $this->_ttl);
        }

        return $ret;
    }

    function get_config_datasrc()
    {
        // 取得推荐类型
        $this->assign('recommends', $this->_get_recommends());

        // 取得一级商品分类
        $this->assign('gcategories', $this->_get_gcategory_options(1));
    }

    function parse_config($input)
    {
        if ($input['img_recom_id'] >= 0)
        {
            $input['img_cate_id'] = 0;
        }

        return $input;
    }
}

?>
