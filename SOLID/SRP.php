<?php


/*
    O Princípio de Responsabilidade Única (SRP) 
    afirma que cada classe ou módulo deve ter apenas um motivo para mudar

    Neste exemplo, a Userclasse tem apenas a responsabilidade de gerenciar 
    o nome e o e-mail do usuário. A UserProfile classe só tem a responsabilidade 
    de gerenciar o endereço e número de telefone do usuário. Se houver uma alteração 
    na forma como as informações do usuário são armazenadas ou gerenciadas, 
    isso afetará apenas uma dessas classes, e não ambas.

*/

class User
{
    private $name;
    private $email;
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    public function getEmail()
    {
        return $this->email;
    }
}

class UserProfile
{
    private $user;
    private $address;
    private $phone;
    
    public function __construct(User $user)
    {
        $this->user = $user;
    }
    
    public function setAddress($address)
    {
        $this->address = $address;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }
    
    public function getPhone()
    {
        return $this->phone;
    }
}
