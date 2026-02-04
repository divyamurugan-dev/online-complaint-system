<?php
include "db.php";
$res = mysqli_query($conn,"SELECT * FROM complaints");
?>
<h2>Admin Panel - Manage Complaints</h2>

<table border="1" cellpadding="10">
<tr>
<th>ID</th>
<th>User ID</th>
<th>Category</th>
<th>Description</th>
<th>Status</th>
<th>Action</th>
</tr>

<?php while($row = mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['user_id']; ?></td>
<td><?php echo $row['category']; ?></td>
<td><?php echo $row['description']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="update_status.php?id=<?php echo $row['id']; ?>">
Mark Solved
</a>
</td>
</tr>
<?php } ?>
</table>

<p>
<a href="dashboard.php">Back to Dashboard</a>
</p>