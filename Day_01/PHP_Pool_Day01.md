

# Foreword

Today, you will learn the first bricks of PHP programming. You will find it easier than C programming. No more types but DO NOT forget semi-colons.
&nbsp;

Please note that prototypes are just here as information. 

Each exercise must be render in a file called ex_XX.php

# Exercices

## Exercice 01 

**Restrictions:** None.
&nbsp;

Create the variables "integer", "float", "string", "bool", "null". Give the following values to the variables whose name correspond to the type of value: "true", "forty two", "42", "NULL" and "42.42".

## Exercice 02 

**Restrictions:** None.
&nbsp;

Delete the variable "var".

## Exercice 03 

**Restrictions:** None.
&nbsp;

Create an array named "my_array" which will contain 5 elements of type (in that order): "string", "integer", "string", "float" and "string" These elements will have the following values, respectively: "to", 42, "Glory", "42.42" and "Geckos".

## Exercice 04 
**Prototype:** void my_concat(mixed $str1, mixed $str2);

**Restrictions:** You will have to choose between "echo" and "print" for this function, and you will use only once the display function that you have chosen.
&nbsp;

Create a function named "my_concat" that takes two parameters. The function must display the first parameter followed by a space followed by the second parameter.

*Example:*

    cat index.php

    <?php
    require("ex_04.php");
    my_concat("Hello", "world");
    my_concat("It's", "Me");)

    php index.php

    Hello worldIt's Me

## Exercise 05 
**Prototype:** void my_swap(mixed &$a, mixed &$b);

**Restrictions:** None.
&nbsp;

Write a function that exchanges the content of two variables whose **references** are given as parameters.

## Exercise 06 

**Restrictions:** None.
&nbsp;

Create an anonymous function that takes as parameter a variable of type string and returns its equivalent in upper case. You will have to assign this anonymous function to a variable "func".
**Don't create any other function than anonymous one.**

## Exercise 07 
**Prototype:** string get_angry_dog(int $nbr);

**Restrictions:** Obligation to use the keyword "for".
&nbsp;

Write a function that returns a string composed of as many "woof" as the value of the variable passed as parameter, followed by a new line.

*Example:*

    cat index.php
    <?php
    require("ex_07.php");
    echo (get_angry_dog(3));)
    php index.php
    woofwoofwoof

## Exercise 08 
**Prototype:** void print_array(array $my_array);

**Restrictions:** Obligation to use the keyword "foreach".
&nbsp;

Write a function that displays all the values of the array passed as parameter, each value being followed by a new line.

## Exercise 09 
**Prototype:** void print_movie_from_nbr(int $nbr);

**Restrictions:** Obligation to use the keyword "switch".
&nbsp;

Write a function that takes an integer as parameter. If the value is 3, it displays "The Three Brothers". If the value is 6, it displays "The Sixth Sense". For 23, it displays "The Number 23". And for 28, it displays "28 Days Later". For other values, it will displays "I don't know.". A new line will be called after each display.

## Exercise 10 
**Prototype:** array my_get_args([mixed $var, ...]);

**Restrictions:** Use of func_get_args forbidden.
&nbsp;

Write a function my_get_args that takes as parameter a variable number of arguments and returns these arguments in an array.

## Exercise 11 
**Prototype:** void my_print_args([mixed $var, ...]);
&nbsp;

Create a function that outputs a variable list of the arguments followed by a new line.

    php ex_11.php test "Hello world" "php rocks" 42
    test
    Hello world
    php rocks
    42

**The automated test will provide the variable list of the arguments to your function.**


## Exercise 12 
**Prototype:** void sequence(int $nbr);
&nbsp;

Write a function that outputs this sequence to the nth iteration.
*Caution:* first iteration is 0.
Your function should not print anything if you pass it a negative number.
&nbsp;

*Example:*

    <?php
    require("ex_12.php");
    sequence(5);

Produce the following output :

    1
    11
    21
    1211
    111221
    312211
