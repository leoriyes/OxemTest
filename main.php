<?php

require __DIR__ . '/vendor/autoload.php';

$farm = new oxem\app\Farm(10, 20);
$products = $farm->collectProducts();

printf("Надоено: %d литров, собрано яиц: %d штук\n", $products['milk'], $products['eggs']);