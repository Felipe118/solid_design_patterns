<?php

/*
    O Princípio Aberto/Fechado (OCP) afirma que um componente 
    de software deve ser aberto para extensão, mas fechado para modificação.

    Neste exemplo, a AreaCalculator classe calcula a soma das 
    áreas de diferentes formas (como círculos e retângulos).
     Essa classe pode ser estendida para oferecer suporte a formas 
     adicionais sem alterar seu código. As novas formas só precisam implementar
      a Shapeinterface e fornecer sua própria implementação do areamétodo. 
      Isso permite que a AreaCalculator classe seja aberta para extensão, 
      mas fechada para modificação.




*/

class Logger
{
    private $writer;

    public function __construct(Writer $writer)
    {
        $this->writer = $writer;
    }

    public function write($message)
    {
        $this->writer->write($message);
    }
}

interface Writer
{
    public function write($message);
}

class Txt implements Writer
{
    public function write($message)
    {
        //lógica
    }
}

class Csv implements Writer
{
    public function write($message)
    {
        //lógica
    }
}
