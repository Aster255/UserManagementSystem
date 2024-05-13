## Feature Name: Users Show Page

**Overview:**
The Users Show Page feature allows users to view detailed information about specific users.

**Usage:**

1. Navigate to the Users Show Page.
2. Search for or select a specific user.
3. Optionally, provides navigation to actions such as edit and delete user profiles.

**Pages:**

-resources\js\Pages\User\Show.vue: Users Show Page.

**Routing:**

-   GET Route: /users/{user_id}
    -Description: Displays the users Show page.

**Parameter**
GET Route: /users/{user_id}
-Description: Specifies the user_id
-Type: Integer (int)
-Constraints: Must be a positive integer representing the user_id
