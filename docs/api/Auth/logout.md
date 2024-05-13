## Feature Name: Logout API

**Overview:**
The Logout API revokes all personal access token of the user

**Routing:**

-POST Route: /api/logout

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
