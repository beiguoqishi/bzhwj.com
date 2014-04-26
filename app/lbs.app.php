<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-4-25
 * Time: 下午10:58
 */

class LbsApp extends MallbaseApp{
    function __construct()
    {
        $this->StoreRecommendGoodApp();
    }
    function StoreRecommendGoodApp()
    {
        parent::__construct();
    }
    function lbs_get_cities_by_pid() {
        $pid = $_POST['pid'];
        $cities = json_encode(json_decode($this->get_cities_by_pid($pid),true));
        header('Content-Type: application/json; charset=utf-8');
        echo $cities;
    }

    function lbs_get_dist_by_pid_cid() {
        $pid = $_POST['pid'];
        $cid = $_POST['cid'];
        $zones = json_encode(json_decode($this->get_dist_by_pid_cid($pid,$cid)));
        header('Content-Type: application/json; charset=utf-8');
        echo $zones;
    }
} 