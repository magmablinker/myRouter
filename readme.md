myRouter basic documentation
======
### Initializing the router
The Router has always to be initialized with the
following function and include.
```php
# Include the autoloader to dynamically load classes
include("autoloader.php");

# We have to do this because we can't assign
# static variables dynamically without helper
Route::build(); 
```

### Adding routes
How do you add a route with this router?
Reference <https://github.com/pmma1312/myRouter/blob/master/api/core/Route.php>
```php
# This will add a "GET" Route to the URI "api/"
# The Route will just print "Hello World!"
Route::get("/", function(){
    print("Hello World!");
});
```

How do you add a route with multiple HTTP methods?
```php
# This will add a "PUT" and "POST" Route to the URI "api/foo"
# The Route will print the request method
Route::multiple(["PUT", "POST"], "/foo", function(){
    print($_SERVER['REQUEST_METHOD']);
});
```