# Car Models

## Overview

This project is a simple frontend / backend application that will allow you to lookup different models of vehicles by their type and make.

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

The backend of the project, structured as a simple RESTful API made with Symfony and Doctrine.

### frontenod

The frontend of the application, made with VUE and Vuetify.

[Sample Video](https://dl.dropboxusercontent.com/s/c9zjtda47wx99qf/2020-07-18%2012-42-49.mp4) (Dropbox MP4 File)

## Installing

### Backend

In the 'car-backend' folder, enter the following to install dependencies:

```BASH
composer install
```

On a MySQL Server, create the Schema:

```SQL
CREATE SCHEMA `car-models` ;
```

in the .env file in /car-backend, add the following line but substitute the placeholder values with relevant MySQL connection information:

```env
DATABASE_URL=mysql://username:password@127.0.0.1:3306/database_name?serverVersion=5.7
```

the final step before you can deploy is to build the database migrations and fill it using the json fixtures. In a terminal from the backend folder, enter this command:

```BASH
bin/console doctrine:fixtures:load
```

After that, the backend will be ready for deployment. You can test and review the app locally by 

### Frontend

Next, in the frontend folder, run the following:

```BASH
npm install
```

You should then be able to build and deploy the frontend.

## Local Testing

You can also test or review this project locally

add a file in the frontend folder called ".env.serve.local" and specify the API url for the backend

```ENV
VUE_APP_API_URL=http://127.0.0.1:8000
```

You can serve the frontend locally for testing.

```BASH
npm run serve
```

the backend can be served locally by running the following command in the car-backend folder

```BASH
symfony server:start
```

## Project Specifications

1. There should be a page at route "/" that shows a list of vehicle types
	- an API call will return the types
2. There should be a route for /makes/{type} where type is the selected vehicle *type*.
	- Should display a dropdown that will show a list of makers for the selected type.
	- When a make is selected, the server will respond with data about the model and display a list of models underneath the dropdown.
	- If no models are available related to the query, **"no results found"** will be displayed instead.
3. There should be an API route for /models/{type}/{makeCode} where type is the vehicle type and makeCode is the make of the selected vehicle.
	- Will return details about the vehicle in JSON.
4. All requests should be logged using an entity called *"SearchLog"*

## Future Goals

- Add Proper error handling to handle all failed API calls
- Refine frontend user experience

## Legal

Stock Images by:
-[JESHOOTS.com](https://www.pexels.com/@jeshoots-com-147458)
-[Tomáš Malík](https://www.pexels.com/@tomas-malik-793526)
-[Andrea Piacquadio](https://www.pexels.com/@olly)
