# test_task

Test task for CodeIT

The code is written on PHP version 7.0.10. 
File "rootPath.php" is needed to organize routing between folders. It should be at a level higher than the folders.
1. Folder "DBWorker" contains files that are needed to work with the DB. There are these files:
- File "Db.php" contains the code that allows you to connect to the database. 
- File "getMethods.php" contains the code that allows to get necessary information from the database. 
- File "insertMethods.php" contains the code that allows to insert necessary information to the database. In this case, user information.
- File "getCountries.php" contains the code that allows to get countries from the database and display them.
2. Folder "errorsView" contains files that are needed to display errors when user registers or signs in.
3. Folder "functions" contains files with functions that are needed. There are these files:
- File "clearFunction.php" contains function that clears a string of all unnecessary characters.
- File "validationFunctions.php" contains validation functions.
4. Folder "validation" contains two files. These files contains validation algorithms that are used when user registers or signs in.
The main page is "index.php". It contains sign in form and registration link. 
File "registration.php" contains registration form. There are fields that need to be filled. 
File "page.php" contains user information. It displays user's name and email. User login that is sent in URL (method GET) is needed to get user information from DB.

