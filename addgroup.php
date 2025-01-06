<?php
  $page_title = 'Add Group';
  require_once('includes/load.php'); // Load necessary functions and configurations
  
  // Check user permission to access this page
  page_require_level(1);

  // Handle form submission
  if (isset($_POST['add'])) {
    $req_fields = array('group-name', 'group-level', 'status');
    validate_fields($req_fields);

    // Check for duplicate group name or level
    if (find_by_groupName($_POST['group-name'])) {
      $session->msg('d', '<b>Sorry!</b> Group Name already exists in the database.');
      redirect('addgroup.php', false);
    } elseif (find_by_groupLevel($_POST['group-level'])) {
      $session->msg('d', '<b>Sorry!</b> Group Level already exists in the database.');
      redirect('addgroup.php', false);
    }

    // If no errors, add the group
    if (empty($errors)) {
      $name = remove_junk($db->escape($_POST['group-name']));
      $level = remove_junk($db->escape($_POST['group-level']));
      $status = remove_junk($db->escape($_POST['status']));

      $query  = "INSERT INTO user_groups (";
      $query .= "group_name, group_level, group_status";
      $query .= ") VALUES (";
      $query .= "'{$name}', '{$level}', '{$status}'";
      $query .= ")";
      if ($db->query($query)) {
        // Success
        $session->msg('s', "Group has been created successfully!");
        redirect('addgroup.php', false);
      } else {
        // Failure
        $session->msg('d', 'Failed to create the group!');
        redirect('addgroup.php', false);
      }
    } else {
      $session->msg("d", $errors);
      redirect('addgroup.php', false);
    }
  }
?>

<!-- HTML Content -->
<?php include_once('layouts/header.php'); ?>
<div class="login-page">
  <div class="text-center">
    <h3>Add New User Group</h3>
  </div>
  <?php echo display_msg($msg); ?>
  <form method="post" action="addgroup.php" class="clearfix">
    <div class="form-group">
      <label for="name" class="control-label">Group Name</label>
      <input type="text" class="form-control" name="group-name" placeholder="Enter Group Name" required>
    </div>
    <div class="form-group">
      <label for="level" class="control-label">Group Level</label>
      <input type="number" class="form-control" name="group-level" placeholder="Enter Group Level" required>
    </div>
    <div class="form-group">
      <label for="status" class="control-label">Status</label>
      <select class="form-control" name="status" required>
        <option value="1">Active</option>
        <option value="0">Inactive</option>
      </select>
    </div>
    <div class="form-group clearfix">
      <button type="submit" name="add" class="btn btn-primary">Add Group</button>
    </div>
  </form>
</div>
<?php include_once('layouts/footer.php'); ?>
