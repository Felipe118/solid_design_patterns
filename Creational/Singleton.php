<?php

/*
    O padrão de projeto Singleton é um padrão de projeto criacional
     que garante que uma classe tenha apenas uma instância e forneça 
     um ponto global de acesso a essa instância.


    Neste exemplo, a Singleton classe tem um construtor privado para evitar a
    instanciação direta e um getInstancemétodo que cria uma instância da
    classe se ela não existir e a retorna. O getInstance método é marcado 
    staticpara que possa ser chamado sem criar uma instância da Singletonclasse.

    Quando você quiser acessar a única instância da Singletonclasse,
    basta chamar Singleton::getInstance(), que retorna a mesma instância 
    toda vez que é chamada. Isso garante que haja apenas uma instância da classe,
    pois o getInstancemétodo se encarrega de criá-la se não existir e devolvê-la se existir.
*/

class Singleton
{
    private static $instance;

    private function __construct()
    {
        // private constructor to prevent direct instantiation
    }

    public static function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Singleton();
        }
        return self::$instance;
    }
}
