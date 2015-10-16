// List Node
<?php
class ListNode {
 
    public $data;
    public $next;
    public $previous;
 
    function __construct($data) {
        $this->data = $data;
    }
 
    public function readNode() {
        return $this->data;
    }
 
}
?>