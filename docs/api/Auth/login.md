## Feature Name: Login API

**Overview:**
The Login API allows developers to get a new personal_access_tokens revokes old tokens.

**Usage:**

Use to get user's own data or get a new personal access token.

**Routing:**

-POST Route: /api/login
-Description: Authenticates user credentials and sends back the token.

**Body form-data**
"email": "(String, required): The user's email address",
"password": "(String, required): The user's password"

**Request Headers**
Accept : application/vnd.api+json
Content-Type: application/vnd.api+json

**Successful Login**
{
"status": "request was successful.",
"message": "login successful",
"data": {
"user": {
"id": 301,
"first_name": "Paul",
"last_name": "alcos",
"address": "qc manila",
"postal_code": "1116",
"phone_number": "9173885239",
"username": "xzc",
"email": "testemail@gmail.com",
"email_verified_at": null,
"deleted_at": null,
"created_at": "2024-05-13T07:03:25.000000Z",
"updated_at": "2024-05-13T07:03:25.000000Z"
},
"token": "2|cZgLlqHuyRT4NKgExpAA8ajt5JpfI1itKH6BNA50a9e1176d"
}
}

**Invalid Credentials**
{
"status": "Error has occurred...",
"message": "Credentials do not Match",
"data": ""
}
