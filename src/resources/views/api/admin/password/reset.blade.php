<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

   <div>hello user you can reset password from <a href= {{ env("APP_URL")."/api/$type/changepassword/$code" }}>here</a></div>


</body>
</html>
