<?php

/**
 * 公告栏挂件
 *
 * @return  array
 */
class Sn_anounceWidget extends BaseWidget
{
    var $_name = 'sn_anounce';
    var $_ttl  = 86400;

    function _get_data()
    {
        $cache_server =& cache_server();
        $key = $this->_get_cache_id();
        $data = $cache_server->get($key);
        if($data === false)
        {
			import('init.lib');
		    $article_a = Init_BaseWidget::_get_article($this->options['a_cate_id_a'],6);
			$article_b = Init_BaseWidget::_get_article($this->options['a_cate_id_b'],6);
			$article_c = Init_BaseWidget::_get_article($this->options['a_cate_id_c'],6);
			$data = array(
			   'article_a'      => $article_a,
			   'article_b'      => $article_b,
			   'article_c'      => $article_c,
			   'module_name_a'       => $this->options['module_name_a'],
			   'module_name_b'       => $this->options['module_name_b'],
			   'module_name_c'       => $this->options['module_name_c']
			   
			);
            $cache_server->set($key, $data, $this->_ttl);
        }
        return $data;
    }
	
	function get_config_datasrc()
    {
        $a_mod = &m('acategory');
        $this->assign('acategories', $a_mod->find());
    }

    function parse_config($input)
    {
       return $input;
    }
	

    
}
?>