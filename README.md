# Blog Website README

This README provides an overview of the functionality and setup instructions for a blog website that performs CRUD (Create, Read, Update, Delete) actions on authors and blog posts.

## Overview

This blog website is designed to manage authors and their corresponding blog posts. It provides a user-friendly interface for performing CRUD operations on both authors and blog posts. Admin users can create new authors, add blog posts under specific authors, update existing information, and delete authors or individual blog posts.

## Features

- **Create**: Admin users can create new authors and author users can create blog posts.
- **Read**: Users can view existing authors and their blog posts.
- **Update**: Admin users can edit information for authors and blog posts and authors can edit information on blog posts.
- **Delete**: Admin Users can delete authors and individual blog posts; and authors can delete individual blog posts.

## Technologies Used

- **Frontend**: HTML, CSS,PHP and JavaScript
-  **Database**: MySQL
- **Additional Tools**: Git for version control.

## Setup Instructions

To set up the blog website locally, follow these steps:

1. **Clone the Repository**: Clone the repository to your local machine using the following command:

   ```
   git clone <repository_url>
   ```

2. Set Up Database**: Install and configure MySQL locally on your machine. Create a database named `blog` and collections for `authors` and `posts`.

3. **Configure Environment Variables**: Change your database details on the "constant.php" file in the config directory of the project.

   ```
       <?php
        define("Host_Name","localhost");
        define("Database_User","root");
        define("Password","");
        define("Database_Name","yourdbname");
      
      ?>
   ```

4. **Launch the Application**: Open your web browser and navigate to `http://localhost:*` to access the blog website.
