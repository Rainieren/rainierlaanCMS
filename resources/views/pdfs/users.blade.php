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
        <p  class="mar-0" style="color: #0052CC">{{ __('Requested by') }}</p>
        <p class="mar-0">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</p>
    </div>
    <div class="created-info">
        <p  class="mar-0" style="color: #0052CC">{{ __('Date created') }}</p>
        <p class="mar-0">{{ date("Y/m/d") }}</p>
    </div>
    <div class="total-users">
        <p  class="mar-0 font-weight-bold" style="color: #0052CC">{{ __('Amount of users') }}</p>
        <h2 class="mar-0">{{ count($users) }}</h2>
    </div>
</div>

<div class="user-list">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">{{ __('ID') }}</th>
            <th scope="col">{{ __('Firstname') }}</th>
            <th scope="col">{{ __('Lastname') }}</th>
            <th scope="col">{{ __('Email') }}</th>
            <th scope="col">{{ __('Role') }}</th>
            <th scope="col">{{ __('Created at') }}</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
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

    .user-list {
        width: 100%;
        position: absolute;
        top: 280px;
    }
</style>
</html>
