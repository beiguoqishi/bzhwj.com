<?php
/**
 * Created by PhpStorm.
 * User: liupengtao-pc
 * Date: 14-2-11
 * Time: 下午12:16
 */

class StoreRecommendGoodApp extends StorebaseApp{
    function __construct()
    {
        $this->StoreRecommendGoodApp();
    }
    function StoreRecommendGoodApp()
    {
        parent::__construct();
    }
    function index() {
        $this->display('store.recommend_goods.html');
    }
} 