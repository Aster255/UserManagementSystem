## Feature Name: User Index API

**Overview:**
Gets a list of Users of the app, with pagination data.

**Usage:**
Gets a list of Users of the app

**Routing:**

-GET Route: /api/users?page={page}

**Authorization Bearer Token**
Token:Personal Access Token

**Request Headers**
Accept:application/vnd.api+json
Content-Type:application/vnd.api+json

**Query Params**
page: {page}

**Index Successful**
{
"data": [
{
"id": "1",
"attributes": {
"first_name": "Hilbert",
"last_name": "Johnston",
"address": "28959 Holden Garden Suite 742",
"postal_code": "61008",
"phone_number": "1-283-924-2894",
"username": "mante.lenna",
"email": "liliane.ortiz@example.net",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "2",
"attributes": {
"first_name": "Damien",
"last_name": "Ratke",
"address": "260 Schulist Port",
"postal_code": "22706-8275",
"phone_number": "240-454-5015",
"username": "tgibson",
"email": "whoeger@example.net",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "3",
"attributes": {
"first_name": "Ricardo",
"last_name": "Rath",
"address": "376 Ryan Trafficway",
"postal_code": "28614",
"phone_number": "901.408.6379",
"username": "jmccullough",
"email": "julius.jenkins@example.org",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "4",
"attributes": {
"first_name": "Alf",
"last_name": "O'Hara",
"address": "6884 Lorenza Dale",
"postal_code": "26898-6070",
"phone_number": "+13212537407",
"username": "leo32",
"email": "boyle.chanel@example.com",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "5",
"attributes": {
"first_name": "Ottilie",
"last_name": "Beer",
"address": "93567 Pollich Pines Suite 098",
"postal_code": "86528-5560",
"phone_number": "+1-425-428-8982",
"username": "kaley27",
"email": "davion69@example.com",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "6",
"attributes": {
"first_name": "Franco",
"last_name": "Kshlerin",
"address": "71715 Cronin Fort Apt. 256",
"postal_code": "72196-8666",
"phone_number": "678-251-0408",
"username": "tfadel",
"email": "lew.lakin@example.net",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "7",
"attributes": {
"first_name": "Mellie",
"last_name": "Prosacco",
"address": "49106 Blanche Hill Apt. 412",
"postal_code": "71993",
"phone_number": "+1-567-980-7920",
"username": "windler.heath",
"email": "mustafa23@example.org",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
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
},
{
"id": "9",
"attributes": {
"first_name": "Zoie",
"last_name": "Boehm",
"address": "26333 Bethany Flats",
"postal_code": "30144",
"phone_number": "253-919-0240",
"username": "leone62",
"email": "markus.nicolas@example.net",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
},
{
"id": "10",
"attributes": {
"first_name": "Susie",
"last_name": "Goyette",
"address": "407 Cortez Rest Suite 372",
"postal_code": "45935",
"phone_number": "+1-458-790-1241",
"username": "fbins",
"email": "antonina73@example.com",
"created_at": "2024-05-13T07:02:19.000000Z",
"updated_at": "2024-05-13T07:02:19.000000Z"
}
}
],
"links": {
"first": "http://127.0.0.1:8000/api/users?page=1",
"last": "http://127.0.0.1:8000/api/users?page=31",
"prev": null,
"next": "http://127.0.0.1:8000/api/users?page=2"
},
"meta": {
"current_page": 1,
"from": 1,
"last_page": 31,
"links": [
{
"url": null,
"label": "&laquo; Previous",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=1",
"label": "1",
"active": true
},
{
"url": "http://127.0.0.1:8000/api/users?page=2",
"label": "2",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=3",
"label": "3",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=4",
"label": "4",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=5",
"label": "5",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=6",
"label": "6",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=7",
"label": "7",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=8",
"label": "8",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=9",
"label": "9",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=10",
"label": "10",
"active": false
},
{
"url": null,
"label": "...",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=30",
"label": "30",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=31",
"label": "31",
"active": false
},
{
"url": "http://127.0.0.1:8000/api/users?page=2",
"label": "Next &raquo;",
"active": false
}
],
"path": "http://127.0.0.1:8000/api/users",
"per_page": 10,
"to": 10,
"total": 301
}
}

**Invalid Token**
{
"message": "Unauthenticated."
}
