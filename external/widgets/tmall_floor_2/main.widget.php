<?php

/**
 * 轮播图片挂件
 *
 * @return  array   $image_list
 */
class Tmall_floor_2Widget extends BaseWidget
{
    var $_name = 'tmall_floor_2';
	var $_ttl  = 1800;

    function _get_data()
    {
		$cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {	
			import('init.lib');
            $init=new Init_TmallWidget();
            $brands=$init->get_brand($this->options);
			$data = array(
				'model_id'			=> mt_rand(),
				'model_name'	 	=> $this->options['model_name'],
				'ad1_image_url'  	=> $this->options['ad1_image_url'],
				'ad1_link_url'   	=> $this->options['ad1_link_url'],
				'ad1_title_url'   	=> $this->options['ad1_title_url'],
				'ad2_image_url'  	=> $this->options['ad2_image_url'],
				'ad2_link_url'   	=> $this->options['ad2_link_url'],
				'ad2_title_url'   	=> $this->options['ad2_title_url'],
				'ad3_image_url'  	=> $this->options['ad3_image_url'],
				'ad3_link_url'   	=> $this->options['ad3_link_url'],
				'ad3_title_url'   	=> $this->options['ad3_title_url'],
				'ad4_image_url'  	=> $this->options['ad4_image_url'],
				'ad4_link_url'   	=> $this->options['ad4_link_url'],
				'ad5_image_url'  	=> $this->options['ad5_image_url'],
				'ad5_link_url'   	=> $this->options['ad5_link_url'],
				'ad6_image_url'  	=> $this->options['ad6_image_url'],
				'ad6_link_url'   	=> $this->options['ad6_link_url'],
				'keywords'  	 	=> explode(' ',$this->options['keyword']),
				'brands'			=> array_chunk($brands,5),
				'brands_count'		=> count(array_chunk($brands,5)),	
			);
        	$cache_server->set($key, $data,$this->_ttl);
        }
        return $data;
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
        for ($i = 1; $i <= 7; $i++)
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