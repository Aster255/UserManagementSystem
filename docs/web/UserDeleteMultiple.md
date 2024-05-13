## Feature Name: Delete Multiple Users Page

**Overview:**
The Delete Multiple Users feature allows users to delete multiple user accounts simultaneously..

**Usage:**

1. Navigate to the Delete Multiple Users Page.
2. Enter the User_ID's that need to be deleted
3. Submit the active user's password to soft delete the user accounts.
4. Redirects to a Deletion Status page upon valid form submission.

**Pages:**

-resources\js\Pages\User\DeleteMultiple.vue: Delete Multiple Users Page.
-resources\js\Pages\User\DeletionStatus.vue: Shows deletion success and errors from the User_id submission.

**Routing:**

-   GET Route: /users/delete-multiple
    -Description: Displays the Delete Multiple Users Page.
-   POST Route: /users/destroy-multiple
    -Description: Deletes multiple user accounts matching the criteria .

**Parameter**

POST Route: /users/destroy-multiple
{
"password": (String, required): The active user's password"
"user_ids": (Array,required): The User ID's of the the accounts to be deleted"
}
