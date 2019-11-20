<?php 
  
    // Development Connection
    $host = '127.0.0.1';
    $db = 'attendance';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';
    
    
    
    
    
    

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    try{
        $pdo = new PDO($dsn, $user, $pass);
        'echo Hello you are connected';
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
   throw new PDOException($e->getMessage());
    }
 
    require_once 'crud.php';
    require_once 'user.php';
    
    $crud = new crud($pdo);
   

    
?>