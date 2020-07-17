# Car Models

## Overview

This project is a simple frontend / backend application that will allow you to classify and lookup different models of vehicles by their type.]

## Requirements

This projects has the following requirements:

- [PHP 7.0 +](https://windows.php.net/download/)
- [Composer](https://getcomposer.org)
- [Symfony 5.0](https://symfony.com/download)
- [MySQL 5.7+](https://dev.mysql.com/downloads/installer/)
- [Git BASH](https://gitforwindows.org)
- [NodeJS and NPM](https://nodejs.org/en/)

## Components

### car-backend

The backend of the project, structured as a simple RESTful API

### frontenod

The frontend of the application, made with VUE and Vuetify

## Installing

In the 'car-backend' folder, enter the following to install dependencies:

```BASH
composer install
```

next, in the frontend folder, run the following

```BASH
npm install
```

On a MySQL Server, create the Schema

```SQL
CREATE SCHEMA `car-models` ;
```

in the .env file in /car-backend, add the following line but substitute the placeholder values with relevant MySQL connection information
```env
DATABASE_URL=mysql://username:password@127.0.0.1:3306/database_name?serverVersion=8.0
```

### Optional

To quickly test and debug the frontend, install the vue CLI globally

```BASH
npm install -g @vue/cli
```

## Project Building
	**TODO**

## Project Specifications

1. There should be a page at route "/" that shows a list of vehicle types
	- (stretch) There could be a button that allows for the upload of a json file that will sync the car list.
	- an API call will return the types
2. There should be a route for /makes/{type} where type is the selected vehicle *type*.
	- Should display a dropdown that will show a list of makers for the selected type.
	- When a make is selected, the server will respond with data about the model and display a list of models underneath the dropdown.
	- If no models are available related to the query, **"no results found"** will be displayed instead.
3. There should be an API route for /models/{type}/{makeCode} where type is the vehicle type and makeCode is the make of the selected vehicle.
	- Will return details about the vehicle in JSON.
4. All requests should be logged using an entity called *"SearchLog"*
