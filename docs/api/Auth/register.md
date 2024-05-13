## Feature Name: Register API

**Overview:**
The Login API allows developers to create account and get personal_access_tokens.

**Routing:**

-POST Route: /api/register

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

**Request Headers**
Accept : application/vnd.api+json
Content-Type: application/vnd.api+json

**Successful Registration**
{
"status": "request was successful.",
"message": "registration successful",
"data": {
"user": {
"first_name": "Paul",
"last_name": "alcos",
"address": "qc manila",
"postal_code": "1116",
"phone_number": "9173885239",
"username": "xzc",
"email": "testemail@gmail.com",
"updated_at": "2024-05-13T07:03:25.000000Z",
"created_at": "2024-05-13T07:03:25.000000Z",
"id": 301
},
"token": "1|8Yz8UZP7ypfmuM3m8tEuuWGMiCsVkPltLdQpROfge9cd05ed"
}
}

**Invalid Credentials**
{
"status": "Error has occurred...",
"message": "Credentials do not Match",
"data": ""
}

**Username and Email taken**
{
"message": "The username has already been taken. (and 1 more error)",
"errors": {
"username": [
"The username has already been taken."
],
"email": [
"The email has already been taken."
]
}
}
