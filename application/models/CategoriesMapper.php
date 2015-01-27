<?php

class Application_Model_CategoriesMapper
{

protected $_dbTable;



    public function setDbTable($dbTable)

    {

        if (is_string($dbTable)) {

            $dbTable = new $dbTable();

        }

        if (!$dbTable instanceof Zend_Db_Table_Abstract) {

            throw new Exception('Invalid table data gateway provided');

        }

        $this->_dbTable = $dbTable;

        return $this;

    }



    public function getDbTable()

    {

        if (null === $this->_dbTable) {

            $this->setDbTable('Application_Model_DbTable_Categories');

        }

        return $this->_dbTable;

    }



    public function save(Application_Model_Categories $categories)

    {

        $data = array(

            'nom_cat'   => $categories->getNomCat(),
            'statut_cat' => $categories->getStatutCat(),

        );


        if (null === ($idCat = $categories->getIdCat())) {

            unset($data['id_cat']);

            $this->getDbTable()->insert($data);

        } else {

            $this->getDbTable()->update($data, array('id_cat = ?' => $idCat));

        }

    }



    public function find($idCat, Application_Model_Categories $categories)

    {

        $result = $this->getDbTable()->find($idCat);

        if (0 == count($result)) {

            return;

        }

        if(is_null($categories)) return $result->current();

        $row = $result->current();

        $categories->setIdCat($row->id_cat)

                  ->setNomCat($row->nom_cat)

                  ->setStatutCat($row->statut_cat);

    }


    public function fetchAll($where = '')

    {
        if($where == "")
            $resultSet = $this->getDbTable()->fetchAll();
        else
            $resultSet = $this->getDbTable()->fetchAll($where);

        $entries   = array();

        foreach ($resultSet as $row) {

            $entry = new Application_Model_Categories();

            $entry->setIdCat($row->id_cat)

                  ->setNomCat($row->nom_cat)

                  ->setStatutCat($row->statut_cat);

            $entries[] = $entry;

        }

        return $entries;

    }

}

