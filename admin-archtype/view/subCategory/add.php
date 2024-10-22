<input type="hidden" name="action">
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Add New Sub Category</h4>
      <form class="ajaxForm forms-sample" action="<?= LINK; ?>subCategory/create" method="post" enctype="multipart/form-data" callBack="eventSubCat">
        <div class="form-group row">
            <div class="form-group col">
              <label for="categoryName">Name*</label>
              <input type="text" name="subcategory_name" class="form-control form-control-sm" id="categoryName" placeholder="Category Name" vali="yes">
              <div class="error-message" style="color: red;"></div>
            </div>
            <div class="form-group col">
                <div class="col" id="parentCategoryGroup">
                  <label for="parentCategory">Parent Category*</label>
                  <select name="main_category_id" class="form-control form-control-sm" id="parentCategory">
                    <option value="">Select Parent Category</option>
                    <!-- Options will be populated dynamically -->
                  </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Submit</button>
        <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
      </form>
    </div>
  </div>
</div>