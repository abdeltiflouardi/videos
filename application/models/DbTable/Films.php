<?php

class Application_Model_DbTable_Films extends Zend_Db_Table_Abstract
{

    protected $_name = 'f_films';
    protected $_dependentTables = array('FilmsCats');


}

