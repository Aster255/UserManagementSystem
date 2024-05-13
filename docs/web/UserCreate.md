## Feature Name: Create User Page

**Overview:**
The Create User Page feature allows users to create new user accounts.

**Usage:**

1. Navigate to the Create User Page.
2. Fill out the user creation form with the required information.
3. Submit the form to create a new user account.
4. Redirects to the User View Page upon successful acccount creation.

**Pages:**

-resources\js\Pages\User\Create.vue: Users Create Page.

**Routing:**

-   GET Route: /users/create
    -Description: Displays the create user page.
-   POST Route: /users
    -Description: Authenticates form credentials and creates the user.

**Parameter**

```POST Route: /users
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
