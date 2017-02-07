# EntityGenerator
Entity Generator is used to generate entity classes for partial (specific) or all tables of existing database.

NOTE : As of now tested for only MySQL database.

Installation Instructions
-------------------------

Step 1 : Download the zip file.

Step 2 : Upload in the www folder or htdocs folder where you will run your php projects

Step 3 : In browser open the respective project and browse for database and respective tables. 

Step 4 : Generated classes will be stored in project root folder "Entity" with datbase name folder within it.

NOTE : Dont forget to change the namespace of your files

In case your bored to change the namespace in all the files then better go for 'generateEntities.php" file and change the name of variable 

$directoryName = 'Entity';

Happy Coding!
