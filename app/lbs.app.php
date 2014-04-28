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
        $zones = json_decode($this->get_dist_by_pid_cid($pid,$cid));
        if ($pid == '17' && $cid == '09') {
            $zones[] = array(
                "id" => '05',
                'name' => '崇安'
            );
            $zones[] = array(
                'id' => '06',
                'name' => '南长'
            );
            $zones[] = array(
                'id' => '07',
                'name' => '北塘'
            );
            $zones[] = array(
                'id' => '08',
                'name' => '惠山'
            );
            $zones[] = array(
                'id' => '09',
                'name' => '滨湖'
            );
            $zones[] = array(
                'id' => '10',
                'name' => '新区'
            );
        }
        $zones = json_encode($zones);
        header('Content-Type: application/json; charset=utf-8');
        echo $zones;
    }
} 