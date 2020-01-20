<div class="mail">
    <div class="header">
        <h2>rainierlaan.nl</h2>
    </div>
    <div class="mail-body">
        <div class="content">
            <h1>Hey!</h1>
            <p>You have received a new message in your inbox. The message has been sent by:</p>
            <p><b>Full name: </b> {{ $wholeMessage->firstname }} {{ $wholeMessage->lastname }}</p>
            <p><b>E-mail:</b> {{ $wholeMessage->email }}</p>
            <p>To view the message click the button below</p>
            <a href="rainierlaan.test/dashboard/messages">See message</a>
            <p>Kind regards,</p>
            <p>Rainier laan</p>
        </div>
    </div>
    <div class="footer">
        <p>@2020 rainierlaan.nl All Rights Reserved</p>
    </div>
</div>

<style>
    .mail {
        background: #efefef;
    }
    .mail .header {
        padding: 10px;
        text-align: center;
    }
    .mail .footer {
        padding: 10px;
        text-align: center;
    }
    .mail-body {
        background: white;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .mail .mail-body .content {
        width: 50%;
        padding: 30px;
    }
</style>
