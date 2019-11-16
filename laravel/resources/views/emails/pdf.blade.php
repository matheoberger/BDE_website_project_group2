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

            <?php
            foreach ($data as $user) {
                echo "<tr><td>
                    {$user['firstname']}
                   </td>
                   <td>
                    {$user['lastname']}
                  </td>
                  <td>
                    {$user['email']}
                  </td>
                 <td>
                    {$user['center']}
                 </td>
                <td>
                    {$user['gender']}
                </td>
                <td>
                    {$user['birthdate']}
                </td></tr>";
            } ?>
        </tbody>
    </table>
</body>

</html>