<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handling Form</title>
</head>

<body>
    <h1>Handling Form</h1>
    <!-- Variable Globa/Super Global
    Variabel System
    1. GET
    2. POST
    3. REQUEST
    4. SESSION
    5. COOKIE
    6. SERVER 
    -->

    <form action="" method="POST">
        <table border="0" cellpadding="5" style="border-color:blue ;">
            <tr>
                <td><label for="nama">Nama</label></td>
                <td>:</td>
                <td><input type="text" name="nama" id="nama" required></td>
            </tr>

            <tr>
                <td><label for="email">Email</label></td>
                <td>:</td>
                <td><input type="email" name="email" id="email" required></td>
            </tr>

            <tr>
                <td><label for="password">Password</label></td>
                <td>:</td>
                <td><input type="password" name="password" id="password" required></td>
            </tr>

            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" value="submit" style="background-color: cyan; border-radius:3px ;"></td>
            </tr>
        </table>
    </form>

    <?php
    if (!empty($_POST['nama']) && !empty($_POST['email']) && !empty($POST['password'])) {

        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        echo "<h2>Hasil Form Data</h2>";
        echo "<table border='0' cellpadding='5'>";
        echo "<tr><td>Nama</td> <td>:</td> <td>$nama</td></tr>";
        echo "<tr><td>Email</td> <td>:</td> <td>$email</td></tr>";
        echo "<tr><td>Password</td> <td>:</td> <td>$password</td></tr>";
        echo "</table>";
    }
    // $nama = $_POST['nama'];
    // $email = $_POST['email'];
    // $password = $_POST['password'];
    ?>
</body>

</html>