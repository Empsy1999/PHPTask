# Task Management System

This repository contains a Task Management System built using PHP and MySQL. Follow the instructions below to set up, run, and test the project on your local machine.

## Prerequisites

- [XAMPP](https://www.apachefriends.org/index.html) (includes Apache and MySQL)

## Installation

### Step 1: Install XAMPP

1. Download and install XAMPP from the [official website](https://www.apachefriends.org/index.html).
2. After installation, start the XAMPP Control Panel.

### Step 2: Set Up the Project

1. Clone this repository or download the ZIP file and extract it.
2. Copy the `taskmanagement` folder to the `htdocs` directory inside your XAMPP installation folder. The default path is `C:\xampp\htdocs` on Windows.

### Step 3: Start Apache and MySQL

1. Open the XAMPP Control Panel.
2. Start the Apache server and the MySQL service by clicking the "Start" buttons next to each module.

### Step 4: Set Up the Database

1. Open your web browser and navigate to [phpMyAdmin](http://localhost/phpmyadmin/).
2. In phpMyAdmin, create a new database named `task_management`.
3. Select the newly created database and click on the "Import" tab.
4. Click "Choose File" and select the `task_management.sql` file located inside the `PHPTask-main` folder.
5. Click "Go" to import the database structure and data.

### Step 5: Run the Project

1. Open your web browser and navigate to [http://localhost/PHPTask-main/index.php](http://localhost/PHPTask-main/index.php).
2. The Task Management System should now be running, and you can start interacting with the application.


## Additional Resources

- [XAMPP Documentation](https://www.apachefriends.org/faq.html)
- [phpMyAdmin Documentation](https://docs.phpmyadmin.net/)

If you encounter any issues or have any questions, feel free to open an issue on this repository.

---

Thank you for using the Task Management System!
