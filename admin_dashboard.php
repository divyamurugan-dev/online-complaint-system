<?php
include "db.php";
session_start();
if(!isset($_SESSION['admin'])){
  header("Location: admin_login.php");
  exit();
}

$res = mysqli_query($conn,"SELECT * FROM complaints");
?>
<h2>Admin Panel</h2>
<table border="1">
<tr>
<th>ID</th><th>User</th><th>Category</th>
<th>Description</th><th>Status</th><th>Action</th>
</tr>

<?php while($r=mysqli_fetch_assoc($res)){ ?>
<tr>
<td><?php echo $r['id']; ?></td>
<td><?php echo $r['user_id']; ?></td>
<td><?php echo $r['category']; ?></td>
<td><?php echo $r['description']; ?></td>
<td><?php echo $r['status']; ?></td>
<td>
<a href="update_status.php?id=<?php echo $r['id']; ?>&status=Solved">Solve</a> |
<a href="update_status.php?id=<?php echo $r['id']; ?>&status=Rejected">Reject</a>
</td>
</tr>
<?php } ?>
</table>