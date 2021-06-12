What is JWT
JWT stands for JSON Web Token and comprised of user encrypted information that can be used to authenticate users and exchange information between clients and servers.

When building REST API, instead of server sessions commonly used in PHP apps we tokens which are sent with HTTP headers from the server to clients where they are persisted (usually using local storage) then attached to every outgoing request originating from the client to the server. The server checks the token and allow or deny access to the request resource.

RESTful APIs are stateless. This means that requests from clients should contain all the necessary information required to process the request.

If you are building a REST API application using PHP, you are not going to use the $_SESSION variable to save data about the client's session.

This means, we can not access the state of a client (such as login state). In order to solve the issue, the client is responsible for perisiting the state locally and send it to the sever with each request.

Since these important information are now persisted in the client local storage we need to protect it from eyes dropping.

Enter JWTs. A JWT token is simply a JSON object that has information about the user. For example:

{
    "user": "bob",
    "email": "bob@email.com",
    "access_token": "at145451sd451sd4e5r4",
    "expire_at"; "11245454"
}
Since thos token can be tampered with to get access to protected resources. For example, a malicious user can change the previous token as follows to access admin only resources on the server:

{
    "user": "administrator",
    "email": "admin@email.com"
}
To prevent this situation, we JWTs need to be signed by the server. If the token is changed on the client side, the token's signature will no longer be valid and the server will deny access to the requested resource.

How JWT Works
JWT tokens are simply encrypted user's information like identifier, username, email and password.

When users are successfully logged in the server, the latter will produce and send a JWT token back to the client.

This JWT token will be persisted by the client using the browser's local storage or cookies and attached with every outgoing request so if the user requests access to certain protected resources, the token needs to be checked first by the server to allow or deny access.

What is PHP-JWT
php-jwt is a PHP library that allows you to encode and decode JSON Web Tokens (JWT) in PHP, conforming to RFC 7519.