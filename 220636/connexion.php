<?php
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=stock;charset=utf8', 'root', 'Bahate22');
    }
    catch (Exception $e)
    {
            die('Erreur de con : '. $e->getMessage());
    }
?>