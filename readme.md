myRouter basic documentation
======
### Initializing the router
The Router has always to be initialized with the
following include.
```php
# Include the autoloader to dynamically load classes
# and build the Route
include("autoloader.php");
```

If you don't want to use the
autoloader you can initialize the router via the following function
```php
Route::build();
```

### Adding web routes
How do you add a route to this router?
```php
# This will add a "GET" Route to the URI "/"
# The Route will just print "Hello World!"
Route::get("/", function(){
    print("Hello World!");
});
```

How do you add a route with multiple HTTP methods?
```php
# This will add a "PUT" and "POST" Route to the URI "/foo"
# The Route will print the request method
Route::multiple(["PUT", "POST"], "/foo", function(){
    print($_SERVER['REQUEST_METHOD']);
});
```
#### API routes
API and web routes are split up in different files
all API routes belong to the file "api/api.php" and all
web routes belong to "api/web.php"

How do you add a route with parameters?
```PHP
# This will add a "GET" Route to the URI "/user/{id}"
# The parameter has to be a regex for what we're looking for
# since the Route class matches the Route via regex
Route::get("/user/([0-9]+)", function(){
    # Do whatever you want with the route
});
```

How do you add a route with a middleware?
```PHP
# This will add a "POST" Route with the middleware Auth::isAuthorized
# which checks if the user is authorized.
Route::post("/user/upload/video", function() {
    # Do whatever needs to be done
}, "Auth::isAuthorized");
```

I also added three classes to manage sessions, database connections and login. They work like following.
##### Session
```PHP
# This will get the instance of the session class
$session = Session::getInstance();

# If you want to set a new session variable
# you have to do it like this:
$session->setSessionVar("key", "value");

# If you want to get a session variable
# the following code will do it for you
# this will return "value" from the 
# newly added session variable
$session->getSessionVar("key");

# If you want to destroy the session 
# you have to do it like this:
$session->destroy();
```
##### Database
To work with the database class you have to adjust the constants in the config file accordingly to your needs
```PHP
# This will get the instance of the database class
# we'll directly pull the connection var out of that class
# with the following code:
$conn = Database::getInstance()->getConn(); 

# Now you can use the conn like you're used to
# since it's a mysqli object instance
```
##### Login
To work with the login class you have to adjust the constants in the config file accordingly to your needs
```PHP
# Initialize the instance of the login class
# the username will be sanitized
# within the login class so you don't have to
# worry about that
$login = new Login("username", "password");

# To check if the user has supplied a valid
# username/password combination use the following function
if($login->isLoginValid()) {
    # the session variable "isLogged" got set to true
    # display a success message
} else {
    # display an error message
}

# If you want to check on auth only pages
# if the user is logged in you have to use
# the corresponding function in the session class
$session = Session::getInstance();

if($session->isLoggedIn()) {
    # the user is logged in all good
} else {
    # block the user from viewing the content
}

```