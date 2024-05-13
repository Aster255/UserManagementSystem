## Feature Name: Delete User Page

**Overview:**
The Delete User Page feature allows users to remove existing user accounts.

**Usage:**

1. Navigate to the Delete User Page.
2. Confirm the deletion of the user account.
3. Submit the active user's password to soft delete the user account.
4. Redirects to User Index upon successful deletion.

**Pages:**

-resources\js\Pages\User\Delete.vue: Users Delete Page.

**Routing:**

-   GET Route: /users/{user_id}/delete
    -Description: Displays the Delete Userpage.
-   DELETE Route: /users/{user_id}
    -Description: Deletes the user with the same user_id.

**Parameter**
GET Route: /users/{user_id}/delete
-Description: Specifies the user_id
-Type: Integer (int)
-Constraints: Must be a positive integer representing the user_id

DELETE Route: /users/{user_id}
-Description: Deletes the user with the same user_id.
-Type: Integer (int)
-Constraints: Must be a positive integer representing the user_id
{"password": "(String, required): The active user's password"}
