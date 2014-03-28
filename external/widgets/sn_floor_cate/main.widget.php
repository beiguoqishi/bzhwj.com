<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_floor_cateWidget extends BaseWidget
{
    var $_name = 'sn_floor_cate';
    var $_ttl  = 86400;
	var $_num  = 2;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$data = array(
				'id' => mt_rand(),
				'color'  => $this->options['color'],
			   'cate_name'  => $this->options['cate_name'],
			   'ad0_image_url'  => $this->options['ad0_image_url'],
			   'ad1_image_url'  => $this->options['ad1_image_url'],
               'ad1_link_url'   => $this->options['ad1_link_url'],
			   'cates' => $this->get_cate($this->options['cate_id']), 
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
	
	function get_cate($cate_id)
	{
		$mod_gcage = &bm('gcategory');
		$cates = $mod_gcage->get_children($cate_id,true);
		return $cates;
	}
	
	function parse_config($input)
    {
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