<?php

class Application_Model_Films
{

    protected $_id_film;

    protected $_nom_film;

    protected $_desc_film;

    protected $_ajout_par;

    protected $_date_ajout;

    protected $_img;
    
    protected $_video;


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

            throw new Exception('Invalid films property');

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

            throw new Exception('Invalid films property');

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



    public function setNomFilm($text)

    {

        $this->_nom_film = (string) $text;

        return $this;

    }



    public function getNomFilm()

    {

        return $this->_nom_film;

    }

    public function setIdFilm($id)

    {

        $this->_id_film = (int) $id;

        return $this;

    }



    public function getIdFilm()

    {

        return $this->_id_film;

    }


    public function setAjoutPar($par)

    {

        $this->_ajout_par = (string) $par;

        return $this;

    }



    public function getAjoutPar()

    {

        return $this->_ajout_par;

    }



    public function setDateAjout($d)

    {

        $this->_date_ajout = $d;

        return $this;

    }



    public function getDateAjout()

    {

        return $this->_date_ajout;

    }

    public function setDescFilm($desc)

    {

        $this->_desc_film = (string) $desc;

        return $this;

    }



    public function getDescFilm()

    {

        return $this->_desc_film;

    }


    public function setImg($img)

    {

        $this->_img = (string) $img;

        return $this;

    }



    public function getImg()

    {

        return $this->_img;

    }

    public function setVideo($video)

    {

        $this->_video = (string) $video;

        return $this;

    }



    public function getVideo()

    {

        return $this->_video;

    }
}

