## Feature Name: Registration Page

**Overview:**
The Registration Page feature allows users to create a new account on the application.

**Usage:**

1. Fill out the registration form with the required information.
2. Click the "Register" button to create your account.
3. Upon successful registration, you will be redirected to the Users index page.

**Pages:**

-resources\js\Pages\Auth\Register.vue: Renders the registration page.

**Routing:**

-   GET Route: /register
    -Description: Displays the register page.
-   POST Route: /register
    -Description: Authenticates user credentials and registers the user.

**Parameter**

```POST Route: /login
{
    "first_name": "(string, required, max_length:255):User's first name",
    "last_name": "(string, required, max_length:255):User's last name",
    "address": "(string, required, max_length:255):User's Address",
    "postal_code": "(string, required, max_length:5,regex:/\\d{5}$|\\d{4}$/):User's Postal Code",
    "phone_number": "(string, required, max_length:5, regex:/^09\\d{9}$|^9\\d{9}$/):User's Phone Number",
    "username": "(string, required, unique, max_length:255):User's username",
    "email": "(string, required, unique, max_length:255, email):User's email",
    "password": "(string, required, max_length:255):User's password",
    "password confirmation": "(string, required, max_length:255):User's password confirmation"
}
```
