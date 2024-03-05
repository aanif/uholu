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
[Get Postman Collection](http://127.0.0.1/docs/collection.json)

<!-- END_INFO -->

#general


<!-- START_f7b7ea397f8939c8bb93e6cab64603ce -->
## Display Swagger API page.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/documentation" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/documentation"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/documentation`


<!-- END_f7b7ea397f8939c8bb93e6cab64603ce -->

<!-- START_1ead214f30a5e235e7140eb2aaa29eee -->
## Dump api-docs content endpoint. Supports dumping a json, or yaml file.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/docs/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/docs/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET docs/{jsonFile?}`

`POST docs/{jsonFile?}`

`PUT docs/{jsonFile?}`

`PATCH docs/{jsonFile?}`

`DELETE docs/{jsonFile?}`

`OPTIONS docs/{jsonFile?}`


<!-- END_1ead214f30a5e235e7140eb2aaa29eee -->

<!-- START_1a23c1337818a4de9e417863aebaca33 -->
## docs/asset/{asset}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/docs/asset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/docs/asset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (404):

```json
{
    "message": "(1) - this L5 Swagger asset is not allowed"
}
```

### HTTP Request
`GET docs/asset/{asset}`


<!-- END_1a23c1337818a4de9e417863aebaca33 -->

<!-- START_a2c4ea37605c6d2e3c93b7269030af0a -->
## Display Oauth2 callback pages.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/oauth2-callback" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/oauth2-callback"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/oauth2-callback`


<!-- END_a2c4ea37605c6d2e3c93b7269030af0a -->

<!-- START_e4c20ab9c4727524c3daa74a53e56200 -->
## Display the form to gather additional payment verification for the given payment.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/stripe/payment/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/stripe/payment/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET stripe/payment/{id}`


<!-- END_e4c20ab9c4727524c3daa74a53e56200 -->

<!-- START_15ae8ca17c014b55868e68dc48ee5047 -->
## Handle a Stripe webhook call.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/stripe/webhook" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/stripe/webhook"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST stripe/webhook`


<!-- END_15ae8ca17c014b55868e68dc48ee5047 -->

<!-- START_669e5c67665eef979b46aad8e636994f -->
## api/plans
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/plans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plans"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/plans`


<!-- END_669e5c67665eef979b46aad8e636994f -->

<!-- START_1604d4140212986175f7a76481ee6da9 -->
## api/plan
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/plan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/plan`


<!-- END_1604d4140212986175f7a76481ee6da9 -->

<!-- START_fd2b21c06f6f6e6f5162602a28cd2a41 -->
## api/plan/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/plan/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plan/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`GET api/plan/{id}`


<!-- END_fd2b21c06f6f6e6f5162602a28cd2a41 -->

<!-- START_e90464da2408171a3183609ae8f3b0b4 -->
## api/plan/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/plan/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plan/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/plan/{id}`


<!-- END_e90464da2408171a3183609ae8f3b0b4 -->

<!-- START_ea8d2f8195f67f44ae4e6b45ba8c2fb7 -->
## api/plan/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/plan/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plan/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/plan/{id}`


<!-- END_ea8d2f8195f67f44ae4e6b45ba8c2fb7 -->

<!-- START_6de70b20a8144dc43a2b708f60556171 -->
## api/plan
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/plan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/plan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
{
    "object": "list",
    "data": [
        {
            "id": "plan_I6qaOAYSxca4Rh",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 250000,
            "amount_decimal": "250000",
            "billing_scheme": "per_unit",
            "created": 1601363102,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I6qaefjDJu3A6b",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I6qZVWMmR2PIq3",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 50000,
            "amount_decimal": "50000",
            "billing_scheme": "per_unit",
            "created": 1601363017,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I6qZCojE9FmlDy",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I6qXV8NBLl7hGe",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 10000,
            "amount_decimal": "10000",
            "billing_scheme": "per_unit",
            "created": 1601362882,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I6qX1L2LIJYJAq",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I6qTrvF9KwVw1s",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 0,
            "amount_decimal": "0",
            "billing_scheme": "per_unit",
            "created": 1601362698,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I6qTvkkxzGytN5",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I6qTxOL6KVPB7u",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 0,
            "amount_decimal": "0",
            "billing_scheme": "per_unit",
            "created": 1601362665,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I6qTFnWlnUVLlq",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I5Q15n3dsSZgsF",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 0,
            "amount_decimal": "0",
            "billing_scheme": "per_unit",
            "created": 1601033642,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I5Q12vLw4rPJLT",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I5Q1BEv43vZsvI",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 250000,
            "amount_decimal": "250000",
            "billing_scheme": "per_unit",
            "created": 1601033600,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I5Q10Qkc12gjs4",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_I5Q0cailsG71qF",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 10000,
            "amount_decimal": "10000",
            "billing_scheme": "per_unit",
            "created": 1601033550,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_I5Q0fUQuuuB0v0",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_Hx8ZYiX3VycMBS",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 10000,
            "amount_decimal": "10000",
            "billing_scheme": "per_unit",
            "created": 1599123588,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_Hx8Zs4VQQbax9g",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        },
        {
            "id": "plan_Hx8YaNR6k34oiS",
            "object": "plan",
            "active": true,
            "aggregate_usage": null,
            "amount": 10000,
            "amount_decimal": "10000",
            "billing_scheme": "per_unit",
            "created": 1599123548,
            "currency": "usd",
            "interval": "month",
            "interval_count": 1,
            "livemode": false,
            "metadata": [],
            "nickname": null,
            "product": "prod_Hx8YRQltFSkNur",
            "tiers": null,
            "tiers_mode": null,
            "transform_usage": null,
            "trial_period_days": null,
            "usage_type": "licensed"
        }
    ],
    "has_more": true,
    "url": "\/v1\/plans"
}
```

### HTTP Request
`GET api/plan`


<!-- END_6de70b20a8144dc43a2b708f60556171 -->

<!-- START_ebf1c1c9ce83623e08854e67ab318a17 -->
## api/currPackage
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/currPackage" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/currPackage"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/currPackage`


<!-- END_ebf1c1c9ce83623e08854e67ab318a17 -->

<!-- START_a316b84d21894280d9d4b65b17e40157 -->
## api/customer-profile
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer-profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer-profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer-profile`


<!-- END_a316b84d21894280d9d4b65b17e40157 -->

<!-- START_f6fc727d195a658c72978ba0118a277a -->
## api/customer-image-upload
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer-image-upload" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer-image-upload"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer-image-upload`


<!-- END_f6fc727d195a658c72978ba0118a277a -->

<!-- START_b5059e111dae08a1a353749935316106 -->
## api/customer-profile-picture
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer-profile-picture" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer-profile-picture"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer-profile-picture`


<!-- END_b5059e111dae08a1a353749935316106 -->

<!-- START_5b3ed6fc3f1b6df25d252bbf01b6dd5d -->
## api/update-customer-address
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/update-customer-address" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/update-customer-address"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/update-customer-address`


<!-- END_5b3ed6fc3f1b6df25d252bbf01b6dd5d -->

<!-- START_d452e494a086717689bd7ec3737789e1 -->
## api/customerpackage/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customerpackage/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customerpackage/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customerpackage/{id}`


<!-- END_d452e494a086717689bd7ec3737789e1 -->

<!-- START_dd662af1e8f2b33d9163d0882fd88691 -->
## api/resubpackage/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/resubpackage/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/resubpackage/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/resubpackage/{id}`


<!-- END_dd662af1e8f2b33d9163d0882fd88691 -->

<!-- START_36af8882ddc242e33ae90c69793540a9 -->
## api/update-newpassword
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/update-newpassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/update-newpassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/update-newpassword`


<!-- END_36af8882ddc242e33ae90c69793540a9 -->

<!-- START_250bbcc326c9163dd6e9d81843a0d197 -->
## api/customergetall
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/customergetall" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customergetall"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/customergetall`


<!-- END_250bbcc326c9163dd6e9d81843a0d197 -->

<!-- START_370cc06f2dd074793d1e73d95df27b17 -->
## api/getcount
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getcount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getcount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getcount`


<!-- END_370cc06f2dd074793d1e73d95df27b17 -->

<!-- START_37dc7f399879b05075b24054ab76392c -->
## api/getpendingcount
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getpendingcount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getpendingcount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getpendingcount`


<!-- END_37dc7f399879b05075b24054ab76392c -->

<!-- START_13bd222d9b3629dc6a4d1081d3f79dc9 -->
## api/updateAdminPro/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateAdminPro/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateAdminPro/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateAdminPro/{id}`


<!-- END_13bd222d9b3629dc6a4d1081d3f79dc9 -->

<!-- START_c0df64176d55db90f29e21e37673d580 -->
## api/updateAdminBus/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateAdminBus/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateAdminBus/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateAdminBus/{id}`


<!-- END_c0df64176d55db90f29e21e37673d580 -->

<!-- START_f5e0b7c8a0f6da922c2a9398404b143b -->
## api/addrole/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/addrole/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/addrole/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/addrole/{id}`


<!-- END_f5e0b7c8a0f6da922c2a9398404b143b -->

<!-- START_498785c8da59300d3b791b2a6bfccb55 -->
## api/business-profile
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/business-profile" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/business-profile"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/business-profile`


<!-- END_498785c8da59300d3b791b2a6bfccb55 -->

<!-- START_6a1c11c3890bb0f4e9f5ba45cb0bc9cf -->
## api/quantityUpdate
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/quantityUpdate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/quantityUpdate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/quantityUpdate`


<!-- END_6a1c11c3890bb0f4e9f5ba45cb0bc9cf -->

<!-- START_96e161a2ffbf3c8c406542c3ddf40f04 -->
## api/update-message-counter/{user_id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/update-message-counter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/update-message-counter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/update-message-counter/{user_id}`


<!-- END_96e161a2ffbf3c8c406542c3ddf40f04 -->

<!-- START_da4f09cb8501602364a5354cf1c4ecc7 -->
## api/addcontactnumber/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/addcontactnumber/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/addcontactnumber/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/addcontactnumber/{id}`


<!-- END_da4f09cb8501602364a5354cf1c4ecc7 -->

<!-- START_230b1ac948a37c2da511ddc7f2f69c1a -->
## api/uniqueNumber
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/uniqueNumber" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/uniqueNumber"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/uniqueNumber`


<!-- END_230b1ac948a37c2da511ddc7f2f69c1a -->

<!-- START_b157f1d908fc7b62e6ad2533abde35f2 -->
## api/passwordUpdate
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/passwordUpdate" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/passwordUpdate"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/passwordUpdate`


<!-- END_b157f1d908fc7b62e6ad2533abde35f2 -->

<!-- START_ad4a29ba676e8ae24694303405c31e06 -->
## api/verifyEmail
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/verifyEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/verifyEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/verifyEmail`


<!-- END_ad4a29ba676e8ae24694303405c31e06 -->

<!-- START_487ce45419750fc89fcdab4aedea049a -->
## api/uniqueEmailId
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/uniqueEmailId" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/uniqueEmailId"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/uniqueEmailId`


<!-- END_487ce45419750fc89fcdab4aedea049a -->

<!-- START_2ee043882d8f9fea0352b8db16f8fac1 -->
## api/loginPassword
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/loginPassword" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/loginPassword"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/loginPassword`


<!-- END_2ee043882d8f9fea0352b8db16f8fac1 -->

<!-- START_ef495a39bed2986841db2d38aae8945c -->
## api/loginEmail
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/loginEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/loginEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/loginEmail`


<!-- END_ef495a39bed2986841db2d38aae8945c -->

<!-- START_ed493466de40b1f566233e41efefa9d8 -->
## api/delete-user/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/delete-user/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/delete-user/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/delete-user/{id}`


<!-- END_ed493466de40b1f566233e41efefa9d8 -->

<!-- START_76c3bd0a91ecc1b50dffaf0b1a8fdbd7 -->
## api/updateActiveRequestCount/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateActiveRequestCount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateActiveRequestCount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateActiveRequestCount/{id}`


<!-- END_76c3bd0a91ecc1b50dffaf0b1a8fdbd7 -->

<!-- START_d375b4a4eea7bf6fe0a9b7afbe3f78f0 -->
## api/updateActiveScanCount/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateActiveScanCount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateActiveScanCount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateActiveScanCount/{id}`


<!-- END_d375b4a4eea7bf6fe0a9b7afbe3f78f0 -->

<!-- START_30b96ee0f117dee31bd0c5d4077ca101 -->
## api/updateContactFormCount/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateContactFormCount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateContactFormCount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateContactFormCount/{id}`


<!-- END_30b96ee0f117dee31bd0c5d4077ca101 -->

<!-- START_d93cabbaa790ce171023cf29de412dd6 -->
## api/verifyadminpassword/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/verifyadminpassword/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/verifyadminpassword/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/verifyadminpassword/{id}`


<!-- END_d93cabbaa790ce171023cf29de412dd6 -->

<!-- START_66bba0a1688dbb7f773d6f6299e29c60 -->
## api/deleteImgFile/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/deleteImgFile/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deleteImgFile/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/deleteImgFile/{id}`


<!-- END_66bba0a1688dbb7f773d6f6299e29c60 -->

<!-- START_db113b5d97752f1fd361aab679155796 -->
## api/customer
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer`


<!-- END_db113b5d97752f1fd361aab679155796 -->

<!-- START_59a479c4f46eeae39dca3835575e08c7 -->
## api/customer/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/customer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/customer/{id}`


<!-- END_59a479c4f46eeae39dca3835575e08c7 -->

<!-- START_4230a596a0b5bdc2cf13f89f6d9bf8ee -->
## api/customer/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/customer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/customer/{id}`


<!-- END_4230a596a0b5bdc2cf13f89f6d9bf8ee -->

<!-- START_557e9e3130c6c860f72e537486feeff0 -->
## api/customer
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/customer" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 1,
        "name": "Administrator",
        "last_name": "Uholu",
        "email": "admin@uholu.com",
        "email_verified_at": null,
        "phone": "11111111111",
        "dob": null,
        "unit": null,
        "street": null,
        "city": null,
        "zip": null,
        "doc_id": null,
        "doc_quantity": null,
        "key_id": null,
        "key_quantity": null,
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": null,
        "created_at": "2020-05-21 05:49:27",
        "updated_at": "2020-06-18 23:15:52",
        "stripe_id": null,
        "card_brand": null,
        "trial_ends_at": null,
        "profile_pic": null,
        "license_front": null,
        "license_back": null,
        "photo_id": null,
        "profile_check_1": null,
        "profile_check_2": null,
        "profile_check_3": null,
        "payment_counter": "2",
        "payment_del": null,
        "status": null,
        "role": "admin",
        "message": null,
        "sub_id": null,
        "sub_id2": null,
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": null,
        "storage": null,
        "delivery": null,
        "pickup": null,
        "active": null,
        "history": null,
        "staff": null,
        "parent_id": "head",
        "staff_quantity": null,
        "record": null,
        "edits": null,
        "user_admin": "1",
        "items_admin": "1",
        "activereq_admin": "1",
        "activereq_counter": "0",
        "historyreq_admin": "1",
        "message_admin": "1",
        "scanreq_admin": "1",
        "scanreq_counter": "0",
        "scanhistory_admin": "1",
        "contact_admin": "1",
        "contact_counter": "0",
        "Admin_comments": null,
        "support_admin": "1",
        "support_counter": "1",
        "card_last_four": null,
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 3,
        "name": "Testing user",
        "last_name": "u",
        "email": "aanif@dezining.com",
        "email_verified_at": "2020-06-23 20:45:55",
        "phone": "+923314961405",
        "dob": "2020-06-23",
        "unit": "23422",
        "street": "Lyell Highway",
        "city": "Gormanston",
        "zip": "7466",
        "doc_id": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "doc_quantity": "400",
        "key_id": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "key_quantity": "5",
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": "bo",
        "created_at": "2020-06-24 01:39:16",
        "updated_at": "2020-07-16 22:34:20",
        "stripe_id": "cus_HWGkbf6DeTn5wq",
        "card_brand": "Visa",
        "trial_ends_at": "4\/2024",
        "profile_pic": "http:\/\/127.0.0.1:8000\/upload\/cus_HWGkbf6DeTn5wq_15948188351823025874.jpeg",
        "license_front": "http:\/\/127.0.0.1:8000\/upload\/cus_HWGkbf6DeTn5wq_15949028601183005328.jpeg",
        "license_back": "http:\/\/127.0.0.1:8000\/upload\/cus_HWGkbf6DeTn5wq_1594902860935621054.jpeg",
        "photo_id": "http:\/\/127.0.0.1:8000\/upload\/cus_HWGkbf6DeTn5wq_159490276599544240.jpeg",
        "profile_check_1": "1",
        "profile_check_2": "1",
        "profile_check_3": "1",
        "payment_counter": "1",
        "payment_del": "1",
        "status": "Approved",
        "role": "business",
        "message": null,
        "sub_id": "sub_HWGqUPfsFhqqgE",
        "sub_id2": "sub_HWGqk2Tkhfb10B",
        "cname": "Dezining",
        "abn": "Asda3",
        "title": "Head",
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": "0",
        "storage": "1",
        "delivery": "1",
        "pickup": "1",
        "active": "1",
        "history": "1",
        "staff": "1",
        "parent_id": null,
        "staff_quantity": null,
        "record": "1",
        "edits": "5",
        "user_admin": null,
        "items_admin": null,
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": null,
        "contact_counter": null,
        "Admin_comments": null,
        "support_admin": null,
        "support_counter": null,
        "card_last_four": "4242",
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 4,
        "name": "Aanif Tester",
        "last_name": "User",
        "email": "aanif@bangergames.com",
        "email_verified_at": "2020-07-15 14:01:37",
        "phone": "1231231",
        "dob": "2020-06-29",
        "unit": null,
        "street": null,
        "city": null,
        "zip": null,
        "doc_id": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "doc_quantity": "600",
        "key_id": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "key_quantity": "20",
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": null,
        "created_at": "2020-06-30 04:50:14",
        "updated_at": "2020-07-06 20:22:02",
        "stripe_id": "cus_HYZBQQUYiaBl7u",
        "card_brand": "Visa",
        "trial_ends_at": "4\/2024",
        "profile_pic": null,
        "license_front": null,
        "license_back": null,
        "photo_id": null,
        "profile_check_1": null,
        "profile_check_2": null,
        "profile_check_3": null,
        "payment_counter": "1",
        "payment_del": "1",
        "status": "Incomplete",
        "role": "business",
        "message": null,
        "sub_id": "sub_HYZDuTFumAowb1",
        "sub_id2": "sub_HYZD7bhB7nInHW",
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": null,
        "storage": null,
        "delivery": null,
        "pickup": null,
        "active": null,
        "history": null,
        "staff": null,
        "parent_id": null,
        "staff_quantity": null,
        "record": null,
        "edits": null,
        "user_admin": null,
        "items_admin": null,
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": null,
        "contact_counter": null,
        "Admin_comments": null,
        "support_admin": null,
        "support_counter": null,
        "card_last_four": "4242",
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 5,
        "name": "Aanif new",
        "last_name": "test",
        "email": "aanif@hotmail.com",
        "email_verified_at": "2020-07-06 14:30:21",
        "phone": null,
        "dob": "2020-07-06",
        "unit": "23E",
        "street": "Harris Street",
        "city": "Carlisle",
        "zip": "6101",
        "doc_id": "price_1GzLwRLPmIPXXFsFU6j5wzBP",
        "doc_quantity": "3",
        "key_id": "price_1GzLxgLPmIPXXFsFJoBPZjYG",
        "key_quantity": "4",
        "kname": "wedwe",
        "klast_name": "wedwedw",
        "kemail": "we@d.sdf",
        "kphone": "123123",
        "krelation": "asdasd",
        "delivery_info": "wef",
        "created_at": "2020-07-06 18:57:32",
        "updated_at": "2020-07-07 20:15:00",
        "stripe_id": "cus_Hb2DnNRAG6vwn7",
        "card_brand": "Visa",
        "trial_ends_at": "4\/2024",
        "profile_pic": null,
        "license_front": "http:\/\/127.0.0.1:8000\/upload\/cus_Hb2DnNRAG6vwn7_15940279661431648597.jpeg",
        "license_back": "http:\/\/127.0.0.1:8000\/upload\/cus_Hb2DnNRAG6vwn7_1594027967806772805.jpeg",
        "photo_id": "http:\/\/127.0.0.1:8000\/upload\/cus_Hb2DnNRAG6vwn7_15940279672004946023.jpeg",
        "profile_check_1": "1",
        "profile_check_2": "1",
        "profile_check_3": "1",
        "payment_counter": "0",
        "payment_del": "1",
        "status": "Approved",
        "role": "customer",
        "message": null,
        "sub_id": "sub_Hb2jip9sasTvMR",
        "sub_id2": "sub_Hb2jZQ7VIQixzZ",
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": "0",
        "storage": "1",
        "delivery": "1",
        "pickup": "1",
        "active": "1",
        "history": "1",
        "staff": "1",
        "parent_id": null,
        "staff_quantity": null,
        "record": "1",
        "edits": "1",
        "user_admin": null,
        "items_admin": null,
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": null,
        "contact_counter": null,
        "Admin_comments": null,
        "support_admin": null,
        "support_counter": null,
        "card_last_four": "4242",
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 6,
        "name": "asasd",
        "last_name": "asdasd",
        "email": "sche@kdf.sdfi",
        "email_verified_at": "2020-07-16 22:56:44",
        "phone": "2342341",
        "dob": null,
        "unit": null,
        "street": null,
        "city": null,
        "zip": null,
        "doc_id": null,
        "doc_quantity": null,
        "key_id": null,
        "key_quantity": null,
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": null,
        "created_at": "2020-07-16 22:56:44",
        "updated_at": "2020-07-17 19:35:27",
        "stripe_id": null,
        "card_brand": null,
        "trial_ends_at": null,
        "profile_pic": null,
        "license_front": null,
        "license_back": null,
        "photo_id": null,
        "profile_check_1": "1",
        "profile_check_2": "1",
        "profile_check_3": "1",
        "payment_counter": "2",
        "payment_del": "2",
        "status": "Approved",
        "role": "admin",
        "message": null,
        "sub_id": null,
        "sub_id2": null,
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": null,
        "storage": null,
        "delivery": null,
        "pickup": null,
        "active": null,
        "history": null,
        "staff": null,
        "parent_id": null,
        "staff_quantity": null,
        "record": null,
        "edits": null,
        "user_admin": "1",
        "items_admin": "1",
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": "1",
        "contact_counter": "0",
        "Admin_comments": null,
        "support_admin": "1",
        "support_counter": null,
        "card_last_four": null,
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 7,
        "name": "Test Aanif",
        "last_name": "Test Aanif",
        "email": "aanif1@hotmail.com",
        "email_verified_at": null,
        "phone": null,
        "dob": "14\/08\/1994",
        "unit": null,
        "street": null,
        "city": null,
        "zip": null,
        "doc_id": null,
        "doc_quantity": null,
        "key_id": null,
        "key_quantity": null,
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": null,
        "created_at": "2020-10-13 00:24:46",
        "updated_at": "2020-10-13 00:24:46",
        "stripe_id": "cus_IBoe6kzM3Er1ZN",
        "card_brand": null,
        "trial_ends_at": null,
        "profile_pic": null,
        "license_front": null,
        "license_back": null,
        "photo_id": null,
        "profile_check_1": null,
        "profile_check_2": null,
        "profile_check_3": null,
        "payment_counter": null,
        "payment_del": null,
        "status": null,
        "role": "customer",
        "message": null,
        "sub_id": null,
        "sub_id2": null,
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": null,
        "storage": null,
        "delivery": null,
        "pickup": null,
        "active": null,
        "history": null,
        "staff": null,
        "parent_id": null,
        "staff_quantity": null,
        "record": null,
        "edits": null,
        "user_admin": null,
        "items_admin": null,
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": null,
        "contact_counter": null,
        "Admin_comments": null,
        "support_admin": null,
        "support_counter": null,
        "card_last_four": null,
        "deleted_at": null,
        "delete_error": null
    },
    {
        "id": 8,
        "name": "Test Aanif",
        "last_name": "Test Aanif",
        "email": "aanif12@hotmail.com",
        "email_verified_at": null,
        "phone": null,
        "dob": "14\/08\/1994",
        "unit": null,
        "street": null,
        "city": null,
        "zip": null,
        "doc_id": null,
        "doc_quantity": null,
        "key_id": null,
        "key_quantity": null,
        "kname": null,
        "klast_name": null,
        "kemail": null,
        "kphone": null,
        "krelation": null,
        "delivery_info": null,
        "created_at": "2020-10-13 15:42:22",
        "updated_at": "2020-10-13 15:42:22",
        "stripe_id": "cus_IC3SrzkkKpH5LA",
        "card_brand": null,
        "trial_ends_at": null,
        "profile_pic": null,
        "license_front": null,
        "license_back": null,
        "photo_id": null,
        "profile_check_1": null,
        "profile_check_2": null,
        "profile_check_3": null,
        "payment_counter": null,
        "payment_del": null,
        "status": null,
        "role": "customer",
        "message": null,
        "sub_id": null,
        "sub_id2": null,
        "cname": null,
        "abn": null,
        "title": null,
        "sec_city": null,
        "sec_unit": null,
        "sec_street": null,
        "sec_zip": null,
        "sec_info": null,
        "sec_address_check": null,
        "message_counter": null,
        "storage": null,
        "delivery": null,
        "pickup": null,
        "active": null,
        "history": null,
        "staff": null,
        "parent_id": null,
        "staff_quantity": null,
        "record": null,
        "edits": null,
        "user_admin": null,
        "items_admin": null,
        "activereq_admin": null,
        "activereq_counter": null,
        "historyreq_admin": null,
        "message_admin": null,
        "scanreq_admin": null,
        "scanreq_counter": null,
        "scanhistory_admin": null,
        "contact_admin": null,
        "contact_counter": null,
        "Admin_comments": null,
        "support_admin": null,
        "support_counter": null,
        "card_last_four": null,
        "deleted_at": null,
        "delete_error": null
    }
]
```

### HTTP Request
`GET api/customer`


<!-- END_557e9e3130c6c860f72e537486feeff0 -->

<!-- START_a7939fdd65ae5c7feefe0680b2d5df86 -->
## api/add-payment-method/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/add-payment-method/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/add-payment-method/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/add-payment-method/{id}`


