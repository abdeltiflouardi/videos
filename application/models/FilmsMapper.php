<?php

class Application_Model_FilmsMapper
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

            $this->setDbTable('Application_Model_DbTable_Films');

        }

        return $this->_dbTable;

    }



    public function save(Application_Model_Films $films)

    {

        $data = array(
            'id_cat'        =>  $films->getIdCat(),
            'nom_film'      =>  $films->getNomFilm(),
            'desc_film'     =>  $films->getDescFilm(),
            'ajout_par'     =>  $films->getAjoutPar(),
            'date_ajout'    =>  $films->getDateAjout(),
            'statut_film'   =>  $films->getStatutFilm(),
        );



        if (null === ($idFilm = $films->getIdFilm())) {

            unset($data['id_film']);

            $this->getDbTable()->insert($data);

        } else {

            $this->getDbTable()->update($data, array('id_film = ?' => $idFilm));

        }

    }



    public function find($idFilm, Application_Model_Films $films)

    {

        $result = $this->getDbTable()->find($idFilm);

        if (0 == count($result)) {

            return;

        }

        $row = $result->current();

        $films ->setIdFilm($row->id_film)
                    ->setIdCat($row->id_cat)
                    ->setNomFilm($row->nom_film)
                    ->setDescFilm($row->desc_film)
                    ->setAjoutPar($row->ajout_par)
                    ->setDateAjout($row->date_ajout)
                    ->setStatutFilm($row->statut_film);

    }



    public function fetchAll($where = '')

    {

        if(!empty($where))
            $resultSet = $this->getDbTable()->fetchAll($where);
        else
            $resultSet = $this->getDbTable()->fetchAll();

        $entries   = array();

        foreach ($resultSet as $row) {

            $entry = new Application_Model_Films();

            $entry ->setIdFilm($row->id_film)
                    ->setNomFilm($row->nom_film)
                    ->setDescFilm($row->desc_film)
                    ->setAjoutPar($row->ajout_par)
                    ->setImg($row->img)
                    ->setVideo($row->video)
                    ->setDateAjout($row->date_ajout);

            $entries[] = $entry;

        }

        return $entries;

    }

    public function getFilmsByCat($idc, $page = 1, &$selectPaginator=""){
    
        if(is_null($idc))return $entries;
        $cats = new Application_Model_DbTable_FilmsCats();
        $select = $cats->select();
        $select     ->order('date_ajout desc')
                    ->where("id_cat = '$idc' and statut_film=1")
                    ->limitPage($page, ELEMENT_PER_PAGE);
        $selectPaginator = $select;
        $resultSet = $cats->fetchAll($select);

        $entries   = array();
          foreach ($resultSet as $objF) {
                $entry = new Application_Model_Films();
                $row = $objF->findParentApplication_Model_DbTable_Films();
                //if(!$row->id_film)continue;
                $entry ->setIdFilm($row->id_film)
                        ->setNomFilm($row->nom_film)
                        ->setDescFilm($row->desc_film)
                        ->setAjoutPar($row->ajout_par)
                    ->setImg($row->img)
                    ->setVideo($row->video)
                        ->setDateAjout($row->date_ajout);

                $entries[] = $entry;
          }
          
        return $entries;
    }

    public function getListFilmsByCritere(array $critere=array())
    {
        $table = $this->getDbTable();
        $critere = array_filter($critere);
        if(sizeof($critere) == 0):
            $resultSet = $table->fetchAll();
        else:
            $select = $table->select();
            foreach($critere as $k=>$v):
                switch($k):
                    case 'where':
                            if(!is_null($v)) $select->where($v);
                        ;break;
                    case 'order':
                            if(!is_null($v)) $select->order($v);
                        ;break;
                    case 'limit':
                            if(count($v)>0) $select->limit($v['len'], $v['offset']);
                        ;break;
                endswitch;
            endforeach;
            

            $resultSet = $table->fetchAll($select);
        endif;

        $entries   = array();

        foreach ($resultSet as $row) {

            $entry = new Application_Model_Films();

            $entry ->setIdFilm($row->id_film)
                    ->setNomFilm($row->nom_film)
                    ->setDescFilm($row->desc_film)
                    ->setAjoutPar($row->ajout_par)
                    ->setImg($row->img)
                    ->setVideo($row->video)
                    ->setDateAjout($row->date_ajout);

            $entries[] = $entry;

        }

        return $entries;
    }
}

