## Feature Name: User Index API

**Overview:**
Gets additional data of specific users.

**Routing:**

-GET Route: /api/users/{user_id}

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Show Successful**
{
"data": {
"id": "8",
"attributes": {
"first_name": "Rae",
"last_name": "Ankunding",
"address": "4425 Jocelyn Shoals",
"postal_code": "56267-8961",
"phone_number": "+19857845705",
"username": "jaiden95",
"email": "freinger@example.org",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
}
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