<!-- END_a7939fdd65ae5c7feefe0680b2d5df86 -->

<!-- START_ee244ebf39942e5d206a09e0bcf04060 -->
## Display a listing of the resource.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/subscription" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/subscription`


<!-- END_ee244ebf39942e5d206a09e0bcf04060 -->

<!-- START_4aa12a107404593f0820d6f2564dae9d -->
## Show the form for creating a new resource.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/subscription" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/subscription`


<!-- END_4aa12a107404593f0820d6f2564dae9d -->

<!-- START_dd5b45b4ef576431d0b158a03c0b325a -->
## Display the specified resource.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/subscription/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/subscription/{id}`


<!-- END_dd5b45b4ef576431d0b158a03c0b325a -->

<!-- START_fcce54cfa197329b921b521a67e33eec -->
## api/subscription/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/subscription/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/subscription/{id}`


<!-- END_fcce54cfa197329b921b521a67e33eec -->

<!-- START_2127e87b91b006795f94cf9e28009191 -->
## api/subscription1/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/subscription1/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription1/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/subscription1/{id}`


<!-- END_2127e87b91b006795f94cf9e28009191 -->

<!-- START_b8d13c6107c8079d029acc48117d2d2e -->
## api/subscription/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/subscription/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/subscription/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/subscription/{id}`


