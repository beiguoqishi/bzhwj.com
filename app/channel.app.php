<?php

class ChannelApp extends MallbaseApp
{
    function index()
    {
		$cate_id = isset($_GET['cate_id']) ? intval($_GET['cate_id']) : 0;
		$id = isset($_GET['id']) ? intval($_GET['id']) : 0 ;
		if(!$cate_id)
		{
			header('Location:index.php');
		}
		
		$gcategory_mod = &bm('gcategory');
		$gcate = $gcategory_mod->get('cate_id='.$cate_id);
		$category = $gcategory_mod->get_list($cate_id,true);
		foreach($category as $key => $cate)
		{
			$category[$key]['children'] = $gcategory_mod->get_list($cate['cate_id'],true);
		}
		/* 取得导航 */
        $this->assign('navs', $this->_get_navs());
		$this->_curlocal($this->_get_goods_curlocal($cate_id));
		
		$this->_config_seo(array(
            'title' => $gcate['cate_name'] . ' - ' . Conf::get('site_title'),
        ));
		
        $this->assign('page_description', Conf::get('site_description'));
        $this->assign('page_keywords', Conf::get('site_keywords'));
		$this->assign('gcate',$gcate);
		$this->assign('channel_id',$id);
		$this->assign('gcategories',$category);
        $this->display('channel'.$id.'.html');
    }
	
	function _get_goods_curlocal($cate_id)
    {
        $parents = array();
        if ($cate_id)
        {
            $gcategory_mod =& bm('gcategory');
            $parents = $gcategory_mod->get_ancestor($cate_id, true);
        }

        $curlocal = array(
            array('text' => LANG::get('all_categories'), 'url' => "javascript:dropParam('cate_id')"),
        );
        foreach ($parents as $category)
        {
            $curlocal[] = array('text' => $category['cate_name'], 'url' => "javascript:replaceParam('cate_id', '" . $category['cate_id'] . "')");
        }
        unset($curlocal[count($curlocal) - 1]['url']);

        return $curlocal;
    }
	
}

?>