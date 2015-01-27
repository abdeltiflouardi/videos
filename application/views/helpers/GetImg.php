<?php
class Zend_View_Helper_GetImg
{
    protected $_img_folder = DOSSIER_IMAGES;
    protected $_default_img = NOM_DEFAULT_IMAGE;

    public function getImg($img = '')
    {
        
        if(empty($img))
            return $this->_img_folder.'/'.$this->_default_img;
        //elseif(!file($img))
        //    return $this->_img_folder.'/'.$this->_default_img;
        else
           return $img;
        

    }
}

?>
