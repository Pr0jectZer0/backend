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
<!-- START_f0654d3f2fc63c11f5723f233cc53c83 -->
## Account erstellen

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

<!-- START_57e3b4272508c324659e49ba5758c70f -->
## Einloggen

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

<!-- START_0163a14f37a1e457a1921f1f447247f6 -->
## Account Spiel hinzufügen

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

<!-- START_2ea88ff35aa222f5582e50f39a2b35fd -->
## Account Informationen abrufen (token)

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user",
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
`GET api/user`

`HEAD api/user`


<!-- END_2ea88ff35aa222f5582e50f39a2b35fd -->

<!-- START_da5727be600e4865c1b632f7745c8e91 -->
## Liste aller User

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/users`

`HEAD api/users`


<!-- END_da5727be600e4865c1b632f7745c8e91 -->

<!-- START_b620ccb3486c6181af93a3dfc6793d6f -->
## Account Spiele anzeigen

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

<!-- START_1fd8bdc7b6006d84987314f02b0ad69b -->
## Alle Gruppen eines Benutzers

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/groups" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/groups",
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
`GET api/user/groups`

`HEAD api/user/groups`


<!-- END_1fd8bdc7b6006d84987314f02b0ad69b -->

<!-- START_66ee7baf0e45abbcf0e68137a187fc61 -->
## Alle Grupen Anfragen an User

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/groups/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/groups/requests",
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
`GET api/user/groups/requests`

`HEAD api/user/groups/requests`


<!-- END_66ee7baf0e45abbcf0e68137a187fc61 -->

<!-- START_12bd43ed40ad7dfbe5aa763dba4f2379 -->
## Alle Admin Anfragen des Users

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/groups/admin_requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/groups/admin_requests",
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
`GET api/user/groups/admin_requests`

`HEAD api/user/groups/admin_requests`


<!-- END_12bd43ed40ad7dfbe5aa763dba4f2379 -->

<!-- START_c68e1ddad4fbbac0efe735c908be3903 -->
## Gruppen Anfrage akzeptieren von Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/group/{group_id}/accept" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/group/{group_id}/accept",
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
`GET api/user/group/{group_id}/accept`

`HEAD api/user/group/{group_id}/accept`


<!-- END_c68e1ddad4fbbac0efe735c908be3903 -->

<!-- START_2c7c99242bcd60f5277ec7ee69f9714b -->
## Gruppen Anfrage ablehnen von Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/user/group/{group_id}/decline" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/user/group/{group_id}/decline",
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
`GET api/user/group/{group_id}/decline`

`HEAD api/user/group/{group_id}/decline`


<!-- END_2c7c99242bcd60f5277ec7ee69f9714b -->

<!-- START_8ff0f42739fc7113fcacca8ef86d1ce2 -->
## Account Informationen abrufen (id)

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/user/{id}`

`HEAD api/user/{id}`


<!-- END_8ff0f42739fc7113fcacca8ef86d1ce2 -->

<!-- START_538c59bd7094f21614fa40efbc87039d -->
## Account Informationen updaten

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
## Account löschen

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

<!-- START_275a0b7415cb84879cad50161da345a4 -->
## Account Spiel entfernen

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

<!-- START_3730ce451c628ffd94a5898529b2db48 -->
## Freund hinzufügen

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

<!-- START_05b1cfe8b34c598275ca7b2f166bf187 -->
## Freundesliste

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

<!-- START_01b0a028c645d1954d531648b42c7087 -->
## Alle Freundschaftsanfrage anzeigen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/friend/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friend/requests",
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
`GET api/friend/requests`

`HEAD api/friend/requests`


<!-- END_01b0a028c645d1954d531648b42c7087 -->

<!-- START_818ca2749c38a62b003c5480e48f49a8 -->
## Freundschaftsanfrage akzeptieren

> Example request:

