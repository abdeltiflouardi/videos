<?php

class IndexController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->view->searchForm = new Application_Form_Search();
    }

    public function indexAction()
    {
        $criteres = array();
        $films = new Application_Model_FilmsMapper();
        if(!$this->getRequest()->has('q')):

            $criteres['limit'] = array('len'=>HOME_PRINT_LAST, 'offset'=>0);
            $criteres['order'] = 'date_ajout desc';
            $this->view->lastFilms = $films->getListFilmsByCritere($criteres);
            
            $criteres['order'] = 'date_ajout asc';
            $criteres['limit'] = array('len'=>HOME_BEST_VIEW, 'offset'=>0);
            $this->view->bestFilms = $films->getListFilmsByCritere($criteres);
            
        else:
            $term = $this->getRequest()->getParam('q', 'a');
            $criteres['where'] = 'nom_film like \'%'.$term.'%\'';
            $criteres['order'] = 'date_ajout desc';
            $this->view->searchFilms = $films->getListFilmsByCritere($criteres);
            $this->view->term = $term;
        endif;
    }


}

