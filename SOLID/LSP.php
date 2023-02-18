<?php
/*
    O Princípio de Substituição de Liskov (LSP) afirma que objetos de uma superclasse devem 
    ser substituíveis por objetos de uma subclasse sem afetar a exatidão do programa

*/


class Logger
{
    public function writer($message)
    {
    //lógica
    }
}

class DatabaseLogger extends Logger
{
    public function __construct(DataBase $database)
    {
        $this->database = $database;
    }

    public function writer($message)
    {
        //lógica
    }
}
class FileLogger extends Logger
{
    public function __construct(FIleManager $fileManager)
    {
        $this->fileManager = $fileManager;
    }

    public function writer($message)
    {
        //lógica
    }
}


#Nesse exemplo nós temos a classe *Logger*, *DatabaseLogger* e a *FileLogger* o 
//princípio da substituição de Liskov diz que podemos usar tanto a classe *FileLogger* 
//quanto a *DatabaseLogger* na nossa aplicação deve manter o mesmo comportamento,
// isso vale para qualquer classe que extende da classe *Logger*.

#Como mostra no nesse pequeno exemplo, podemos usar todas as classes que vamos atingir 
//o mesmo resultado.

$logger = new FileLogger($fileManager);
$logger->write('meu log');

$logger = new DatabaseLogger($database);
$logger->write('meu log')