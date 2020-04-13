<?php

$db = null;

try
{
    $db = PDOFactory::getMysqlConnexion();
}
catch (PDOException $e)
{
    echo 'La connexion a échoué : [', $e->getCode(), '] : ', $e->getMessage();
}