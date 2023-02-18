<?php

/*  
  O Princípio de Inversão de Dependência afirma que módulos de alto nível não
 devem depender de módulos de baixo nível, ambos devem depender de abstrações.

  Aqui está um exemplo do Princípio de Inversão de Dependência em PHP:
  Neste exemplo, a classe Order é o módulo de alto nível e as classes 
  CreditCard PayPalsão os módulos de baixo nível. A Orderclasse depende 
  de uma abstração (a PaymentMethodinterface) em vez de uma implementação 
  concreta ( CreditCardou PayPal).

  Isso permite que a Orderclasse seja dissociada da implementação específica 
  do método de pagamento e a torna mais flexível e facilmente testável.

  Você pode criar um novo objeto de pedido com uma implementação de método de 
  pagamento específica 
*/

interface PaymentMethod {
    public function charge(float $amount);
}

class CreditCard implements PaymentMethod {
    public function charge(float $amount) {
        // charge the credit card
    }
}

class PayPal implements PaymentMethod {
    public function charge(float $amount) {
        // charge the PayPal account
    }
}

class Order {
    protected $paymentMethod;

    public function __construct(PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    public function checkout(float $amount) {
        // order logic
        $this->paymentMethod->charge($amount);
    }
}

$order = new Order(new CreditCard());
$order->checkout(100);

$order->paymentMethod = new PayPal();

'-----------------------------------------------------------------------------------------------------';
/*
        Neste exemplo, a UserServiceclasse é o módulo de alto nível e a Databaseclasse 
        é o módulo de baixo nível. A UserServiceclasse depende da Databaseclasse, 
        mas isso cria um forte acoplamento entre os dois módulos. Para resolver esse problema,
         introduzimos uma abstração, DatabaseConnection, da qual dependem os módulos de alto e baixo nível. 
        Isso nos permite alterar a implementação do módulo de baixo nível sem afetar o módulo de alto nível.


*/


//Low-level module
class Database {
    public function connect() {
      //connect to database
    }
  }
  
  //High-level module
  class UserService {
    private $db;
  
    public function __construct(Database $db) {
      $this->db = $db;
    }
  
    public function getUsers() {
      $this->db->connect();
      //retrieve users from database
    }
  }
  
  //Abstraction
  interface DatabaseConnection {
    public function connect();
  }
  
  //Low-level module with abstraction
  class MySQL implements DatabaseConnection {
    public function connect() {
      //connect to MySQL database
    }
  }
  
  //High-level module using abstraction
  class UserService {
    private $db;
  
    public function __construct(DatabaseConnection $db) {
      $this->db = $db;
    }
  
    public function getUsers() {
      $this->db->connect();
      //retrieve users from database
    }
  }
  
  //Client code
  $db = new MySQL();
  $userService = new UserService($db);
  $users = $userService->getUsers();
  