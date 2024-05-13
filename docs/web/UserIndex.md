## Feature Name: Users Index Page

**Overview:**
The User Index Page feature provides a list of users registered in the application.

**Usage:**

1. Navigate to the User Index page.
2. View the list of registered users.
3. Optionally, navigation to actions such as create, view, edit, delete, delete multiple user profiles.

**Pages:**

-resources\js\Pages\User\Index.vue: Users Index Page.

**Routing:**

-   GET Route: /users
    -Description: Displays the users index page.

**Parameter**
GET Route: /login?page={pagenumber}
-Description: Specifies the page number for pagination.
-Type: Integer (int)
-Constraints: Must be a positive integer representing the page number
