<?php

//截取utf8字符串
function utf8Substr($str, $from, $len)
{
    return preg_replace('#^(?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$from.'}'.
        '((?:[\x00-\x7F]|[\xC0-\xFF][\x80-\xBF]+){0,'.$len.'}).*#s',
        '$1',$str);
}

class DefaultApp extends MallbaseApp
{
    function index()
    {
        $this->assign('index', 1); // 标识当前页面是首页，用于设置导航状态
        $this->assign('icp_number', Conf::get('icp_number'));

        $this->_config_seo(array(
            'title' => Lang::get('mall_index') . ' - ' . Conf::get('site_title'),
        ));
        $this->assign('page_description', Conf::get('site_description'));
        $this->assign('page_keywords', Conf::get('site_keywords'));
        $cms = &m('tmall_cms');
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->assign('luo1',$this->_get_recommend_by_ctg(1));
        $this->assign('luo2',$this->_get_recommend_by_ctg(2));
        $this->assign('luo3',$this->_get_recommend_by_ctg(3));
        $this->assign('luo4',$this->_get_recommend_by_ctg(4));
        $this->assign('luo5',$this->_get_recommend_by_ctg(5));
        $this->assign('luo6',$this->_get_recommend_by_ctg(6));
        $this->assign('luo7',$this->_get_recommend_by_ctg(7));
        $this->assign('mingdian',$this->_get_mingdian());

        //$mingdian = $this->_get_mingdian();
        //print_r($mingdian);

        $this->display('index.html');
    }

    function _get_recommend_by_ctg($ctg) {
        $db =& db();
        $sql = "select * from app_bzhwj_index_luobo where ctg = $ctg && status = 1";
        $result = $db->getall($sql);
        foreach($result as $k=>$val)
        {
            $str = $val["cnt"];
            $substr = utf8Substr($str, 0, 10);
            $result[$k]["cnt"] = $substr;
        }
        return $result;
    }

    function _get_mingdian() {
        $db =& db();
        $sql = "select * from app_bzhwj_index_mingdian where status = 1 limit 100";
        $result =  $db->getall($sql);
        foreach($result as $k=>$val)
        {
            $create_time = $val["create_at"];
            $now_time = time();
            $released_time = (7 * 24 * 60 * 60) - ($now_time - $create_time);
            $result[$k]["seconds"] = $released_time;
            $result[$k]["day"] = intval($released_time / (24 * 60 * 60));
            $released_time %= (24 * 60 * 60);
            $result[$k]["hour"] = intval($released_time / (60 * 60));
            $released_time %= (60 * 60);
            $result[$k]["minute"] = intval($released_time / 60);
            $released_time %= 60;
            $result[$k]["second"] = $released_time;
        }
        return $result;
    }
}

?>
