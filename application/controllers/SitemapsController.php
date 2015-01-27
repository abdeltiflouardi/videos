<?php

class SitemapsController extends Zend_Controller_Action
{

    public function init()
    {
        /* Initialize action controller here */
    }

    public function indexAction()
    {
        $this->_redirect("/");
    }

    public function createAction()
    {
        $this->_helper->layout->disableLayout();
        $this->_helper->viewRenderer->setNoRender();

        $cats = new Application_Model_DbTable_Categories();
        $cats = $cats->fetchAll('true')->toArray();
        $films = new Application_Model_DbTable_Films();
        $films = $films->fetchAll()->toArray();

        $tags = new Application_Model_DbTable_Tags();
        $tags = $tags->fetchAll()->toArray();

        $output = '<?xml version="1.0" encoding="UTF-8"?>'."\n";
        $output .= '<?xml-stylesheet type="text/xsl" href="http://'.$_SERVER['HTTP_HOST'].'/sitemap.xsl"?>'."\n";
        $output .= '<urlset
                        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
                        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd"
                        xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">'."\n";

        $output .= "<url>\n";
        $output .= "\t<loc>http://".$_SERVER['HTTP_HOST']."/</loc>\n";
        $output .= "\t<lastmod>".gmdate('Y-m-d\TH:i:s+00:00', time())."</lastmod>\n";
        $output .= "\t<priority>1.0</priority>\n";
        $output .= "</url>\n\n";

        
        foreach($cats as $v):
                $cUrl = $this->view->url(
                                    array(
                                            'idc'=>$v['id_cat'],
                                            'nomc'=>$this->view->getUrlEncoded($this->view->escape($v['nom_cat']))
                                ), 'cat');

                $output .= "<url>\n";
                $output .= "\t<loc>http://".$_SERVER['HTTP_HOST'] .$cUrl."</loc>\n";
                $output .= "\t<priority>0.8</priority>\n";
                $output .= "</url>\n\n";
        endforeach;

        $cats = null;
        unset($cats);

        foreach($films as $v):
                $cUrl = $this->view->url(
                                    array(
                                            'idf'=>$v['id_film'],
                                            'nomf'=>$this->view->getUrlEncoded($this->view->escape($v['nom_film']))
                                ), 'film');

                $output .= "<url>\n";
                $output .= "\t<loc>http://".$_SERVER['HTTP_HOST'] .$cUrl."</loc>\n";
                $output .= "\t<priority>0.5</priority>\n";
                $output .= "</url>\n\n";
        endforeach;

        $films = null;
        unset($films);

        foreach($tags as $v):
                $cUrl = $this->view->url(
                                    array(
                                            'q'=>$v['tag']
                                ), 'tags');

                $output .= "<url>\n";
                $output .= "\t<loc>http://".$_SERVER['HTTP_HOST'] .$cUrl."</loc>\n";
                $output .= "\t<priority>0.5</priority>\n";
                $output .= "</url>\n\n";
        endforeach;
        
        $output .= "</urlset>\n";
        $file = fopen('sitemap.xml', "w");
        fwrite($file, $output);
        fclose($file);
        

    }


}



