<?php

class CategoriesController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $categories = new Application_Model_CategoriesMapper();
        
                $this->view->entries = $categories->fetchAll();
    }

}


/*
 *
    public function lAction()
    {

        $request = $this->getRequest();

        $form    = new Application_Form_Categories();



        if ($this->getRequest()->isPost()) {

            if ($form->isValid($request->getPost())) {

                $comment = new Application_Model_Categories($form->getValues());

                $mapper  = new Application_Model_CategoriesMapper();

                $mapper->save($comment);

                return $this->_helper->redirector('index');

            }

        }



        $this->view->form = $form;
    }
 *
 */
