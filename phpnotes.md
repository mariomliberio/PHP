## PHP NOTES &#129300;

- These notes were taken following the Openclassrooms PHP & MYSQL class.
- A table of contents will be added once the notes are finished.
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
- There are several functions that send **headers** in PHP such as: ```header()``` ```sessionstart()``` ```setcookie()```
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

-  Consists in injecting HTML code with Javascript that executes on page load.
    -  ```<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <?php echo $_POST['prenom']; ?> !</p>```
- In the previous snippet of code, if HTML code is inserted into the form that will ```$_POST``` it will be submitted correctly.
   - ```<p>Je sais comment tu t'appelles, hé hé. Tu t'appelles <strong>Badaboum</strong> !</p>```
- So what is the problem with this?
  - Using ```<script>``` tags, Javascript code can be inserted!!!
- What can we do to avoid this?
  - We can use the ```htmlspecialchars()``` function in order to transform ```<strong>``` tags into ```&lt;``` & ```&gt```. This will display the text correctly and avoid html code from executing.
  - If we want to avoid tags overall we can just use the ```strip_tags()``` function.
***
**File Transfer**

- Forms can also be used to upload files!
- This is done in two steps:
  - First, user arrives on html page and using a form decides which file to upload.
  - PHP recieves the information from the form and saves the chosen file on the server.
***
**File Upload Form**

- To allow file upload on a form, first we need to add the attribute ```enctype="multipart/form-data"``` to the form tag.
  - This indicates that a file is to be uploaded through the form
- Inside the form, we need to add an input. To make the input type a file we simply write that attribute to the input tag.
  - ```<input type="file" name="filename" /><br />```
- That is all!
- A complete example:
```
<form action="cible_envoi.php" method="post" enctype="multipart/form-data">
        <p>
                Formulaire d'envoi de fichier :<br />
                <input type="file" name="filename" /><br />
                <input type="submit" value="Envoyer le fichier" />
        </p>
</form>
```
***
**PHP Upload**

- As you can see from the example above the form points us to the *cible_envoi.php*. The moment the PHP page is executed, the file is stored on the server, however it is stored in a temporary file. It is up to the PHP code to determine, whether the file is desired or not.
- Everytime a file is uploaded  a ```$_FILES[]``` variable is created. This variable is an array which can contain many different informations about the file.
- Such as:
  - ```$_FILES["filename"]["name"]``` Contains the name of the file uploaded by the user.
  - ```$_FILES["filename"]["type"]``` Contains the filetype uploaded.
  - ```$_FILES["filename"]["size"]``` Contains the size of the file uploaded in Octets. PHP limits max upload file size to 8 Mo.
  - ```$_FILES["filename"]["tmp_name"].``` Contains the temporary placement of the file once its been uploaded until PHP determines whether to stock it or not.
  - ```$_FILES["filename"]["error"].``` Contains an error code if file delivery has been unsuccesful.
- A good method to determine whether a file should be stored or not is to:
  - Check if the file has been succesfully recieved through ```isset($_FILES["filename"]["error"])```.
  - Check if the file does not surpass max file size ```$_FILES['filename']['size']```.
  - Check if the file extension is the desired one ```$_FILES["filename"]["type"]```. The name can also be used to check filetype.
  - Once these checks have been preformed we can now validate the file for upload!

- Here is an example of code that checks a file upload, type and size and return a message if upload is successful:
```
<?php
// Tests if file has been uploaded without errors
if (isset($_FILES['filename']) AND $_FILES['filename']['error'] == 0)
{
        // Tests if file isnt too large
        if ($_FILES['filename']['size'] <= 1000000)
        {
                // Tests if the file extension is authroized
                $infosfichier = pathinfo($_FILES['filename']['name']);
                $extension_upload = $infosfichier['extension'];
                $extensions_authorized = array('jpg', 'jpeg', 'gif', 'png');
                if (in_array($extension_upload, $extensions_authorized))
                {
                        //We can validate the file to be saved on the server
                        move_uploaded_file($_FILES['filename']['tmp_name'], 'uploads/' . basename($_FILES['filename']['name']));
                        echo "Upload has been succesful!";}}}?>
```
- The ``` basename()``` function is used to save only the file name, as upload will also contain the full file path on the uploaders computer.
- This file upload script is a good basic start. However if the file name contains *accents* or *special characters*, this will cause problems. Also if a file uploaded has the *same name* as a previous file on the server it will be *overwritten*. The best practice is to *rename* and choose the file name so it remains coherent with the rest of files we stock on the server.
***
#### SUPERGLOBAL VARIABLES

