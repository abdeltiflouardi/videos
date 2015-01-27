<?php

class Application_Form_Search extends Zend_Form
{

    public function init()
    {

        // Set the method for the display form to POST
        $this->setName("recherche");
        $this->setMethod('get');
        $this->setAction('/');

        // Add an nom catégorie element

        $this->addElement('text', 'q', array(

            'label'      => '',
            'style'      => 'width: 160px;',
            'filters'    => array('StringTrim')

        ));



        // Add the submit button

        $this->addElement('submit', 'submit', array(

            'label'    => 'Ok',

        ));


       $this->clearDecorators();

        $this->setDecorators(array(
            'FormElements',
            array('HtmlTag', array('tag' => 'div', 'style'=>'margin-top: 10px;')),
            'Form',
        ));
        $this->setElementDecorators(array(
    'ViewHelper',
    'Errors',
    array(array('data' => 'HtmlTag'), array('tag' => 'label'))
        ));
    }


}

