## Feature Name: Edit User Page

**Overview:**
The Edit User Page feature allows users to edit accounts.

**Usage:**

1. Navigate to the Edit User Page.
2. Modify the user's details as needed.
3. Submit the form to save the changes to the user account.
4. Redirects to User View when successful,

**Pages:**

-resources\js\Pages\User\Edit.vue: Edit User Page.

**Routing:**

-   GET Route: /users/{user_id}/edit
    -Description: Displays the Edit User Page for modifying existing user accounts.
-   PATCH Route: /users
    -Description: Authenticates form credentials and edits the user.

**Parameter**

```PATCH Route: /users/{user_id}
{
    "first_name": "(string, max_length:255):User's first name",
    "last_name": "(string, max_length:255):User's last name",
    "address": "(string, max_length:255):User's Address",
    "postal_code": "(string, max_length:5,regex:/\\d{5}$|\\d{4}$/):User's Postal Code",
    "phone_number": "(string, , max_length:5, regex:/^09\\d{9}$|^9\\d{9}$/):User's Phone Number",
    "username": "(string, unique, max_length:255):User's username",
    "email": "(string, unique, max_length:255, email):User's email",
}
```
