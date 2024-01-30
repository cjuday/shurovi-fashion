<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" device="ie=edge">
        <title>{{$subject}}</title>
    </head>
    <body>
        A new <b class="color:red">email</b> recieved from contact page.<br/><br/>
        Details are as following:<br/><br/>
        From    : {{$mail}}<br/>
        Name    : {{$name}}<br/>
        Subject : {{$subject}}<br/>
        Message : {{$body}}<br/><br/>

        Reply to the <b>From email</b> to reach out the client.
    </body>
</html>