# PHP Image Access Control

This PHP project demonstrates how to restrict direct access to images and serve them through a PHP script with secure token-based access control.

## Features

- Securely serve images to authenticated users
- Token-based URL with expiration for secure access
- Prevent direct access to images via URL

## Directory Structure

```
project-root/
├── public/
    ├── index.php
    └── serve_image.php
    └── private_images/
        └── image_text.jpg
```

## Setup Instructions

### 1. Move Images Out of Public Directory

Move your `images` folder to a directory that is not directly accessible. For example:

```
/var/www/private_images/
```

You need to change my code a little bit because I put image directory on directly accessible folder for better understanding

### 2. Create the Image Serving Script

Create a script `serve_image.php` to handle image requests. This script should:

- Validate the token and expiry time.
- Check if the user is logged in.
- Serve the image if all checks pass, otherwise return an appropriate error response.

### 3. Generate Secure Image URLs

When displaying images to logged-in users, generate URLs with a token and expiry time. Ensure the URLs point to the `serve_image.php` script with appropriate query parameters.

### 4. Handle User Login and Logout

Ensure that the `$_SESSION['loggedin']` variable is set appropriately when users log in and is cleared when they log out.

## Usage

1. **Start the PHP server**:
    ```
    php -S localhost:8080
    ```

2. **Access the application**: Open your browser and navigate to `http://localhost:8080`.

3. **Login**: Implement a login mechanism to set `$_SESSION['loggedin']` to `true`.

4. **View Images**: Once logged in, you can view images on the main page. The images are served through the `serve_image.php` script with secure tokens and expiration.

## Security Considerations

- Ensure the secret key used for generating tokens is kept secure.
- Implement a more robust token generation and validation mechanism for production use.
- Consider using HTTPS to protect token and session data in transit.

## Special Consideration

As this is demo project you should try to change the necessery part like directory and other by your requirements.