- Variables automatically generated by *PHP*. We've already seen ```$_GET``` & ```$_POST``` which are two superglobal variables, however there are more!
***
**CHARACTERISTICS OF SUPERGLOBALS**
- They are written in majuscules and nearly all begin by an underscore ```_```.
- Superglobals are arrays! They usually contain a lot of different information.
- These variables are generated by PHP everytime a page is loaded. They exist in every page and are accesible at any point of the page.
- To see the contents of a Superglobal we can use ```print_r()``` function as we explained before when we were going over arrays.
***
**MOST IMPORTANT SUPERGLOBALS**
- ```$_SERVER``` are values sent by the server. They can be very useful as for example ```$_SERVER['REMOTE_ADDR']``` which gives us the *IP Address* of a client visiting our page.
- ```$_ENV``` are environment variables given by the server. It is usually when dealing with Linux servers where we will find information stored in this superglobal.
- ```$_SESSION``` contains the session variables. These are variables which are stored in the server the time that a visitor spends on our page.
- ```$_COOKIE``` Contains the cookie information stored on a user's computer. These allows us to remember for example a user username or password.
- ```$_GET $_POST``` We've already covered these two in a past chapter.
- ```$_FILES``` Contains the list of files which have been submitted in a prevoius form.
***
#### SESSION & COOKIES
***
**SESSIONS**
- Sessions allow us to save variables on all the pages in a website.
- How do Sessions work in PHP?
  - First, a user arrives on your website. PHP generates a hexadecimal string ```PHPSESSID```. This is usually stored in a cookie to save it across pages.
  - Once the session is generated and the session id assigned, we can create session variables which will be accesible from any page on the website. An example of a session variable would be ```$_SESSION["username"]```.
  - When the user leaves the website, the session variables are discarded. However it is not easy to know when a user has left a site, this is not automatically done when a user goes to another website or closes their browser, this is why we use logout buttons or create a timeout which after a defined amount of time will automatically close the session.   
- While this might seem complicated, it is very easy to setup thanks to two functions ```session_start()``` & ```session_destroy()```.
- ```session_start()``` launches the sessions superglobal, this function has to be called at every page **before** the HTML code, even the ```<!DOCTYPE>``` tag.
- ```session_destroy()``` closes a user's session. This is automatically called when a timeout is defined and reached.
***
**WHY ARE SESSIONS USEFUL?**
- We can use them to store *login* and *password* information, to transmit the specific information to a user or also to limit his access to certain information.
- We can use them to store shopping choices on an e-commerce site.
- Basically, we can use them to store anything that will be reused over different pages in a domain.
***
**WORKING WITH COOKIES**
***
**WHAT IS A COOKIE?**
- A cookie is a small file stored locally on a user's computer. It allows us to retain information about that specific user. For example we can store a user's login in a cookie.
- Cookies generally store one piece of information a time. If we want to store more than one info, we can generate another cookie.
- Cookies usually have an expiry date, therefore they stock temporary information, their size is limited to a few KO therefore it is impossible to store a lot of information on them.
***
**WRITING A COOKIE**
- Like a variable, cookies have a key and a value.
- To create a cookie in PHP we use the ```setcookie()``` function. Generally, we give three *parameters* to this function, its key, value and the timeframe in which it will be active like in the following example: ```<?php setcookie('userlogin', 'M@teo21', time() + 365*24*3600); ?>```.
- In this case the cookie contains the key ```"userlogin"```, the value ```"M@teo21"``` and the time frame of a year called with the ```time()``` function: ```time() + 365*24*3600```.
***
**SECURING YOUR COOKIES WITH httpOnly**
-  It is recommended to use the ```httpOnly``` option in your cookie. This will make it inaccessible via Javascript and therefore reduce the chance of Cross site scripting.
- The httpOnly option is the forth option that can be given to a cookie array, the previous example with httpOnly activated would look like this ```<?php setcookie('userlogin', 'M@teo21', time() + 365*24*3600, null, null, false, true); ?>```
***
**CREATING YOUR COOKIE BEFORE HTML**
- Just like the ```session_start()``` array before cookies must be generated before any *HTML* is loaded onto the page.
***
**DISPLAYING YOUR COOKIE**
- This is the simplest part. With a code snippet like this one ```<?php echo $_COOKIE['userlogin']; ?>``` we can display the value of a cookie at any point of an *HTML* document.
***
**MODIFYING AN EXISTING COOKIE**
- To modify an already exisiting cookie, we simply need to call the ```setcookie()``` array. New information will overwrite a previous cookie.
***
#### OPENING, READING & WRITING TO FILES
***
**USING fopen TO OPEN FILES**
- The ```fopen()``` function is used to open files, It must contain two parameters, 1. the file name & 2. the execution type.
- An example of an fopen function can be seen here:
```
$myfile = fopen('compteur.txt', 'r+');
```
- While the first parameter is self-explanatory the second one has a few different options depending on how we want to open the file.

