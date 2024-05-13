## Feature Name: Login Page

**Overview:**
The Login Page feature allows users to sign in to the application.

**Usage:**

1. Go to the Login page.
2. Enter your email address.
3. Enter your password.
4. Click the "Log in" button.
5. Upon successful login, you will be redirected to the Users index page.

**Pages:**

-   resources/js/Pages/Auth/Login.vue: Renders the log in Page.

**Routing:**

-   GET Route: /
    -Description: Displays the login page.
-   GET Route: /login
    -Description: Displays the login page.
-   POST Route: /login
    -Description: Authenticates user credentials and logs in the user.

**Parameter**

```POST Route: /login
{
    "email": "(String, required): The user's email address",
    "password": "(String, required): The user's password"
}
```
