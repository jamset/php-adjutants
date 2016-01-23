E.g., you have an array with a few elements (\StdClass objects), each element contain property
first, second, third. Each property contain some int or float value.

And you want to group all data from all elements - first to first, second to second, third to third.

And then you can sort it by principle - which value is most frequent, most popular in
this properties.

Also it's possible that you have very many elements in your array. And each element
contain not only this properties, but also category id, and you want to group data
first, second, third depends on its category.

It's also possible by setting groupCriteriaHigherLevel in GroupData before start.

It can look like this:

```php

$propertiesNames = new \StdClass();  
$propertiesNames->first = NULL;  
$propertiesNames->second = NULL;  
$propertiesNames->third = NULL;  

$groupData = new GroupData();  
$groupData->setData($data); //array with \StcClass objects  
$groupData->setGroupProperties($propertiesNames);  
$groupData->setGroupCriteriaHigherLevel($category); //contain property name 'category'  
$groupData->setMostFrequentQuantity(1); //for each property you can choose quantity of returns most frequent values  

$groupedValues = Group::groupByPropertiesNames($groupData);  

```
