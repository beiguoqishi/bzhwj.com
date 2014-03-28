<?php

/**
 * 图片广告挂件
 *
 * @param   string  $image_url  图片地址
 * @param   string  $link_url   链接地址
 * @param   int     $width      图片宽度
 * @param   int     $height     图片高度
 * @return  array   $options    设置
 */
class Sn_image_adWidget extends BaseWidget
{
    var $_name = 'sn_image_ad';

    function _get_data()
    {
        return array(
            'ad_image_url'  => $this->options['ad_image_url'],
            'ad_link_url'   => $this->options['ad_link_url'],
			'ad_width'	=> $this->options['ad_width'],
			'ad_height'	=> $this->options['ad_height'],
			'margin_top'	=> $this->options['margin_top'],
			'margin_bottom'	=> $this->options['margin_bottom'],
        );
    }

    function parse_config($input)
    {
        $image = $this->_upload_image();
        if ($image)
        {
            $input['ad_image_url'] = $image;
        }

        return $input;
    }

    function _upload_image()
    {
        import('uploader.lib');
        $file = $_FILES['ad_image_file'];
        if ($file['error'] == UPLOAD_ERR_OK)
        {
            $uploader = new Uploader();
            $uploader->allowed_type(IMAGE_FILE_TYPE);
            $uploader->addFile($file);
            $uploader->root_dir(ROOT_PATH);
            return $uploader->save('data/files/mall/template', $uploader->random_filename());
        }

        return '';
    }
}

?>