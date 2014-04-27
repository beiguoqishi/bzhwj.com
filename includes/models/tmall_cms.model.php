<?php

class Tmall_cmsModel extends BaseModel
{
    var $manual_table = 'app_common_mis_page_table_extra_data';
    var $news_table = 'app_bzhwj_news';
    var $common_question = 'app_bzhwj_common_question';
    var $newest_notice = 'app_bzhwj_newest_notice';
    var $people_table = 'app_bzhwj_people';
    var $tuijian_goods_table = 'app_bzhwj_tuijian_goods';

    function get_manual_data($app, $record_id, $seg)
    {
        $this->db->select_database('ecmall');
        $sql = "select data from " . $this->manual_table . " where app='$app' and record_id=$record_id and seg = '$seg'";
        $res = $this->db->query($sql);
        $goods_list = array();
        while ($row = $this->db->fetchRow($res)) {
            $goods_list[] = $row;
        }
        $this->db->select_database('ecmall');
        if (count($goods_list) > 0) {
            return unserialize($goods_list[0]['data']);
        }
        return array();
    }

    function get_bzhwj_news($id) {
        $this->db->select_database('ecmall');
        $sql = "select * from " . $this->news_table . " where id = $id";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $row['update_at'] = date('Y-m-d',$row['update_at']);
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_bzhwj_common_question($id) {
        $sql = "select * from " . $this->common_question . " where id = $id";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $row['update_at'] = date('Y-m-d',$row['update_at']);
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_bzhwj_newest_notice($id) {
        $sql = "select * from " . $this->newest_notice . " where id = $id";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $row['update_at'] = date('Y-m-d',$row['update_at']);
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_bzhwj_tuijian_goods_front_end($id) {
        $this->db->select_database('ecmall');
        $sql = "select * from " . $this->tuijian_goods_table . " where id = $id";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $row['update_at'] = date('Y-m-d',$row['update_at']);
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_bzhwj_person($id) {
        $this->db->select_database('ecmall');
        $sql = "select * from " . $this->people_table . " where id = $id";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $row['update_at'] = date('Y-m-d',$row['update_at']);
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_bzhwj_people($store_id) {
        $this->db->select_database('ecmall');
        $sql = "select id,store_id,title from " . $this->people_table;

        if (intval($store_id) > 0) {
            $sql .= " where store_id=$store_id";
        }

        $res = $this->db->query($sql);

        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret;
    }

    function get_bzhwj_tuijian_goods($store_id) {
        $this->db->select_database('ecmall');
        $sql = "select id,store_id,title,img from " . $this->tuijian_goods_table;

        if (intval($store_id) > 0) {
            $sql .= " where store_id=$store_id";
        }

        $res = $this->db->query($sql);

        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret;
    }

    function get_last_common_question($id) {
        $sql = "select title,id from " . $this->common_question . " where id < $id order by id desc limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_next_common_question($id) {
        $sql = "select title,id from " . $this->common_question . " where id > $id order by id limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_last_newest_notice($id) {
        $sql = "select title,id from " . $this->newest_notice . " where id < $id order by id desc limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_next_newest_notice($id) {
        $sql = "select title,id from " . $this->newest_notice . " where id > $id order by id limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        return $ret[0];
    }

    function get_last_news($id) {
        $this->db->select_database('ecmall');
        $sql = "select title,id from " . $this->news_table . " where id < $id order by id desc limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_next_news($id) {
        $this->db->select_database('ecmall');
        $sql = "select title,id from " . $this->news_table . " where id > $id order by id limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_last_person($id) {
        $this->db->select_database('ecmall');
        $sql = "select title,id from " . $this->people_table . " where id < $id order by id desc limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function get_next_person($id) {
        $this->db->select_database('ecmall');
        $sql = "select title,id from " . $this->people_table . " where id > $id order by id limit 1";

        $res = $this->db->query($sql);
        $ret = array();
        while ($row = $this->db->fetchRow($res)) {
            $ret[] = $row;
        }

        $this->db->select_database('ecmall');

        return $ret[0];
    }

    function incr_read_time($id) {
        $this->db->select_database('ecmall');
        $sql = "update app_bzhwj_news set read_time = read_time + 1 where id=" . $id;

        $res = $this->db->query($sql);

        $this->db->select_database('ecmall');

        echo $res;
    }

    function person_incr_read_time($id) {
        $this->db->select_database('ecmall');
        $sql = "update app_bzhwj_people set read_time = read_time + 1 where id=" . $id;

        $res = $this->db->query($sql);

        $this->db->select_database('ecmall');

        echo $res;
    }
}


?>
