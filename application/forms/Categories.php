<?php

class Application_Form_Categories extends Zend_Form
{

    public function init()
    {

        // Set the method for the display form to POST

        $this->setMethod('post');



        // Add an nom catégorie element

        $this->addElement('text', 'nom_cat', array(

            'label'      => 'Nom categorie:',

            'required'   => true,

            'filters'    => array('StringTrim')

        ));



        // Add the comment element

        $this->addElement('radio', 'statut_cat', array(

            'label'      => 'Statut:',

            'required'   => true,
            'multiOptions'=>array('0' , '1'),

        ));
       // $this->getElement('statut_cat')->addMultiOptions(array('0' , '1'));





        // Add the submit button

        $this->addElement('submit', 'submit', array(

            'ignore'   => true,

            'label'    => 'Sign Guestbook',

        ));



        // And finally add some CSRF protection

        $this->addElement('hash', 'csrf', array(

            'ignore' => true,

        ));
    }


}

