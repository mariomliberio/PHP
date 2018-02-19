## PHP NOTES &#129300;

- These notes were taken following the Openclassrooms PHP & MYSQL class.
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

 ```<?php
if (isset($_GET['prenom']) AND isset($_GET['nom'])){
    echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !';
}
else {
    echo 'Il faut renseigner un nom et un prénom !';}?>
```

- This example above, checks if the *prenom* and *nom* parameters are set and either returns them or echo's a string requesting to submit a name and surname.
***
**Controlling the value of parameters**
- The following code snippet uses an iterator and *$repeter* variable to refer to that iterator.
```<?php
if (isset($_GET['prenom']) AND isset($_GET['nom']) AND isset($_GET['repeter'])){
    for ($i = 0 ; $i < $_GET['repeter'] ; $i++){
        echo 'Bonjour ' . $_GET['prenom'] . ' ' . $_GET['nom'] . ' !<br />';
    }} else {
   echo 'Il faut renseigner un nom, un prénom et un nombre de répétitions !';
} ?>  
```
- Using a *$_GET* array to quantify an iterator is very dangerous practice, as anyone would be able to modify the URL to overload PHP and crash the web app.
- However even in this bad practice, some precautions can be taken to avoid this.
  - We can limit the iterator to a reasonable number therefore once it reaches it, execution stops.
  - Or we can make sure another value type such as boolean or a string is not introduced which breaks our code.
***
#### Using forms with ```$_GET``` & ```$_POST``` .
***
**The Methods ```$_GET``` & ```$_POST```**

- ```get``` is used for information transmited through the *URL*
- ```post``` is used for information transmited through *forms*. !! This does not make them safer than ```get``` methods, we always have to verify if the requested values are *present* and *valid* !!
***
**The action attribute**

- In HTML forms we have an ```action=""``` attribute which defines, the page called by the form.
```
  <form action="user.php" method="post">
      Your name (again): <input type="text" name="name2">
      Your surname (again): <input type="text" name="surname2">
      <input type="submit">
  </form>
```
- In this case, it sends the form input's to *user.php*.
***
**Form Elements**

- *Input* -> ```<input type="text" />``` ```<input type="password" name="stuff"/>```
   - In the second example password is used to hide the text that is being input. The name is also specified ```name="stuff"```, this creates the variable.
   - We can also add the ```value=" "``` element to add a default text to our input.
- *Textarea* -> ```<textarea name="message" rows="8" cols="45">Votre message ici.</textarea>```.
  - Used for multiple line form inputs. We can adjust its ```rows="33"``` & ```cols=33``` to define the size of the input box.
- *Select & Option* -> Can be used for scrolling lists, where there are multiple possible choices already defined, such as Gender or Year of Birth.
```
<select name="choix">
    <option value="choix1">Choix 1</option>
    <option value="choix2">Choix 2</option>
</select>
```
- *Checkbox & Label* -> ```<input type="checkbox" name="case" id="case" /> <label for="case">Ma case à cocher</label>```
  - To create a checkbox we need to assign it as a type of input ```input="checkbox"``` . To create options to check we must use the HTML ``` <label></label>``` Using the ```for=""``` attribute we can quickly link it to  an *id* for it as defined in the previous input example. This id is used when calling a ```$_GET[]``` or ```$_POST[]``` method.

- *Option/Radio buttons* -> Can be used to give an option between two or several choices, however you can only choose one, if you wanted to allow to tick several options, you should use *Checkbox & Label*.
  - To create an option input ```type="radio"``` we must use the radio type.To set the value of the adjacent label, we must use the ```id=""``` attribute on the input and the ```for=""``` attribute on the label. Also to set an option ticked as default we must include the attribute ```checked="checked"```.
```
Aimez-vous les frites ?
<input type="radio" name="frites" value="oui" id="oui" checked="checked" /> <label for="oui">Oui</label>
<input type="radio" name="frites" value="non" id="non" /> <label for="non">Non</label>
```

- *Hidden Inputs* -> ```<input type="hidden" name="pseudo" value="Mateo21" />```  Used to retain a *value* or *id* that the client will not see displayed on their screen, for example retaining a username value to display information relevant to that username.

***
#### XSS
***
**Why are forms unsafe?**

 - Forms are modifiable by any visitor therefore **never trust user input**. Someone can easily create a copy of your input page and modify to their arrangment while hosting it themselves. They can still target your page and create malicious code.

 ***
 **XSS: Cross Site Scripting**

 -  
