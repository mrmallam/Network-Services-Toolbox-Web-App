# Network Services Toolbox Web Application

A web application with two types of users (Admin and Client) that manages network devices such as modems and routers, including functionality for adding and updating devices, a firewall that blocks specific ports or websites, and a MySQL database with a functional design and DFD created using a HIPO diagram, utilizing PHP as the backend and HTML for the user interface.

Installation Instructions:

Ensure that you have a DB account called "ensf" with the password of "480" and that it has all privileges.

Run the command "ALTER USER 'ensf'@'localhost' IDENTIFIED WITH mysql_native_password BY '480';"

Run the included db.sql file to initialize the database.

To access the credentials for admin and client users, use the following commands:
  "SELECT * FROM CLIENT;"
  "SELECT * FROM ADMIN;"

Please note that the above steps are required to setup the database and make the application function properly on a Windows system using AppServ and MYSQL.
