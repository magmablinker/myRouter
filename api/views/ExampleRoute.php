<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Example Route</title>
</head>
<body>
    <h1>Example Route</h1>
    <hr>
    <pre>
        <?php
            for($i = 0; $i < 15; $i++) {
                for($l = $i; $l > -3; $l--) {
                    print(" ");
                }
                for($j = 0; $j < $i; $j++) {
                    print("😎");
                }
                print("<br>");
            }

        ?>
    </pre>
    <p>Cool Route</p>
</body>
</html>