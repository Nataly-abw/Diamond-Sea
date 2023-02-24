<?php
session_start();
if (!isset($_SESSION['admin_id'])) {
  header("location:login.php");
}

include "./basics/panel.php";
?>

<?php
include "./basics/admin_navbar.php";
?>

<!-- CSS Scripts -->
<link href="./css/sideBar.css" rel="stylesheet">
<link href="./css/tabs.css" rel="stylesheet">

<p><br /></p>

<div class="container-fluid">
  <div class="row">

    <?php include "./basics/sidebar.php"; ?>

    <h3 class="welcomingAdmin">Admins List</h3>
    <div class="table-responsive">
      <table class="table table-striped table-sm">
        <thead class="tableHead">
          <tr>
            <th>First Name</th>
            <th>Email Address</th>
            <th>Status</th>
          </tr>
        </thead>
        <tbody id="admin_list">
          <!-- <tr>
            <td>1,001</td>
            <td>Lorem</td>
            <td>ipsum</td>
            <td>dolor</td>
            <td>sit</td>
          </tr> -->
        </tbody>
      </table>
    </div>
    </main>
  </div>
</div>

<?php 
include "./basics/footer.php"; 
?>

<!-- JS Scripts -->
<script type="text/javascript" src="./js/admin.js"></script>