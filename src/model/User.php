<?php
namespace Geeks\model;
use Geeks\model\DB as DB;

class User extends DB
{
    private $id;
    private $email;
    private $name;
    private $surnames;
    private $age;
    private $company;
    private $genre;
    private $password;
    private $role = "USER";

    public function __construct($email=null, $name=null, $surnames=null, $age=null, $company=null, $genre=null, $password=null){
        $this->setEmail($email);
        $this->setName($name);
        $this->setSurnames($surnames);
        $this->setAge($age);
        $this->setCompany($company);
        $this->setGenre($genre);
        $this->setPassword($password);
    }

    public function register(){
        $this->conectar();

        return $this->consultaPreparada("INSERT INTO usuarios (email, name, surnames, age, company, genre, password, role) VALUES (:email, :name, :surnames, :age, :company, :genre, :password, :role)",[":email"=>$this->email,":name"=>$this->name,":surnames"=>$this->surnames,":age"=>$this->age,":company"=>$this->company,":genre"=>$this->genre, ":password"=>$this->password,":role"=>$this->role]);
    }

    public function update(){
        $this -> conectar();

        return $this -> consultaPreparada("UPDATE usuarios SET email = :email, name = :name, surnames = :surnames, age = :age, company = :company,  password = :password WHERE id = :id",[":id"=>$this->id, ":email"=>$this->email,":name"=>$this->name,":surnames"=>$this->surnames,":age"=>$this->age,":company"=>$this->company, ":password"=>$this->password]);
    }

    public function checkUser(){
        $this->conectar();

        $resultado=$this->consultaPreparada("SELECT id, role FROM usuarios WHERE email = :email AND password = :password",[":email"=>$this->email,":password"=>$this->password]);
        
        if($resultado==1){
            $usuario = $this->resultado->fetch();

            if($usuario==false){
                return false;
            }else{
                $this->setId($usuario["id"]);
                $this->setRole($usuario["role"]);
                return true;
            }
        }else{
            return "Error en la consulta";
        }
    }

    public function getUser(){
        $this->conectar();

        $this-> consultaSimple("SELECT * FROM usuarios WHERE id = " . $this->id);

        return $this->resultado;
    }

    public function getAllUsers(){
        $this->conectar();

        $this-> consultaSimple("SELECT * FROM usuarios");

        return $this->resultado;
    }

    public function deleteUser(){
        $this->conectar();

        $this-> consultaPreparada("DELETE FROM usuarios WHERE id = :id", [":id" => $this->id]);

        return $this->resultado;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of surnames
     */ 
    public function getSurnames()
    {
        return $this->surnames;
    }

    /**
     * Set the value of surnames
     *
     * @return  self
     */ 
    public function setSurnames($surnames)
    {
        $this->surnames = $surnames;

        return $this;
    }

    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Get the value of company
     */ 
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * Set the value of company
     *
     * @return  self
     */ 
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get the value of pass
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of pass
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get the value of genre
     */ 
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set the value of genre
     *
     * @return  self
     */ 
    public function setGenre($genre)
    {
        $this->genre = $genre;

        return $this;
    }

}