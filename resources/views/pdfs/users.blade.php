<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Users</title>
</head>

<body>
<div class="header">

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
        font-family: sans-serif;
    }

    .header {
        width: 100%;
        background: black;
        position: absolute;
        top: 0;
        left: 0;
        height: 50px;
    }

</style>
</html>
