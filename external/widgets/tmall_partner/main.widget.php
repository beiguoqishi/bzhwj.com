<?php

/**
 * 合作伙伴挂件
 *
 * @return  array
 */
class Tmall_partnerWidget extends BaseWidget
{
    var $_name = 'tmall_partner';
    var $_ttl  = 86400;

    function _get_data()
    {
        if (empty($this->options['num']) || intval($this->options['num']) <= 0)
        {
            $this->options['num'] = 10;
        }

        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
            import('init.lib');
            $init=new Init_TmallWidget();
            $partners=$init->get_partners();
			$data=array(
				'partners'=>$partners,
				'model_name'=>$this->options['model_name']
			);
            $cache_server->set($key, $data, $this->_ttl);
        }

        return $data;
    }
}

?>