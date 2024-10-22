<?php
    $row = mysqli_fetch_array($result);
    $thumbnail_image_json = $row['thumbnail_image'];
    $post_images_json = $row['post_images'];
    $thumbnail_image_filePath = json_decode($thumbnail_image_json, true);
    $post_images_filePaths = json_decode($post_images_json, true);
?>
<input type="hidden" name="action" value="<?= $row["id"];?>">
<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Post Details</h4>
      <form class="ajaxForm form-sample" action="<?= LINK; ?>post/update/<?= $row["id"];?>" method="post" enctype="multipart/form-data" callback="postCreate">
        <p class="card-description">Fill the following details</p>

        <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Title *</label>
              <div class="col-sm-9">
                <input type="text" name="post_name" class="form-control form-control-sm" placeholder="Enter post title" vali="yes" value="<?= $row["post_name"];?>" />
                <span class="error-message" style="color:red"></span> 
              </div>
            </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Location *</label>
              <div class="col-sm-9">
                <input type="text" name="location" class="form-control form-control-sm" placeholder="Enter location" vali="yes" value="<?= $row["location"];?>" />
                <span class="error-message" style="color:red"></span> 
              </div>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Post Status*</label>
              <div class="col-sm-9">
                  <select name="status" class="form-select text-dark" id="">
                      <option value="">Select post status</option>
                      <option value="published" <?= $row['status']  == 'published' ? 'selected' : ''; ?>>Published</option>
                      <option value="archived" <?= $row['status']  == 'archived' ? 'selected' : ''; ?>>Archived</option>
                  </select>
                  <span class="error-message" style="color:red"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="parentCategory">Main Category*</label>
              <div class="col-sm-9">
                <select name="main_id" class="form-select" id="parentCategory" vali="yes" data-value="<?= $row['main_id']; ?>">
                  <option value="">Select a category</option>
                  <!-- Main category options will be populated -->
                </select>
                <span class="error-message" style="color:red"></span>
              </div>
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label" for="subCategory">Sub Category*</label>
              <div class="col-sm-9">
                <select name="sub_id" class="form-select" id="subCategory" vali="yes" data-value="<?= $row['sub_id']; ?>">
                  <option value="">Select a subcategory</option>
                  <!-- Subcategory options will be populated based on the selected main category -->
                </select>
                <span class="error-message" style="color:red"></span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Thumbnail Image*</label>
              <div class="col-sm-9">
                <input type="file" name="thumbnail" class="form-control" accept="image/*"/>
                <span class="error-message" style="color:red"></span> 
              </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
            <?php
            if (!empty($thumbnail_image_filePath) && is_array($thumbnail_image_filePath)) {
                foreach ($thumbnail_image_filePath as $filePath) {
                    $fileUrl = UP . $filePath; 
                    $fileName = htmlspecialchars(basename($filePath));
            ?>
                    <div class="card border mb-2" style="width: 150px; height: auto;">
                      <div class="card-body p-2 text-center">
                          <?php if (in_array(pathinfo($filePath, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])): ?>
                            <img src="<?= $fileUrl; ?>" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                          <?php else: ?>
                              <i class="fa fa-file" style="font-size: 50px; color: #5bc0de;"></i>
                          <?php endif; ?>
                          <a href="<?= $fileUrl; ?>" target="_blank" class="d-block mb-1">Preview</a>
                          <small class="text-danger d-block mb-1">Remove</small>
                          <input type="checkbox" name="RemoveThumbnailImage[]" value="<?= htmlspecialchars($filePath); ?>" class="remove-file-checkbox">
                      </div>
                  </div>
            <?php
                }
            } else {
                echo 'No files available.';
            }
            ?>  
            </div>
          </div>

          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Post Images*</label>
              <div class="col-sm-9">
                <input type="file" name="post_files[]" class="form-control" accept="image/*" multiple/>
                <span class="error-message" style="color:red"></span> 
              </div>
            </div>
            <div class="d-flex flex-wrap gap-2">
            <?php
            if (!empty($post_images_filePaths) && is_array($post_images_filePaths)) {
                foreach ($post_images_filePaths as $filePath) {
                    $fileUrl = UP . $filePath; 
                    $fileName = htmlspecialchars(basename($filePath));
            ?>
                    <div class="card border mb-2" style="width: 150px; height: auto;">
                      <div class="card-body p-2 text-center">
                          <?php if (in_array(pathinfo($filePath, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])): ?>
                            <img src="<?= $fileUrl; ?>" alt="" style="width: 100px; height: 100px; object-fit: cover; border-radius: 8px;">
                          <?php else: ?>
                              <i class="fa fa-file" style="font-size: 50px; color: #5bc0de;"></i>
                          <?php endif; ?>
                          <a href="<?= $fileUrl; ?>" target="_blank" class="d-block mb-1">Preview</a>
                          <small class="text-danger d-block mb-1">Remove</small>
                          <input type="checkbox" name="RemovePostImages[]" value="<?= htmlspecialchars($filePath); ?>" class="remove-file-checkbox">
                      </div>
                  </div>
            <?php
                }
            } else {
                echo 'No files available.';
            }
            ?>  
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <label class="form-label">Details</label>
            <textarea name="details" id="your_summernote" class="form-control" rows="4" placeholder="Enter post details"><?= htmlspecialchars($row['details']); ?></textarea>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
