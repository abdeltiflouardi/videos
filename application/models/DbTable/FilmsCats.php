<?php

class Application_Model_DbTable_FilmsCats extends Zend_Db_Table_Abstract
{

    protected $_name = 'f_films_cats';

    protected $_referenceMap    = array(

        'Categorie' => array(

            'columns'           => array('id_cat'),

            'refTableClass'     => 'Application_Model_DbTable_Categories',

            'refColumns'        => array('id_cat')

        ),

        'Film' => array(

            'columns'           => array('id_film'),

            'refTableClass'     => 'Application_Model_DbTable_Films',

            'refColumns'        => array('id_film')

        )

    );

}

