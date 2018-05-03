<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="/css/app.css">
        <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
        <style>
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        .main{
            text-align:center;
        }
        </style>
    </head>

    <body class="main">
        <img src="http://18.218.188.239/adam.png" alt="" class="logo" />
        
        <div style = "margin-top:30px">
            <p>Dear {{Auth::user()->name}},</p>
            <p>Greetings.</p>
        </div>

        <h1 style="font-style: italic;">Congratulations!</h1>

        <div style = "margin-top:30px">
            <p>You have successfully activated your Therapy portal account. You can now login to access the resources.</p>
        </div>

        <div style = "margin-top:30px">
            <p><strong>Link:&nbsp;&nbsp;&nbsp;</strong><a href="{{ URL::route('logout') }}" class="button">Access my account</a></p>
            <p><strong>Username:&nbsp;&nbsp;&nbsp;</strong>Your registered email address</p>
            <p><strong>Password:&nbsp;&nbsp;&nbsp;</strong>The password you choose during account activation</p>
        </div>
        <div style = "margin-top:60px">
            <p>We recommend Keeping your credentials secure and do not share with anyone.</p>
        </div>
        <div style = "margin-top:60px">
            <p><strong>Support Team</strong></p>
            <p>Adam Vital Physiotherapy & rehabilitation center</p>
            <p>T: +971 4 2515000 | F: +971 4 2515522</p>
            <p>Address: Index Holding Building, Nad Al Hamar Road, Dubai, UAE</p>
            <p>P.O. Box 76800</p>
        </div>
    </body>
</html>