<?php

class Application_Model_DbTable_Categories extends Zend_Db_Table_Abstract
{

    protected $_name = 'f_categories';
    protected $_dependentTables = array('FilmsCats');

}