<!-- END_b8d13c6107c8079d029acc48117d2d2e -->

<!-- START_d3434259520bf954ff0ffc2b853dddfc -->
## api/retrieveInvoice/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/retrieveInvoice/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/retrieveInvoice/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/retrieveInvoice/{id}`


<!-- END_d3434259520bf954ff0ffc2b853dddfc -->

<!-- START_bac77814f6f7e9a1bab480f02526a63a -->
## api/getInvoice/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getInvoice/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getInvoice/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getInvoice/{id}`


<!-- END_bac77814f6f7e9a1bab480f02526a63a -->

<!-- START_b474c460a4d957d9d09a0736af04e1f0 -->
## api/paymentmethod
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/paymentmethod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/paymentmethod`


<!-- END_b474c460a4d957d9d09a0736af04e1f0 -->

<!-- START_d410e66aa940197b6ae66ec850f562af -->
## api/paymentmethod/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/paymentmethod/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/paymentmethod/{id}`


<!-- END_d410e66aa940197b6ae66ec850f562af -->

<!-- START_44f297b572220c2f1c4e137fdb28500d -->
## api/paymentmethod/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/paymentmethod/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/paymentmethod/{id}`


<!-- END_44f297b572220c2f1c4e137fdb28500d -->

<!-- START_4ccfa965f81788dc8aaeba00918df54d -->
## api/paymentmethod
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/paymentmethod" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/paymentmethod`


