<?php
$djur = $this->getAllDjur();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Mitt MVC-projekt</title>

	<!-- Bootstrap core CSS -->
	<link href="/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<h1>Här är alla mina djur</h1>

<form action="?page=add" method="post">
<input type="text" name="name" value="" placeholder="djurnamn"  />
<input type="text" name="year" placeholder="ålder"/>
<input type="text" name="legs" placeholder="antal ben"/>
<input type="text" name="type" placeholder="typ"/>
<button type="submit">Lägg till eller uppdatera djur</button>
</form>


<table>
<thead>
    <tr>
        <th>Namn</th>
        <th>År</th>
        <th>Antal Ben</th>
        <th>Typ</th>
        <th></th>
    </tr>
</thead>
<tbody>
<?php foreach ($djur as $djur) { ?>
    <tr>
        <td><?= $djur->getName()?></td>
        <td><?= $djur->getYear()?></td>
        <td><?= $djur->getLegs()?></td>
        <td><?= $djur->getType()?></td>
        <td><button type=“button”><a href= '/projektarbete.dev/index.php?page=delete&id=<?= $djur->getId()?>'>delete</a></button></td>
    </tr>
 <?php
} ?>
</tbody>
</table>



 
</body>
</html>