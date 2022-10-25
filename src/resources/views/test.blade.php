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

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzk1YTQ4Ni05NmYxLTRkMzQtYmMyNS0xMGFjOWFjMzdlNDgiLCJqdGkiOiJlOGU0YjAyOGZlMTVhOWE4ZjE2MGE3ZmY0MDhhMDc1NGFmZjAyYzk2YWMwNjQwYjFhYzQzMTRjZDE3ZGNkMTlhMzdlZDcyOWE3ODFiOTFlYSIsImlhdCI6MTY2NjY4OTczOC40MDg2OTMsIm5iZiI6MTY2NjY4OTczOC40MDg2OTcsImV4cCI6MTY2NjY5MzMzOC4yOTkwNzYsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.edxB-9Tar3SA2tCWtGKp51g1-sTM6vqgSTbbS3l8092CapDQr9QnTswAe5kkrUQuk51nfAzYxEXe2E3j4SXGEyUjZAmQ_QY9zWnPbU1hEWxaTtkVl6n4N8-HFTmoqHPUIxYosp2tksvSqNnsdYufuFBTWZGgMq7kyk9jLg9zHIFxRAzuTCjtfobsiN7yxKCcLI5Pa7FztAaHfRUXF8AnL91u-jNAxw42CnTxM8nJTiBz-J1kH1B7pLu4g90MT55C9GqwGFXfJfBA2AqbY5RyVgr5O7gRwdS8KjhxHEnBOVdLOyJpziezzj6B6CkUy4Sn58QItBYwQUxf8kxDlJDJ8mGl2sM0lWfpCnVS26ogvwa5fqvnuKBiOerYABG4kCYqqkmdF76SQekgvSFCdfLl7mg2pxaChWAxUFbLoV5BKhAQVJmILMzbOnLzviTL42CuFBR4M83VtCMnuluOUVFx1C3oZEgQFfHcd5jpTvZCqBwoJKscZQVbz2PV5B85ik4B05wse2eQ90nhmVXjhnoGWNLcPOPNti1uad-XP4b0DmzTPmINdPLchHrbjMJQhvmhRRM7CEmAmkrZAN0q4fiBN54OtxQNGasEy-1Oz6Fp0RJ5qxaFM1vMrIcwh0-4fXO_EtLGbsMKprR_ZqfAYgywmktBg3YX9ZePCnXeH_zKpss&type=1"
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
