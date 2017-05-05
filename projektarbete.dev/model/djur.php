<?php

class Djur {

    private $id;
    private $name;
    private $year;
    private $legs;
    private $type;


        function __construct($name, $year, $legs, $type) {
            $this->name = $name;
            $this->year = $year;
            $this->legs = $legs;
            $this->type = $type;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getYear() {
        return $this->year;
    }

    public function getLegs() {
        return $this->legs;
    }

     public function getType() {
        return $this->type;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setYear($year) {
        $this->year = $year;
    }

    public function setLegs($legs) {
        $this->legs = $legs;
    }

    public function setType($type) {
        $this->type = $type;
    }

}