<!-- END_4ccfa965f81788dc8aaeba00918df54d -->

<!-- START_802c6f99451a4cf12d4b64ed0677e8db -->
## api/paymentmethod/{id}/attach
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/paymentmethod/1/attach" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod/1/attach"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/paymentmethod/{id}/attach`


<!-- END_802c6f99451a4cf12d4b64ed0677e8db -->

<!-- START_57f047248ae240da1fd77a1f349ee1a1 -->
## api/paymentmethod/{id}/detach
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/paymentmethod/1/detach" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentmethod/1/detach"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/paymentmethod/{id}/detach`


<!-- END_57f047248ae240da1fd77a1f349ee1a1 -->

<!-- START_4d35f99adc961d4878deb00c7e010daa -->
## api/customer/{id}/sources?object=card
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/customer/1/sources?object=card" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1/sources?object=card"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (405):

```json
{
    "message": "The GET method is not supported for this route. Supported methods: POST."
}
```

### HTTP Request
`GET api/customer/{id}/sources?object=card`


<!-- END_4d35f99adc961d4878deb00c7e010daa -->

<!-- START_59440cf5b0a69a10272123ebf86e6da2 -->
## api/customer/{id}/sources
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer/1/sources" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1/sources"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer/{id}/sources`


<!-- END_59440cf5b0a69a10272123ebf86e6da2 -->

<!-- START_6a6d05b69ffdae5833e0556a83a41752 -->
## api/customer/{id}/sources/{idc}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/customer/1/sources/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1/sources/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/customer/{id}/sources/{idc}`


<!-- END_6a6d05b69ffdae5833e0556a83a41752 -->

<!-- START_6b6a3e68fac76ebd0f20d4e9e025750f -->
## api/customer/{id}/sources/{idc}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer/1/sources/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1/sources/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer/{id}/sources/{idc}`


<!-- END_6b6a3e68fac76ebd0f20d4e9e025750f -->

<!-- START_649a06f0242ac0d7d3a185c494367acf -->
## api/customer/{id}/sources/{idc}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/customer/1/sources/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer/1/sources/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/customer/{id}/sources/{idc}`


<!-- END_649a06f0242ac0d7d3a185c494367acf -->

<!-- START_c01aa5e072bc1e1a4c180d24c1ed3641 -->
## api/paymentintent
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/paymentintent" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/paymentintent"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/paymentintent`


<!-- END_c01aa5e072bc1e1a4c180d24c1ed3641 -->

<!-- START_d80e8edd538f136cbfae4779abd61e96 -->
## api/send-code
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send-code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send-code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send-code`


<!-- END_d80e8edd538f136cbfae4779abd61e96 -->

