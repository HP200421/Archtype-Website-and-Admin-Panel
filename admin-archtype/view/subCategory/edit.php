<?php
    $row = mysqli_fetch_array($result);
?>
<input type="hidden" name="action" value="<?= $row["id"];?>">
<div class="col-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Edit Sub Category</h4>
      <form class="ajaxForm forms-sample" action="<?= LINK; ?>subCategory/update/<?= $row["id"];?>" method="post" enctype="multipart/form-data" callBack="updateSubCat">
        <div class="form-group row">
            <div class="form-group col">
              <label for="categoryName">Name*</label>
              <input type="text" name="subcategory_name" class="form-control form-control-sm" id="categoryName" placeholder="Category Name" value="<?= htmlspecialchars($row['subcategory_name']); ?>" vali="yes">
              <div class="error-message" style="color: red;"></div>
            </div>
            <div class="form-group col">
                <div class="col" id="parentCategoryGroup">
                  <label for="parentCategory">Parent Category*</label>
                  <select name="main_category_id" class="form-select form-select-sm" id="parentCategory" data-value="<?= $row['main_category_id']; ?>">
                    <option value="">Select Parent Category</option>
                    <!-- Options will be populated dynamically -->
                  </select>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary me-2">Update</button>
        <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
      </form>
    </div>
  </div>
</div>