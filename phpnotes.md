## PHP NOTES
***
#### Working With Arrays

***
**Using *Foreach* loops with arrays**

 -  *Foreach* checks every line in an array. Inserts each value in a temporary variable.
```
<?php
$prenoms = array ('François', 'Michel', 'Nicole', 'Véronique', 'Benoît');
foreach($prenoms as $element){
    echo $element . '<br />'; // affichera $prenoms[0], $prenoms[1] etc.
}
?>
```
 - In this example *$element* acts as the temp var to which each element of the Array is sent.
 - Using *foreach* is especially useful when working with associative arrays ergo when key's have a string value.
 - To use a key-value pair using *foreach* we need to use the *as* element.
 ```
 <?php
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');
foreach($coordonnees as $cle => $element){
    echo '[' . $cle . '] vaut ' . $element . '<br />';
} ?>
```
 This code would return:
 * ```[prenom] vaut François```
 * ```[nom] vaut Dupont```
 * ```[adresse] vaut 3 rue du Paradis```
 * ```[ville] vaut Marseille```

- To quickly print an *array* for debugging purposes we can use *print_r()*. For Example: ``` print_r($coordonnees); ```
***
**Methods used when working with arrays**

 -  ```array_key_exists```: Checks if a key exists in an array.
 -  ```in_array```: Checks if a value exists in an array.
 -  ```array_search```:Checks if a value exists and returns either the number eg. [1] or key eg. "age".

***
#### Working With Functions
***
**PHP Preset Functions**

- PHP offers hundreds of different preset functions, they can be used for many things such as searching for words in a variable or array and replacing them; sending a file to a server; create thumbnails, newsletters, timestamps, encryption for passwords and many more!
***
**Functions working with strings**

- ```strlen``` =  length of a chain.
- ```str_replace``` = search and replace.
- ```str_shuffle``` = shuffle letters in a string.
- ```strtolower``` = transforms to minuscule.
- ```strtoupper``` = transforms to uppercase.
***
**Working with dates**

- ```date()``` used to query a date.

| Parameter | Description |
| --------- | ----------- |
| i         | Minute      |
| H         | Hour        |
| d         | Day         |
| m         | Month       |
| Y         | Year        |
***
#### Common Errors
***
**Parse Error**

- Incorrectly written PHP instruction.
- Can be a ```; \ "" \ . ``` missing.
- Or an unclosed statement such as an ```if()``` function.
- Parse Errors indicate the *line* at which the error is found.

***
**Undefined Function**

- Appears when a function doesn't exist.
- Two possible reasons:
  1. It actually doesn't exist (or it has been **misspelled**).
  2. Function exists but is in a *library* that has not been **activated**.
- Could also be a legacy problem, depending on the PHP version being used.

***
**Wrong Parameter Count**

- Two possible reasons:
  1. Either forgot to put the parameters in the function.
  2. Or too many parameters in the function.
***
#### More Uncommon Errors
***
**Headers already sent by...**

- **Headers** are the first informations that are sent to a client's browser upon connection. Therefore it has to be executed **before** any HTML is loaded.
- There are several functions that send **headers** in PHP such as: ```header()``` ```sessionstart()``` ```sercookie()```
- These **Header** methods must always be sent at the begining of a PHP document. This is the best way to avoid this error.

***
**Maximum execution time exceeded**

- Often occurs when an infinite loop is called.
- PHP limits execution time after 30 seconds, so if a page has not loaded after this time the ```Maximum execution time exceeded..``` error will be displayed.

***
#### Including HTML & PHP files
***
- A page can be split into different **PHP** files for each of its elements; for example: a *navbar.php*, a *footer.php* & a *main.php*
- This can be done by using the ```include()``` function.
- This function can be inserted at any point in the document as long as its in between ```<?php ?>```
***
#### Sending & Recieving data with URL's

- We can add parameters & their values to an URL in order to load a specific piece of content on a page like so:  ```page.php?param1=valeur1&param2=valeur2&param3=valeur3```
***
**Creating a link with parameters**

- We can link several **PHP** pages with parameters by simply inserting them into the *src* of our *html < a >* tag.
- ```<a href="bonjour.php?nom=Dupont&amp;prenom=Jean">Dis-moi bonjour !</a>```
  - Will link us to the *bonjour.php* page with parameters *nom* & *prenom* and values *Dupont* & *Jean*.
***
**Getting parameters with PHP**

- To get parameters from a PHP document we simply use the ```$_GET[]``` array.
- Using the previous exemple the returned data for ```$_GET[name]``` would be *Dupont*.
***
**Testing the presence of a parameter**

- In PHP we have a function to test if a parameter is set to a value or not. This is the ```isset()``` function.
- This can be used when a client attempts to access a parameter (through URL for example) in order to show the parameter or display another message if that parameter does not exist.
- ```
<?php
if (isset($_GET['prenom']) AND isset($_GET['nom'])){
    echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !';
}
else {
    echo 'Il faut renseigner un nom et un prénom !';}?>```
- This example above, checkes if the *prenom* and *nom* parameters are set and either returns them or echo's a string requesting to submit a name and surname