|Execution Mode|Description|
|--------------|-----------|
| "r" | Opens the file in read only mode |
| "r+" | Opens the file in read & write mode |
| "a" | Opens the file in write mode only. Also generates a file if nonexistant |
| "a+" | Opens the file in read & write mode, generates it if nonexsistant |

- After we have used ```fopen()``` to open (or create a file) we need to signal PHP to close it. We do this with ```fclose()``` and the variable we generated for ```fopen()``` as a parameter like so: ```fclose($myfile)```.
***
**READING AND WRITING TO FILES**
- To read a file we have two options in PHP.
1. Reading letter by letter with the ```fgetc()``` function.
2. Reading line by line with the ```fgets()``` function.
- ```fgets()``` is more commonly used as using ```fgetc()``` requires a loop and is more taxing on resources.
- Let's assume we have a one line text file we want to read in our PHP document.
```
<?php
$monfichier = fopen('compteur.txt', 'r+');
$ligne = fgets($monfichier);
fclose($monfichier);
?>
```
- The code snippet above, would first open the file, then read the first line with ```fgets()``` and then close it.
- If the text document is longer than one line we would have to loop the ```fgets()``` function.
***
- To write to a file we only have one function: ```fputs()```.
- This function will write the line that we type to a document. For example: ```<?php fputs($myfile, 'Text to write'); ?>```
- However this is not as simple as it seems. The problem is not writing to a file but where we actually write this text. For example, if we opened a file with ```fopen()``` and then read it with ```fgets()``` if we now input an ```fputs()``` function, it will write at the end of the line we have just read. In order to be able to write at the beggining of the line we would have to use an ```fseek()``` function. Therefore if we wanted to write at the beggining of the line we have just read we would have to call the ```fseek()``` function like this ```fseek($myfile, 0)``` and **then** call the ```fputs()``` function.
- To close this chapter it is important to note that these functions are only useful with small files. If we wanted to treat a lot of data, using a database would be much more conveninent.
***
#### SQL

**SQL DATABASE STRUCTURE**

- Databases are made up of a series of *tables*. 
- Each table is in fact an array where columns are called *fields* and lines are called *entries*.
- This data is stored in files, however normally we never open these files directly, it is more common to directly write **SQL** code inside PHP filling up the contents of our tables.
***
**GUI's such as PHPmyAdmin & SQL Browser**
- Two main elements
  1. List of Databases
  2. Creating a new Database.
- Adding elements to a new Database. First, choose a name for your field. 
- Most important attributes for these fields are Name, type of data, size, index and auto-incrementation.
***
**Types of Data**
- These are classed in different categories. The most interesting are:
 1. Numeric: Integers or decimals.
 2. Date and Time. Can be multiple dates & times.
 3. Strings: Contain strings of characters.
 4. Spatial: Used for space & place, especially interesting when working with cartographic data.
- The most used categories are:
  1. INT: Integers
  2. VARCHAR: Short text, max 255 characters.
  3. TEXT: Longer pieces of text.
  4. DATE: Dates (D.M.Y).
- Primary Keys are the unique identifiers for a piece of data in a table array. Each piece of info must have a unique primary id. Using auto increment for primary keys is considered good practice.
***
#### CONNECTING TO A DATABASE WITH PHP


- PHP offers us mutiple ways to reach a database such as:
  - The ```mysql_``` extension which allows us to connect and communicate with a MySQL database. This is the *legacy* option.
  - The ```mysqli_``` extension which allows use to user newer functionalities when connecting to a MySQL database.
  - The ```PDO``` extension which allows us to connect with any database.
