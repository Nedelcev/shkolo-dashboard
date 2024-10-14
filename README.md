# Customizable Dashboard with Drag-and-Drop

This project is a customizable web dashboard where users can create, edit, delete, and reorder buttons in a grid using a drag-and-drop interface. It uses the MVC architecture, Bootstrap for styling, and SortableJS for drag-and-drop functionality. The backend is powered by PHP and MySQL.

## Table of Contents
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Installation](#installation)
- [Usage](#usage)
- [Folder Structure](#folder-structure)

## Features

- **Button Creation**: Add buttons with a title, URL, and color.
- **Button Editing**: Modify existing buttons (title, URL, color).
- **Button Deletion**: Remove buttons from the dashboard.
- **Drag-and-Drop Reordering**: Easily change the position of buttons using drag-and-drop functionality.
- **Responsive Layout**: The dashboard layout is fully responsive, ensuring compatibility with all device sizes.
- **AJAX-based Position Updates**: Real-time updates when dragging and dropping buttons, without needing to refresh the page.

## Technologies Used

- **Frontend**:
  - HTML, CSS (Bootstrap 5)
  - JavaScript (SortableJS, Axios)

- **Backend**:
  - PHP 7+ (MVC architecture)
  - MySQL (for storing button data)

- **Libraries**:
  - SortableJS (for drag-and-drop functionality)
  - Axios (for handling AJAX requests)
  - Font Awesome (for icons)

## Installation

1. **Clone the Repository**:

    ```bash
    git clone https://github.com/Nedelcev/shkolo-dashboard.git
    ```

2. **Navigate to the project directory**:

    ```bash
    cd shkolo-dashboard
    ```

3. **Create the Database**:

    Create a MySQL database and import the following SQL schema:

    ```sql
    CREATE TABLE IF NOT EXISTS dashboard_buttons (
        id INT AUTO_INCREMENT PRIMARY KEY,
        position INT NOT NULL,
        title VARCHAR(50) NOT NULL,
        link VARCHAR(255) NOT NULL,
        color VARCHAR(20) NOT NULL,
        UNIQUE (position)
    );
    ```

4. **Configure Database Connection**:

   In the file `models/Database.php`, update the database connection details to match your local environment:

    ```php
    private $host = 'localhost';   // Your database host
    private $user = 'root';        // Your database user
    private $pass = '';            // Your database password
    private $dbname = 'dashboard'; // Your database name
    ```

5. **Run the Application**:

   Make sure you're using a server (Apache, Nginx, or LiteSpeed) to run the PHP application or use a tool like XAMPP or MAMP for local development. 

   Navigate to `http://localhost/shkolo-dashboard/` to see the dashboard.

## Usage

### 1. Add a Button:
Click the empty grid space and fill in the form to add a button with a title, link, and color.

### 2. Edit a Button:
Click the edit icon on any button to modify its details.

### 3. Delete a Button:
Click the trash icon to delete a button from the dashboard.

### 4. Drag and Drop:
Click and drag any button to a new position in the grid. The new positions are automatically saved in the database.

## Folder Structure

```bash
/shkolo-dashboard
│
├── /controllers
│   └── DashboardController.php     # Handles dashboard view logic
│   └── ButtonController.php        # Handles button CRUD operations
├── /models
│   └── Database.php                # Database connection class
│   └── Button.php                  # Button model
├── /views
│   └── dashboard.php               # Dashboard view (main page)
│   └── config.php                  # Button configuration view (form)
├── /assets
│   └── /css
│       └── styles.css              # Custom CSS for the project
│   └── /js
│       └── dashboard.js            # Custom JavaScript for drag-and-drop functionality
├── /core
│   └── App.php                     # Main application router
│   └── Controller.php              # Base controller class
└── index.php                       # Entry point for the application
