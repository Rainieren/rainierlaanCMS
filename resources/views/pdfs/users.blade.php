<!doctype html>

<html lang="en">
<head>
    <meta charset="utf-8">

    <title>Users</title>

</head>

<body>
    <h1>All users</h1>
    <p>Below shows a list of all users in your system. </p>

    <h1>Statistics</h1>
    <p>Amount of users: {{ count($users) }}</p>

    <table style="width:100%">
        <tr>
            <th>ID</th>
            <th>Firstname</th>
            <th>Lastname</th>
            <th>Role</th>
            <th>Created at</th>
        </tr>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->firstname }}</td>
            <td>{{ $user->lastname }}</td>
            <td>{{ $user->role->name }}</td>
            <td>{{ $user->created_at->toFormattedDateString() }}</td>
        </tr>
        @endforeach
    </table>
</body>

<style>
    body {
        font-family: "Nunito", sans-serif;
    }
</style>
</html>