<!-- START_efbb6e89a817ee24b67e4b5096398db8 -->
## api/verify-code
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/verify-code" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/verify-code"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/verify-code`


<!-- END_efbb6e89a817ee24b67e4b5096398db8 -->

<!-- START_5056f6e3a8d226612fe1029d9c89916b -->
## api/planView
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/planView" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/planView"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    {
        "id": 43,
        "name": "plan",
        "stripe_plan": "price_1GzLxgLPmIPXXFsFJoBPZjYG",
        "catagory": "keys yearly",
        "cost": 6900,
        "plan_class": "Basic",
        "quantity": 2,
        "upto": 2,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 44,
        "name": "plan",
        "stripe_plan": "price_1GzLxgLPmIPXXFsFJoBPZjYG",
        "catagory": "keys yearly",
        "cost": 8900,
        "plan_class": "Standard",
        "quantity": 4,
        "upto": 4,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 45,
        "name": "plan",
        "stripe_plan": "price_1GzLxgLPmIPXXFsFJoBPZjYG",
        "catagory": "keys yearly",
        "cost": 12900,
        "plan_class": "Professional",
        "quantity": 6,
        "upto": null,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 46,
        "name": "plan",
        "stripe_plan": "price_1GzLwRLPmIPXXFsFU6j5wzBP",
        "catagory": "docs yearly",
        "cost": 5900,
        "plan_class": "Basic",
        "quantity": 1,
        "upto": 1,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 47,
        "name": "plan",
        "stripe_plan": "price_1GzLwRLPmIPXXFsFU6j5wzBP",
        "catagory": "docs yearly",
        "cost": 7900,
        "plan_class": "Standard",
        "quantity": 3,
        "upto": 3,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 48,
        "name": "plan",
        "stripe_plan": "price_1GzLwRLPmIPXXFsFU6j5wzBP",
        "catagory": "docs yearly",
        "cost": 9900,
        "plan_class": "Professional",
        "quantity": 6,
        "upto": null,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 49,
        "name": "plan",
        "stripe_plan": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "catagory": "keys business",
        "cost": 3900,
        "plan_class": "Basic",
        "quantity": 5,
        "upto": 5,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 50,
        "name": "plan",
        "stripe_plan": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "catagory": "keys business",
        "cost": 6900,
        "plan_class": "Standard",
        "quantity": 10,
        "upto": 10,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 51,
        "name": "plan",
        "stripe_plan": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "catagory": "keys business",
        "cost": 10900,
        "plan_class": "Plus",
        "quantity": 20,
        "upto": 20,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 52,
        "name": "plan",
        "stripe_plan": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "catagory": "keys business",
        "cost": 23900,
        "plan_class": "Premium",
        "quantity": 50,
        "upto": 50,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 53,
        "name": "plan",
        "stripe_plan": "price_1Gwr8pLPmIPXXFsFPqNqFJeT",
        "catagory": "keys business",
        "cost": 45900,
        "plan_class": "Gold",
        "quantity": 100,
        "upto": null,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 54,
        "name": "plan",
        "stripe_plan": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "catagory": "docs business",
        "cost": 3900,
        "plan_class": "Basic",
        "quantity": 5,
        "upto": 5,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 55,
        "name": "plan",
        "stripe_plan": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "catagory": "docs business",
        "cost": 7900,
        "plan_class": "Standard",
        "quantity": 10,
        "upto": 10,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 56,
        "name": "plan",
        "stripe_plan": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "catagory": "docs business",
        "cost": 14900,
        "plan_class": "Plus",
        "quantity": 20,
        "upto": 20,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 57,
        "name": "plan",
        "stripe_plan": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "catagory": "docs business",
        "cost": 29900,
        "plan_class": "Premium",
        "quantity": 50,
        "upto": 50,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    },
    {
        "id": 58,
        "name": "plan",
        "stripe_plan": "price_1Gwr54LPmIPXXFsFJ8NQn60U",
        "catagory": "docs business",
        "cost": 49900,
        "plan_class": "Gold",
        "quantity": 100,
        "upto": null,
        "created_at": "2020-06-29 22:21:04",
        "updated_at": "2020-06-29 22:21:04"
    }
]
```

### HTTP Request
`GET api/planView`


<!-- END_5056f6e3a8d226612fe1029d9c89916b -->

<!-- START_770f887112c4555b959766bb3258671f -->
## api/getkey
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getkey" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getkey"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET api/getkey`


<!-- END_770f887112c4555b959766bb3258671f -->

<!-- START_fe4608c6140103658c811ba126970c17 -->
## api/storesession
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/storesession" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/storesession"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/storesession`


<!-- END_fe4608c6140103658c811ba126970c17 -->

<!-- START_ca2dbaf9fc774c62ec7db30905c709cc -->
## api/getsession
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getsession" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getsession"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
[
    null,
    null,
    null,
    null,
    null
]
```

### HTTP Request
`GET api/getsession`


<!-- END_ca2dbaf9fc774c62ec7db30905c709cc -->

<!-- START_60a5df3e24eee52e5b729d6c8a2f841d -->
## api/get-user-keys
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/get-user-keys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-user-keys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/get-user-keys`


<!-- END_60a5df3e24eee52e5b729d6c8a2f841d -->

<!-- START_a660fb06adfa939a629fecaa65d0dee5 -->
## api/add-key
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/add-key" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/add-key"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/add-key`


<!-- END_a660fb06adfa939a629fecaa65d0dee5 -->

<!-- START_1636c8aab43de3a9885846901888285e -->
## api/update-key/{key_id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/update-key/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/update-key/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/update-key/{key_id}`


<!-- END_1636c8aab43de3a9885846901888285e -->

<!-- START_ef46f844a318fa5dc0e0f18ab5b3ec83 -->
## api/delete-key/{key_id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/delete-key/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/delete-key/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/delete-key/{key_id}`


<!-- END_ef46f844a318fa5dc0e0f18ab5b3ec83 -->

<!-- START_a1a1905bb6097e2ffcb987cb58aeee73 -->
## api/updateKeyadmin/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateKeyadmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateKeyadmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateKeyadmin/{id}`


<!-- END_a1a1905bb6097e2ffcb987cb58aeee73 -->

<!-- START_44256c31b0b8464e2c4dec9dec663fb9 -->
## api/getAllKeys
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getAllKeys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getAllKeys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getAllKeys`


<!-- END_44256c31b0b8464e2c4dec9dec663fb9 -->

<!-- START_a9d7f9c59893345119547a9a1f19c369 -->
## api/getCountKeys
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getCountKeys" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getCountKeys"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getCountKeys`


<!-- END_a9d7f9c59893345119547a9a1f19c369 -->

<!-- START_e4c3ebbbd34cdadfe87e730887daf6f0 -->
## api/deleteItemk/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/deleteItemk/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deleteItemk/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/deleteItemk/{id}`


<!-- END_e4c3ebbbd34cdadfe87e730887daf6f0 -->

<!-- START_1d71112b964ff1db1ddff89a32beeb84 -->
## api/userKeyCounter/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/userKeyCounter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/userKeyCounter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
0
```

### HTTP Request
`GET api/userKeyCounter/{id}`


<!-- END_1d71112b964ff1db1ddff89a32beeb84 -->

<!-- START_f2db64f154a7d6c1ea3293f944dc9416 -->
## api/get-user-docs
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/get-user-docs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-user-docs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/get-user-docs`


<!-- END_f2db64f154a7d6c1ea3293f944dc9416 -->

<!-- START_f4b9d91bc5a1f918f1428b5e3212b2b8 -->
## api/add-document
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/add-document" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/add-document"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/add-document`


<!-- END_f4b9d91bc5a1f918f1428b5e3212b2b8 -->

<!-- START_48dd4035fc680d6ed5c8bf00d44a7612 -->
## api/update-doc/{doc_id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/update-doc/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/update-doc/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/update-doc/{doc_id}`


<!-- END_48dd4035fc680d6ed5c8bf00d44a7612 -->

<!-- START_e867e23f9bd9e426b1de88737b53611b -->
## api/delete-doc/{doc_id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/delete-doc/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/delete-doc/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/delete-doc/{doc_id}`


<!-- END_e867e23f9bd9e426b1de88737b53611b -->

<!-- START_f1d753d51144c86fe0541386a11a4ee2 -->
## api/updateDocadmin/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateDocadmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateDocadmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateDocadmin/{id}`


<!-- END_f1d753d51144c86fe0541386a11a4ee2 -->

