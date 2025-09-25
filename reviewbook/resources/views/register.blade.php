<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form SanberCode</title>
</head>
<body>
    <h1>Buat Account Baru!</h1>
    <h3>Sign Up Form</h3>
    <form action="/welcome"method="POST">
        @csrf
        <label>First Name</label><br><br>
        <input type="text" name="first_name">
        <br><br>
        <label>Last Name</label><br><br>
        <input type="text" name="last_name">
        <br><br>
        <label>Gender</label><br>
        <input type="radio"name="Gender">Male <br>
        <input type="radio"name="Gender">Female <br>
        <input type="radio"name="Gender">Other <br>
        <br><br>
        <label>Nationality</label><br><br>
        <select>
            <option>Indonesian</option><br>
            <option>Singapore</option><br>
            <option>Malaysian</option><br>
            <option>vietnam</option><br>
        </select>
        <br><br>
        <label>Languange Spoken</label><br><br>
        <input type="checkbox">Bahasa Indonesia <br>
        <input type="checkbox">English <br>
        <input type="checkbox">other <br>
        <br><br>
        <label>Bio</label><br><br>
        <textarea col="30" row="10"></textarea>
        <br><br>
        <input type="submit" value="Sign up">
    </form>
</body>
</html>