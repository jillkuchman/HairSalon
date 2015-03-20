<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<h1>Developers</h1>
Jill Kuchman

<h2>Date</h2>
20 March 2015

<h2>Description</h2>
This Hair Salon App is a project designed for learning database basics with PHP. It was created using PHP v5.6.6.

<h2>How to use this app</h2>
To use this app, download the source code. You will need to install the composer dependencies by running the command

<h3>composer install</h3>

Run your PHP server from the <strong>web</strong> folder.

In the terminal, start postgres by running the command "postgres" in the project folder. In another terminal window, start psql with the command "psql". Run these commands in the psql window to set up the database:

# CREATE DATABASE hair_salon;
# \c hair_salon;
# CREATE TABLE stylists (id serial PRIMARY KEY, stylist_name varchar);
# CREATE TABLE clients (id serial PRIMARY KEY, client_name varchar, stylist_id int);
# CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;

Copyright (c) Jill Kuchman 2015
