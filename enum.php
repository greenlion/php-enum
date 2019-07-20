<?php
declare(strict_types = 1);

class Enum {
    private $values = [];
    private $tokens = [];
    private $set_to = null;

    private function must_have_token($token) {
        if(!isset($this->tokens[$token])) {
            $trace = debug_backtrace();
            trigger_error(
                'Undefined property: ' . $token .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'],
                E_USER_NOTICE);
        }
    }

    public function __construct(array $tokens = null) {
      foreach($tokens as $idx => $token) {
          $this->values[$idx] = $token;
          $this->tokens[$token] = $idx;
      }
    }

    function set($token) {
        $this->must_have_token($token);
        $this->set_to = $this->tokens[$token];
    }

    function get_token() : string {
        print_r($this->tokens);
        return $this->values[$this->set_to];
    }

    
    function get() : int {
        return $this->set_to == null ? -1 : $this->set_to;
    }

    function equals(Enum $cmp) {
        return $cmp->get() == $this->get();
    }

}

/*
class nlpValueTypes {
  

}



class nlpToken {
    var $is_numeric = null;
    var $is_complex = null;
    var $is_string = null;
    var $is_null = true;
    var $token_type = null;
    var $has_exact_value = null;
    var $value = null;
    var $type = null;
}

class NLP {
    const UNKNOWN = null;

        function __construct() {
            
        }

        function subject() {

        }

        function object() {

        }

        function verb() {

        }

        
}

*/
?>
