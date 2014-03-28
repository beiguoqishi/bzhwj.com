<?php

/**
 * 商品模块挂件
 *
 * @param   string  $module_name    模块名称
 * @param   array   $txt_color      模块名称字体颜色
 * @param   array   $keyword_list   热门关键字列表
 * @param   array   $data           数据列表
 */
class Sn_groupbuyWidget extends BaseWidget
{
    var $_name = 'sn_groupbuy';
    var $_ttl  = 1800;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			if (empty($this->options['amount']) || intval($this->options['amount']) <=0)
			{
				$this->options['amount'] = 4;
			}
            
			import('init.lib');
			$init = new Init_Sn_groupbuyWidget;
			$init->options = $this->options;
			$groupbuy_list = $init->_get_groupbuy();

			$data = array(
				'model_id'=>mt_rand(),
			   'model_name'    => $this->options['model_name'],
			   'groupbuy_list' => $groupbuy_list,
			);
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
}

?>