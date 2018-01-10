---
title: API Reference

language_tabs:
- bash
- javascript

includes:

search: true

toc_footers:
- <a href='http://github.com/mpociot/documentarian'>Documentation Powered by Documentarian</a>
---
<!-- START_INFO -->
# Info

Welcome to the generated API reference.
[Get Postman Collection](http://localhost/docs/collection.json)
<!-- END_INFO -->

#general
<!-- START_57e3b4272508c324659e49ba5758c70f -->
## api/user/login

> Example request:

```bash
curl -X POST "http://project-zero.local/api/user/login" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/login",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/user/login`


<!-- END_57e3b4272508c324659e49ba5758c70f -->

<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## api/user

> Example request:

```bash
curl -X POST "http://project-zero.local/api/user" \
-H "Accept: application/json" \
    -d "name"="unde" \
    -d "email"="felipa52@example.org" \
    -d "password"="unde" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user",
    "method": "POST",
    "data": {
        "name": "unde",
        "email": "felipa52@example.org",
        "password": "unde"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `255`
    email | email |  required  | Maximum: `255`
    password | string |  required  | Minimum: `6`

<!-- END_f0654d3f2fc63c11f5723f233cc53c83 -->

<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## api/users

> Example request:

```bash
curl -X GET "http://project-zero.local/api/users" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/users",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "users": [
        {
            "id": 1,
            "name": "test123",
            "alter_jahre": null,
            "email": "tessadt@tesst.de",
            "geheimfrage": null,
            "geheimantwort": null,
            "created_at": "2017-12-05 17:59:37",
            "updated_at": "2017-12-05 17:59:37"
        },
        {
            "id": 3,
            "name": "test123",
            "alter_jahre": null,
            "email": "tessdafsadt@tesst.de",
            "geheimfrage": null,
            "geheimantwort": null,
            "created_at": "2017-12-05 17:59:37",
            "updated_at": "2017-12-05 17:59:37"
        },
        {
            "id": 4,
            "name": "Bra",
            "alter_jahre": null,
            "email": "test@test.de",
            "geheimfrage": null,
            "geheimantwort": null,
            "created_at": "2018-01-09 12:32:53",
            "updated_at": "2018-01-09 12:32:53"
        }
    ]
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_8ff0f42739fc7113fcacca8ef86d1ce2 -->
## api/user/{id}

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "user": {
        "id": 1,
        "name": "test123",
        "alter_jahre": null,
        "email": "tessadt@tesst.de",
        "geheimfrage": null,
        "geheimantwort": null,
        "created_at": "2017-12-05 17:59:37",
        "updated_at": "2017-12-05 17:59:37"
    }
}
```

### HTTP Request
`GET api/user/{id}`

`HEAD api/user/{id}`


<!-- END_8ff0f42739fc7113fcacca8ef86d1ce2 -->

<!-- START_538c59bd7094f21614fa40efbc87039d -->
## api/user/{id}

> Example request:

```bash
curl -X PUT "http://project-zero.local/api/user/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/user/{id}`


<!-- END_538c59bd7094f21614fa40efbc87039d -->

<!-- START_a1ef15db35f08591deb485d3c5fb9a31 -->
## Notiz löschen

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/user/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/user/{id}`


<!-- END_a1ef15db35f08591deb485d3c5fb9a31 -->

<!-- START_05b1cfe8b34c598275ca7b2f166bf187 -->
## api/friends

> Example request:

```bash
curl -X GET "http://project-zero.local/api/friends" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friends",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/friends`

`HEAD api/friends`


<!-- END_05b1cfe8b34c598275ca7b2f166bf187 -->

<!-- START_3730ce451c628ffd94a5898529b2db48 -->
## api/friend/add

> Example request:

```bash
curl -X POST "http://project-zero.local/api/friend/add" \
-H "Accept: application/json" \
    -d "id"="illo" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friend/add",
    "method": "POST",
    "data": {
        "id": "illo"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/friend/add`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | 

<!-- END_3730ce451c628ffd94a5898529b2db48 -->