- In these notes we are gonna focus on the ```PDO``` extension as its the most versatile and will be written in the same way not depending on the type of database.
***
**Connecting to a MySQL database using PDO**
- IF we have activated PDO, we can now connect to our SQL database.
- To do this we are gonna need to define four pieces of information:
  1. Host name: Is the address of the computer or server where the SQL database is located. If you are working on your local network this is ```localhost```.
  2. Database name (dbname): The name of the database we want to connect to. For example purpose well call this database ```test```.
  3. Login: Login name.
  4. Password: Your password.
- An example of a ```PDO``` call with these informations represented below:
```
$database = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root', '');
```
- ```$database``` is an object (although it looks like a variable) which represents the connection to the database.
***
**Testing for errors**
- If all info is correctly input, there should be nothing appearing on the screen. However if an error is found, PHP will throw an error code and the information referring to line and type of error.
- However this can be dangerous! For example if an error is found on the line containing the password, PHP might send back to our users our admin password. In this type of situations it is better to test for an error beforehand in order to avoid critical safety problems. 
- To do this we can use ```try{}``` and ```catch{}```. ```try{}``` will test the code for an error, and if it is found it will be trapped inside ```catch{}``` .
***
**CREATING QUERY'S**
- To create a query we first create an object and equal it to our ```query()``` request. Using the previous ```$database``` object here is an example:
```
$response = $database->query('Insert your SQL request here');
```
***
**SQL REQUESTS**
- Here is an example request, we will go over each element and explain its functionality
```
SELECT * FROM videogames
```
- Translating this request to english is actually pretty simple, it says: Take everything present in the videogames table.
- Let's look at each element individually:
  1. ```SELECT``` : Asks SQL to display a table
  2. ``` * ``` Selects all elements within that table, we could also specify SQL to only take one element, for example ```name```
  3. ```FROM```: Creates the link between the field and table names.
  4. ```videogames```: Name of the table we want to select from.
