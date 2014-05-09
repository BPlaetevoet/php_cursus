<?php
require_once 'data/genredao.class.php';

$dao = new GenreDAO();
$lijst = $dao->getById(1);
print("<pre>");
print_r($lijst);
print("</pre>");
