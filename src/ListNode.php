// List Node
<?php
class ListNode {
 
  	// what are we storing.
    public $data;
    // next node in the list.
    public $next;
    // previous node in the list.
    public $prev;
 
    function __construct($data) {
        $this->data = $data;
    }
    
    public function __toString()
    {
        return 'data : ' . $this->data . ' next : ' . $this->next . ' prev : ' . $this->prev . "\r\n" ;
    }

}
?>