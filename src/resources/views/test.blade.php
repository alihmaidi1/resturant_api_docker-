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

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzc5NWJlOS0wNWI5LTRkYzEtOWM3Yy0xMGVlOTY5MTAzYTciLCJqdGkiOiI3MmYxYzAwNTQzZjc1NGRiY2FlZjFjOWRhYTQ5YzA3ZWU4ODBhODgxNzA3NDkzODNhNjI5ZGRjNzFmMzIzZmM2ODgxYTdkMDc5YzU1MWZiNCIsImlhdCI6MTY2NTU2Mzk1MS41NDUxODYsIm5iZiI6MTY2NTU2Mzk1MS41NDUxOTEsImV4cCI6MTY2NTU2NzU1MC45ODI4NTUsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.TFZCyOfupc4kwk9nEy4S8pXkmpTYsgtTbkbDOsAy8EjicZFxnmD1_4GTwzzUzhhGBUu8hTfNutY3LUlkMdlX6B-Ohbns7El2im4z4LGBxskB0oyVDCw6nYlTjKS5hWKSa4hl53DZbUytPNa-yLm8a9SjkJvrvp-7OUNwqruFEpIHiB6uWnideswTX89HaXNZs3pcCkgPnMPh5Spz9sEHhk6xVOYrZSWT8Z2VqNqmubRPmR_r5KM7w08eSJf2nhIc9sgGg_ted8_u5-yZL5T5YaP7hpVkZ1FIet-P1un2IKVqt9e0SUxhGITAiVm8iQAa7QOHEs6mO4rnTNyyjR2y6nIEkjc-DY0IhW0HlZi9sXjFtJcabiyKIbj5-NJFg2a9xMkaBUJtW24bghvu2croUgt3sF2BgMRQVNR2qjLFsHk-fGwROmA7FK7BEwjXISFVSt20p_2FX0RwSTu5waUzCvthgIN-YkPPjPJlEiZ1GmL_zck4kiakJUD7HxXAlXROOSakm-_1J7Ij0FhcBguf9K-JYmwBdlP0nOTqTXWa62t0eBV2H6UTBEu1DH0qz5WyjTIELw2izcB0dDKbzhjPqVYbYnJ6v-aaJMRloxCyZMBzYJTB8qFX_2mmw44GjA1oXgHS8o6dF9oTA3DPYFYGJlchg_GAUxLk5AMB3in6R_A&type=1"
        });
        console.log(socket)
        socket.on("new message",(data)=>{

            console.log(data)
        })
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
