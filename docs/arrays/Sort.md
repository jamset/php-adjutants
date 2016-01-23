To use this class you need to have SortData objects in array, that should be sorted.

SortData allow you to set value and value example - e.g. some value like some user parameter and user id (as value example), connected with this value.

Then Sort class will collect value examples to this value and count this value quantity. And return values with bigger quantity.

E.g., you have value 5, example (user id) 2060; value 5, example 2061; value 6, example 2062; value 10, example 2063; value 6, example 2064; value 5, example 2065; value 11, example 2066; value 6, example 2067; value 10, example 2068.

It will return three SortData objects:  

1) value: 5, quantity: 3, examples: "2060, 2061, 2065"  
2) value: 6, quantity: 3, examples: "2062, 2064, 2067"   
3) value: 10, quantity: 2, examples: "2063, 2068"

*by default return 3 objects, you can change it in method parameter. Such as size of maximum expected value (by default 2191)

When quantity is equal it makes sort by value.
