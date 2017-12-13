<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app = new \Slim\App();


// Get todos os clientes
$app->get('/api/customers', function(Request $request, Response $response){
   $sql = "SELECT * FROM cliente";
   
   try{
     //GET database Object
     $db = new db();
     
     //Connect
     $db = $db -> connect();
     
     $stmt = $db -> query($sql);
     $customers = $stmt -> fetchAll(PDO::FETCH_OBJ);
     $db = null;
     echo json_encode($customers);
     
     
   }catch(PDOExceotion $e){
       echo '{ "error" : { "text": '.$e -> getMessage(). ' }';
   }
});



 // Get cliente específico
  $app->get('/api/customers/{id}', function(Request $request, Response $response){
      $id = $request->getAttribute('id');
      $sql = "SELECT * FROM cliente WHERE id = $id";
   
      try{
          
           // Get DB Object
           $db = new db();
           
           // Connect
           $db = $db->connect();
           $stmt = $db->query($sql);
           $customer = $stmt->fetch(PDO::FETCH_OBJ);
           $db = null;
           echo json_encode($customer);
       } catch(PDOException $e){
           echo '{"error": {"text": '.$e->getMessage().'}';
       }
});

// Adicionar cliente

$app->get('/api/customers/add', function(Request $request, Response $response){
    
    $cpf =         $request->getParam('cpf');
    $senha =       $request->getParam('senha');
    $nome =        $request->getParam('nome');
    $telefone =    $request->getParam('telefone');
    $email =       $request->getParam('email');
    $nascimento =  $request->getParam('nascimento');
    
    $cep =         $request->getParam('cep');
    $logradouro =  $request->getParam('logradouro');
    $num =         $request->getParam('num');
    $complemento = $request->getParam('complemento');
    $bairro =      $request->getParam('bairro');
    $cidade =      $request->getParam('cidade');
    $estado =      $request->getParam('estado');
    
    $rg =               $request->getParam('rg');
    $expedicao =        $request->getParam('expedicao');
    $orgao_expeditor =  $request->getParam('orgao_expeditor');
    $estado_civil =     $request->getParam('estado_civil');
    $categoria =        $request->getParam('categoria');
    $empresa =          $request->getParam('empresa');
    $profissao =        $request->getParam('profissao');
    $renda_bruta =      $request->getParam('renda_bruta');
    
    
    $sql = "INSERT INTO cliente (cpf,senha,nome,telefone,email,nascimento,cep,logradouro,num,complemento,bairro,cidade,estado,rg,expedicao,orgao_expeditor,estado_civil,categoria,empresa,profissao,renda_bruta) VALUES
    (:cpf,:senha,:nome,:telefone,:email,:nascimento,:cep,:logradouro,:num,:complemento,:bairro,:cidade,:estado,:rg,:expedicao,:orgao_expeditor,:estado_civil,:categoria,:empresa,:profissao,:renda_bruta)";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        
        $stmt->bindParam(':cpf',        $cpf);
        $stmt->bindParam(':senha',      $senha);
        $stmt->bindParam(':nome',       $nome);
        $stmt->bindParam(':telefone',   $telefone);
        $stmt->bindParam(':email',      $email);
        $stmt->bindParam(':nascimento', $nascimento);
        
        $stmt->bindParam(':cep',         $cep);
        $stmt->bindParam(':logradouro',  $logradouro);
        $stmt->bindParam(':nume',        $num);
        $stmt->bindParam(':complemento', $complemento);
        $stmt->bindParam(':bairro',      $bairro);
        $stmt->bindParam(':cidade',      $cidade);
        $stmt->bindParam(':estado',      $estado);
        
        $stmt->bindParam(':rg',              $rg);
        $stmt->bindParam(':expedicao',       $expedicao);
        $stmt->bindParam(':orgao_expeditor', $orgao_expeditor);
        $stmt->bindParam(':estado_civil',    $estado_civil);
        $stmt->bindParam(':categoria',       $categoria);
        $stmt->bindParam(':empresa',         $empresa);
        $stmt->bindParam(':profissao',       $profissao);
        $stmt->bindParam(':renda_bruta',     $renda_bruta);
        
        $stmt->execute();
        echo '{"notice": {"text": "Customer Added"}';
        
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});


// Delete Cliente
$app->delete('/api/customers/delete/{id}', function(Request $request, Response $response){
    $id = $request->getAttribute('id');
    $sql = "DELETE FROM cliente WHERE id = $id";
    try{
        // Get DB Object
        $db = new db();
        // Connect
        $db = $db->connect();
        $stmt = $db->prepare($sql);
        $stmt->execute();
        $db = null;
        echo '{"notice": {"text": "Customer Deleted"}';
    } catch(PDOException $e){
        echo '{"error": {"text": '.$e->getMessage().'}';
    }
});

  