<!-- START_d6e8d918fa2e50ca9090824091999e5d -->
## api/getAllDocs
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getAllDocs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getAllDocs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getAllDocs`


<!-- END_d6e8d918fa2e50ca9090824091999e5d -->

<!-- START_64a481482c1544a8013634d107672503 -->
## api/getCountDocs
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getCountDocs" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getCountDocs"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/getCountDocs`


<!-- END_64a481482c1544a8013634d107672503 -->

<!-- START_d970befd9debc0ff58ce376f9fd80d9b -->
## api/deleteItemd/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/deleteItemd/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deleteItemd/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/deleteItemd/{id}`


<!-- END_d970befd9debc0ff58ce376f9fd80d9b -->

<!-- START_e12b393609533d93b7132081d563fb2a -->
## api/userDocCounter/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/userDocCounter/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/userDocCounter/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
0
```

### HTTP Request
`GET api/userDocCounter/{id}`


<!-- END_e12b393609533d93b7132081d563fb2a -->

<!-- START_baaa65baa4c145c087e1c154381fa0d9 -->
## api/get-docs-for-pickup
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/get-docs-for-pickup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-docs-for-pickup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/get-docs-for-pickup`


<!-- END_baaa65baa4c145c087e1c154381fa0d9 -->

<!-- START_6995980fc3374de34b14dad8b064c20a -->
## api/get-docs-for-delivery
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/get-docs-for-delivery" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-docs-for-delivery"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/get-docs-for-delivery`


<!-- END_6995980fc3374de34b14dad8b064c20a -->

<!-- START_cc31de5a0086206e9ad3544622eb5659 -->
## api/get-keys-for-pickup
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/get-keys-for-pickup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-keys-for-pickup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/get-keys-for-pickup`


<!-- END_cc31de5a0086206e9ad3544622eb5659 -->

<!-- START_26d391948d2fd673cc7c2b6816194e97 -->
## api/get-keys-for-delivery
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/get-keys-for-delivery" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-keys-for-delivery"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/get-keys-for-delivery`


<!-- END_26d391948d2fd673cc7c2b6816194e97 -->

<!-- START_502e80b92a129e52251f4dc48da06559 -->
## api/create-pickup
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/create-pickup" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/create-pickup"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/create-pickup`


<!-- END_502e80b92a129e52251f4dc48da06559 -->

<!-- START_70d81f47dfaf0b739c21928fe2ea73c1 -->
## api/view-user-pickup-requests
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/view-user-pickup-requests" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/view-user-pickup-requests"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/view-user-pickup-requests`


<!-- END_70d81f47dfaf0b739c21928fe2ea73c1 -->

<!-- START_16860611231cdd3aadbccefa9896f2ec -->
## api/view-user-Pickup-history
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/view-user-Pickup-history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/view-user-Pickup-history"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/view-user-Pickup-history`


<!-- END_16860611231cdd3aadbccefa9896f2ec -->

<!-- START_47f60ff08d0f608e14b294b28affb919 -->
## api/updatePrequest/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updatePrequest/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updatePrequest/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updatePrequest/{id}`


<!-- END_47f60ff08d0f608e14b294b28affb919 -->

<!-- START_fad38a808e903d5ee3b62aef932a088e -->
## api/viewRequestsPick
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/viewRequestsPick" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/viewRequestsPick"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/viewRequestsPick`


<!-- END_fad38a808e903d5ee3b62aef932a088e -->

<!-- START_8450bdaa2d983b779c3a44884541d167 -->
## api/viewRequestsPickHistory
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/viewRequestsPickHistory" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/viewRequestsPickHistory"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/viewRequestsPickHistory`


<!-- END_8450bdaa2d983b779c3a44884541d167 -->

<!-- START_e2a035b5e4e5f67909c4e7a9cd0608a7 -->
## api/updateHistoryRequestpick/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateHistoryRequestpick/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateHistoryRequestpick/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateHistoryRequestpick/{id}`


<!-- END_e2a035b5e4e5f67909c4e7a9cd0608a7 -->

<!-- START_79a3476b0b502f71ebdecf97e3a81075 -->
## api/pickupCounter
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/pickupCounter" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/pickupCounter"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
2
```

### HTTP Request
`GET api/pickupCounter`


<!-- END_79a3476b0b502f71ebdecf97e3a81075 -->

<!-- START_67969f3af54b4e8afec42d2e2428d856 -->
## api/create-delivery
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/create-delivery" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/create-delivery"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/create-delivery`


<!-- END_67969f3af54b4e8afec42d2e2428d856 -->

<!-- START_6da75fa7b2bb05f73cc17db0b479f06b -->
## api/view-user-delivery-requests
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/view-user-delivery-requests" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/view-user-delivery-requests"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/view-user-delivery-requests`


<!-- END_6da75fa7b2bb05f73cc17db0b479f06b -->

<!-- START_8491d036e475cc1c233b608b36741cba -->
## api/user-update-items
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/user-update-items" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/user-update-items"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/user-update-items`


<!-- END_8491d036e475cc1c233b608b36741cba -->

<!-- START_63d97853438e8806716fa0d701d45194 -->
## api/view-user-delivery-history
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/view-user-delivery-history" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/view-user-delivery-history"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/view-user-delivery-history`


<!-- END_63d97853438e8806716fa0d701d45194 -->

<!-- START_7908030977ab154f9a8f90332e8b081c -->
## api/updateKrequest/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateKrequest/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateKrequest/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateKrequest/{id}`


<!-- END_7908030977ab154f9a8f90332e8b081c -->

<!-- START_e406432dabd03dcb0dd8879b3beba242 -->
## api/viewRequests
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/viewRequests" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/viewRequests"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/viewRequests`


<!-- END_e406432dabd03dcb0dd8879b3beba242 -->

<!-- START_184709048ba9bd40d183afed26d73927 -->
## api/viewRequestsHistory
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/viewRequestsHistory" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/viewRequestsHistory"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/viewRequestsHistory`


<!-- END_184709048ba9bd40d183afed26d73927 -->

<!-- START_7972695ce2473dd1f22784bd8ccc0acc -->
## api/updateHistoryRequestdel/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateHistoryRequestdel/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateHistoryRequestdel/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateHistoryRequestdel/{id}`


<!-- END_7972695ce2473dd1f22784bd8ccc0acc -->

<!-- START_662d156291d877eed7d3da5dc091274e -->
## api/deliveryCounter
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/deliveryCounter" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deliveryCounter"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
5
```

### HTTP Request
`GET api/deliveryCounter`


<!-- END_662d156291d877eed7d3da5dc091274e -->

<!-- START_f1c45a07ba7786e2f4d6853b83a0c932 -->
## api/getShippingLabel/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getShippingLabel/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getShippingLabel/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/getShippingLabel/{id}`


<!-- END_f1c45a07ba7786e2f4d6853b83a0c932 -->

<!-- START_41101469f27ff5107e9deff0e695368b -->
## api/getShippingLabelPro/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/getShippingLabelPro/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getShippingLabelPro/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (302):

```json
null
```

### HTTP Request
`GET api/getShippingLabelPro/{id}`


<!-- END_41101469f27ff5107e9deff0e695368b -->

<!-- START_ecef3e77e2d4dd47f441c2b774ca63d5 -->
## api/progress
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/progress" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/progress"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/progress`


<!-- END_ecef3e77e2d4dd47f441c2b774ca63d5 -->

<!-- START_1f12f15c0f67d5b787bc13c2d4ef8771 -->
## api/send/email
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/email`


<!-- END_1f12f15c0f67d5b787bc13c2d4ef8771 -->

<!-- START_da9c1e16ece3d5482429503159e22f2f -->
## api/send/emailorder
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/emailorder" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/emailorder"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/emailorder`


<!-- END_da9c1e16ece3d5482429503159e22f2f -->

<!-- START_8e4fe536cdf62e91552f1190a1592139 -->
## api/send/emailorderdel
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/emailorderdel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/emailorderdel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/emailorderdel`


<!-- END_8e4fe536cdf62e91552f1190a1592139 -->

<!-- START_f5675c6509fcb3a20f5e5c79180435af -->
## api/send/delivered
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/delivered" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/delivered"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/delivered`


<!-- END_f5675c6509fcb3a20f5e5c79180435af -->

<!-- START_09ba6709e1f173cb9d43d6a06012fdf8 -->
## api/send/secured
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/secured" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/secured"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/secured`


