<?php session_start(); ?>

<?php
include_once("./basics/panel.php"); 
?>

<!-- Navigation Bar -->
<?php 
include_once("./basics/admin_navbar.php"); 
?>

<!-- CSS Scripts -->
<link href="./css/addPopUp.css" rel="stylesheet">
<link href="./css/tabs.css" rel="stylesheet">

<p><br /></p>

<div class="container-fluid">
  <div class="row">
    
    <?php include
    "./basics/sidebar.php"; 
    ?>


      <div class="row">
      	<div class="col-10">
          <h3 class="welcomingAdmin">Categories</h3>
      	</div>
      	<div class="col-2 addBttnBox">
      		<a href="#" data-toggle="modal" data-target="#add_category_modal" class="btn btn-primary btn-sm addBttn popupInputs">Add Category</a>
      	</div>
      </div>
      
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead class="tableHead">
            <tr>
              <th>Category</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody id="category_list">
            <!-- <tr>
              <td>Rings</td>
              <td><a class="btn btn-sm btn-info"></a><a class="btn btn-sm btn-danger">Delete</a></td>
            </tr> -->
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<!-- Add Category Popup Modal -->
<div class="modal fade" id="add_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modalHeader">
        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="add-category-form" enctype="multipart/form-data">
        	<div class="row">
        		<div class="col-12">
        			<div class="form-group">
		        		<label class="popupLabels">Category Name:</label>
		        		<input type="text" name="cat_title" class="form-control popupInputs">
		        	</div>
        		</div>
        		<input type="hidden" name="add_category" value="1">
        		<div class="col-12 addBttnBox">
        			<button type="button" class="btn btn-primary add-category addBttn popupInputs" style="float:right;">Add Category</button>
        		</div>
        	</div>
        	
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Edit Category Popup Modal -->
<div class="modal fade" id="edit_category_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header modalHeader">
        <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="edit-category-form" enctype="multipart/form-data">
          <div class="row">
            <div class="col-12">
              <input type="hidden" name="cat_id">
              <div class="form-group">
                <label class="popupLabels">Category Name:</label>
                <input type="text" name="e_cat_title" class="form-control popupInputs">
              </div>
            </div>
            <input type="hidden" name="edit_category" value="1">
            <div class="col-12 addBttnBox">
              <button type="button" class="btn btn-primary edit-category-btn addBttn popupInputs" style="float:right;">Save</button>
            </div>
          </div>
          
        </form>
      </div>
    </div>
  </div>
</div>
<!-- Modal -->

<?php 
include_once("./basics/footer.php"); 
?>

<!-- JS Scripts -->
<script type="text/javascript" src="./js/categories.js"></script>