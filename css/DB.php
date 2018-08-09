<?php
try
{
    $pdo = new PDO('mysql:dbname=mykeyboa_deep;host=localhost','mykeyboa_deep','r!DX7T@A(F2T',array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"));
}
catch (PDOException $e)
{
    print "Error : " . $e->getMessage() . "<br>" ;
    die();
}