```bash
curl -X GET "http://project-zero.local/api/friend/{request_id}/accept" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friend/{request_id}/accept",
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
`GET api/friend/{request_id}/accept`

`HEAD api/friend/{request_id}/accept`


<!-- END_818ca2749c38a62b003c5480e48f49a8 -->

<!-- START_d2d28ddc4cfa524440d509c45cf889fb -->
## Freundschaftsanfrage ablehnen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/friend/{request_id}/decline" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/friend/{request_id}/decline",
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
`GET api/friend/{request_id}/decline`

`HEAD api/friend/{request_id}/decline`


<!-- END_d2d28ddc4cfa524440d509c45cf889fb -->

<!-- START_999da19de1df6e333c7dcca2b72b73ae -->
## Freund entfernen

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
## Spiel erstellen

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
## Spiele Liste abrufen

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/games`

`HEAD api/games`


<!-- END_483b565e98c93093ebd843663277d24e -->

<!-- START_4b21fc9dfd58f598de969c50468384b2 -->
## Publisher Liste abrufen

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/publisher`

`HEAD api/publisher`


<!-- END_4b21fc9dfd58f598de969c50468384b2 -->

<!-- START_23af8494e1d37ede0eab3bfdb7d575a2 -->
## Genre Liste abrufen

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/genre`

`HEAD api/genre`


<!-- END_23af8494e1d37ede0eab3bfdb7d575a2 -->

