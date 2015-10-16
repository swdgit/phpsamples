Requirements
MCN Healthcare PHP test code
* Create an implementation of a double linked list in PHP.
* Implement an add() method for the list that adds a single element to the list. The method must add elements such that the elements are in ascending order when the method returns. Assume data will be given to the add method in random order.
 * Implies a Sorted Linked List
* Implement a count() method for the list that returns the current number of list elements.
* Implement a first() method for the list that returns the data for the first list element.
* Implement a last() method for the list that returns the data for the last element in the list.
* Implement a current() method for the list that returns the data for the current list element. Method must return result of previous first(), last(), next(), or previous() call.
* Method must throw an exception if the list is empty.
* Method must throw an exception if one of the traversal methods (first(), last(), next(), or previous()) has not been called to set a current element.
* Method must throw an exception if one of the traversal methods (next(), or previous()) has gone beyond the list.
* Implement a valid() method for the list that returns true if the  current method will return valid data, false otherwise.
* Implement a next() method for the list that returns the data for the next list element.
* Implement a previous() method for the list that returns the data for the previous list element.
* Implement a reverse() method for the list that causes the first, last, next, and previous methods to return data in reverse order.
* Would like list reversal to be implemented with constant time complexity O(4), however linear complexity O(4n) is acceptable.