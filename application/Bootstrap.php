<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
    protected function _initDoctype()
    {
        $this->bootstrap('view');
        $view = $this->getResource('view');
        $view   ->doctype('XHTML1_TRANSITIONAL');
        $view   ->setEncoding('UTF-8')
                ->setEscape('addslashes')
                ->setEscape('utf8_encode')
                ->addHelperPath('ZendX/JQuery/View/Helper/', 'ZendX_JQuery_View_Helper');

             //->addHelperPath('Zend/Dojo/View/Helper/', 'Zend_Dojo_View_Helper');

             
    }

    protected function _initRouter()
    {
        $front = Zend_Controller_Front::getInstance();
        $router = $front->getRouter();
        
        $route_film = new Zend_Controller_Router_Route_Regex(
                                'film-(\d+)-([a-z0-9-]+).html',
                                array(
                                                1=>1,
                                                2=>'Aide',
                                                        'controller'=>'films',
                                                        'action'=>'details'
                                                ),
                                            array(
                                                1 => 'idf',
                                                2 => 'nomf'
                                            ),
                                          'film-%d-%s.html'
                        );

                $tags_film = new Zend_Controller_Router_Route_Regex(
                                'tag-([a-z0-9-]+).html',
                                array(
                                                1=>'film',
                                                        'controller'=>'index',
                                                        'action'=>'index'
                                                ),
                                            array(
                                                1 => 'q'
                                            ),
                                          'tag-%s.html'
                        );

            $route_cat = new Zend_Controller_Router_Route_Regex(
                            'films-(\d+)-([a-z0-9-]+)-page(\d+).html',
                            array(
                                            1=>1,
                                            2=>'Aide',
                                            3=>1,
                                            'controller'=>'films',
                                            'action'=>'list'
                                            ),
                                        array(
                                            1 => 'idc',
                                            2 => 'nomc',
                                            3=>'page'
                                        ),
                                      'films-%d-%s-page%d.html'
                    );

        $router->addRoute('film', $route_film);
        $router->addRoute('cat', $route_cat);
       $router->addRoute('tags', $tags_film);
        
    }



    protected function _initAutoload()
    {
        $autoloader = new Zend_Application_Module_Autoloader(array(
            'namespace' => 'Application_',
            'basePath'  => dirname(__FILE__),
        ));

        return $autoloader;
    }

    protected function _initDefine()
    {
        define('DOSSIER_IMAGES'     , '/img');
        define('NOM_DEFAULT_IMAGE'  , 'par_defaut.jpg');
        define('LEN_TITLE'          , 14);
        define('HOME_PRINT_LAST'    , 15);
        define('HOME_BEST_VIEW'     , 15);
        define('ELEMENT_PER_PAGE'   , 20);
        define('PAGE_RANGE_PAGINATOR',7);
    }

    protected function _initPub()
    {

        //if(APPLICATION_ENV == 'development')$onOff = false;
        //else $onOff = true;
        $onOff = true;
        define('PUB_TOOL_BAR', $onOff);
        define('PUB_SIDE_BAR', $onOff);
    }

    
}

