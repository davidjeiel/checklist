<?php

  $dbName          = 'checklist' ;
  $dbHost          = 'localhost:3306' ;
  $dbUsername      = 'root';
  $dbUserPassword  = '';
  try {
        $conn =  new PDO( "sqlsrv:SERVER=".$dbHost.";"."DATABASE=".$dbName, $dbUsername, $dbUserPassword);  
        $conn ->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } 
catch(PDOException $e) 
{
  die($e->getMessage());  
} 