<?php

/*
    O princípio de segregação de interface (ISP) afirma que os clientes não devem 
    ser forçados a implementar interfaces que não usam. Em outras palavras,
    uma classe não deve ser obrigada a implementar métodos de que não precisa.
*/

interface Aves
{
    public function andar();
    public function voar();
    public function nadar();
}
class Pato implements Aves
{
    public function voar()
    {
        //lógica
    }

    public function nadar()
    {
        //lógica
    }

    public function andar()
    {
        //lógica
    }
}

class Pinguim implements Aves
{
    public function voar()
    {
        //lógica
    }

    public function nadar()
    {
        //lógica
    }

    public function andar()
    {
        //lógica
    }
}

class Andorinha implements Aves
{
    public function voar()
    {
        //lógica
    }

    public function nadar()
    {
        //lógica
    }

    public function andar()
    {
        //lógica
    }
}

/*
    Nessa estrutura estamos forçando algumas aves a implementar 
    alguns métodos que elas não deveriam possuir. Isso porque existem 
    aves que não voam e aves que não nadam. Como o Pinguim, que implementou o 
    método voar já que pinguins não voam. E o mesmo para a Andorinha, que não nada.

    Vamos ver como criar uma estrutura que siga o princípio da segregação da interface.

    REFATORANDO E IMPLANTANDO O ISP FICARIA ASSIM:
*/

interface Aves
{
    public function andar();
}

interface AvesQueVoam extends Aves
{
    public function voar();
}

interface AvesQueNadam extends Aves
{
    public function nadar();
}

class Pato implements AvesQueVoam, AvesQueNadam
{
    public function voar()
    {
        //lógica
    }

    public function nadar()
    {
        //lógica
    }

    public function andar()
    {
        //lógica
    }
}

class Pinguim implements AvesQueNadam
{
    public function nadar()
    {
        //lógica
    }

    public function andar()
    {
        //lógica
    }
}

class Andorinha implements AvesQueVoam
{
    public function andar()
    {
        //lógica
    }

    public function voar()
    {
        //lógica
    }
}
  