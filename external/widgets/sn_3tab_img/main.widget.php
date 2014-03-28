<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_3tab_imgWidget extends BaseWidget
{
    var $_name = 'sn_3tab_img';
    var $_ttl  = 86400;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			$data = array(
			   'title1'      => $this->options['title1'],
			   'title2'      => $this->options['title2'],
			   'title3'      => $this->options['title3'],
			   'content1'      => $this->options['content1'],
			   'content2'      => $this->options['content2'],
			   'content3'      => $this->options['content3'],
			);
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
}

?>