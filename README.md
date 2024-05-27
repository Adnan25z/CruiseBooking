# CruiseBooking

## Introduction
CruiseEase is a web-based application developed using PHP, JavaScript, HTML, and CSS. The application is designed to facilitate the booking and management of cruise packages. It includes features such as user registration, booking management, and payment processing, providing a comprehensive solution for cruise booking needs.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Documentation](#documentation)
- [Detailed Code Analysis](#detailed-code-analysis)
  - [Overview](#overview)
  - [Code Structure](#code-structure)
  - [Key Components](#key-components)
  - [Object-Oriented Principles](#object-oriented-principles)
  - [Design Patterns](#design-patterns)
- [Contributors](#contributors)

## Features

- **User Registration**: Allows users to create accounts and log in.
- **Booking Management**: Users can book cruises, view bookings, and manage their reservations.
- **Payment Processing**: Integrates payment functionality to handle cruise booking payments.
- **Admin Interface**: Admins can manage cruise packages, view bookings, and handle user inquiries.

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/Adnan25z/CruiseBooking.git

2. Navigate to the project directory:
   ```bash
   cd CruiseBooking

3. Set up your web server and database:
   - Ensure you have PHP and MySQL installed.
   - Import the database schema from the database folder.

4. Configure the database connection in the config.php file.

## Usage
1. Start your web server and navigate to the application URL.
2. Register as a new user or log in with existing credentials.
3. Browse available cruise packages and make a booking.
4. Manage your bookings and complete payments through the application.

## Dependencies
- PHP
- MySQL
- JavaScript
- HTML/CSS

## Detailed Code Analysis
### Overview
CruiseBooking is a comprehensive web application designed to manage cruise bookings and payments. It employs a multi-tier architecture with a clear separation between the presentation, business logic, and data access layers.

### Code Structure
1. includes: Contains PHP scripts for various functionalities.
2. scripts: JavaScript files for client-side interactions.
3. styles: CSS files for styling the application.
4. images: Static images used in the application.
5. PHP Files: Core application files such as index.php, about.php, enquire.php, process_order.php.

### Key Components
- User Management: Handles user registration, authentication, and profile management.
- Booking System: Manages cruise bookings, including viewing, updating, and deleting bookings.
- Payment Gateway: Integrates with payment providers to handle payments securely.
- Admin Panel: Allows admins to manage cruise packages, bookings, and user inquiries.


### Object-Oriented Principles
1. Encapsulation
   - Usage: Encapsulation is used to bundle data and methods operating on that data within classes.
   - Examples:
     - User class: Encapsulates user-related data and operations.
     - Booking class: Encapsulates booking details and operations.

2. Abstraction
   - Usage: Abstraction is used to provide a simplified interface to complex systems.
   - Examples:
     - Payment class: Abstracts the complexity of integrating with various payment gateways.
     - Database class: Provides a simple interface for database operations.

3. Inheritance
   - Usage: Inheritance allows the creation of new classes based on existing classes to promote code reuse.
   - Examples:
     - Admin class inherits from User class to add administrative privileges.
     - Different booking types can inherit from a base Booking class.

4. Polymorphism
   - Usage: Polymorphism allows the same interface to be used for different underlying data types.
   - Examples:
     - Different payment methods can be implemented through polymorphic classes.
     - The booking system can handle different types of bookings through a common interface.

### Design Patterns
- MVC Pattern: Separates the application into Model, View, and Controller layers.
- Singleton Pattern: Ensures a single instance of the database connection.
- Factory Pattern: Used for creating objects without specifying the exact class.

Contributors
Adnan Zafar (https://github.com/Adnan25z)

