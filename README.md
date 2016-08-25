# php-form

A PHP+MySQL example of how a contact form might be processed.
This example is based on the following form: https://finance.shef.ac.uk/myteam/new_myteam.php

This script:
* Collects all the entered data, and stores it in a database;
* Translates <select> values such as 1, 2, 16 etc into faculty and department names, for example: 83 => "Faculty Office - Engineering";
* Outputs collected data  on the Thank You page; 
* Sends an email to a specified email address, with a timestamp and entered data;
* This script is a simple example of PHP+MySQL, no validation checks are performed. In this example fields that are marked as mandatory can be left blank;
* This script is built for a local server, and a default localhost database configuration. It will work on a local XAMPP.
