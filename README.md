# Shoe Store Database
##### A web application that lists local shoe stores and the brands they carry.

#### By Ryan Brown

## Description

Lists local shoe stores and the brands of shoes they carry in a database, which a user can modify by adding more brands.

## Setup

1. Clone this repository using the command `git clone https://github.com/browneryan/zappos-php.git`.
2. Change directory into the top level of the project folder.
3. Install Composer (https://getcomposer.org) and then run the command `composer install` to download the Silex and Twig vendor files.
4. Change directory into the `web` folder and run the command `php -S localhost:8000` start your server.
5. Navigate your browser to the home page at the root address  `http://localhost:8000`.
6. Open `localhost:8888/phpmyadmin` in your browser. Enter the user name `root` and the password `root`.
7. Choose the `Import` tab, select the database file named `zappos-php.sql` (from the project folder) and click `Go`. You should now be able to see the `shoes` database in your phpMyAdmin.

## MySQL Commands Used

1. `CREATE DATABASE shoes;`

2. `USE shoes;`

3. `CREATE TABLE brands(id serial PRIMARY KEY, name VARCHAR(255));`

4. `CREATE TABLE shoe_stores(id serial PRIMARY KEY, name VARCHAR(255));`

5. `CREATE TABLE stores_brands(id serial PRIMARY KEY, store_id INT, brand_id INT);`

## Technologies Used

HTML5, CSS3, Skeleton, PHP, Silex, Twig, PHPUnit, mySQL

### Legal

Copyright (c) 2016, Ryan Brown

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
