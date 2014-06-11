<?php

/**
 * Created by PhpStorm.
 * User: liupengtao
 * Date: 14-6-8
 * Time: 上午12:13
 */
class CmsController
{

    function findListByTable($table, $page = 1, $params)
    {
        CommonTableModel::$table_name = $table;
        $pageSize = isset($params['pageSize']) ? intval($params['pageSize']) : 20;
        $offset = ($page - 1) * $pageSize;
        $id = isset($params['idField']) ? $params['idField'] : 'id';
        $title = isset($params['showField']) ? $params['showField'] : 'title';

        $options = array(
            'limit' => $pageSize,
            'offset' => $offset,
            'select' => $id . ',' . $title
        );
        $conditions = array();
        if (isset($params['tabField']) && isset($params['tabFieldVal'])) {
            $tabField = $params['tabField'];
            $tabFieldVal = $params['tabFieldVal'];
            $conditions[] = $tabField . "=" . mysql_real_escape_string($tabFieldVal);
        }
        $count_con = array();
        if (count($conditions) > 0) {
            $count_con['conditions'] = $options['conditions'] = implode(' and ', $conditions);
        }
        $count = CommonTableModel::count($count_con);
        $totalPage = $count % $pageSize == 0 ? $count / $pageSize : floor($count / $pageSize) + 1;
        $ret = array();
        $ret['totalPage'] = intval($totalPage);
        $ret['page'] = intval($page);
        $result = array();
        foreach (CommonTableModel::all($options) as $item) {
            $result[] = $item->to_array();
        }
        $ret['list'] = $result;
        return $ret;
    }

    function getConfigByTableAndAppId($table, $app_id)
    {
        CommonTableModel::$table_name = 'app_common_mis_page_table_fields_config';
        $options = array(
            'conditions' => "table_name = '" . mysql_real_escape_string($table) . "' and app_id=" . mysql_real_escape_string($app_id),
            'select' => 'fields'
        );
        $ret = CommonTableModel::first($options)->to_array();
        if ($ret && $ret['fields']) {
            $result = unserialize($ret['fields']);
            return $result;
        }
        return array();
    }

    function getDataFromTableById($table_name,$select,$conditions) {
        DynamicTableModel::$table_name = $table_name;
        $options = array(
            'conditions' => implode(' and ',$conditions),
            'select'     => implode(',',$select)
        );
        return DynamicTableModel::first($options)->to_array();
    }

    function getRecord($table_name, $app_id, $id,$id_field)
    {
        $ret = array();
        $app_id = intval($app_id);
        $id = intval($id);
        $result = array();
        if (!empty($table_name)) {
            $fields_config = $this->getConfigByTableAndAppId($table_name, $app_id);
            $raw_f_keys = array();
            $exclude_keys = array();
            foreach ($fields_config as $k => $v) {
                if (empty($v['exclude'])) {
                    $raw_f_keys[] = $k;
                } else {
                    $exclude_keys[] = $k;
                }
            }
            $raw_f_keys = array_unique($raw_f_keys);
            $id_field = empty($id_field) ? 'id' : $id_field;
            $record = $this->getDataFromTableById($table_name, $raw_f_keys, array($id_field . "=" . $id));

            foreach ($raw_f_keys as $k) {
                $result[$k] = array(
                    'data' => $record[$k],
                    'config' => $fields_config[$k]
                );
            }

            foreach ($exclude_keys as $k) {
                $result[$k] = array(
                    'data' => $record[$k],
                    'config' => $fields_config[$k]
                );
            }
            $ret = ($result);
        }

        return $ret;
    }
} 