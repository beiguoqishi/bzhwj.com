<?php
/**
 * Created by PhpStorm.
 * User: ptliu
 * Date: 14-4-28
 * Time: 下午5:05
 */
class Bzhwj_online_helpApp extends MallbaseApp{
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