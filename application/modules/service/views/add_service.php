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
					 <label class="label">Manufacture<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="vendor" placeholder="Manufacture" maxlength="50" size="50" >
						</label>
				</section>
				<section>
					 <label class="label">Model name<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="modelName" placeholder="Model name" maxlength="50" size="50" >
						</label>
				</section>
				<section>
					 <label class="label">Series Number<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="serialNumber" placeholder="Series Number" maxlength="50" size="50" class="alfaNumeric">
						</label>
				</section>
				<section>
					 <label class="label">Date of Purchase<span class="error">*</span></label>
					<label class="input">
						<input type="text" id="purchaseDate" name="purchaseDate" placeholder="Date of Purchase"
						class="datepicker purchaseDate" readonly>
						</label>
				</section>
				<section>
					 <label class="label">Contact Number<span class="error">*</span></label>
					<label class="input">
						<input type="text" name="contactNumber" placeholder="Contact Number" maxlength="20" size="20"  data-mask="(999) 999-9999"  class="number-only">
						</label>
				</section>
				<section>
				<label class="label">Receipt of Purchase</label>
				<div class="input input-file">
				<span class="button"><input type="file" name="serviceImage[]" id="file" onchange="if(this.files.length > 4){ this.value = ''; alert('You can select only 4 receipt');}else{this.parentNode.nextSibling.value = this.files.length+' Files'}" accept="image/*,application/pdf, application/vnd.ms-excel,application/msword,text/plain, application/pdf" size="10" multiple="multiple">Browse</span><input type="text" readonly="">
				</div>
				
				</section>
				<section>
					<label class="label">Fault Description<span class="error">*</span></label>
					<label class="textarea">
						<textarea name="faultDescription" placeholder="Fault Description" maxlength="700"></textarea>
						</label>
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


