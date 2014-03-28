<?php

/**
 * 品牌挂件
 *
 * @return  array
 */
class Sn_brandWidget extends BaseWidget
{
    var $_name = 'sn_brand';
    var $_ttl  = 86400;
    var $_num  = 12;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
            $brand_mod =& m('brand');
			$amount = $this->options['amount'] ? intval($this->options['amount']) : 12;
            $brands = $brand_mod->find(array(
                'conditions' => "recommended = 1 AND tag like '%{$this->options['bcategory']}'",
                'order' => 'sort_order',
                'limit' => $amount,
            ));
			$data = array(
				'model_name' => $this->options['model_name'],
				'brands' => $brands,
			);
            $cache_server->set($key, $data, $this->_ttl);
        }

        return $data;
    }
}

?>