<?php

/**
 * 手机充值挂件
 *
 */
class Sn_rechargeWidget extends BaseWidget
{
    var $_name = 'sn_recharge';

    function _get_data()
    {
		$this->options = stripslashes_deep($this->options);
        return $this->options;
    }
	
	function get_config_datasrc()
    {
        $this->options = stripslashes_deep($this->options);
        $this->assign('options', $this->options);
    }
}

?>