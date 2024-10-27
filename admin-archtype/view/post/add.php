<div class="col-12 grid-margin">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Post Details</h4>
      <form class="ajaxForm form-sample" action="<?= LINK; ?>post/create" method="post" enctype="multipart/form-data" callback="postCreate">
        <p class="card-description">Fill the following details</p>

        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Title *</label>
            <div class="col-sm-9">
              <input type="text" name="post_name" class="form-control form-control-sm" placeholder="Enter post title" vali="yes" />
              <span class="error-message" style="color:red"></span> 
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <div class="form-group row">
              <label class="col-sm-3 col-form-label">Location *</label>
              <div class="col-sm-9">
                <input type="text" name="location" class="form-control form-control-sm" placeholder="Enter location" vali="yes" />
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
                      <option value="published">Published</option>
                      <option value="archived">Archived</option>
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
                <select name="main_id" class="form-select" id="parentCategory" vali="yes">
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
                <select name="sub_id" class="form-select" id="subCategory" vali="yes">
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
                <input type="file" name="thumbnail" class="form-control" accept="image/*" vali="yes" />
                <span class="error-message" style="color:red"></span> 
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <label class="form-label">Post Images and Descriptions*</label>
            <div id="image-field-container"></div>
            <button type="button" id="add-image-field" class="btn btn-sm btn-primary mt-2">Add Image & Description</button>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-12">
            <label class="form-label">Details</label>
            <textarea name="details" id="your_summernote" class="form-control" rows="4" placeholder="Enter post details"></textarea>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-sm-12">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="button" class="btn btn-light" onclick="window.history.back();">Cancel</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>