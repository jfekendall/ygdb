# Your Game DB

## Note
A lot of this .md file is from CodeIgniter.


## What is Your Game DB?

There's a collector in all of us. This is meant as a repository for tracking your game collection and your progress playing the games.

## Installation

Clone this repository to a directory in your web root (/var/www/html/ygdb).

## Setup

Create a database for the data backend of this application. Run db-setup.sql from the setup/ directory for tables and data.

Copy `env` to `.env` and tailor for your app, specifically the baseURL and any database settings.

## Important Change with index.php

`index.php` is no longer in the root of the project! It has been moved inside the *public* folder,
for better security and separation of components.

This means that you should configure your web server to "point" to your project's *public* folder, and
not to the project root. A better practice would be to configure a virtual host to point there. A poor practice would be to point your web server to the project root and expect to enter *public/...*, as the rest of your logic and the
framework are exposed.

## Server Requirements

PHP version 7.3 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php)
- xml (enabled by default - don't turn it off)
