<?php

/**
 * 精品推荐挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Bzhwj_ultimate_storeWidget extends BaseWidget
{
    var $_name = 'bzhwj_ultimate_store';
    var $_ttl  = 1800;
    var $_num  = 100;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $ret= $cache_server->get($key);
        if(empty($ret))
        {
            $recom_mod =& m('recommend');
$ret = array();
$data= $recom_mod->get_ultimate_store();
$ret['model_name'] = $this->options['model_name'];
$ret['keywords'] = explode(' ',$this->options['keyword']);
$ret['data'] = $data;
            $cache_server->set($key, $ret, $this->_ttl);
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
