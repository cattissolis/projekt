
<?php
$djur = $this->getAllDjur();
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
    <title>Mitt MVC-projekt</title>
</head>
<body>
<h1>Här är alla mina djur!</h1>
<!-- Det här formuläret är kopplat till controller.php med $djur = $this->getAllDjur();, formuläret används för att kunna skriva in ett nytt djur till databasen (INSERT INTO), 
med alla dess värden  -->
<form action="?page=add" method="post">
<input type="text" name="name" value="" placeholder="djurnamn"  />
<input type="text" name="year" placeholder="ålder"/>
<input type="text" name="legs" placeholder="antal ben"/>
<input type="text" name="type" placeholder="typ"/>
<button type="submit">Lägg till eller uppdatera djur</button> 
</form> 
<!--Här har jag en tabell som visar de djur jag har i min databas, om jag lägger till ett djur
syns det och om jag tar bort ett djur syns det också här tack vare tabellen. Deleteknappen är kopplad till min DELETE function 
så att när jag trycker på den försvinner djuret på hemsidan och databasen. -->



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
       <!-- <td><button><a name="btn-add" href="/projektarbete.dev/index.php?page=add&id=<?php echo $djur->getId(); ?>">lägg till djur</button></a></td> -->  
    </tr>
 <?php
} ?>


</tbody>
</table>


</body>
</html>