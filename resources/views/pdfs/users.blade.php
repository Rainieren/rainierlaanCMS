<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Users</title>

</head>

<body>
<div class="header">
    <div class="logo">
        <img src="https://globalgoalsoss.nl/wp-content/uploads/2018/02/img-placeholder.png" width="200" height="100">
    </div>
    <div class="company-info">
        <p class="mar-0"><b>Rainier laan</b></p>
        <p class="mar-0">Antillenstraat 1-11</p>
        <p class="mar-0">9714JT, Groningen</p>
    </div>
</div>
<div class="sub-header">
    <div class="creator-info">
        <p  class="mar-0" style="color: #0052CC">Gemaakt door:</p>
        <p class="mar-0">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
    </div>
    <div class="created-info">
        <p  class="mar-0" style="color: #0052CC">Datum aangemaakt:</p>
        <p class="mar-0">{{ date("Y/m/d") }}</p>
    </div>
    <div class="total-users">
        <p  class="mar-0" style="color: #0052CC">Aantal gebruikers:</p>
        <h2 class="mar-0">{{ count($users) }}</h2>
    </div>
</div>

</body>

<style>
    body {
        font-family: "Nunito", sans-serif;
    }
    .mar-0 {
        margin: 0;
    }

    .header {
        width: 100%;
        margin-bottom: 20px;
        position: absolute;
        top: 0px;
    }
    .header .logo {
        padding: 10px;
        width: 50%;
        float: left;
    }
    .header .company-info {
        padding: 10px;
        width: 50%;
        float: right;
        text-align: right;
    }

    .sub-header {
        width: 100%;
        position: absolute;
        top: 180px;
        margin: 10px;
    }

    .sub-header .creator-info {
        width: 25%;
        float: left;
    }
    .sub-header .created-info {
        width: 25%;
        float: left;
    }
    .sub-header .total-users {
        width: 50%;
        float: left;
    }
</style>
</html>