***
**DISPLAYING A REQUEST RESPONSE**
- The problem with this type of requests is that if we are working on a real database it will generate too many responses.
- This is where the ```fetch()``` command comes into play. We usually loop ```fetch()``` inside a while function as ```fetch()``` will automatically place us at the first line, therefore the while function will allow us to go through the fetch call as many times as necessary.
- Once this has been executed we will close the request using ```closecursor()```.
***
**Displaying only some content**
- As we mentioned before we can select which elements of a table we want to display. For example if we wanted to see only the names of the games in the ```videogames``` table we would use the following ```SQL``` code:
``` SELECT name FROM videogames ```.
```
<?php
try{$bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
    }
    catch(Exception $e){die('Error : '.$e->getMessage());
    }
$response = $bdd->query('SELECT name FROM videogames');
while ($data = $response->fetch())
{echo $data['name'] . '<br />';
}
$response->closeCursor();
?>
```
- Above we can see a complete example of how this would look inside a PHP document.
***
**SELECTION CRITERIA**
- The best thing about *SQL* is how easily we can sort and categorize criteria. There are many diffrent words we can use to organize data in different ways. 
- ```WHERE``` used to filter through tables. Expanding on the example above ```SELECT * FROM videogames WHERE owner='patrick'```. This will display all videogames that are owned by Patrick.
- ```AND``` used to combine multiple conditions. Eg:```SELECT * FROM videogames WHERE owner='patrick' AND price < 20``` Will display all of Patrick's game that are cheaper than 20.
- ```OR``` Similar to ```AND``` but only selects one of the two.
- ```ORDER BY``` allows us to order our results. Eg:```SELECT * FROM videogames WHERE owner='patrick' ORDER BY price```. This will order in increasing fashion however if we want to order in a decreasing way we just need to add ```DESC``` and the end.
- ```LIMIT``` allows us to select only a part of the results, this is quite useful as we usually only want to select some of the elements inside a table. We use two numbers to define the range we will use this option in as so: ```LIMIT 0, 20``` This example will select the first 20 elements of the table.
***
**BUILDING REQUEST DEPENDING ON VARIABLES**
- Bad practice: Inserting a variable inside an SQL request. If we insert a ```$_GET || $_POST``` request inside our SQL request this will create a major security flaw in our website. This is one of the practices for which PHP & SQL databases often get a bad rap. 
- Instead of doing this we should used prepared requests with the ```prepare()``` argument. This is not only a more safe way of building requests with a variable but also a less taxing way on processing power. We should use ```prepare()``` instead of query, when working with variables inside the SQL request. 
- Building on prevoius examples, this is how we should build a variable dependant SQL request:
```
<?php
$req = $database->prepare('SELECT name FROM videogames WHERE owner = ? AND price <= ?');
$req->execute(array($_GET['owner'], $_GET['price']));
?> 
```
- As you can see, instead of inserting or ```$_GET``` request inside the variable, we first prepare it inserting in the place where our request would go a ```?```. We then execute the request with our ```$_GET``` requests in the next line. 
- If the request contains a lot of variables we use nominative markers such as ```:owner || :price``` instead of ```?```.
- With nominative requests, the example above would look like so:
```
<?php
$req = $database->prepare('SELECT name, prix FROM videogames WHERE owner = :owner AND price = :price);
$req->execute(array('owner' => $_GET['owner'], 'price' => $_GET['price']));
?>
```
***
**TRACKING DOWN BUGS**
- When a SQL request fails, more often than not PHP will display a ```fetch()``` error. It is often not the fault of the ```fetch()``` statement in the code but a badly formulated SQL request.
- To get more detailed error information, we need to add a statement at the end of our original ```PDO``` request. 
- Our modified ```PDO``` request will look like this:
```
<?php
$database = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
?>
```
***
#### WRITING DATA
***
**INSERT**
- ```INSERT``` Allows us to add more data in a table.
- ```INSERT INTO``` allows us to add an entry into a table. Here is an example:
```
INSERT INTO videogames(ID, name, owner, console, price, max_players, notes) VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nd World War')
```
- We start with the ```INSERT INTO``` command, then the table name, in this case ```videogames()``` and inside we put the name of each field name we want to add info to. Then we follow it by ```VALUES()``` and the actual informations that we want to add to each field. 
- The first parameter in value is empty because we have already implemented an ```auto_increment``` on the ```id``` field. 
- We dont actually need to put the name of the fields we want to modify inside ```videogames()``` but it adds clarity. If we were to ignore this, the previous code would be just as functional and look like this:
```
INSERT INTO videogames VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nd world war')
```   
***
**USING INSERT IN PHP WITH ```exec()```**
- Instead of using ```query()``` to request information like in the previous chapter, we use ```exec()``` to execute this SQL code.
- The previous request would look like this inside PHP brackets:
```
$database -> exec("INSERT INTO videogames(ID, name, owner, console, price, max_players, notes) VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nd World War')");
```
***
**INSERTING VARIABLE DATA USING PREPARED REQUESTS**
- Using prepared requests and variables, we will write the request in the same way as we showed in a previous chapeter. 
```
$req = $database -> exec("INSERT INTO videogames(ID, name, owner, console, price, max_players, notes) VALUES('', 'Battlefield 1942', 'Patrick', 'PC', 45, 50, '2nd World War')");
$req->execute(array(
    'name' => $name,
    'owner' => $owner,
    'console' => $console,
    'price' => $price,
    'max_players' => $max_players,
    'comments' => $comments
    ));
 ```
- We create an array where each field inside our database table is also equal to a variable of the same name. Like this we can use variables without directly inserting them into our SQL request which would create a major security flaw. 
 ***
