# SQL

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
**READING DATA**
- 