<!-- START_999da19de1df6e333c7dcca2b72b73ae -->
## api/friend/remove/{id}

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/friend/remove/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friend/remove/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/friend/remove/{id}`


<!-- END_999da19de1df6e333c7dcca2b72b73ae -->

<!-- START_ed06a06c68cb93ebdf969bc876224a32 -->
## api/game

> Example request:

```bash
curl -X POST "http://project-zero.local/api/game" \
-H "Accept: application/json" \
    -d "id_genre"="3" \
    -d "id_publisher"="2" \
    -d "name"="voluptatem" \
    -d "beschreibung"="voluptatem" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/game",
    "method": "POST",
    "data": {
        "id_genre": "3",
        "id_publisher": "2",
        "name": "voluptatem",
        "beschreibung": "voluptatem"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/game`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id_genre | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7` or `8`
    id_publisher | string |  required  | `1`, `2`, `3`, `4`, `5` or `6`
    name | string |  required  | 
    beschreibung | string |  required  | 

<!-- END_ed06a06c68cb93ebdf969bc876224a32 -->

<!-- START_483b565e98c93093ebd843663277d24e -->
## api/games

> Example request:

```bash
curl -X GET "http://project-zero.local/api/games" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/games",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "games": [
        {
            "id": 2,
            "id_genre": 1,
            "id_publisher": 2,
            "name": "test123",
            "beschreibung": "dasfdasfdsafdsaf",
            "created_at": "2017-12-05 17:39:56",
            "updated_at": "2017-12-05 17:39:56"
        }
    ]
}
```

### HTTP Request
`GET api/games`

`HEAD api/games`


<!-- END_483b565e98c93093ebd843663277d24e -->

<!-- START_8c7ddf466c36f1e0d2a5ca6eb29f9e16 -->
## api/game/{id}

> Example request:

```bash
curl -X GET "http://project-zero.local/api/game/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/game/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "message": "Spiel wurde nicht gefunden."
}
```

### HTTP Request
`GET api/game/{id}`

`HEAD api/game/{id}`


<!-- END_8c7ddf466c36f1e0d2a5ca6eb29f9e16 -->

<!-- START_539096888b4b69d783d2c1a19638ebec -->
## api/game/{id}

> Example request:

```bash
curl -X PUT "http://project-zero.local/api/game/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/game/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/game/{id}`


<!-- END_539096888b4b69d783d2c1a19638ebec -->

<!-- START_548f67a433374b0d2b175c60e197f6e1 -->
## api/game/{id}

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/game/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/game/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/game/{id}`


<!-- END_548f67a433374b0d2b175c60e197f6e1 -->

<!-- START_4b21fc9dfd58f598de969c50468384b2 -->
## api/publisher

> Example request:

```bash
curl -X GET "http://project-zero.local/api/publisher" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/publisher",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "publisher": [
        {
            "id": 1,
            "name": "Pr0ject Zer0",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Electronic Arts",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Square Enix",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Nintendo",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "name": "Sony",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "name": "Ubisoft",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/publisher`

`HEAD api/publisher`


<!-- END_4b21fc9dfd58f598de969c50468384b2 -->

<!-- START_23af8494e1d37ede0eab3bfdb7d575a2 -->
## api/genre

> Example request:

```bash
curl -X GET "http://project-zero.local/api/genre" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/genre",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "Genre": [
        {
            "id": 1,
            "name": "Actionspiel",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 2,
            "name": "Adventure",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 3,
            "name": "Casual Game",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 4,
            "name": "Rollenspiel",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 5,
            "name": "Strategiespiel",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 6,
            "name": "Online Spiel",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 7,
            "name": "Rennspiel",
            "created_at": null,
            "updated_at": null
        },
        {
            "id": 8,
            "name": "Ego-Shooter",
            "created_at": null,
            "updated_at": null
        }
    ]
}
```

### HTTP Request
`GET api/genre`

`HEAD api/genre`


<!-- END_23af8494e1d37ede0eab3bfdb7d575a2 -->

<!-- START_0163a14f37a1e457a1921f1f447247f6 -->
## api/user/game/add

> Example request:

```bash
curl -X POST "http://project-zero.local/api/user/game/add" \
-H "Accept: application/json" \
    -d "id"="perferendis" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/game/add",
    "method": "POST",
    "data": {
        "id": "perferendis"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/user/game/add`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | 

<!-- END_0163a14f37a1e457a1921f1f447247f6 -->

<!-- START_275a0b7415cb84879cad50161da345a4 -->
## api/user/game/remove/{id}

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/user/game/remove/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/game/remove/{id}",
    "method": "DELETE",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`DELETE api/user/game/remove/{id}`


<!-- END_275a0b7415cb84879cad50161da345a4 -->

<!-- START_b620ccb3486c6181af93a3dfc6793d6f -->
## api/user/game/list

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/game/list" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/game/list",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/user/game/list`

`HEAD api/user/game/list`


<!-- END_b620ccb3486c6181af93a3dfc6793d6f -->

<!-- START_fb9d2c07c967699cf37144b4855759c3 -->
## api/chatroom/{user_id}

> Example request:

```bash
curl -X GET "http://project-zero.local/api/chatroom/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/chatroom/{user_id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/chatroom/{user_id}`

`HEAD api/chatroom/{user_id}`


<!-- END_fb9d2c07c967699cf37144b4855759c3 -->

<!-- START_b93789cddec054a9c95d51214efd7740 -->
## api/chatroom/{chatroom_id}/messages

> Example request:

```bash
curl -X GET "http://project-zero.local/api/chatroom/{chatroom_id}/messages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/chatroom/{chatroom_id}/messages",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/chatroom/{chatroom_id}/messages`

`HEAD api/chatroom/{chatroom_id}/messages`


<!-- END_b93789cddec054a9c95d51214efd7740 -->

<!-- START_48010a061a0407a20ef00eab261b0584 -->
## api/chatroom/{chatroom_id}/messages

> Example request:

```bash
curl -X POST "http://project-zero.local/api/chatroom/{chatroom_id}/messages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/chatroom/{chatroom_id}/messages",
    "method": "POST",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/chatroom/{chatroom_id}/messages`


<!-- END_48010a061a0407a20ef00eab261b0584 -->

<!-- START_551da87187657555319a862580d988df -->
## Notiz erstellen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/note" \
-H "Accept: application/json" \
    -d "titel"="placeat" \
    -d "text"="placeat" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note",
    "method": "POST",
    "data": {
        "titel": "placeat",
        "text": "placeat"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/note`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    titel | string |  required  | Maximum: `255`
    text | string |  required  | 

<!-- END_551da87187657555319a862580d988df -->

<!-- START_41f69eb07e90539aee45dad827b205be -->
## Alle Notizen vom Benutzer

> Example request:

```bash
curl -X GET "http://project-zero.local/api/notes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/notes",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/notes`

`HEAD api/notes`


<!-- END_41f69eb07e90539aee45dad827b205be -->

<!-- START_e0c826920e486decc00aafae43cfdcee -->
## Notiz get by id

> Example request:

```bash
curl -X GET "http://project-zero.local/api/note/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/note/{id}`

`HEAD api/note/{id}`


<!-- END_e0c826920e486decc00aafae43cfdcee -->

<!-- START_e20fab3b528d1e1d3b29e13595eff8be -->
## Notiz updaten/ändern

> Example request:

```bash
curl -X PUT "http://project-zero.local/api/note/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{id}",
    "method": "PUT",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`PUT api/note/{id}`


<!-- END_e20fab3b528d1e1d3b29e13595eff8be -->

<!-- START_574eb03c7487fd3b774a8fdd1b988fc9 -->
## Gruppe erstellen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/group" \
-H "Accept: application/json" \
    -d "name"="voluptas" \
    -d "beschreibung"="voluptas" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group",
    "method": "POST",
    "data": {
        "name": "voluptas",
        "beschreibung": "voluptas"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/group`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    name | string |  required  | Maximum: `255`
    beschreibung | string |  required  | 

<!-- END_574eb03c7487fd3b774a8fdd1b988fc9 -->

<!-- START_a8c7b99a1af668700e8e56766ac3cbc3 -->
## Gruppe by id

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{id}",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/group/{id}`

`HEAD api/group/{id}`


<!-- END_a8c7b99a1af668700e8e56766ac3cbc3 -->

<!-- START_4ddb3558ff0bfadbb9f97962d65e45be -->
## Gruppe User hinzufügen (anfrage)

> Example request:

```bash
curl -X POST "http://project-zero.local/api/group/{id}/add_user" \
-H "Accept: application/json" \
    -d "id"="4" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{id}/add_user",
    "method": "POST",
    "data": {
        "id": "4"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/group/{id}/add_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `3` or `4`

<!-- END_4ddb3558ff0bfadbb9f97962d65e45be -->

<!-- START_63e8408b172f77fcac5d4443885920e2 -->
## Gruppe User entfernen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/group/{id}/remove_user" \
-H "Accept: application/json" \
    -d "id"="4" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{id}/remove_user",
    "method": "POST",
    "data": {
        "id": "4"
},
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```


### HTTP Request
`POST api/group/{id}/remove_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `3` or `4`

<!-- END_63e8408b172f77fcac5d4443885920e2 -->

<!-- START_3d3bddf9ae6826ac3f4b234b581e8de8 -->
## Alle Grupen anfragen (noch nicht fertig)

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/requests",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/group/requests`

`HEAD api/group/requests`


<!-- END_3d3bddf9ae6826ac3f4b234b581e8de8 -->

<!-- START_d1ec97f4d521d6188febe8b9518fefbb -->
## Gruppen anfrage akzeptieren (noch nicht fertig)

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{id}/accept" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{id}/accept",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/group/{id}/accept`

`HEAD api/group/{id}/accept`


<!-- END_d1ec97f4d521d6188febe8b9518fefbb -->

<!-- START_4ff3adf2b4cb250d8116374de5cad470 -->
## Gruppen anfrage ablehnen (noch nicht fertig)

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{id}/decline" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{id}/decline",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/group/{id}/decline`

`HEAD api/group/{id}/decline`


<!-- END_4ff3adf2b4cb250d8116374de5cad470 -->

<!-- START_f9e500d28904b7938ffe0c065b031a2c -->
## Alle Gruppen des Benutzers (noch nicht fertig)

> Example request:

```bash
curl -X GET "http://project-zero.local/api/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/groups",
    "method": "GET",
    "headers": {
        "accept": "application/json"
    }
}

$.ajax(settings).done(function (response) {
    console.log(response);
});
```

> Example response:

```json
{
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/groups`

`HEAD api/groups`


<!-- END_f9e500d28904b7938ffe0c065b031a2c -->

