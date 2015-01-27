<?php
class Zend_View_Helper_GetShortTitle
{
    public function getShortTitle($title)
    {
        $title = ucfirst(strtolower($title));
        if(strlen($title)<LEN_TITLE):
            return $title;
        else:
            return substr($title, 0, LEN_TITLE) . '...';
        endif;
    }
}
?>
