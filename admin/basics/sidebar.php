<!-- CSS Scripts -->
<link href="./css/sideBar.css" rel="stylesheet">

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
  <div class="sidebar-sticky sideBar">
    <ul class="nav flex-column">

      <?php
      $uri = $_SERVER['REQUEST_URI'];
      $uriAr = explode("/", $uri);
      $page = end($uriAr);
      ?>

      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == '' || $page == 'index.php') ? 'active' : ''; ?>" href="index.php">
          Control Panel <span class="sr-only">(current)</span>
        </a>
      </li>

      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == 'products.php') ? 'active' : ''; ?>" href="products.php">
          Products
        </a>
      </li>
      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == 'categories.php') ? 'active' : ''; ?>" href="categories.php">
          Categories
        </a>
      </li>
      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == 'brands.php') ? 'active' : ''; ?>" href="brands.php">
          Collections
        </a>
      </li>
      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == 'customers.php') ? 'active' : ''; ?>" href="customers.php">
          Customers
        </a>
      </li>
      <li class="nav-item sideBarLinksBox">
        <a class="nav-link sideBarLinks <?php echo ($page == 'customer_orders.php') ? 'active' : ''; ?>" href="customer_orders.php">
          Customers Orders
        </a>
      </li>
    </ul>
  </div>
</nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom welcomingDivider">
    <h1 class="welcomingAdmin">Hi, <?php echo $_SESSION["admin_name"]; ?></h1>
  </div>