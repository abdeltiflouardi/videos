<?php

class Application_Form_Films extends Zend_Dojo_Form
{

    public function init()
    {
        $this->setMethod('post');
$this->addElement(

                'FilteringSelect',

                'ajout_par',

                array(

                    'label' => 'Ajouter par',

                    'value' => 'blue',

                    'autocomplete' => false,

                    'multiOptions' => array(1=>'admin', 'nouser'),

                )

            );

$this->addElement(

                'FilteringSelect',

                'id_cat',

                array(

                    'label' => 'ComboBox (select)',

                    'value' => 'blue',

                    'autocomplete' => false,

                    'multiOptions' => array(1=>'Action', 'Comique'),

                )

            );


$this->addElement(

    'TextBox',

    'nom_film',

    array(

        'value'      => 'some text',

        'label'      => 'TextBox',

        'trim'       => true,

        'propercase' => true,

    )

);

        // Add the comment element


$this->addElement(

    'Textarea',

    'desc_film',

    array(

        'label'    => 'Textarea',

        'required' => true,

        'style'    => 'width: 200px;',

    )

);

   
      $this->addElement(
   
          'RadioButton',
   
          'statut_film',
   
          array(
   
              'label' => 'Statut',
   
              'multiOptions'  => array(
   
                  '1' => '1',
   
                  '0' => '0',
  
              ),
  
              'value' => '1',
  
          )
  
      );

$this->addElement(

    'SubmitButton',

    's',

    array(

        'required'   => false,

        'ignore'     => true,

        'label'      => 'Submit Button!',

    )

);
    }


}

