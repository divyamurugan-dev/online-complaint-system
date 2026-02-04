<?php
include "db.php";
session_start();

$user_id = $_SESSION['id'];
$res = mysqli_query($conn, "SELECT * FROM complaints WHERE user_id = '$user_id'");
?>
<h2>All Complaints</h2>

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>User ID</th>
<th>Category</th>
<th>Description</th>
<th>Status</th>
</tr>

<?php while($row = mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['status']; ?></td>
</tr>
<?php } ?>
</table>