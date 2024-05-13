## Feature Name: User Index API

**Overview:**
Creates a user via API

**Routing:**

-POST Route: /api/users

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Body form-data**
"first_name": "(string, required, max_length:255):User's first name",
"last_name": "(string, required, max_length:255):User's last name",
"address": "(string, required, max_length:255):User's Address",
"postal_code": "(string, required, max_length:5,regex:/\\d{5}$|\\d{4}$/):User's Postal Code",
"phone_number": "(string, required, max_length:5, regex:/^09\\d{9}$|^9\\d{9}$/):User's Phone Number",
"username": "(string, required, unique, max_length:255):User's username",
"email": "(string, required, unique, max_length:255, email):User's email",
"password": "(string, required, max_length:255):User's password",
"password confirmation": "(string, required, max_length:255):User's password confirmation"

**Store Successful**
{
"data": {
"id": "303",
"attributes": {
"first_name": "z",
"last_name": "x",
"address": "qc manila",
"postal_code": "1116",
"phone_number": "9173885239",
"username": "asd",
"email": "z@gmail.com",
"created_at": "2024-05-13T07:17:27.000000Z",
"updated_at": "2024-05-13T07:17:27.000000Z"
}
}
}

**Invalid Token**
{
"message": "Unauthenticated."
}
