<?php

class Application_Model_Categories
{


    protected $_nom_cat;

    protected $_statut_cat;

    protected $_id_cat;



    public function __construct(array $options = null)

    {

        if (is_array($options)) {

            $this->setOptions($options);

        }

    }



    public function __set($name, $value)

    {

        $method = 'set' . $name;

        if (('mapper' == $name) || !method_exists($this, $method)) {

            throw new Exception('Invalid categories property');

        }

        $this->$method($value);

    }



    public function __get($name)

    {
        $name = explode("_", $name);
        $name = array_map('ucfirst', $name);
        $name = implode("", $name);
       
        $method = 'get' . $name;

        if (('mapper' == $name) || !method_exists($this, $method)) {

            throw new Exception('Invalid categories property');

        }

        return $this->$method();

    }



    public function setOptions(array $options)

    {

        $methods = get_class_methods($this);

        foreach ($options as $key => $value) {
            $key = explode("_", $key);
            $key = array_map('ucfirst', $key);
            $key = implode("", $key);
            $method = 'set' . $key;

            if (in_array($method, $methods)) {

                $this->$method($value);

            }

        }

        return $this;

    }



    public function setNomCat($text)

    {

        $this->_nom_cat = (string) $text;

        return $this;

    }



    public function getNomCat()

    {

        return $this->_nom_cat;

    }



    public function setStatutCat($s)

    {

        $this->_statut_cat = $s;

        return $this;

    }



    public function getStatutCat()

    {

        return $this->_statut_cat;

    }


    public function setIdCat($id)

    {

        $this->_id_cat = (int) $id;

        return $this;

    }



    public function getIdCat()

    {

        return $this->_id_cat;

    }
}

