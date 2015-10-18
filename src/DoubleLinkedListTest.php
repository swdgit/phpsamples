// test the double linked list
<?php
    require 'ListNode.php';
    require 'DoubleLinkedList.php';

    $dll = new DoubleLinkedList();

    $dll->add(4);

    //echo "valid call " . $dll->valid("current") . "\r\n";

    $dll->add(1);
    
    print 'first : ' . $dll->first() . "\r\n";

    $dll->add(5);
    $dll->add(15);
    $dll->add(25);
    $dll->add(35);
    $dll->add(45);
    $dll->add(10);
    $dll->add(10);  // don't allow duplicates.

    print 'last  : ' . $dll->last() . "\r\n";

    print 'current : ' . $dll->current() . "\r\n";
    print 'Count : ' . $dll->count() . "\r\n";

    $node = $dll->firstNode();
    while ($node != null) {
        print $node->data . "\r\n";
        $node = $node->next;
    }

    $dll->reverse(); // this just allows reverse access to parts of the list. 

    $dll->reverseList();

    print "Reverse the List : \r\n";

    $aNode = $dll->firstNode();

    while ($aNode != null) {
        print $aNode->data . "\r\n";
        $aNode = $aNode->next;
    }

    print '';
?>