**```UPDATE```: MODIFYING DATA**
- In the last section we added Battlefield 1942 into our table. However we just realized that it is a 32 player game instead of 45 and the price nowadays has decreased down to 10 euro from 50.
- In order to correct this information we are going to use the ```UPDATE``` command. Here is the example where we update the price and player info:
``` 
UPDATE videogames set price = 10, max_players = 32 WHERE ID = 51
```
- You may be wondering why we added the ``` WHERE ID = 51 ``` this allows us to indicate which entry we want to modify. Battlefield 1942 has been the 51'st entry into the table therefore we have to indicate this otherwise SQL wouldnt know which entry in the table to modify. 
- If we want to change all the characteristics in one of the columns of the table we can also do that with ```UPDATE```, ```SET``` & ```WHERE```. For example if Florent bought all of Michel's games we would update the table like so:
```
UPDATE videogames SET owner = 'Florent' WHERE owner = 'Michel'
```
***
**APPLYING ```UPDATE``` TO PHP**
- We use ```execute()``` and ```prepare()``` to apply our SQL updates to our PHP code. As we explained before preparing our SQL code is the best way if we want to use variables which we can modify at a later point. An example would look like so:
```
<?php
$req = $database->prepare('UPDATE videogames SET price = :nwprice, max_players = :nw_max_players WHERE name = :game_name');
$req->execute(array(
	'nwprice' => $nwprice,
	'nw_max_players' => $nw_max_players,
	'game_name' => $game_name
	));
?> 
```
***
**USING ```DELETE``` TO DELETE DATA**
- Using delete in SQL is pretty self explanatory, however only use it when you are sure that you are deleting the correct information! There is no Undo or go back function, therefore once you delete something it will be permanently deleted. 
- For example if we wanted to delete the Battlefield 1942 we would use the following example:
```
DELETE FROM videogames WHERE name = "Battlefield 1942"
```
***
**TREATING SQL ERRORS**
- If we want to have more information than a ```fetch``` error concerning an SQL error  we have to specify ```errorinfo()```
- ``` $reponse = $bdd->query('SELECT nom FROM jeux_video') or die(print_r($bdd->errorInfo())); ```
***
**SQL FUNCTIONS**
- We have already gone over PHP functions however in this chapter we will go over *SQL* functions. 
- SQL functions can be classed into two categories:
  1. **Scalar functions**: These are functions which apply to all the entries in a field.
  2. **Aggregate functions**: These are calculations which are supposed to return *_one_*  value.