<!-- START_8c7ddf466c36f1e0d2a5ca6eb29f9e16 -->
## Spiel Informationen abrufen

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
    "error": "token_not_provided"
}
```

### HTTP Request
`GET api/game/{id}`

`HEAD api/game/{id}`


<!-- END_8c7ddf466c36f1e0d2a5ca6eb29f9e16 -->

<!-- START_539096888b4b69d783d2c1a19638ebec -->
## Spiel Informationen updaten

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
## Spiel löschen

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

<!-- START_48010a061a0407a20ef00eab261b0584 -->
## Private Nachricht senden

> Example request:

```bash
curl -X POST "http://project-zero.local/api/chatroom/{chatroom_id}/messages" \
-H "Accept: application/json" \
    -d "message"="ipsum" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/chatroom/{chatroom_id}/messages",
    "method": "POST",
    "data": {
        "message": "ipsum"
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
`POST api/chatroom/{chatroom_id}/messages`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    message | string |  required  | 

<!-- END_48010a061a0407a20ef00eab261b0584 -->

<!-- START_e525e58d560db68920ab93d3a85e2c8e -->
## Gruppen Nachricht senden

> Example request:

```bash
curl -X POST "http://project-zero.local/api/groupchat/{group_id}/messages" \
-H "Accept: application/json" \
    -d "message"="sunt" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/groupchat/{group_id}/messages",
    "method": "POST",
    "data": {
        "message": "sunt"
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
`POST api/groupchat/{group_id}/messages`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    message | string |  required  | 

<!-- END_e525e58d560db68920ab93d3a85e2c8e -->

<!-- START_fb9d2c07c967699cf37144b4855759c3 -->
## Private Chat Room Id erhalten

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
## Private Nachricht erhalten

Pusher Channel: private-chat.{PrivateChatRoomId}

Pusher Event Name: App\Events\MessageSent

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

<!-- START_c2ac829be8d2029a6bef36931a649579 -->
## Gruppen Nachricht erhalten

Pusher Channel: private-group-chat.{GroupId}

Pusher Event Name: App\Events\GroupMessageSent

> Example request:

```bash
curl -X GET "http://project-zero.local/api/groupchat/{group_id}/messages" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/groupchat/{group_id}/messages",
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
`GET api/groupchat/{group_id}/messages`

`HEAD api/groupchat/{group_id}/messages`


<!-- END_c2ac829be8d2029a6bef36931a649579 -->

<!-- START_135019a43006a5b141a2cb34c9767a79 -->
## Termin erstellen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/date" \
-H "Accept: application/json" \
    -d "titel"="doloremque" \
    -d "beschreibung"="doloremque" \
    -d "end_datum"="doloremque" \
    -d "start_datum"="doloremque" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date",
    "method": "POST",
    "data": {
        "titel": "doloremque",
        "beschreibung": "doloremque",
        "end_datum": "doloremque",
        "start_datum": "doloremque"
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
`POST api/date`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    titel | string |  required  | Maximum: `255`
    beschreibung | string |  required  | 
    end_datum | string |  required  | 
    start_datum | string |  required  | 

<!-- END_135019a43006a5b141a2cb34c9767a79 -->

<!-- START_017eb7fdb55c91a677ed9885b3f8e438 -->
## User Termin hinzufügen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/date/{date_id}/add_user" \
-H "Accept: application/json" \
    -d "id"="31" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{date_id}/add_user",
    "method": "POST",
    "data": {
        "id": "31"
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
`POST api/date/{date_id}/add_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_017eb7fdb55c91a677ed9885b3f8e438 -->

<!-- START_cea0ba467e3ffd5d9e6bc713a84b32c3 -->
## User Termin entfernen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/date/{date_id}/remove_user" \
-H "Accept: application/json" \
    -d "id"="6" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{date_id}/remove_user",
    "method": "POST",
    "data": {
        "id": "6"
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
`POST api/date/{date_id}/remove_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_cea0ba467e3ffd5d9e6bc713a84b32c3 -->

<!-- START_fd00c0529c974bae0b04402c877885b4 -->
## Alle Termine vom Benutzer

> Example request:

```bash
curl -X GET "http://project-zero.local/api/dates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/dates",
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
`GET api/dates`

`HEAD api/dates`


<!-- END_fd00c0529c974bae0b04402c877885b4 -->

<!-- START_29ed8708e160e49acff45d9f36abfc45 -->
## Alle angenommene Termine

> Example request:

```bash
curl -X GET "http://project-zero.local/api/dates/shared" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/dates/shared",
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
`GET api/dates/shared`

`HEAD api/dates/shared`


<!-- END_29ed8708e160e49acff45d9f36abfc45 -->

<!-- START_d86b9818b641e13c6e017cbd8897ff55 -->
## Alle Termin anfragen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/date/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/requests",
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
`GET api/date/requests`

`HEAD api/date/requests`


<!-- END_d86b9818b641e13c6e017cbd8897ff55 -->

<!-- START_115f2085116f359acef29d1e6edd8bf0 -->
## Termin Anfrage akzeptieren

> Example request:

```bash
curl -X GET "http://project-zero.local/api/date/{request_id}/accept" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{request_id}/accept",
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
`GET api/date/{request_id}/accept`

`HEAD api/date/{request_id}/accept`


<!-- END_115f2085116f359acef29d1e6edd8bf0 -->

<!-- START_2582db7e0a4441eabc6c830c3f46e912 -->
## Termin Anfrage ablehnen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/date/{request_id}/decline" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{request_id}/decline",
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
`GET api/date/{request_id}/decline`

`HEAD api/date/{request_id}/decline`


<!-- END_2582db7e0a4441eabc6c830c3f46e912 -->

<!-- START_4f4c1c69c6b654e178bf44015d57b439 -->
## Termin get by id

> Example request:

```bash
curl -X GET "http://project-zero.local/api/date/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{id}",
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
`GET api/date/{id}`

`HEAD api/date/{id}`


<!-- END_4f4c1c69c6b654e178bf44015d57b439 -->

<!-- START_94d41ca9b65ee83de6a50a151aa8928c -->
## Termin updaten/ändern

> Example request:

```bash
curl -X PUT "http://project-zero.local/api/date/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{id}",
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
`PUT api/date/{id}`


<!-- END_94d41ca9b65ee83de6a50a151aa8928c -->

<!-- START_c0f572bb0d06be8c1750f5e82a5daced -->
## Termin löschen

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/date/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/date/{id}",
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
`DELETE api/date/{id}`


<!-- END_c0f572bb0d06be8c1750f5e82a5daced -->

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

<!-- START_9e56c13879cee6483994a86d4d317a90 -->
## User Notiz hinzufügen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/note/{note_id}/add_user" \
-H "Accept: application/json" \
    -d "id"="9" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{note_id}/add_user",
    "method": "POST",
    "data": {
        "id": "9"
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
`POST api/note/{note_id}/add_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_9e56c13879cee6483994a86d4d317a90 -->

<!-- START_2a4edfe060a03e1c4d714a47b1255140 -->
## User Notiz entfernen

> Example request:

```bash
curl -X POST "http://project-zero.local/api/note/{note_id}/remove_user" \
-H "Accept: application/json" \
    -d "id"="47" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{note_id}/remove_user",
    "method": "POST",
    "data": {
        "id": "47"
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
`POST api/note/{note_id}/remove_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_2a4edfe060a03e1c4d714a47b1255140 -->

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

<!-- START_6021adb3dfa6d838792b53d18b2b4c97 -->
## Alle Notizen durch Einladung

> Example request:

```bash
curl -X GET "http://project-zero.local/api/notes/shared" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/notes/shared",
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
`GET api/notes/shared`

`HEAD api/notes/shared`


<!-- END_6021adb3dfa6d838792b53d18b2b4c97 -->

<!-- START_4b687d7e03a12c404c3687ad1c9ba2cb -->
## Alle Anfragen einer geteilten Notiz

> Example request:

```bash
curl -X GET "http://project-zero.local/api/note/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/requests",
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
`GET api/note/requests`

`HEAD api/note/requests`


<!-- END_4b687d7e03a12c404c3687ad1c9ba2cb -->

<!-- START_99d71b8aca086f8b85fad42647710217 -->
## Notiz Anfrage akzeptieren

> Example request:

```bash
curl -X GET "http://project-zero.local/api/note/{request_id}/accept" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{request_id}/accept",
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
`GET api/note/{request_id}/accept`

`HEAD api/note/{request_id}/accept`


<!-- END_99d71b8aca086f8b85fad42647710217 -->

<!-- START_3b09f68ad45abfed3717b6df9f6e2ea4 -->
## Notiz Anfrage ablehnen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/note/{request_id}/decline" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{request_id}/decline",
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
`GET api/note/{request_id}/decline`

`HEAD api/note/{request_id}/decline`


<!-- END_3b09f68ad45abfed3717b6df9f6e2ea4 -->

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

<!-- START_3278d29a5e02d86051f652b278e0becb -->
## Notiz löschen

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/note/{id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/note/{id}",
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
`DELETE api/note/{id}`


<!-- END_3278d29a5e02d86051f652b278e0becb -->

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

<!-- START_e449b8465af8189a9ddc80287e204d88 -->
## Gruppe User hinzufügen (anfrage)

> Example request:

```bash
curl -X POST "http://project-zero.local/api/group/{group_id}/add_user" \
-H "Accept: application/json" \
    -d "id"="13" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/add_user",
    "method": "POST",
    "data": {
        "id": "13"
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
`POST api/group/{group_id}/add_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_e449b8465af8189a9ddc80287e204d88 -->

<!-- START_2dbe9302a8bd962a114cb5a650da54b6 -->
## User entfernen auf Gruppe

> Example request:

```bash
curl -X POST "http://project-zero.local/api/group/{group_id}/remove_user" \
-H "Accept: application/json" \
    -d "id"="16" \

```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/remove_user",
    "method": "POST",
    "data": {
        "id": "16"
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
`POST api/group/{group_id}/remove_user`

#### Parameters

Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    id | string |  required  | `1`, `2`, `3`, `4`, `5`, `6`, `7`, `8`, `9`, `10`, `11`, `12`, `13`, `14`, `15`, `16`, `17`, `18`, `19`, `20`, `21`, `22`, `23`, `24`, `25`, `26`, `27`, `28`, `29`, `30`, `31`, `32`, `33`, `34`, `35`, `36`, `37`, `38`, `39`, `40`, `41`, `42`, `43`, `44`, `45`, `46` or `47`

<!-- END_2dbe9302a8bd962a114cb5a650da54b6 -->

<!-- START_f9e500d28904b7938ffe0c065b031a2c -->
## Alle Gruppen anzeigen

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

<!-- START_7d606f776b9ec14bb79077ac92ad8224 -->
## Anfrage an Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/request_access" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/request_access",
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
`GET api/group/{group_id}/request_access`

`HEAD api/group/{group_id}/request_access`


<!-- END_7d606f776b9ec14bb79077ac92ad8224 -->

<!-- START_c3427a577a04488d93a5d1e322c664a7 -->
## Alle Gruppen Anfragen an Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/requests" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/requests",
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
`GET api/group/{group_id}/requests`

`HEAD api/group/{group_id}/requests`


<!-- END_c3427a577a04488d93a5d1e322c664a7 -->

<!-- START_220b34dff9fcce6c72b967af3fb9282c -->
## User Anfrage an Gruppe akzeptieren

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/accept/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/accept/{user_id}",
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
`GET api/group/{group_id}/accept/{user_id}`

`HEAD api/group/{group_id}/accept/{user_id}`


<!-- END_220b34dff9fcce6c72b967af3fb9282c -->

<!-- START_d06d4979042fec742229ab99d5640410 -->
## User Anfrage an Gruppe ablehnen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/decline/{user_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/decline/{user_id}",
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
`GET api/group/{group_id}/decline/{user_id}`

`HEAD api/group/{group_id}/decline/{user_id}`


<!-- END_d06d4979042fec742229ab99d5640410 -->

<!-- START_22b1e9cb2630748a2f47cd0e96c58fdd -->
## Gruppe Termin hinzufügen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/attach/date/{date_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/attach/date/{date_id}",
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
`GET api/group/{group_id}/attach/date/{date_id}`

`HEAD api/group/{group_id}/attach/date/{date_id}`


<!-- END_22b1e9cb2630748a2f47cd0e96c58fdd -->

<!-- START_c315063b13bc0bcb5dc8185178794d80 -->
## Gruppe Termin entfernen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/detach/date/{date_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/detach/date/{date_id}",
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
`GET api/group/{group_id}/detach/date/{date_id}`

`HEAD api/group/{group_id}/detach/date/{date_id}`


<!-- END_c315063b13bc0bcb5dc8185178794d80 -->

<!-- START_5f995fdf7acd5363ecb8bfb4762ada10 -->
## Gruppe Notiz hinzufügen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/attach/note/{note_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/attach/note/{note_id}",
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
`GET api/group/{group_id}/attach/note/{note_id}`

`HEAD api/group/{group_id}/attach/note/{note_id}`


<!-- END_5f995fdf7acd5363ecb8bfb4762ada10 -->

<!-- START_3fa13675caff0286c9451b2c42f8ed5a -->
## Gruppe Notiz entfernen

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/detach/note/{note_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/detach/note/{note_id}",
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
`GET api/group/{group_id}/detach/note/{note_id}`

`HEAD api/group/{group_id}/detach/note/{note_id}`


<!-- END_3fa13675caff0286c9451b2c42f8ed5a -->

<!-- START_5d8759de83844c04e2efbaae95f1c7b5 -->
## Alle Notizen einer Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/notes" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/notes",
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
`GET api/group/{group_id}/notes`

`HEAD api/group/{group_id}/notes`


<!-- END_5d8759de83844c04e2efbaae95f1c7b5 -->

<!-- START_9ec7c41b92ad9735aeb8a559f351451f -->
## Alle Termine einer Gruppe

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}/dates" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}/dates",
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
`GET api/group/{group_id}/dates`

`HEAD api/group/{group_id}/dates`


<!-- END_9ec7c41b92ad9735aeb8a559f351451f -->

<!-- START_80b5a76c9b4ea93f6e4fea71664e8c5d -->
## Gruppe by id

> Example request:

```bash
curl -X GET "http://project-zero.local/api/group/{group_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}",
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
`GET api/group/{group_id}`

`HEAD api/group/{group_id}`


<!-- END_80b5a76c9b4ea93f6e4fea71664e8c5d -->

<!-- START_2c26db0a9d1c7df11e667780746fad06 -->
## Gruppen löschen

> Example request:

```bash
curl -X DELETE "http://project-zero.local/api/group/{group_id}" \
-H "Accept: application/json"
```

```javascript
var settings = {
    "async": true,
    "crossDomain": true,
    "url": "http://project-zero.local/api/group/{group_id}",
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
`DELETE api/group/{group_id}`


<!-- END_2c26db0a9d1c7df11e667780746fad06 -->

