<?php if(session()->get('success') && session()->get('account_type')=="restaurant"):?>
<h2 class="display-4"> Add blood sample </h2>
<form class="m-4" action="/blood/saveBlood" method="post" enctype="multipart/form-data" >
<div class="form-group">
    <lable for="item-name">Name</lable>
    <input type="text" class="form-control" name="food-name" value="<?= session()->get('hospital_name');?>">
</div>

<div class="form-group">
<select class="custom-select" name="blood-type">
  <option selected>Blood group</option>
  <option>A+</option>
  <option>B+</option>
  <option>AB+</option>
  <option>AB-</option>
  <option>O+</option>
  <option>O-</option>
  <option>B-</option>
  <option>A-</option>
</select>
</div>
<div class="form-group">
<select class="custom-select" name="food-status">
  <option selected>Status</option>
  <option value="Available">Available</option>
  <option value="Not_Available">Not Available</option>
</select>
</div>
<button type="submit" class="btn btn-success"> Add to bank </button>
</form>
<?php else : ?>
<div class="page-wrap d-flex flex-row align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 text-center">
                <span class="display-1 d-block">404</span>
                <div class="mb-4 lead">The page you are looking for was not found.</div>
                <a href="/blood/menu/" class="btn btn-info">Back to Home</a>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>