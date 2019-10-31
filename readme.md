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

### Adding routes
How do you add a route with this router?
Reference <https://github.com/pmma1312/myRouter/blob/master/api/core/Route.php>
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

How do you add a route with parameters?
```PHP
# This will add a "GET" Route to the URI "/user/{id}"
# The parameter has to be a regex for what we're looking for
# since the Route class matches the Route via regex
Route::get("/user/([0-9]+)", function(){
    # Do whatever you want with the route
});
```