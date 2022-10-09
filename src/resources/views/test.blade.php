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

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzc0MmM0ZS1jNWIwLTRlZTctYTJmYS0yMDY4ODM4N2NjMjIiLCJqdGkiOiIyODVlNGM4MDAwYzQ4NmZjNDE0NWNmZTBlYTAwMmRhMWQ1MzFkOTMxOTg5N2M0YmJhNTljZDEwMTVhZTM4OTMzMzRjZDJmZTJkMGE2YWNhYyIsImlhdCI6MTY2NTMyNjU3NC4xODgyODEsIm5iZiI6MTY2NTMyNjU3NC4xODgyODQsImV4cCI6MTY2NTMzMDE3NC4xMTgzNTcsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.c8-0SN8j9CpZiHXKgpKJFanOir-GhJQ7FvmlN2Lbs1eGoE3OG60K85L0IwDCiXLHzeLCizRmlc-fjGAvjurYGo50AEUCpFOS-H2QOl81IHEUjTBtk1EmflXINQr-pAVS89WQ-ivdPsM8xGbphOjvXcjZHEpmOCRT4hSvCrhZl3YAGk7qeKDY77_ksCG_WQAmeuOAbfiC_gnShTWnzwZqZMAixEoOph_avo7n4wmC9QSuzyNi1g02y_GVTLWCYGtqDx60yZ4CPQaoqe1LRTc0zbi-K95orV1x4uCI4obcghhw6K5KSdHY91vboOK-AM9ydIz7LO0CZwGox7Rg0y5hjsE5p9mb1aeqSMFOMfBnWBYN1llFcG9mR_NXBOIPcPhdq8BRM2TBit7t2DwZNS3rNueCmMZXc9YVL1FoQmGHrEH4zFCmNEYj89gb5YP0FdsvQ-2Z71INXSMvIHZCKHSaJViByJrXZq2EVLR5tDxanW33CX2fpiuK-dnpmYv8e4EqUE5fp4vthv05HUi3bIImh-zG1Qm-BYj4X2NFY6i-n8l3Sb0ZTqIDV2H2tf0h8H-ex7JllAcr1d8xmsL6H50G7tbY7oAUBs6TdTRz9OKhWv6NlX8owY58AEnnDd31tNOQQ96cqFH1gXoQJS3TQTtPOA17u2H8px5RUSu5RDsVNXc&type=1"
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
