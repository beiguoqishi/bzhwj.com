<?php

/**
 * 楼层挂件
 *
 * @param   int     $img_recom_id   图文推荐id
 * @return  array
 */
class Sn_floorWidget extends BaseWidget
{
    var $_name = 'sn_floor';
    var $_ttl  = 1800;
    var $_num  = 8;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
            $recom_mod =& m('recommend');
			$brand_mod =& m('brand');
			$order_goods_mod =& m('ordergoods');
			$goods_mod = &m('goods');
			
			$floor_id = mt_rand();
			import('init.lib');
			$comments = Init_Sn_floorWidget::_get_comments($this->options['img_recom_id_3'],$this->options['img_cate_id_3']);
			$data = array(
			   'goods_list_1' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_1'],8, true, $this->options['img_cate_id_1']),
			   'goods_list_2' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_2'],8, true, $this->options['img_cate_id_2']),
			   'goods_list_3' => Init_BaseWidget::_get_recom_goods($this->options['img_recom_id_3'],8, true, $this->options['img_cate_id_3']),
			   'brand'     =>$brand_mod->find(array(
			                     'conditions' =>"tag like '%{$this->options['bcategory']}'",
                                 'order' => 'sort_order',
                                 'limit' => 13,
						     )),
			   'comments'    => $comments,			 
			   'model_name'     => $this->options['model_name'],
			   'cate_name_1'    => $this->options['cate_name_1'],
			   'cate_name_2'    => $this->options['cate_name_2'],
			   'keyword_list'   => explode(' ', $this->options['keyword_list']),
			   'ad0_image_url'  => $this->options['ad0_image_url'],
			   'ad1_image_url'  => $this->options['ad1_image_url'],
               'ad1_link_url'   => $this->options['ad1_link_url'],
			   'ad1_title'      => $this->options['ad1_title'],
               'ad2_image_url'  => $this->options['ad2_image_url'],
               'ad2_link_url'   => $this->options['ad2_link_url'],
			   'ad2_title'      => $this->options['ad2_title'],
			   'ad3_image_url'  => $this->options['ad3_image_url'],
               'ad3_link_url'   => $this->options['ad3_link_url'],
			   'ad3_title'      => $this->options['ad3_title'],	
			   'floor_id'       => $floor_id,	
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
		
		$images = $this->_upload_image();
        if ($images)
        {
            foreach ($images as $key => $image)
            {
                $input['ad' . $key . '_image_url'] = $image;
            }
        }

        return $input;
    }
	
	function _upload_image()
    {
        import('uploader.lib');
        $images = array();
        for ($i = 0; $i <= 3; $i++)
        {
            $file = $_FILES['ad' . $i . '_image_file'];
            if ($file['error'] == UPLOAD_ERR_OK)
            {
                $uploader = new Uploader();
                $uploader->allowed_type(IMAGE_FILE_TYPE);
                $uploader->addFile($file);
                $uploader->root_dir(ROOT_PATH);
                $images[$i] = $uploader->save('data/files/mall/template', $uploader->random_filename());
            }
        }

        return $images;
    }
}

?>