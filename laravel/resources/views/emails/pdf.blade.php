<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title></title>
</head>

<body>
    <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>Firstname</b></td>
                <td><b>Lastname</b></td>
                <td><b>Email</b></td>
                <td><b>Center</b></td>
                <td><b>Gender</b></td>
                <td><b>Birthdate</b></td>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{$data->show_name}}
                </td>
                <td>
                    {{$data->series}}
                </td>
                <td>
                    {{$data->lead_actor}}
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>