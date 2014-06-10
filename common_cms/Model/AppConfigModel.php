<?php
/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-6-8
 * Time: 上午12:22
 */

class AppConfigModel extends ActiveRecord\Model
{
    static $table_name = 'app_common_mis_page_app_config';
    static $connection = 'production';
}