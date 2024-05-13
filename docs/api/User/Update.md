## Feature Name: User Update API

**Overview:**
Updates a user via API

**Routing:**

-PATCH Route: /api/users/{user_id}

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Body form-data**
"first_name": "(string, max_length:255):User's first name",
"last_name": "(string, max_length:255):User's last name",
"address": "(string, max_length:255):User's Address",
"postal_code": "(string, max_length:5,regex:/\\d{5}$|\\d{4}$/):User's Postal Code",
"phone_number": "(string, max_length:5, regex:/^09\\d{9}$|^9\\d{9}$/):User's Phone Number",
"username": "(string, unique, max_length:255):User's username",
"email": "(string, , unique, max_length:255, email):User's email",

**Update Successful**
{
"data": {
"id": "1",
"attributes": {
"first_name": "Koth",
"last_name": "hammer",
"address": "123 mabuhay ph",
"postal_code": "1116",
"phone_number": "09123456789",
"username": "c",
"email": "qwasard@gmail.com",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:18:29.000000Z"
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
