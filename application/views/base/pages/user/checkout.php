<!-- BEGIN SLIDER -->
<section class="inner-slider">
	<div id="inner-slider">
		<div class="item">
			<div class="inner-slide-item" style="background-image:url('https://image.freepik.com/free-photo/rasgulla-sweet-food_57665-4910.jpg')">
				<div class="inner-slide-caption">
					<h1>Checkout</h1>
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="<?= base_url(); ?>">Home</a></li>
							<li class="breadcrumb-item active" aria-current="page">Checkout</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- END SLIDER -->
<section class="content">
	<div class="container">
		<div class="col-sm-12">
			<div class="col-sm-9 main">
				<div class="inner-main col-sm-12">
					<h4 class="head-pedding">
						<i class="fa fa-user" aria-hidden="true"></i> USER DETAIL
					</h4>
					<div class="form-group col-sm-12">
						<div class="col-sm-12"><input type="text" value="KIshor Kumar Sahu" placeholder="Name" class="form-control"></div>
					</div>
					<div class="form-group col-sm-12">
						<div class="col-sm-12"><input type="email" value="xyz@gmail.com" placeholder="E-mail" class="form-control"></div>
					</div>
					<div class="form-group col-sm-12">
						<div class="col-sm-12"><input type="tel" value="+91 9876789876" placeholder="Mobile Number" class="form-control"></div>
					</div>
					<div class="form-group col-sm-12">
						<div class="col-sm-6">
							<button type="submit" class="btn btn-account btn-block">Edit</buttton>
						</div>
					</div>
				</div>
				<div class="inner-main col-sm-12">
					<h4 class="head-pedding">
						<i class="fa fa-map-marker" aria-hidden="true"></i> SHIPPING ADDRESS
					</h4>
					<ul>
						<li>
							<input type="radio" name="address" class="input-control" id="address1" /><label for="address1">Azad Chowk Kasaridih Durg</label>
						</li>
						<li>
							<input type="radio" name="address" class="input-control" id="address2" /><label for="address2">Azad Chowk Kasaridih Durg</label>
						</li>
						<li>
							<span class="span-btn" data-toggle="modal" data-target="#exampleModal">+ Add Address</span>
						</li>
					</ul>
				</div>
			</div>
			<div class="col-sm-3 sticky">
				<div class="card">
					<h3 class="margin-0">Price Detail</h3>
					<ul class="price-list">
						<li>
							<span class="align-left">Sub-total :</span><span class="align-right"><?= CURRENCY; ?> 900.00</span>
						</li>
						<li>
							<span class="align-left">Delivery :</span><span class="align-right"><?= CURRENCY; ?> 100.00</span>
						</li>
						<li>
							<span class="align-left">Total :</span><span class="align-right"><?= CURRENCY; ?> 1000.00</span>
						</li>
					</ul>
					<a href="<?= base_url('/checkout'); ?>" class="btn btn-account">Proceed to Pay</a>
				</div>
			</div>
		</div>
	</div>
</section>




<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Address</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <form>
		<div class="modal-body">
				<div class="form-group">
					<label for="exampleFormControlSelect1">Select State</label>
					<select class="form-control" id="exampleFormControlSelect1">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					</select>
				</div>
				<div class="form-group">
					<label for="exampleFormControlTextarea1">Address</label>
					<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" class="btn btn-primary">Save</button>
			</div>
	</form>
    </div>
  </div>
</div>