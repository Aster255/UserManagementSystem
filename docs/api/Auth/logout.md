## Feature Name: Logout API

**Overview:**
The Logout API revokes all personal access token of the user

**Usage:**
Revokes all Personal Access token of the user.

**Routing:**

-POST Route: /api/logout
-Description: Authenticates user credentials and sends back the token.

**Authorization Bearer Token**
Token:Personal Access Token

**Valid Personal Access Token**
{
"status": "request was successful.",
"message": null,
"data": {
"message": "user logged out"
}
}

**Invalid Token**
{
"message": "Unauthenticated."
}
