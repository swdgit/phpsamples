<?php
// Double Linked List
class DoubleLinkedList {

    private $firstNode;
    private $lastNode;
    private $count;
 
 	// traversal direction
 	private $forward = true;

    function construct() {
        $this->firstNode = NULL;
        $this->lastNode = NULL;
        $this->count = 0;
    }
 
    public function isEmpty() {
        return ($this->firstNode == NULL);
    }
 
 	/** add a node to the list */
 	public function add($data) {
 		// how to check the existing data nodes so we can add this one into the correct slot.

 	}

 	/** return the first node in the list */
	public function first() {

	}

	/** return the last node in tehe list */
	public function last() {

	}

	/** return the next item in the list. */
	public function next() {
		// if no next element
		// throw new Exception('No Next Element');
	}

	/** return the previous node in the list */
	public function previous() {
		// if no previous element
		// throw new Exception('No Previous Element');
	}

	/** Reverse the current direction of the list.		
	 */
	public function reverse() {
		$this->forward = !$forward;
	}

	/** Check the current direction of the list operations */
	public function isForward() {
		return $forward;
	}

}
?>