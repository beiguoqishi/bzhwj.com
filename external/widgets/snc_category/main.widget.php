<?php

/**
 * 商品分类挂件
 *
 * @return  array  
 */
class Snc_categoryWidget extends BaseWidget
{
    var $_name = 'snc_category';
    var $_ttl  = 86400;


   function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$gcategory_mod =& m('gcategory');
            $gcategories = array();
            if(!empty($this->options['cate_id']))
            {
                $gcategorys = $gcategory_mod->get_list($this->options['cate_id'], true);
				foreach($gcategorys as $key => $cate)
				{
					$children = $gcategory_mod->get_list($cate['cate_id'],true);
					$gcategorys[$key]['child'] = $children;
				}
            }
			$data = array(
				'model_name' => $this->options['model_name'],
				'gcategories' => $gcategorys,
			);
            
            $cache_server->set($key, $data, $this->_ttl);
        }
		return $data;
    }
	
	 function get_config_datasrc()
    {
        // 取得一级商品分类
        $this->assign('gcategories', $this->_get_gcategory_options(1));
    }
	

}

?>