<?php
/**
 * Created by PhpStorm.
 * User: milver
 * Date: 16-03-15
 * Time: 03:11 PM
 */
require_once 'Faker/src/autoload.php';
class GeneratorFakermodel{

    private $faker;

    public function __construct($idioma){
        $this->faker = Faker\Factory::create($idioma);
    }
    public function getEmails($cantidad){
        $lista=array();
        for($i=0;$i<$cantidad;$i++){
            $lista[$i]=$this->faker->email;
        }
        return $lista;
    }
    public function getDirecciones($cantidad){
        $lista=array();
        for($i=0;$i<$cantidad;$i++){
            $lista[$i]=$this->faker->address;
        }
        return $lista;
    }
    public function nombreCompleto($cantidad){
        $lista=array();
        for($i=0;$i<$cantidad;$i++){
            $lista[$i]=$this->faker->firstName." ".$this->faker->lastName;
        }
        return $lista;
    }
    public function getNombres($cantidad){
        $lista=array();
        for($i=0;$i<$cantidad;$i++){
            $lista[$i]=$this->faker->firstName;
        }
        return $lista;
    }
    public function getApellidos($cantidad){
        $lista=array();
        for($i=0;$i<$cantidad;$i++){
            $lista[$i]=$this->faker->lastName;
        }
        return $lista;
    }
}