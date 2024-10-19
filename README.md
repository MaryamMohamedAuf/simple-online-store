
# Simple Online Store

This project is a basic online store built using **PHP** and **MySQL**, designed to allow users to browse and purchase products.

## Features

- **Product Management**: Add, edit, delete, and view products.
- **User Authentication**: Secure registration and login system for customers.
- **Shopping Cart**: Add products to a cart, update quantities, and view total price.
- **Checkout**: A simple checkout system allowing users to place orders.
- **Admin Panel**: Manage store products and orders.

## Technologies Used

- **Backend**: PHP (without a framework)
- **Database**: MySQL
- **Frontend**: HTML, CSS, Bootstrap for UI
- **Version Control**: Git and GitHub

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/MaryamMohamedAuf/simple-online-store.git
   ```

2. Move into the project directory:
   ```bash
   cd simple-online-store
   ```

3. Set up the database:
   - Create a MySQL database and import the provided `database.sql` file to initialize the tables.

4. Update database connection settings in `config.php`:
   ```php
   <?php
   // config.php
   define('DB_HOST', 'localhost');
   define('DB_USER', 'your_username');
   define('DB_PASS', 'your_password');
   define('DB_NAME', 'your_database_name');
   ?>
   ```

5. Start your local server (Apache) and ensure it's pointing to the project folder.

6. Visit the store by navigating to:
   ```
   http://localhost/simple-online-store
   ```

## Usage

- **Admin**: Login to the admin panel using the credentials defined in the database to manage products and view orders.
- **Customers**: Browse products, add them to the shopping cart, and proceed to checkout.

## Future Enhancements

- Add search functionality for products.
- Implement user profiles for order history.
- Add payment gateway integration for more advanced checkout options.

## Contributions

Contributions are welcome! Please feel free to submit a pull request.

