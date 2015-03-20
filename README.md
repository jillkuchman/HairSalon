<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<h3>Developers</h3>
Jill Kuchman

<h3>Date</h3>
20 March 2015

<h3>Description</h3>
This Hair Salon App is a project designed for learning database basics with PHP. It was created using PHP v5.6.6.

<h3>How to use this app</h3>
To use this app, download the source code. You will need to install the composer dependencies by running the command

<strong>composer install</strong>

Run your PHP server from the <strong>web</strong> folder.

In the terminal, start postgres by running the command "postgres" in the project folder. In another terminal window, start psql with the command "psql". Run these commands in the psql window to set up the database:

<ul>
<li>CREATE DATABASE hair_salon;</li>
<li>\c hair_salon;</li>
<li>CREATE TABLE stylists (id serial PRIMARY KEY, stylist_name varchar);</li>
<li>CREATE TABLE clients (id serial PRIMARY KEY, client_name varchar, stylist_id int);</li>
<li>CREATE DATABASE hair_salon_test WITH TEMPLATE hair_salon;</li>
</ul>

--

Copyright (c) Jill Kuchman 2015
