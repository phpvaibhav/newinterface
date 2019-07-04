<!-- widget grid -->
        <section id="widget-grid" class="">
        
          <!-- row -->
         <div class="row">
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
			<div class="well no-padding">

			<form method="post" action="addService" id="smart-form-service" class="smart-form client-form">
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
						<input type="text" name="serialNumber" placeholder="Serial Number">
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="purchaseDate" placeholder="Purchase Date"
						placeholder="Filter Date" class=" datepicker hasDatepicker" data-dateformat="yy/mm/dd">
						</label>
				</section>
				<section>
					<label class="input">
						<input type="text" name="contactNumber" placeholder="Contact Number">
						</label>
				</section>
				<section>
					<label class="textarea">
						<textarea name="comment" placeholder="Comment"></textarea>
						</label>
				</section>

				<section>
				<!-- <label class="label">Image</label> -->
				<div class="input input-file">
				<span class="button"><input type="file" id="file" onchange="this.parentNode.nextSibling.value = this.value">Browse</span><input type="text" readonly="">
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


