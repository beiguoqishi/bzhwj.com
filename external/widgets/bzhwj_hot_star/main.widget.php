<?php

/**
 * 精品推荐挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Bzhwj_hot_starWidget extends BaseWidget
{
    var $_name = 'bzhwj_hot_star';
    var $_ttl  = 1800;
    var $_num  = 100;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $ret= $cache_server->get($key);
        if(empty($ret))
        {
$ret = array();
            $cms =& m('tmall_cms');
            $hot_news = $cms->get_manual_data('bzhwj',0,'hot_news');
$star_meirong = $cms->get_manual_data('bzhwj',0,'star_meirong');
$ret['hot_news'] = $hot_news;
$ret['star_meirong'] = $star_meirong;
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
