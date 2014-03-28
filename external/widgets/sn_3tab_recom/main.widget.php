<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_3tab_recomWidget extends BaseWidget
{
    var $_name = 'sn_3tab_recom';
    var $_ttl  = 86400;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			import('init.lib');
            $goods_list_1 = Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_1'],16, true, $this->options['img_cate_id_1']);
			$goods_list_2 = Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_2'],16, true, $this->options['img_cate_id_2']);
			$goods_list_3 = Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_3'],16, true, $this->options['img_cate_id_3']);
			$data = array(
			   'cate_name_1'  => $this->options['cate_name_1'],
			   'cate_name_2'  => $this->options['cate_name_2'],
			   'cate_name_3'  => $this->options['cate_name_3'],
			   'goods_list_1'   => $goods_list_1,
				'goods_list_2'   => $goods_list_2,
				'goods_list_3'   => $goods_list_3,
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
}
?>