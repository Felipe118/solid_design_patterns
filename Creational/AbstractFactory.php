<?php

/*
    O padrão de projeto Abstract Factory é um padrão de criação que fornece 
    uma interface para criar famílias de objetos relacionados ou dependentes 
    sem especificar suas classes concretas.

    Um exemplo do padrão Abstract Factory em PHP pode ser assim:

*/

interface AbstractFactory {
    public function createProductA(): AbstractProductA;
    public function createProductB(): AbstractProductB;
}

class ConcreteFactory1 implements AbstractFactory {
    public function createProductA(): AbstractProductA {
        return new ConcreteProductA1;
    }
    public function createProductB(): AbstractProductB {
        return new ConcreteProductB1;
    }
}

class ConcreteFactory2 implements AbstractFactory {
    public function createProductA(): AbstractProductA {
        return new ConcreteProductA2;
    }
    public function createProductB(): AbstractProductB {
        return new ConcreteProductB2;
    }
}

interface AbstractProductA {
    public function usefulFunctionA(): string;
}

interface AbstractProductB {
    public function usefulFunctionB(): string;
    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string;
}

class ConcreteProductA1 implements AbstractProductA {
    public function usefulFunctionA(): string {
        return "The result of the product A1.";
    }
}

class ConcreteProductB1 implements AbstractProductB {
    public function usefulFunctionB(): string {
        return "The result of the product B1.";
    }

    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string {
        $result = $collaborator->usefulFunctionA();
        return "The result of the B1 collaborating with (".$result.")";
    }
}

class ConcreteProductA2 implements AbstractProductA {
    public function usefulFunctionA(): string {
        return "The result of the product A2.";
    }
}

class ConcreteProductB2 implements AbstractProductB {
    public function usefulFunctionB(): string {
        return "The result of the product B2.";
    }

    public function anotherUsefulFunctionB(AbstractProductA $collaborator): string {
        $result = $collaborator->usefulFunctionA();
        return "The result of the B2 collaborating with (".$result.")";
    }
}


$factory = new ConcreteFactory1();
$productA = $factory->createProductA();
$productB = $factory->createProductB();
