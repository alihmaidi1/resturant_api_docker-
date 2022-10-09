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

            query:"token=eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5Nzc0MmM0ZS1jNWIwLTRlZTctYTJmYS0yMDY4ODM4N2NjMjIiLCJqdGkiOiIwNjlhYTQ0MzEwN2Y2MjVlNGRlM2FmNDc5ZTYyMDUxMmQ2MjcxZWViNjc3Mjg0ZjE4YTRmNjEyMDdlMjc0OTZmMmRmZTM3YzEzZWY2NzdkMiIsImlhdCI6MTY2NTMzMjAwNC4wODYyOTMsIm5iZiI6MTY2NTMzMjAwNC4wODYyOTcsImV4cCI6MTY2NTMzNTYwMy43ODMxOTQsInN1YiI6IjEiLCJzY29wZXMiOltdfQ.MJJKhjJ0rDWD1HtUUElVREoOHcAmrEik9cpRCbisdJWBAYU_jM7kxasIC8dldzNonKZ1mA0AuPRIkWBeGtyyjmKFUYF_qnfHor8bN_asO9wr8gQs5T82YGDbKwlxGDL12itIR98x1eCL1GzxRKE851Acc6Uyz0DfPz0EYC-mp3ddVTntijQgPRF-vURIvcX9y2dAuBXi6-MFLre3dOiGCJhef_2VdfCIP98bRmu0gC-K4315s4D5yP4pgIEEizZxOWFEZpu0YwztQ-IW5faArxB4p9BXw_77denZCYmHNBJV2wfLI4bOEz4u5UJMrQfT4RLU_e-2juGUOSoC9BcsN66XclqD5J41ykJksSE6qGrh1vqonIa0I6_XSlSmaU4y5KYr0rkA8ZjxIgFNfLDNL8giyL0vWOswzVSC4Hlh301R3YmbUQ6rzCqS7-QuAn8sk41BnCvTmknkgYab1W4bmVW0nwh0mD2wzmrEyM_lLOKxtor15QyhlV1cF1gj3vEEVH1qZUAC49cwtIbv6-XXiWXdZeKRNOGyhFqwkGXk_oepBPfcb3DwqROwCQUHUZ3cy9FOiyaqefo1APDsMga7e2Ih9jKBkpVGy9jQMqKWJvgwqRU17tHHilNzF-Hk35LRU89BPmcr10SJPdNutFod-R2weJiVJpeWyd9s_hgPi40&type=1"
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
