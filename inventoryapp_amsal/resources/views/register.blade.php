<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h2>Sign Up Form</h2>
    <form action="/welcome" method="post">
        @csrf
        <label>Full name:</label> <br>
        <br>
        <input type="text" name="fullName"> <br>
        <br>
        <label>Last Name:</label> <br>
        <br>
        <input type="text" name="lastName"> <br>
        <br>
        <label>Gender:</label> <br>
        <br>
        <input type="radio" name="male" value="1">Male <br>
        <input type="radio" name="female" value="2">Female <br>
        <input type="radio" name="other" value="3">Other <br>
        <br>
        <Label>Nationality:</Label> <br>
        <br>
        <select name="nationality">
            <option value="1">Indonesian</option>
        </select> <br>
        <br>
        <label>Language Spoken:</label> <br>
        <br>
        <input type="checkbox" name="indonesia" value="1"> Bahasa Indonesia <br>
        <input type="checkbox" name="english" value="2"> English <br>
        <input type="checkbox" name="other" value="3"> Other <br>
        <br>
        <label>Bio:</label> <br>
        <br>
        <textarea name="Bio" rows="10" cols="30"></textarea>
        <br>
        <input type="submit" value="Sign Up">
    </form>
</body>
</html>
