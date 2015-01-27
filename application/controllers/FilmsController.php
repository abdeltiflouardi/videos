<?php

class FilmsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
        $this->view->searchForm = new Application_Form_Search();
    }

    public function indexAction()
    {
        $this->_redirect('/');
        //$films = new Application_Model_FilmsMapper();
        //$this->view->entries = $films->fetchAll();
    }

    public function listAction()
    {
        $idc = $this->_request->getParam('idc', 1);

        
        $cat = new Application_Model_Categories();
        $cats = new Application_Model_CategoriesMapper();
        $cats->find($idc, &$cat);
        $this->view->nom_cat = $cat->getNomCat();
        $this->view->currPage = $this->_request->getParam('page', 1);
        unset($cats);
        unset($cat);

        $this->view->films = array();
        $films = new Application_Model_FilmsMapper();
        $this->view->films = $films->getFilmsByCat($idc, $this->_request->getParam('page', 1), $filmSelect);

        $adapter = new Zend_Paginator_Adapter_DbSelect($filmSelect);
        $page = new Zend_Paginator($adapter);
        $page->setPageRange(PAGE_RANGE_PAGINATOR);
        $page->setCurrentPageNumber($this->_getParam('page', 1));
        $page->setItemCountPerPage($this->_getParam('par', ELEMENT_PER_PAGE));
        $this->view->paginator = $page;
    }

    public function detailsAction()
    {
       $film = new Application_Model_DbTable_Films();
       $film = $film->find($this->getRequest()->getParam('idf',2))->current()->toArray();
       $this->view->assign('film', $film);
    }
}


/*
    public function lAction()
    {
                        $request = $this->getRequest();

                        $form    = new Application_Form_Films();



                        if ($this->getRequest()->isPost()) {

                            if ($form->isValid($request->getPost())) {

                                $comment = new Application_Model_Films($form->getValues());

                                $mapper  = new Application_Model_FilmsMapper();

                                $mapper->save($comment);

                                return $this->_helper->redirector('films');

                            }

                        }



                        $this->view->form = $form;
    }
 *
 */