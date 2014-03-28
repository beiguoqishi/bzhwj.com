<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_floor_goodsWidget extends BaseWidget
{
    var $_name = 'sn_floor_goods';
    var $_ttl  = 86400;
	var $_num  = 8;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$recom_mod =& m('recommend');
            $goods_list_1 = $recom_mod->get_recommended_goods($this->options['img_recom_id_1'],$this->_num, true, $this->options['img_cate_id_1']);
			$goods_list_2 = $recom_mod->get_recommended_goods($this->options['img_recom_id_2'],$this->_num, true, $this->options['img_cate_id_2']);
			$goods_list_3 = $recom_mod->get_recommended_goods($this->options['img_recom_id_3'],$this->_num, true, $this->options['img_cate_id_3']);
			$goods_list_4 = $recom_mod->get_recommended_goods($this->options['img_recom_id_4'],$this->_num, true, $this->options['img_cate_id_4']);
			$goods_list_5 = $recom_mod->get_recommended_goods($this->options['img_recom_id_5'],$this->_num, true, $this->options['img_cate_id_5']);
			$data = array(
				'id' => mt_rand(),
				'color'  => $this->options['color'],
			   'cate_name_1'  => $this->options['cate_name_1'],
			   'cate_name_2'  => $this->options['cate_name_2'],
			   'cate_name_3'  => $this->options['cate_name_3'],
			   'cate_name_4'  => $this->options['cate_name_4'],
			   'cate_name_5'  => $this->options['cate_name_5'],
			   'goods_list_1'   => $goods_list_1,
				'goods_list_2'   => $goods_list_2,
				'goods_list_3'   => $goods_list_3,
				'goods_list_4'   => $goods_list_4,
				'goods_list_5'   => $goods_list_5,
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