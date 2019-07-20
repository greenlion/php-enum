<?php
require_once("enum.php");

class enumTokenTypes extends Enum {
    function __construct() {
        $tokens = ['function', 'value', 'object'];
        parent::__construct($tokens);
    }
}

$test = new enumTokenTypes();
$test->set('function');
var_dump($test);
echo $test->get() . "\n";
echo $test->get_token() . "\n";
$test2 = new enumTokenTypes();
$test2->set('value');
var_dump($test2->equals($test));