***
**SCALAR FUNCTIONS**
- A simple example scalar function: ```UPPER```. This example function will let us modify to uppercase, all the contents within a specific field. Here is an example use where our goal is to uppercase all the names of a videogames field: ```SELECT UPPER(name) from videogames```.
- However, **THIS DOES NOT MODIFY THE SQL TABLE**. It only modifies the way information is relayed to PHP. It creates a virtual field that only exists for the time of this request.
- It is advised to give a name (alias) to this virtual field, to facilitate further access to it. To do that we use the keyword ```AS```. If we gave a name of ```UPNAME``` to this virtual field, the request would look like so: ```SELECT UPPER(name) as UPNAME FROM videogames```.
- We can use this in PHP to display all our videogame names in uppercase:
```
<?php 
$response = $db->query(SELECT UPPER(name) as UPNAME FROM videogames);
while ($data = $response->fetch()) {
  echo $data['UPNAME'] . '<br />';
}
$response->closeCursor();
?>
```
- Of course we can also get data from other fields with our SQL request without applying the ```UPNAME``` function to them. A version of the previous request with new columns for owner, platform and price without being applied the ```UPNAME``` function would look like so:
```
SELECT UPPER(name) as UPNAME, owner, console, price FROM videogames
```
- Now that we have explained what **Scalar functions** are we are going to review some of them with their functionality. 
  1. ```UPPER()```: As explained before, transforms text to uppercase.
  2. ```LOWER()```: Same but transforms to lowercase. 
  3. ```LENGTH()```:  Counts the number of characters.
  4. ```ROUND()```: Slightly different, takes two arguments, first the field (a decimal number) that we want to round and then the number of decimals to which the number should be rounded. If we wanted to round prices to 1 decimal for our ```videogames``` table, we would do it like so: ```SELECT ROUND(price, 1) AS roundedprice FROM videogames```.
  5. There are many many more scalar functions, SQL docs offer good information on [numeric ones](https://dev.mysql.com/doc/refman/5.7/en/numeric-functions.html) and [string/character](https://dev.mysql.com/doc/refman/5.7/en/string-functions.html) based ones.
***
**AGGREGATE FUNCTIONS**
- Rather than modifying values one by one as with Scalar functions, Aggregate functions will operate on multiple values but return only a *single* value. While for example a scalar function like ```ROUND``` will allow us to round each value in a table however ```AVG``` which is an aggregate function will return us only the Average value of all the items in a table. Let's use this function to find out the average price of all the videogames as we were using in the previous examples:
```
SELECT AVG(price) AS avg_price FROM videogames
```
- In PHP this request would look like so:
```
<?php 
$response = $database -> query(SELECT AVG(price) AS avg_price FROM videogames);
$data = $response->fetch();
echo $data['avg_price'];
$response -> closeCursor();
?>  
```
- Since we will only get one number from ```$response``` there is no need to create a while loop as with scalar functions. 
- Dont hesitate to use filters! For example we could adapt the same request to only show us the average price of the games owned by Patrick. ```SELECT AVG(price) AS avg_price FROM videogames WHERE owner='Patrick'```
- Be careful to not use other fields in the table when using an aggregate function. For example the request ```SELECT AVG(price) AS avg_price, name FROM videogames``` makes no sense as we cannot select the average price from the Name field.
- Here are some examples of **Aggregate Functions**:
  1. ```AVG``` Calculates an average.
  2. ```SUM``` Calculates a sum of values.
  3. ```MAX``` Returns the largest/maximum value. For example to find our most expensive videogame we would request: ```SELECT MAX(price) AS max_price FROM videogames```
  4. ```MIN``` Same as ```MAX``` but returns the smallest value.
  5. ```COUNT``` allows us to count the number of entries in a field. The most common use is with the ```*``` parameter to count all the elements in a table. ```SELECT COUNT(*) AS numbergames FROM videogames``` We can also filter this request to count all of the items owned by a single person by adding ```WHERE owner='somename'```. If an entry is ```NULL``` it will be ignored by the ```COUNT()``` function.
 We can also use the keyword ```DISTINCT``` to count how many of a value there is in a field. For example in our videogames table Patrick and Florent appear numerous times as owners. Using the ```DISTINCT``` parameter we can find out how many different owners of videogames exist in our table: ```SELECT COUNT(DISTINCT owner) AS numberowners FROM videogames```
 - As we mentioned before, Aggregate functions cannot look into other fields when returning us with one value, however we can group data in order to return a more specific value. For example in our videogames table we could group our average prices  by console, therefore giving us a more clear view of which console is more expensive to collect for. We can do this through the use of the ```GROUP BY``` request like so: ```SELECT AVG(price) AS avg_price, console FROM videogames GROUP BY console```
 - This would return the average price sorted by game console and give us coherent information for reuse. If we wanted to do the same but instead of sorting by console, sorting by owner we would request like so: ```SELECT AVG(price) AS avg_price, owner FROM videogames  GROUP BY owner```
 - ```HAVING``` is similar to ```WHERE``` however it acts once data has been regrouped, therefore filtering at the end of a request. For example using our previous ```GROUP BY console``` request we can use ```HAVING``` to show us those with a price under 10 euro like so: ```SELECT AVG(price) AS, avg_price, console FROM videogames GROUP BY console HAVING avg_price <= 10```
 - So what is the difference between ```HAVING``` & ```WHERE``` since both allow us to filter our results? 
 - ```WHERE``` acts before the grouping of data only selecting those that fulfill that condition while ```HAVING``` first groups all data and then acts to only display those that fulfill that condition. We can also combine the two for example using ```WHERE``` to select the owner and ```HAVING``` to only display the games under a certain price. ```SELECT AVG(price) AS avg_price, console FROM videogames WHERE owner='Patrick' HAVING avg_price <= 10```
 ***
 **Time in SQL**
 -  SQL can stock time in many different ways depending on the usage that we wanna make of them. For example these are 5 different ways of stocking dates:
  1. ```DATE``` stocks dates in format YYYY-MM-DD (Year-Month-Day)
  2. ```TIME``` stocks a timestamp in format HH:MM:SS (Hour-Minute-Second)
  3. ```DATETIME``` stocks the combination of ```DATE``` & ```TIME``` YYYY-MM-DD HH:MM:SS.
  4. ```TIMESTAMP``` stores the numbers of seconds that have passed since 1 January 1970 at 0h 00m 00s.
  5. ```YEAR``` stocks the year either in format YY or YYYY.

- Dates in SQL are used as strings therefore we need to write them inside apostrophes ```'2012-11-15'```
- There are many functions used to manipulate dates and time, these allow us to extract specific information from a date request. While we wont list them all and they can be found in the [MYSQL documentation](https://dev.mysql.com/doc/refman/5.7/en/date-and-time-functions.html) here are a few of the most common ones:
  1. ```NOW()``` Allows us to obtain the current date and time. Eg. ```INSERT INTO chat(alias, message, date) VALUES('Mateo', 'Message!' NOW())```
  2. ```CURDATE()``` & ```CURTIME()``` same as ```NOW()``` except returns only the date in first case and only the time in the second. 
  3. ```DAY(), MONTH(), TIME(), HOUR(), MINUTE(), SECOND() ``` Self explanatory, extracts the specific time unit from a table.
  4. ```DATE_FORMAT```  Allows you to adapt the date to the format that you want.  Eg. ```Select alias, message, DATE_FORMAT(date, '%d/%m/%y %Hh%imin%ss') AS date FROM chat``` would return us at current time 05/03/2018 14h23min33s.
  5. ```DATE_ADD``` & ```DATE_SUB``` Add or substract dates. For example lets display an expiration date for a message. ```SELECT alias, message, DATE_ADD(date, INTERVAL 15 DAY) AS expiration_date FROM chat``` Will display alias, message & the time it was posted + the expiration date after 15 days. in this case DAY can be replaced by any other of the previous time units.
***
**JOINING TABLES**
- One of the main features of MYSQL is the ability to use several tables at the same time and create links between them.
- In the previous videogame table example, we were stocking the owner information inside the table, however if we also wanted to stock their family name, phone numbers and other info on the owners, it would be very repetitive to do it on the videogames table. That is why we will create another table called ```owners``` where we will stock the owners name, surname and phone number and once this is done we will link it with our videogames table. 
- We will give each  owner on this owners table an auto incrementing id. Now all we have to do to link them is to add a column to our videogame table which uses the same owner id. However SQL will not know this relation has been created, we need to create a link between the two tables.
- There are many ways to join two tables, but we will look at the two most common ones:
  1. Internal. Only select data which corresponds on both tables
  2. External. Will display data even if there is no corresponding field in both tables.
- While internal joins are more strict and specific, external joins will be more complete as it will also display information that is not common to both tables.
- With our owner/videogames table example an internal join would only show those owners which own videogames while an extarnal join would also show owners which do not have any videogames (```NULL```). 
***
**INTERNAL JOIN**
- An internal join can be created with two words:
  1. ```WHERE``` Old syntax, if you have the choice avoid.
  2. ```JOIN``` New syntax, more efficient and usable.
***
**```WHERE```**
- Using ```WHERE```: ``` SELECT videogames.name, owners.name FROM owners, videogames WHERE videogames.ownerid = owners.id```
This will select the name of a videogame and the name of the owners in the case that both are present an equal on the table in the form of ownerid for the videogame table and id in the owner table.
- To make a request like this more clear and straight forward we should use aliases. For example we can adapt the previous request to a new form that uses aliases:
```
SELECT videogames.name AS gamename, owners.name AS ownername FROM owners, videogames WHERE videogames.ownerid = owners.id
```
- We use ```AS``` for clarity however it is not necessary as long as we keep a space between the property we are selecting and its alias. ``` SELECT videogames.name gamename``` would work just fine.
- We can even reduce the length of our request by using one letter aliases and ommiting AS. The previous request modified to be as short as possible would look like so:
```
SELECT v.name videogamename, o.name ownername
FROM owners o, videogames v WHERE v.ownerid = o.id
```
***
**```INNER JOIN```**
- Building on the last shortened example we will adapt the request to the new syntax with ```JOIN```.
- The last example we displayed would look like so when using ```JOIN```:
```
SELECT v.name videogamename, o.name ownername
FROM owners o
INNER JOIN videogames v
ON v.ownerid = o.id
```
- In this example we get the data from a primary table, in this case ```owners``` and do an ```INNER JOIN``` with the ```videogames``` table. The link between the two tables is done on the next line thanks to ```ON v.ownerid = o.id``` since these two are supposed to be the same value.
- After this we can add additional arguments such as ```WHERE v.console = "pc"``` and ```ORDER BY price DESC``` which would only show us the videogame names and owner names when the videogame is on PC and would be ordered with the highest price first, descending to the lowest price.
***
**```EXTERNAL JOIN```**
- Two ways to create an external join: ```LEFT JOIN``` & ```RIGHT JOIN```.
- ```LEFT JOIN```: For this example we will take our previous ```INNER JOIN``` and simply replace it by ```LEFT JOIN```
```
SELECT v.name videogamename, o.name ownername
FROM owners o
LEFT JOIN videogames v
ON v.ownerid = o.id
```
- In this case, owners is the table on the left while video the one on the right. Therefore our ```LEFT JOIN``` instruction will take all the elements on the left even if they dont own videogames although they will have a ```v.name``` value of ```NULL```.
- ```RIGHT JOIN``` : Again we replace our previous ```INNER JOIN``` this time by a ```RIGHT JOIN``` Therefore our videogame table will be our primary. We will display all videogames even if they dont have a defined owner. You may wonder how is it possible to not have an owner and the two possible awnsers are that the input data for owner is not a string or that the owner is set as ```NULL``` therefore no owner.