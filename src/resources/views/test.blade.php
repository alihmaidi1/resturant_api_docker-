<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.5.2/socket.io.min.js"></script>
    <script>

        var socket=io.connect("http://localhost:5000",{

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzc0MmM0ZS1jNWIwLTRlZTctYTJmYS0yMDY4ODM4N2NjMjIiLCJqdGkiOiJmMzJjYWRlNGUwMTA5NmM2MTk1NjkxZmQ5NmU5OTYxMDk2OWNlMzljYjI2ZDA1ZWI5N2ZiZmEyNGM2ODA0MTExMWM3ODhkZWZiMjdjNzE3YiIsImlhdCI6MTY2NTMxODY5Ny4zNzAwMzEsIm5iZiI6MTY2NTMxODY5Ny4zNzAwMzQsImV4cCI6MTY2NTMyMjI5Ny4zMDA5NDksInN1YiI6IjEiLCJzY29wZXMiOltdfQ.oHdTcirgxVgVYeSo3DzLnBpJSOf_G1tNH-TjgIsuZ-OicboPZqLsKTHB26i_OM6E4IE9Cr4uqvAl-9sY0qx6h1vB6CsrFnJI67abGYmmgejRv9_grLnirzj2yLD_VAvtfxO9CtvFo25HV8Z002SgFECHGCj_MZkQL1FVRDHmEBqiYImc6MaD4rE4VWVe6pQeiV0bVelj-ogW_FX9XrYSZlofq6LxaQIlyF9r25TlEZyJZm6yqi0pulWm0jp3ZPxLg0Pe_-r_xNp6qnp-famkzGwAbvTRR-W8jmdkFMbRAajH7MjUTWv1hbT-MvQLNMO8lBmmtZbr6OEBNEmuafIf71Tryz0Rf2hsBLPQ6nxLNYT9WNqYFml_BVVIc-OA-xKQiMX9WQKRvsxAAwz1dD_FUw8XHqd3dbW2sE3J7w-zJaMoOMsD_hQm-FOU_7lIdXZruN8YbresKIXkfqfpl2uoez-Aq_yA23moIncqQEXMaOXd_eZVsowYrCqbSCp-2K-tFgm9M64K50WXjYRXk2d7s3H0D_-X0TNqcVxObgi8ZOO3eeB52y3l_IAlRmBQ4kxfMoXkGPptOqnNTcDGcpbwaPU7JeEMq1btq8B5-Cz67rg8QUANzWl-96ZoMJd13fRBNix4cw397Y2Js_zxyMBaSwFkFYLWEILRzhzynlh1X_0&type=1"
        });
        console.log(socket)

        socket.on("connect_error", (err) => {
            console.log(err); // prints the message associated with the error
          });
    </script>

</head>
<body>

        <h1>hello world from Socket io</h1>

        <script>

            var userId=1;
            var userName="ali Hmaidi";

        </script>

    </body>
</html>
