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

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzc0MmM0ZS1jNWIwLTRlZTctYTJmYS0yMDY4ODM4N2NjMjIiLCJqdGkiOiI4Njg2Zjc5NDUxZDAwYjMwYTQ3NjI2M2RhYWQ1ZWZmOTI5N2UxZWRiYTUwMzZlMWJmYTFjMzdlNjA4NGI2ODE5ZjNmODE4ZmI0N2JjNzAzNiIsImlhdCI6MTY2NTM0MDAwNy40NzAwMDYsIm5iZiI6MTY2NTM0MDAwNy40NzAwMSwiZXhwIjoxNjY1MzQzNjA3LjEzODI2Niwic3ViIjoiMSIsInNjb3BlcyI6W119.K3pik1ac-AwlIAoUdS5F6q7au_9l7iCW1Vct48gTed39CeqGEba_Fy67iGPZb6sa4ac-8x98zoVG-RB59XwNNUv8s2Oi_DzwLNgC9puLWg7O6hAb5pGGGxQxgD7VSqHFhwmfvtNq0FOeSNjv0n0eJ16jZjsyxi-f1Op3JAcRFd8NOu1Dq6zvTStoA2tL3R5HFwYQ4MtaymntyVOx6xFEjrlOGEasCr9Q7G1SNkchzHESW_ATgUZEmQTuYAVFlpdybKhmQlof2BGEXAmx7KiGdAL3fpHojWHfX-g_8CYpX8KvwciAArocagvJdUQ6sSR2VWSlwW14nWSsurOuDhsfzKWJSy4h6S3dlXcyHzHxgsPvBiKDPyIscTii_dNDH4Zg3OWCFyvSGtdOTiuwmCJ2lTy94InlqGXYSrmDdqxmpG8gvk8vNe6AolLWDRIqNoLc_lSyRfV22v9HFfG1NyCxOyj3RJb5ihacCynLYgtA6w2_Zj1iXtS7DEU1B8vmSrs6kdX2ttSHfdwQ2JL4-Q0mtPLPxABFLtEkq4KGD2Cq8cPiLov-Spe_aNZKRigwwY1J5B9sztAbRMqnLVM7Tkt7ju72pVffu_FfYZbtDHrG-ZgobaZtnbF5fO3HfF8HCrkxHvM4TE4O2m7Q0YeIV92nBQ6QOblvVT-N9S9weWQ3sh8&type=1"
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
