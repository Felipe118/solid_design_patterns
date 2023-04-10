<?php

abstract class DBFactory
{
    abstract public function createConnection($db) : Database;
}

class DBCreateFactory extends DBFactory
{
    public function createConnection($db): Database
    {
        switch($db){
            case 'mysql':
                return new Mysql();
            case 'postrges':
                return new Postgres();
            default:
                throw new Exception('Invalid animal type');
        }
    }
}

interface Database
{
    public function connection();
}

class Mysql implements Database
{
    public function connection()
    {
        return 'Conectou ao MYSQL';
    }
}

class Postgres implements Database
{
    public function connection()
    {
        return 'Conectou ao Posgres SQL';
    }
}

$factory = new DBCreateFactory();

$mysql = $factory->createConnection('mysql');

echo $mysql->connection();