<!-- END_09ba6709e1f173cb9d43d6a06012fdf8 -->

<!-- START_167cc0c5c0b06dd4225f1fbffb83a33b -->
## api/send/newpick
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/newpick" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/newpick"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/newpick`


<!-- END_167cc0c5c0b06dd4225f1fbffb83a33b -->

<!-- START_9dff3c05100ecf6b371f30126e9abebb -->
## api/send/newdel
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/newdel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/newdel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/newdel`


<!-- END_9dff3c05100ecf6b371f30126e9abebb -->

<!-- START_ca3f9e954cdcfbf4a2432346715e6b16 -->
## api/send/mailInvoice
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/mailInvoice" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/mailInvoice"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/mailInvoice`


<!-- END_ca3f9e954cdcfbf4a2432346715e6b16 -->

<!-- START_4be5a288eb2df6ecf55182b1c697c20c -->
## api/send/scanRequest
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/send/scanRequest" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/send/scanRequest"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/send/scanRequest`


<!-- END_4be5a288eb2df6ecf55182b1c697c20c -->

<!-- START_95892b8a9832eb4eee585f460a48c34e -->
## api/message
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/message`


<!-- END_95892b8a9832eb4eee585f460a48c34e -->

<!-- START_b8d71c653d66bf0b51ce7091de8da796 -->
## api/user-messages
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/user-messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/user-messages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/user-messages`


<!-- END_b8d71c653d66bf0b51ce7091de8da796 -->

<!-- START_6435a0862b54e6aeaa2a282f21438189 -->
## api/message-mark-as-read/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/message-mark-as-read/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/message-mark-as-read/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/message-mark-as-read/{id}`


<!-- END_6435a0862b54e6aeaa2a282f21438189 -->

<!-- START_380a6d7e8c83d0d800d44e99baa67f1b -->
## api/check-new-messages
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/check-new-messages" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/check-new-messages"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/check-new-messages`


<!-- END_380a6d7e8c83d0d800d44e99baa67f1b -->

<!-- START_48421be0fe91e877def79f714f632ede -->
## api/delete-message/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/delete-message/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/delete-message/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/delete-message/{id}`


<!-- END_48421be0fe91e877def79f714f632ede -->

<!-- START_f2c9a3e9451b9323fd971dbf46e38c76 -->
## api/messageUserCount/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/messageUserCount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/messageUserCount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
0
```

### HTTP Request
`GET api/messageUserCount/{id}`


<!-- END_f2c9a3e9451b9323fd971dbf46e38c76 -->

<!-- START_ea8ba0d01b1c35fe3a7ca16fe58260de -->
## api/message
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/message" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/message"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/message`


<!-- END_ea8ba0d01b1c35fe3a7ca16fe58260de -->

<!-- START_f77e8cbf2db35562ade632f63fe53455 -->
## api/getStaff
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/getStaff" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getStaff"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/getStaff`


<!-- END_f77e8cbf2db35562ade632f63fe53455 -->

<!-- START_c793eb33b16f75d67f49eb868481781a -->
## api/emailCheck
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/emailCheck" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/emailCheck"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/emailCheck`


<!-- END_c793eb33b16f75d67f49eb868481781a -->

<!-- START_7987459151f569f8fbd9665c1288866c -->
## api/addStaff/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/addStaff/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/addStaff/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/addStaff/{id}`


<!-- END_7987459151f569f8fbd9665c1288866c -->

<!-- START_decf894d47c05c77304e5601fccb26e5 -->
## api/deleteStaff/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/deleteStaff/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deleteStaff/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/deleteStaff/{id}`


<!-- END_decf894d47c05c77304e5601fccb26e5 -->

<!-- START_15b92ef62e0fba941b16240943a11026 -->
## api/updateStaff/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateStaff/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateStaff/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateStaff/{id}`


<!-- END_15b92ef62e0fba941b16240943a11026 -->

<!-- START_d4e654b76d05c731b9b56bb9c2f3abfb -->
## api/getAdmin
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/getAdmin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getAdmin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/getAdmin`


<!-- END_d4e654b76d05c731b9b56bb9c2f3abfb -->

<!-- START_3002ae521504d773aed788d7ea3446e2 -->
## api/addAdmin/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/addAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/addAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/addAdmin/{id}`


<!-- END_3002ae521504d773aed788d7ea3446e2 -->

<!-- START_16f2f5a16e92107de46492b790d93961 -->
## api/deleteAdmin/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/deleteAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/deleteAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/deleteAdmin/{id}`


<!-- END_16f2f5a16e92107de46492b790d93961 -->

<!-- START_8237cae824f5c59173881672e2a27b0a -->
## api/updateAdmin/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateAdmin/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateAdmin/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateAdmin/{id}`


<!-- END_8237cae824f5c59173881672e2a27b0a -->

<!-- START_d07124c8c700f19b134eab75a79fc285 -->
## api/upload-file/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/upload-file/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/upload-file/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/upload-file/{id}`


<!-- END_d07124c8c700f19b134eab75a79fc285 -->

<!-- START_365befc34cd3c2b3db8ad22bd8ed62b0 -->
## api/scan
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/scan" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json" \
    -d '{"doc_id":"nam"}'

```

```javascript
const url = new URL(
    "https://127.0.0.1/api/scan"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "doc_id": "nam"
}

