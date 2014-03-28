<?php

/**
 * 商品模块挂件
 *
 * @param   string  $module_name    模块名称
 * @param   array   $txt_color      模块名称字体颜色
 * @param   array   $keyword_list   热门关键字列表
 * @param   array   $data           数据列表
 */
class Sn_hotsaleWidget extends BaseWidget
{
    var $_name = 'sn_hotsale';
    var $_ttl  = 1800;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			import('init.lib');
			$amount = $this->options['amount']? intval($this->options['amount']) : 4;
			$data = array(
				'model_id'=>mt_rand(),
			   'model_name'    => $this->options['model_name'],
			   'goods_list' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id'],$amount, true, $this->options['img_cate_id']),
			);
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
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