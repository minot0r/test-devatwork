# Test Dev@Work

The following repository contains all the following challenges

## Problem of the ranges

> The objective of the program is to group series of consecutive numbers according to a set of
> input number. The program must be done in PHP
>
> The following rules must be applied:
>
> * Consecutive numbers must be grouped with the first and last number separated by a
> hyphen and the last number separated by a hyphen.
> * Numbers that appear non-consecutive should not be grouped.
> * Non-grouped and grouped ranges of numbers must be separated with a comma.

No particular difficulty for this challenge

## OOP Problem

> We have a PHP class whose objective is to send emails from a web application.
>  You can NOT edit the "sendEmail" method. This method is supposed to send the email
> and is free of errors as explained in its definition.
> * You can redesign the rest of the class. Add and remove new methods and properties,
> create new classes properties, create new classes, extend classes, interfaces, etc..
> * This application should be implemented in PHP and should work when put on a web
> server, it is supposed to put on a web server (it is assumed that the 'sendEmail' function
> returns the message message "Mail has been sent successfully")

For this challenge, I chose to transform the initial Mail class into an abstract class, allowing me to extend it into three distinct classes: RegistrationMail, UnsubscriptionMail, and ForgotPasswordMail. Each of these derived classes redefines an abstract method from the Mail class named send. This send function accepts a user DTO as a parameter, enabling the templating of each email with appropriate values. It then utilizes a protected method, sendMail, to dispatch the email with the correctly templated content.

## UI Problem

> We need to configure an environment in Symfony for basic user management. To do this we
> must create a database with about 100 users and display on a page a table with a user pager
> and that it is possible to perform actions such as: list, edit, create and delete users (CRUD).
> The data to show of the users will be the name, surname, date of birth,
> user's status (low or high) and gender.
> Specifications
> * The listed data must be sortable by any of its variables.
> * The pagination must show the users 10 by 10, without having to reload the page each
> time.
> * page each time.
> * It must be aesthetically acceptable, with a minimum of style and design.

For this final challenge, I developed a CRUD API using Symfony 5.4, which facilitated the management of the user table in a MySQL database. Subsequently, I created a front-end application using Angular that interacts with the Symfony API. I crafted my own version of a Datatable (which is over-engineering I know, but I was unsure if I had the right of using the standard one). The entire project was dockerized and can be started with `docker compose up`. The front-end enables viewing all users and importing them via a CSV file. This file is then transmitted to the API through the `/user/csv` route, where it's parsed and the data is added to the database. Additionally, users can be deleted through a modal that appears when a row is double-clicked.