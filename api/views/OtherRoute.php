<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Other Route</title>
    <script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>
</head>
<body>
    <h1>Hello this is the Other Route</h1>
    <h4>Cool kids check the console</h4>
    <script>
        var container = $(".container");

        $(document).ready(function(){
            $.get("/", (data) => {
                console.log("Presenting you the API info:");
                console.log(data);
            });
        });

    </script>
</body>
</html>