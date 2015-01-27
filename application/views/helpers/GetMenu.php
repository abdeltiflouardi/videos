<?php
class Zend_View_Helper_GetMenu extends Zend_Controller_Action_Helper_Abstract
{
    public function getMenu($view)
    {
        $menu = "";
        $cats = new Application_Model_CategoriesMapper();
        $cats = $cats->fetchAll('statut_cat = 1');
        
        if($this->getRequest()->has("idc"))
            $selected_idc = $this->getRequest()->getParam("idc");
        else
            $selected_idc = 0;
            
        $menu .= '<ul class="menu">';
        foreach($cats  as $cat):

        if($cat->id_cat == $selected_idc)
            $menu .= '<li class="selectedMenu">' . "\n";
        else
            $menu .= '<li>' . "\n";

        $menu .= '<a href="' . $view->url(  array(  "page"=>1,
                                                    "idc"=>$cat->id_cat,
                                                    "nomc"=> $view->getUrlEncoded($view->escape($cat->nom_cat))
                                                ),'cat') . '">';
        $menu .= $view->escape($cat->nom_cat);
        $menu .= '</a>'. "\n";
        $menu .= '</li>'. "\n";
        endforeach;
        $menu .= '</ul>'. "\n";
        return $menu;
    }
}
?>
