<?php
//Exemple de configuration et dtilisation

require_once 'MyPDO.template.class.php';

MyPDO::setConfiguration('mysql:host=mysql;dbname=cutron01_music;charset=utf8', 'web', 'web');
