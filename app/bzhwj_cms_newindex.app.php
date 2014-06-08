<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-6-7
 * Time: 下午11:01
 */
class Bzhwj_cms_newindexApp extends MallbaseApp{
    function __construct()
    {
        $this->StoreRecommendGoodApp();
    }
    function StoreRecommendGoodApp()
    {
        parent::__construct();
    }
    function index() {
        $this->display('bzhwj_online_help.html');
    }
}