## Feature Name: User Update API

**Overview:**
Delete Multiple Users via API

**Routing:**

-DELETE Route: /api/users/{user_id}

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Body raw (json)**
{
"user_ids": [...user_ids]
}

**All users Deleted Successful**
{
"success": {
"deleted_ids": [
1,
2,
3,
4,
5
]
},
"errors": {
"not_found_ids": []
}
}

**All users not found**
{
"success": {
"deleted_ids": []
},
"errors": {
"not_found_ids": [
1,
2,
3,
4,
5
]
}
}

**Mixed Users Deleted**
{
"success": {
"deleted_ids": [
6,
7,
8
]
},
"errors": {
"not_found_ids": [
3,
4,
5
]
}
}

**Invalid Token**
{
"message": "Unauthenticated."
}

**No User_ID Provided**
{
"status": "Error has occurred...",
"message": "No user IDs provided",
"data": null
}
