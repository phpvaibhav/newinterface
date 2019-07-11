<!-- widget grid -->
        <section id="widget-grid" class="">
        
          <!-- row -->
         <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
			<div class="well no-padding">

			<form method="post" action="addService" id="smart-form-service" class="smart-form client-form" enctype="multipart/form-data" novalidate="" autocomplete="off">
			<header>
				Service
			</header>

			<fieldset>
				<section>
					<label class="input">
						<input type="text" name="productName" placeholder="Product Name">
						
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="vendor" placeholder="Vendor">
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="serialNumber" placeholder="Serial Number" maxlength="20" size="20" class="number-only">
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" id="purchaseDate" name="purchaseDate" placeholder="Purchase Date"
						class="datepicker purchaseDate" readonly>
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="contactNumber" placeholder="Contact Number" maxlength="13" size="13"  class="number-only">
						</label>
				</section>
				<section>
					<label class="textarea">
						<textarea name="comment" placeholder="Comment" maxlength="500"></textarea>
						</label>
				</section>

				<section>
				<!-- <label class="label">Image</label> -->
				<div class="input input-file">
				<span class="button"><input type="file" name="serviceImage[]" id="file" onchange="this.parentNode.nextSibling.value = this.value" accept="image/*" size="10" multiple="multiple">Browse</span><input type="text" readonly="">
				</div>
				
				</section>
			</fieldset>
			<footer>
				<button type="submit" id="submit" class="btn btn-primary">
					Add
				</button>
			</footer>

		
		</form>

	</div>
	
</div>
</div>
        
          <!-- end row -->
 
        
        </section>
        <!-- end widget grid -->


