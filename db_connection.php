<?php

const DB_SERVER = "mysql:host=localhost;dbname=atelier_pdo";
const DB_USER = "sami";
const DB_PASS = "sami";

$connection = new PDO(DB_SERVER, DB_USER, DB_PASS);
