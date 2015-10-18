<?php
// Double Linked List
class DoubleLinkedList {

    // the starting point of the whole list.
    private $firstNode;

    // What node are we currently working on?
    private $currentNode;

    // just how many nodes do we have? .. may not need this with the count method.
    private $count;
 
 	// traversal direction
 	private $forward = true;

    function construct() {
        $this->firstNode    = NULL;
        $this->currentNode  = NULL;
        $this->count        = 0;
    }

    /**
     * This should really return a boolean value. Exception logic here, per the Req, makes it less portable and usable by others.
     * @return boolean [description]
     */
    public function isEmpty() {
        if ($this->count() == 0) {
            throw Exception("The List is Empty");
        }
    }
 
 	/** add a node to the list */
 	public function add($data) {
 		// how to check the existing data nodes so we can add this one into the correct slot.
 		if ($this->firstNode == NULL) {
 			$this->firstNode = $this->newNode($data, NULL, NULL);
 		} else {
            $node = $this->firstNode;

            // find the data position .. 
            if ($node->data < $data) {
                $this->insertAfter($node, $data);
            } elseif ($node->data > $data) {
                $this->insertBefore($node, $data);
            }
 		}
 	}

 	/** total representing the node count in this list. */
 	public function count() {
 		$total = 0;
        $node  = $this->firstNode;
 		while ($node != NULL) {
 			$total++;
 			$node = $node->next;
 		}
 		return $total;
 	}

    /** get the first node from the list.  */
    public function firstNode() {
        return $this->firstNode;
    }

    /** get at the last node. */
    public function lastNode() {
        // I don't believe this is very effecient.
        $node = $this->currentNode;

        if ($node == NULL) {
            $node = $this->firstNode;
        }

        if ($node != NULL) {
            while ($node->next != NULL) {
                $node = $node->next;
            }
        } else {
            throw new Exception('No Data Found. List looks to be empty.');
        }

        return $node;
    }

 	/** return the first nodes data in the list */
	public function first() {
        if (!$forward) {
            return $this->last();
        }
        if ($this->firstNode == NULL) {
            throw new Exception('No Data Found. List looks to be empty.');
        }
		return $this->firstNode->data;
	}

	/** return the last node data in the list */
	public function last() {
        if (!$this->forward) {
            return $this->first();
        }
		return $this->lastNode()->data;
	}

	/** return the next item . */
	public function next() {
        if (!$this->forward) {
            return $this->previous();
        }
        // if no previous element
        if ($this->currentNode       == NULL || 
            $this->currentNode->next == NULL) {
            throw new Exception('No Next Element');
        } 
        return $this->currentNode->next->data;
	}

	/** return the previous node in the list */
	public function previous() {

        if (!$this->forward) {
            return $this->next();
        }
		// if no previous element
        if ($this->currentNode       == NULL || 
            $this->currentNode->prev == NULL) {
            throw new Exception('No Previous Element');
        } 
        return $this->currentNode->prev->data;
	}

    /** return data from the current Node */
    public function current() {
        if ($this->currentNode == NULL) {
            throw new Exception('No Current Data');
        }
        return $this->currentNode->data;
    }

	/** Reverse the current direction of the list. */
	public function reverse() {
		$this->forward = !$this->forward;
	}

    /** If I understand the last request, all nodes need to be reversed. e.g. reverse sort. */
    public function reverseList() {

        $current = $this->firstNode;
        $temp    = NULL;
        while ($current != NULL) {

            $temp = $current->prev;
            
            $current->prev = $current->next;
            $current->next = $temp;
            $current = $current->prev;

        }

        if ($temp != NULL) {
            $this->firstNode = $temp->prev;
        }
    }

	/** Check the current direction of the list operations */
	public function isForward() {
		return $this->forward;
	}

    /** checks to see if a function you want to use is returning data or tossing an exception. */
    public function valid($function) {
        $callable = true;
        try {
            call_user_func($function);
        } catch (Exception $e) {
            $callable = false;
        }
        return $callable;
    }

    /* insert data after the specified node */
    private function insertAfter($node, $data) {

        if ($node->next == NULL) {
            $newNode = $this->newNode($data, $node, NULL);

            $node->next        = $newNode;
            $this->currentNode = $newNode;

        } elseif ($node->next->data > $data) {
            // insert here.
            $newNode = new ListNode($data);

            // placeholder to make it easier to insert here.
            $nodeNext = $node->next;

            // Re-Assign nodes
            $newNode->prev = $node;
            $newNode->next = $nodeNext;

            $node->next     = $newNode;
            $nodeNext->prev = $newNode;

            $this->currentNode = $newNode;

        } elseif ($node->next->data < $data) {
            $this->insertAfter($node->next, $data);
        }
    }

    /* insert data before the given node */
    private function insertBefore($node, $data) {

        if ($node->prev == NULL) {
            $newNode = $this->newNode($data, NULL, $node);

            $node->prev        = $newNode;
            $this->firstNode   = $newNode;
            $this->currentNode = $newNode;

        } elseif ($node->prev->data < $data) {
            // insert here.
            $newNode = new ListNode($data);

            // placeholder to make it easier to insert here.
            $nodePrev = $node->prev;

            // Re-Assign nodes
            $newNode->prev = $nodePrev;
            $newNode->next = $node;

            $node->prev     = $newNode;
            $nodePrev->next = $newNode;

            $this->currentNode = $newNode;

        } elseif ($node->prev->data > $data) {

            $this->insertBefore($node->prev, $data);

        }
    }

    private function newNode($data, $prev, $next) {
        $newNode = new ListNode($data);
        $newNode->prev = $prev;
        $newNode->next = $next;

        return $newNode;
    }
}
?>