fetch(url, {
    method: "POST",
    headers: headers,
    body: body
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/scan`

#### URL Parameters

Parameter | Status | Description
--------- | ------- | ------- | -------
    `id` |  required  | The ID of the post.
#### Body Parameters
Parameter | Type | Status | Description
--------- | ------- | ------- | ------- | -----------
    `doc_id` | required |  optional  | integer The id of the documented to be scaned
    
<!-- END_365befc34cd3c2b3db8ad22bd8ed62b0 -->

<!-- START_15b20d7d2a93595cf49f1d877d0d3caa -->
## api/scanactive
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/scanactive" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/scanactive"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/scanactive`


<!-- END_15b20d7d2a93595cf49f1d877d0d3caa -->

<!-- START_fa28c21fccc93c4ff5e3e264a0d2f2c8 -->
## api/scanactiveCount
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/scanactiveCount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/scanactiveCount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/scanactiveCount`


<!-- END_fa28c21fccc93c4ff5e3e264a0d2f2c8 -->

<!-- START_dc927cfa2a478966873d998176fb9fa1 -->
## api/scaninactive
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/scaninactive" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/scaninactive"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/scaninactive`


<!-- END_dc927cfa2a478966873d998176fb9fa1 -->

<!-- START_88bdabaec7e659197b9f979f936002db -->
## api/completedRequest/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/completedRequest/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/completedRequest/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/completedRequest/{id}`


<!-- END_88bdabaec7e659197b9f979f936002db -->

<!-- START_25763b549260d7909d0957105b583217 -->
## api/createReset
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/createReset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/createReset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/createReset`


<!-- END_25763b549260d7909d0957105b583217 -->

<!-- START_d785abe17025685a1b6214ddb0ca1b48 -->
## api/checkEmail
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/checkEmail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/checkEmail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/checkEmail`


<!-- END_d785abe17025685a1b6214ddb0ca1b48 -->

<!-- START_c5c09eea683e6e67004134024bbb1b99 -->
## api/getemail
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/getemail" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getemail"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/getemail`


<!-- END_c5c09eea683e6e67004134024bbb1b99 -->

<!-- START_ee12e2ba60d80ac3ed53527091a5cd45 -->
## api/email-verification
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/email-verification" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/email-verification"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/email-verification`


<!-- END_ee12e2ba60d80ac3ed53527091a5cd45 -->

<!-- START_a49dcf841558de5c98811f4a813bf4ae -->
## api/getemailVerify
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/getemailVerify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/getemailVerify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/getemailVerify`


<!-- END_a49dcf841558de5c98811f4a813bf4ae -->

<!-- START_8a16c51cc7ea73e61601eb68e74b5074 -->
## api/emailExistsVerify
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/emailExistsVerify" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/emailExistsVerify"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/emailExistsVerify`


<!-- END_8a16c51cc7ea73e61601eb68e74b5074 -->

<!-- START_5dd4e58a5ea50628c59cb16950965070 -->
## api/createpayment
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/createpayment" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/createpayment"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/createpayment`


<!-- END_5dd4e58a5ea50628c59cb16950965070 -->

<!-- START_c649fe1b6e1950b8d36ee51ca80d1cbb -->
## api/get-payments
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/get-payments" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/get-payments"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/get-payments`


<!-- END_c649fe1b6e1950b8d36ee51ca80d1cbb -->

<!-- START_df546b7d65ae5469add6e44480be4f4a -->
## api/contact-form-message-create
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/contact-form-message-create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/contact-form-message-create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/contact-form-message-create`


<!-- END_df546b7d65ae5469add6e44480be4f4a -->

<!-- START_66ce2ffb5d5f0ee7285954c8ef3346c2 -->
## api/contactformget
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/contactformget" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/contactformget"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/contactformget`


<!-- END_66ce2ffb5d5f0ee7285954c8ef3346c2 -->

<!-- START_c43464dbdd86120000d5671e41710314 -->
## api/contactformdelete/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/contactformdelete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/contactformdelete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/contactformdelete/{id}`


<!-- END_c43464dbdd86120000d5671e41710314 -->

<!-- START_a8b790d9f0a80b4044a5044d18922eb0 -->
## api/contactformread/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/contactformread/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/contactformread/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/contactformread/{id}`


<!-- END_a8b790d9f0a80b4044a5044d18922eb0 -->

<!-- START_8fa26af2b2b393159749afaeeef56c07 -->
## api/contactformcount
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/contactformcount" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/contactformcount"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/contactformcount`


<!-- END_8fa26af2b2b393159749afaeeef56c07 -->

<!-- START_0e37266584cf6782ae75524c64fd6064 -->
## api/customer-support-create
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/customer-support-create" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/customer-support-create"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/customer-support-create`


<!-- END_0e37266584cf6782ae75524c64fd6064 -->

<!-- START_23b873022fe77f51f349cb469714f512 -->
## api/viewSupport
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/viewSupport" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/viewSupport"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/viewSupport`


<!-- END_23b873022fe77f51f349cb469714f512 -->

<!-- START_b04a9763e1bfdcd0c2d3027df301707c -->
## api/SupportRead/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/SupportRead/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/SupportRead/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/SupportRead/{id}`


<!-- END_b04a9763e1bfdcd0c2d3027df301707c -->

<!-- START_4e2603f4ebd280cc1bf3c09f765cab4d -->
## api/SupportDelete/{id}
> Example request:

```bash
curl -X DELETE \
    "https://127.0.0.1/api/SupportDelete/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/SupportDelete/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "DELETE",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`DELETE api/SupportDelete/{id}`


<!-- END_4e2603f4ebd280cc1bf3c09f765cab4d -->

<!-- START_0b429cba414e8a64f77888acfd9129b4 -->
## api/supportCounter
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/supportCounter" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/supportCounter"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (403):

```json
{
    "error": "Authorization Token not found"
}
```

### HTTP Request
`GET api/supportCounter`


<!-- END_0b429cba414e8a64f77888acfd9129b4 -->

<!-- START_146ba0c0a1d75c2ca5eed0a7bfc47879 -->
## api/updateSupportCount/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/updateSupportCount/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/updateSupportCount/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/updateSupportCount/{id}`


<!-- END_146ba0c0a1d75c2ca5eed0a7bfc47879 -->

<!-- START_8c8e86fc58e9aebdf9c426370de2ac2e -->
## api/pickLabel/{id}
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/pickLabel/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/pickLabel/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/pickLabel/{id}`


<!-- END_8c8e86fc58e9aebdf9c426370de2ac2e -->

<!-- START_3e03334cb275e0a25381c67fb097fbb2 -->
## api/pickupLabelCustomer/{id}
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/api/pickupLabelCustomer/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/pickupLabelCustomer/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET api/pickupLabelCustomer/{id}`


<!-- END_3e03334cb275e0a25381c67fb097fbb2 -->

<!-- START_ff39ca1142d6f4153ccb40185465f1ad -->
## api/webhook/test
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/webhook/test" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/webhook/test"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/webhook/test`


<!-- END_ff39ca1142d6f4153ccb40185465f1ad -->

<!-- START_19ff1b6f8ce19d3c444e9b518e8f7160 -->
## api/auth/logout
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/auth/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/auth/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/logout`


<!-- END_19ff1b6f8ce19d3c444e9b518e8f7160 -->

<!-- START_a925a8d22b3615f12fca79456d286859 -->
## api/auth/login
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/auth/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/auth/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/login`


<!-- END_a925a8d22b3615f12fca79456d286859 -->

<!-- START_2e1c96dcffcfe7e0eb58d6408f1d619e -->
## api/auth/register
> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/api/auth/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/api/auth/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST api/auth/register`


<!-- END_2e1c96dcffcfe7e0eb58d6408f1d619e -->

<!-- START_1f59f4e41942dfc42e4c7374332efe8c -->
## plans
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/plans" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/plans"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET plans`


<!-- END_1f59f4e41942dfc42e4c7374332efe8c -->

<!-- START_66e08d3cc8222573018fed49e121e96d -->
## Show the application&#039;s login form.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET login`


<!-- END_66e08d3cc8222573018fed49e121e96d -->

<!-- START_ba35aa39474cb98cfb31829e70eb8b74 -->
## Handle a login request to the application.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST login`


<!-- END_ba35aa39474cb98cfb31829e70eb8b74 -->

<!-- START_e65925f23b9bc6b93d9356895f29f80c -->
## Log the user out of the application.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST logout`


<!-- END_e65925f23b9bc6b93d9356895f29f80c -->

<!-- START_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->
## Show the application registration form.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET register`


<!-- END_ff38dfb1bd1bb7e1aa24b4e1792a9768 -->

<!-- START_d7aad7b5ac127700500280d511a3db01 -->
## Handle a registration request for the application.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/register" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/register"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST register`


<!-- END_d7aad7b5ac127700500280d511a3db01 -->

<!-- START_d72797bae6d0b1f3a341ebb1f8900441 -->
## Display the form to request a password reset link.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset`


<!-- END_d72797bae6d0b1f3a341ebb1f8900441 -->

<!-- START_feb40f06a93c80d742181b6ffb6b734e -->
## Send a reset link to the given user.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/password/email" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/email"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/email`


<!-- END_feb40f06a93c80d742181b6ffb6b734e -->

<!-- START_e1605a6e5ceee9d1aeb7729216635fd7 -->
## Display the password reset view for the given token.

If no token is present, display the link request form.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/password/reset/1" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/reset/1"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (200):

```json
null
```

### HTTP Request
`GET password/reset/{token}`


<!-- END_e1605a6e5ceee9d1aeb7729216635fd7 -->

<!-- START_cafb407b7a846b31491f97719bb15aef -->
## Reset the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/password/reset" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/reset"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/reset`


<!-- END_cafb407b7a846b31491f97719bb15aef -->

<!-- START_b77aedc454e9471a35dcb175278ec997 -->
## Display the password confirmation view.

> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (401):

```json
{
    "message": "Unauthenticated."
}
```

### HTTP Request
`GET password/confirm`


<!-- END_b77aedc454e9471a35dcb175278ec997 -->

<!-- START_54462d3613f2262e741142161c0e6fea -->
## Confirm the given user&#039;s password.

> Example request:

```bash
curl -X POST \
    "https://127.0.0.1/password/confirm" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/password/confirm"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "POST",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```



### HTTP Request
`POST password/confirm`


<!-- END_54462d3613f2262e741142161c0e6fea -->

<!-- START_65f6b0a8a59bac52b08354f9ab7dada2 -->
## pickLabel
> Example request:

```bash
curl -X GET \
    -G "https://127.0.0.1/pickLabel" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "https://127.0.0.1/pickLabel"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers: headers,
})
    .then(response => response.json())
    .then(json => console.log(json));
```


> Example response (500):

```json
{
    "message": "Server Error"
}
```

### HTTP Request
`GET pickLabel`


<!-- END_65f6b0a8a59bac52b08354f9ab7dada2 -->


