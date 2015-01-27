<?php

class BossController extends Zend_Controller_Action
{

    public function init()
    {
        $this->_helper->layout->setLayout("layoutBoss");
                                        
                                            	$bl = new Zend_Session_Namespace('bossConnected');
                                        
                                        		if(	!$bl->c and
                                        			!in_array($this->_request->getActionName(), array('login'))):
                                        
                                        			$this->_redirect('/boss/login/');
                                        
                                        		endif;
    }

    public function actionsAction()
    {
        $this->_helper->layout->disableLayout();
                                            	$this->_helper->viewRenderer->setNoRender();
                                            	
                                            	$tabSelected = $this->_hasParam('tab') ? 
                                            						preg_replace('/[^0-9]+/' , '', $this->_getParam('tab', 1)) : 
                                            							null;
                                        		switch($tabSelected):
                                        			case 1: $this->_forward("cat");break;
                                        			case 2: $this->_forward("films");break;
                                        			case 3: $this->_forward("tags");break;
                                        			default: null;break;
                                        		endswitch;
    }

    public function indexAction()
    {
        // action body
    }

    public function catAction()
    {
        $catObj = new Application_Model_CategoriesMapper();
        $this->view->listCats = $catObj->fetchAll();
    }

    public function filmsAction()
    {
        // action body
    }

    public function tagsAction()
    {
        // action body
    }

    public function logoutAction()
    {
        // action body
                                        $bl = new Zend_Session_Namespace('bossConnected');
                                    	unset($bl->c);
    }

    public function loginAction()
    {
        if($this->_request->isPost()):
                            		if(	$this->_request->getPost('login') 	== "lol" and
                            			$this->_request->getPost('pwd') 	== "lol" ):
                        
                        		    	$bl = new Zend_Session_Namespace('bossConnected');
                        		    	$bl->c = true;
                        		    	$this->_redirect('/boss/index/');
                        
                        	    	endif;
                            	endif;
    }

    public function detailsfilmAction()
    {
        $idFilm     = $this->getRequest()->getParam("idf");
                $filmObj    = new Application_Model_DbTable_Films();
                $this->view->debug = $filmObj->find($idFilm)->toArray();
    }

    public function majfilmAction()
    {
        $dataEncoded = array_map("utf8_decode", $this->getRequest()->getParams());
        $dataEncoded = array_map("stripslashes", $dataEncoded);
        $id = $dataEncoded["idf"];
        if($id>0):

            $data = array();
            $where = array();
            $data["nom_film"]   = $dataEncoded["titre"];
            $data["desc_film"]  = trim($dataEncoded["desc"]);
            $data["img"]        = $dataEncoded["img"];
            $data["video"]      = $dataEncoded["video"];
            $data["date_ajout"] = $dataEncoded["dateaj"];

            $uFilm = new Application_Model_DbTable_Films();
            $where = $uFilm->getAdapter()->quoteInto('id_film = ?', $id);

            $c = $uFilm->update($data, $where);

            if($c>0)
                $this->view->debug  =   "Ok pour " . $id;
            else
                $this->view->debug  =   "Ko pour " . $id;
        else:
            $this->view->debug  =   "ID required";
        endif;
        //$this->view->debug = $this->getRequest()->getParam("idf");
        
    }


}

















