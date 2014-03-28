<?php

/**
 * 轮播图片挂件
 *
 * @return  array   $image_list
 */
class Sn_txtactWidget extends BaseWidget
{
    var $_name = 'sn_txtact';
    var $_num  = 6;

    function _get_data()
    {
		return $this->options;
    }

    function parse_config($input)
    {
        $result = array();
        $num    = isset($input['ad_link_url']) ? count($input['ad_link_url']) : 0;
        if ($num > 0)
        {
            for ($i = 0; $i < $num ; $i++)
            {
                $result[] = array(
                    'ad_link_url'  => $input['ad_link_url'][$i],
                    'ad_title' => $input['ad_title'][$i]
                );
            }
        }

        return $result;
    }
}

?>