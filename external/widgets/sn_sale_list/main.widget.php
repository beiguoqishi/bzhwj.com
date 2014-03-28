<?php

/**
 * 楼层挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Sn_sale_listWidget extends BaseWidget
{
    var $_name = 'sn_sale_list';
    var $_ttl  = 1800;
    var $_num  = 8;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$amount = $this->options['amount']? intval($this->options['amount']) : 6;
			import('init.lib');
			$data = array(
			   'goods_list_1' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_1'],$amount, true, $this->options['img_cate_id_1']),
			   'goods_list_2' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_2'],$amount, true, $this->options['img_cate_id_2']),
			   'model_name'     => $this->options['model_name'],
			   'cate_name_1'    => $this->options['cate_name_1'],
			   'cate_name_2'    => $this->options['cate_name_2'],
			   'id' => mt_rand(),
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