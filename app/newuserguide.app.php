<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-2-25
 * Time: 下午11:40
 */

class NewUserGuideApp extends MallbaseApp{
    function __construct()
    {
        $this->NewUserGuide();
    }
    function NewUserGuide()
    {
        parent::__construct();
    }
    function index() {
        $cms = &m('tmall_cms');
        $this->assign('recommend_search',$cms->get_manual_data('bzhwj',0,'search_recommend'));
        $this->display('new_user_guide.html');
    }
} 