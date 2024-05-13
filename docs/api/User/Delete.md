## Feature Name: User Update API

**Overview:**
Delete a user via API

**Routing:**

-DELETE Route: /api/users/{user_id}

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Delete Successful**
{
"status": "request was successful.",
"message": "Deleted successfully",
"data": null
}

**Invalid Token**
{
"message": "Unauthenticated."
}

**User not Found**
{
"status": "Error has occurred...",
"message": "User not found",
"data": null
}
