<!DOCTYPE html>

<body>
<head>
<title>Add new title</title>
</head>


<form action="addone.php" method="POST">
<div>Title <input type="text" name="title"></div>
<div>Author<input type="text" name="author"></div>
Category
<select name="category">
    <option value="Fiction">Fiction</option>
    <option value="Non-fiction">Non-fiction</option>
    <option value="Play">Play</option>
</select>
<div>Year<input type="text" name="year"></div>
<div>ISBN<input type="text" name="isbn"></div>
<input type="submit" value="Go!">
</form>



</body>
</html>