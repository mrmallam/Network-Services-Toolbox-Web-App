# Network Services Toolbox Web Application

A web application with two types of users (Admin and Client) that manages network devices such as modems and routers, including functionality for adding and updating devices, a firewall that blocks specific ports or websites, and a MySQL database with a functional design and DFD created using a HIPO diagram, utilizing PHP as the backend and HTML for the user interface.

Usage:

For WINDOWS with AppServ, e.g. uses MYSQL:

To start off, you need to have a DB account called "ensf" with the password of "480", and grant them all privileges. Then you need to run this command: 
"ALTER USER 'ensf'@'localhost' IDENTIFIED WITH mysql_native_password BY '480'; "

If you don't the program will not function.

Also, run the included db.sql file which will init the database.

TO find credential info for admin and client users, just select the table in the database with these commands:
"SELECT * FROM CLIENT;"
"SELECT * FROM ADMIN;"
