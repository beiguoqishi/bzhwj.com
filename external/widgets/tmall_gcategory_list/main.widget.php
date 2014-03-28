<?php

/**
 * 商品分类挂件
 *
 * @return  array   $category_list
 */
class Tmall_gcategory_listWidget extends BaseWidget
{
    var $_name = 'tmall_gcategory_list';
    var $_ttl  = 86400;


    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$amount = (empty($this->options['amount']) || intval($this->options['amount'])<=0) ? 0 : intval($this->options['amount']);
			
			import('init.lib');
			$init = new Init_FrontendApp();
			/* position: 给弹出层设置高度，使得页面效果美观 */
			$position = array();
			$data = $init->_get_header_gcategories($amount,$position);// 参数说明（二级分类显示数量,弹出层位置,品牌是否为推荐为推荐）

			$cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
	function parse_config($input)
    {
        return $input;
    }

}

?>
