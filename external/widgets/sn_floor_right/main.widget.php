<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_floor_rightWidget extends BaseWidget
{
    var $_name = 'sn_floor_right';
    var $_ttl  = 86400;
	var $_num  = 8;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$data = array(
			   'color' => $this->options['color'],
			   'model_name'  => $this->options['model_name'],
			   'brands' => $this->get_brand(),
			   'ads' => $this->get_ads(),
			);
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
	
	function get_brand()
	{
		$data = array();
		 for($i=1;$i<=8;$i++)
		 {		 
			 $data[] = array(
			    'url'=>$this->options['ad'.$i.'_image_url'],
				'link'=>$this->options['ad'.$i.'_link_url'],
			);
		 }
		 return $data;
	}
	function get_ads()
	{
		$data = array();
		 for($i=9;$i<=11;$i++)
		 {		 
			 $data[] = array(
			    'url'=>$this->options['ad'.$i.'_image_url'],
				'link'=>$this->options['ad'.$i.'_link_url'],
			);
		 }
		 return $data;
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
        for ($i = 1; $i <= 11; $i++)
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