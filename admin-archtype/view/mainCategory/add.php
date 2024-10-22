<input type="hidden" name="action">
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add New Category</h4>
      <form class="ajaxForm forms-sample" action="<?= LINK; ?>mainCategory/create" method="post" enctype="multipart/form-data" callBack="mainCat">
        <div class="form-group">
          <label for="categoryName">Name</label>
          <input type="text" name="category_name" class="form-control" id="categoryName" placeholder="Category Name" vali="yes">
          <div class="error-message" style="color: red;"></div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
      </form>
    </div>
  </div>
</div>