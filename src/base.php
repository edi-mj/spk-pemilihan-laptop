<?php

define("BASEURL", "http://localhost/spk-pemilihan-laptop");
define("BASEPATH", $_SERVER["DOCUMENT_ROOT"] . "/spk-pemilihan-laptop");
define("DB", new PDO('mysql:host=localhost;dbname=spk_laptop', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]));
