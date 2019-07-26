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
					 <label class="label">Product Name<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="productName" placeholder="Product Name" maxlength="50" size="50" >
						
						</label>
				</section>
				<section>
					 <label class="label">Vendor<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="vendor" placeholder="Vendor" placeholder="Vendor" maxlength="50" size="50" >
						</label>
				</section>
				<section>
					 <label class="label">Serial Number<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="serialNumber" placeholder="Serial Number" maxlength="50" size="50" class="alfaNumeric">
						</label>
				</section>
				<section>
					 <label class="label">Purchase Date<span class="error">*</span></label>
					<label class="input">
						<input type="text" id="purchaseDate" name="purchaseDate" placeholder="Purchase Date"
						class="datepicker purchaseDate" readonly>
						</label>
				</section>
				<section>
					 <label class="label">Contact Number<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="contactNumber" placeholder="Contact Number" maxlength="20" size="20"  class="number-only">
						</label>
				</section>
				<section>
					<label class="label">Comment<span class="error">*</span></label>
					<label class="textarea">
						<textarea name="comment" placeholder="Comment" maxlength="700"></textarea>
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


