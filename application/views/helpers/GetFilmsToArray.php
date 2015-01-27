<?php
class Zend_View_Helper_GetFilmsToArray{
    public function getFilmsToArray($view,  $var = 'films' )
    {
        $tmp = array();
       $films = $view->$var;
       foreach($films as $key=>$var){
            $tmp[$key]['url'] =
            $view->url(
                            array(
                                    'idf'   =>$var->id_film,
                                    'nomf'  =>$view->getUrlEncoded($view->escape($var->nom_film))
                                ),
                           'film'
                       );
            $tmp[$key]['img'] = $var->img;
            $tmp[$key]['nom_film'] = $var->nom_film;
            $tmp[$key]['id_film'] = $var->id_film;
       }
        return $tmp;
    }
}
?>
