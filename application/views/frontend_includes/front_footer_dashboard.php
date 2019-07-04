   <!--pop up for new booking page-->
   <style type="text/css">
     .disabled{
  opacity: 0.5;
  pointer-events: none;

  > * {
    opacity: 0.5;
    pointer-events: none;
  }
}
 #search-results{
   display:block;
    padding: 10px;
    display: block;
   overflow-y: scroll;
   max-height: 100px;
   margin-bottom: 20px;
}
#search-results div {
   padding: 10px 3px;
   color: #333;
   cursor:pointer;
}
</style>
   <?php
      $frontend_dashboard_assets =  base_url().'frontend_asset/dashboard/';
    ?>
<div ng-controller="estimationCtrl">
	<div id="NewBooking" class="navside" >
    <form id="addBookingId" name="addBooking" novalidate>
      <div class="slidr-hed-clse">
        <h2>New<span> Booking </span></h2>
        <a href="#" class="closebtn" onclick="navsideClose('OverFlow','NewBooking')">&times;</a>
      </div>
      <div class="clearfix"></div>
      <div class="row new-book-top">
        <!-- left side -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="whte-blck">
            <div class="hed-blck">
              <div class="icn-hd-blck">
                <span class="ft-info"></span>
              </div>
              <div class="frm-title">
                Basic Info
              </div>
            </div>
            <div class="form-sec" id="upcustomer" >
            
              <div class="form-make-book">
                <input type="text" ng-model="searchCustomer" placeholder="Search for existing account here" autocomplete="off" />
               
              </div>
              <!-- Search -->
              <div class="" ng-show="searchCustomer.length">
                <div class="focs-block" >
                  <ul>
                     <li>
                        <ul class="sub-lst" ng-repeat="customer in customerList | searchForCustomer:searchCustomer"  ng-click="setQueryCustomer(customer)">
                          <li><b>{{customer.firstName}} {{customer.lastName}}</b></li>
                          <li>Phone:{{customer.contactNo| tel}}</li>
                          <li>Email:{{customer.email}}</li>
                        </ul> 
                     </li> 
                  </ul>
                </div>
              </div>
              <!-- Search -->
              <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-make-book mrgn-top-frm">
                  <label>Country Code <span class="red">*</span></label>
                    <country-code></country-code>
         
                  </div>
                </div>
                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12 pad-rgt-left">
                  <div class="form-make-book mrgn-top-frm">
                    <label>Phone <span class="red">*</span></label>
                    <input type="text" limitTo="15" name="contactNo" ng-model="customerData.contactNo" placeholder="Phone Number"  ng-keyup="checkCountryCode();" autocomplete="off" />
                    <span class="ngError" ng-show="phoneErr">Please enter phone number.</span>
                  </div> 
                </div>
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                 <div class="form-make-book mrgn-top-frm">
                     <label>Phone Ext</label>
                     <input type="text"  allow-only-numbers  placeholder="" ng-model="customerData.phoneExt" autocomplete="off" />
                 </div>
                </div>
              </div>
              <div class="row">
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-make-book mrgn-top-frm">
                       <label>First Name <span class="red">*</span></label>
                       <input type="text"  name="firstName" ng-model="customerData.firstName" placeholder="First Name" autocomplete="off"/>
                        <span class="ngError" ng-show="fErr">Please enter first name.</span>
                    </div>
                 </div>
                 <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-make-book mrgn-top-frm">
                       <label>Last Name <span class="red">*</span></label>
                       <input type="text"  name="lastName"  ng-model="customerData.lastName"  placeholder="Last Name" autocomplete="off"/>
                        <span class="ngError" ng-show="lErr">Please enter last name.</span>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-make-book mrgn-top-frm">
                      <label>Email <span class="red">*</span></label>
                        <input type="text" name="email" ng-model="customerData.email" placeholder="Enter email" class="form-control spaceNotAllow"  placeholder="example@domail.com" autocomplete="off"/>
                        <span class="ngError" ng-show="eErr">Enter email id.</span>
                        <span class="ngError" ng-show="evErr">Enter valid email id.</span>
                        <input type="hidden" ng-model="customerData.customerId">
                    </div>  
                  </div>
                  <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                    <div class="form-make-book mrgn-top-frm">
                      <label>Select User Type <span class="red">*</span></label>
                        <select class="form-control" ng-model="customerData.userTypeId" ng-change="userPermissionSet();">
                          <option style="display:none" value=""  selected="selected">Choose</option>
                           <option ng-repeat="userType in alluserType" ng-value="userType.userTypeId">{{userType.userType}}</option>
                      </select>
                      <span class="ngError" ng-show="utErr">Please enter user type.</span>
                    </div>
                  </div>
                  <div ng-show="userPreStatus" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <!-- test -->

                        <div class="ChooseOption">
                          <div class="form-make-book">
                             <div class="StopCheck">
                               <div class="StopCheckLeft">
                                <label>Choose Options</label>     
                               </div>
                               <div class="StopCheckRight">
                                 <span class="Spnchck"><i class="fas fa-comment font-medium-3"></i></span>
                                 <span class="Spnchck"><i class="fas fa-envelope font-medium-3"></i></span>
                               </div>
                             </div>
                          <div class="StopCheck" ng-repeat="role in userTypeRole track by $index">
                             <div class="StopCheckLeft">
                                <label for="">{{role.type}}</label>  
                             </div>
                             <div class="StopCheckRight">
                               <span class="Spnchck NewcheckSec">
                                  <input type="checkbox" ng-model="role.messageAllow" ng-true-value="1" ng-false-value="0" name="messageAllow{{$index}}" id="NewChk{{$index}}">
                                  <label for="NewChk{{$index}}"></label>
                               </span>
                               <span class="Spnchck NewcheckSec">
                                 <input type="checkbox" ng-model="role.emailAllow" ng-true-value="1" ng-false-value="0" name="emailAllow{{$index}}" id="NewChkemailAllow{{$index}}">
                                 <label for="NewChkemailAllow{{$index}}"></label>
                               </span>
                             </div>
                            </div>
                          </div>
                        </div>
                     
                  <!-- test -->
                  </div>
              </div>
              
              <div class="">
              <button type="button" ng-click="addCustomer();" class="fltr-btn btn mt-1 book-rde">Add Customer</button>
              </div>
            </div>
<!-- recoed -->
              <div class="det-hed mt-2" ng-show="customerRecord.length">
                <h5 class="mb-2"><span class="ft-user"></span>Added Customers</h5>
                
                <div class="add-det-bg mb-1" ng-repeat="party in customerRecord  track by $index" ng-init="mainIndex = $index">
                  <div class="form-make-book form-msg">
                    <div class="AdCtSec newAdc clearfix">
                      <div class="AdCttop">
                        <h2 class="mb-1">{{party.firstName}} {{party.lastName}}</h2>
                        <span class="txt-edit">
                         
                          <a style="display: none;" href="#" ng-click="setlockunlock('lock',mainIndex);" id="unlock-{{mainIndex}}" class="text-danger font-medium-3"><i class="ft-unlock"></i></a>
                           <a href="#" ng-click="setlockunlock('unlock',mainIndex);"  id="lock-{{mainIndex}}" class="text-muted font-medium-3"><i class="ft-lock"></i></a>
                          <a href="#upcustomer" ng-click="customerEdit(mainIndex)" class="text-muted font-medium-3 ml-1"><i class="ft-edit"></i></a>
                          <a href="#"  ng-click="customerRemove(mainIndex)" class="text-muted font-medium-3 ml-1"><i class="ft-trash"></i></a>
                        </span> 
                      </div>                           
                      <div class="AdCtlft">
                        <div class="lcl-zone mt-1">
                         <h5><b>{{party.email}}</b></h5>
                        </div>
                        <div class="lcl-zone mt-1">
                          <h5><b>{{party.countryCode}}- {{party.contactNo}}</b></h5>
                        </div>
                        <div class="lcl-zone mt-1">
                          <h5><b>{{party.phoneExt}}</b></h5>
                        </div>
                      </div>
                      <div class="AdCtrgt">
                        <div class="pad-tp">
                           <div class="StopCheck">
                             <div class="StopCheckLeft">
                              <label></label>     
                             </div>
                             <div class="StopCheckRight">
                               <span class="Spnchck"><i class="fas fa-comment font-medium-2"></i></span>
                               <span class="Spnchck"><i class="fas fa-envelope font-medium-2"></i></span>
                             </div>
                           </div>
                           <div class="StopCheck" ng-repeat="role in party.permission track by $index">
                             <div class="StopCheckLeft">
                                <label for="">{{role.type}}</label>  
                             </div>
                             <div class="StopCheckRight">
                               <span class="Spnchck NewcheckSec">
                                  <input type="checkbox" ng-model="role.messageAllow" class="messageAllow{{mainIndex}}" ng-true-value="1" ng-false-value="0" name="messageAllow{{mainIndex}}-{{$index}}" id="chb1chb{{mainIndex}}-{{$index}}" disabled>  
                                  <label for="chb1chb{{mainIndex}}-{{$index}}"></label>
                               </span>
                               <span class="Spnchck NewcheckSec">
                                 <input type="checkbox" id="chb2chb{{mainIndex}}-{{$index}}"  ng-model="role.emailAllow" ng-true-value="1" name="emailAllow{{mainIndex}}-{{$index}}" ng-false-value="0" class="emailAllow{{mainIndex}}" disabled>
                                 <label for="chb2chb{{mainIndex}}-{{$index}}"></label>
                               </span>
                             </div>
                           </div>
                          
                        </div>
                      </div>                             
                    </div>                  
                  </div>
                </div>
              </div>

<!-- recoed -->

            <div class="det-hed mt-2" ng-show="customerRecord.length==0">
              <input type="hidden" name="customerCheck" ng-model="customerCheck" required>
               <span class="ngError">Please enter Customer information.</span>
            </div>

          </div>
          <div class="whte-blck lwr-sec-blck lwr-mrgn-top">
            <div class="hed-blck">
              <div class="icn-hd-blck back-chnge">
                <span class="ft-settings"></span>
              </div>
              <div class="frm-title ser-title">
                Service Detail
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <div class="form-make-book">
                      <label>Pick A Service</label>
                      <select class="form-control" name="service"  ng-model="bookingFrom.service">
                          <option style="display:none" value=""  selected="selected">Choose</option>
                           <option ng-repeat="service in serviceList" ng-value="service.id">{{service.service}}</option>
                      </select>
                  </div>
                  <span class="ngError" ng-show="addBooking.service.$touched && addBooking.service.$invalid">Please enter service.</span>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                  <div class="chck-bx-stop">
                    <div class="checked">
                      <a href="#" data-toggle="modal" data-target="#AddPassenger"><span id="plus-psnger" class="psnger-plus float-left mb-1" style="display: block;">Add Passenger <i class="ft-plus"></i></span></a>
                    </div>
                  </div>
                  <p class="ngError" style="float: left;" ng-show="passengerRequired">Please add passenger.</p>
                  <div class="clearfix"></div>

                  <p>Number Of Passenger:<br> {{passenger.adult}} Adult, {{passenger.children}} Children </p>

                  <div  ng-repeat="passengerObject in children_array">
                    <div class="bag-list-txt number-bg-lst"> 
                      <p class="m-0">Child {{$index+1}} [{{passengerObject.childAge}}, {{passengerObject.childSeatName}}]</p>
                    </div>
                  </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="chck-bx-stop">
                  <div class="checked">
                    <a href="#" data-toggle="modal" data-target="#LaggedBag"><span id="plus-psnger" class="psnger-plus float-right mb-1" style="display: block;" ng-click="checkLuggage();">Add Luggage <i class="ft-plus"></i></span></a>
                    <div class="clearfix"></div>
                  </div>
                  <p class="ngError pull-right">{{noLuggageSelectError}}</p>
                </div>
                <p>Pieces Of Luggage: {{totLuggages}} </p>
                <div ng-repeat="luggage in luggagesDataAdd">
                  <div class="BagLuggage number-bg-lst">             
                    <p>{{luggage.item}}</p>
                    <span>{{luggage.quantity}}</span>
                  </div>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" ng-show="bookingFrom.airport">
                <div class="airlne-blck  wow fadeIn" data-class="fadeIn"  id="sto-sec1">
                  <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-make-book mrgn-top-frm">
                          <label>Airline</label>
                          <air-line-code></air-line-code>
                      </div>    
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                      <div class="form-make-book mrgn-top-frm">
                          <label>Flight Number</label>
                          <input type="text" name="flightNumber" ng-model="bookingFrom.flightNumber" placeholder="Flight Number" autocomplete="off"  />
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 mrgn-top-frm">
                <div class="chck-bx-stop">
                  <div class="checked">
                    <input id="checkbox-Airport"  ng-value="Airport" class="checkbox-custom" ng-model="bookingFrom.airport" type="checkbox">
                    <label for="checkbox-Airport" class="checkbox-custom-label fnt-wt label-deco" style="font-size:15px;">Airport</label>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Codes</label>
                  <input type="text" ng-model="bookingFrom.codes"  placeholder="Codes" autocomplete="off"  />
                </div>                                           
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Coupon Codes</label>
                  <input ng-model="bookingFrom.coupanCode" placeholder="Enter Coupon Code" type="text" autocomplete="off" >
                </div>                                           
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Customer's Notes</label>
                  <textarea type="text" ng-model="bookingFrom.customerNote" placeholder="Visible to dispatchers, drivers and customers" autocomplete="off" ></textarea>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Dispatcher's Notes</label>
                  <textarea type="text" ng-model="bookingFrom.dispacherNote" placeholder="Visible to dispatchers and drivers" autocomplete="off" ></textarea>
                </div>
              </div>                        
            </div>
          </div>
          <!-- Estimate Calculation -->
          <div class="whte-blck lwr-sec-blck lwr-mrgn-top">
            <div class="hed-blck">
              <div class="icn-hd-blck back-chnge">
                 <span class="fa fa-calculator"></span>
              </div>
              <div class="frm-title ser-title">Estimate Quotations</div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead> 
                        <tr  ng-hide="checkLoader">
                          <th colspan="2" class="text-center"><i class="fa fa-refresh fa-spin" style="font-size:18px"></i></th>
                        </tr>
                        <tr>
                          <th>Trip Duration</th>
                          <th><span class="pull-right ">{{estimateDuration}}</span></th>
                        </tr>
                        <tr>
                          <th>Trip Distance</th>
                          <th><span class="pull-right ">{{estimateDistanceEffect}} Mi</span></th>
                        </tr>
                        <tr>
                          <th>Calculate Distance</th>
                          <th><span class="pull-right ">{{mainDistance}} Mi</span></th>
                        </tr>
                        <tr>
                          <th>Calculate Passenger</th>
                          <th><span class="pull-right ">{{calPassenger}}</span> </th>
                        </tr>
                        <tr>
                          <th>Calculate Fare</th>
                          <th class="txtBrd"><span class="pull-right ">${{estimateBasefare}}</span></th>
                        </tr>
                        <tr>
                          <td>Estimated Total</td>
                          <td><span class="pull-right TaxLeft TaxLeftInpt"><input type="text" limit-to="6" allow-decimal-numbers  ng-model="estimateFare"  class="form-control" placeholder="$0"></span></td>
                        </tr>
                        <tr ng-repeat="seat in seatInfo">
                          <td class="txtBrd">
                            <div class="row">
                              <div class="col-md-9">{{seat.childSeatName}}<p class="Smtx">{{seat.description}}</p></div>
                              <div class="col-md-3">Qt : {{seat.quantity}}</div>
                            </div>                              
                          </td>
                          <td class="text-right txtBrd " >
                            <div class="txtBrdflex ">
            
                              <span class="pull-right TaxLeft TaxLeftInpt"><input type="text" limit-to="6" allow-decimal-numbers ng-model="seat.total" ng-keyup="preCalculation();" class="form-control" placeholder="$0"></span>
                            </div>
                          </td>
                        </tr>             
                        <tr>
                          <td>Additional price (Luggage + Stop)</td>
                          <td><span class="pull-right TaxLeft TaxLeftInpt"><input type="text" allow-decimal-numbers ng-model="additionalPriceMain" ng-keyup="preCalculation();" limit-to="6" class="form-control" placeholder="$0"></span></td>
                        </tr>
                        <tr>
                          <td colspan="2" class="border-0 txtPad"><b>Item</b></td>
                        </tr>
                        <tr ng-repeat="invoice in invoiceData track by $index" ng-init="parentIndex = $index">
                          <td class="txtBrd">
                            <div class="row">
                              <div class="col-md-9"><input type="text"  name="item"  ng-model="invoice.item" ng-keydown="changecursorItem($event,parentIndex);" id="input{{parentIndex}}" placeholder="Search Item" class="form-control border-0" style="padding: .5rem 0rem;" placeholder="Enter Item" autocomplete="off" >
                                <div class="clearfix"></div>
                                <div id="search-results" class="showdivhide{{parentIndex}}" style="visibility:hidden;display: none;">
                                <div class="search-result" ng-repeat="item in itemList | searchForItem: invoice.item" ng-bind="item.itemName" ng-click="setQueryItem($index,parentIndex,item.itemId);"></div>
                                </div>
                                <p class="Smtx">{{invoice.description}}</p>
                              </div>
                              <div class="col-md-3"><input type="text" limit-to="4" allow-only-numbers  ng-model="invoice.quantity" class="form-control border-0" ng-keyup="preInvoiceCalculation(true);" style="padding: .5rem 0rem;" placeholder="Qt."></div>                                  
                            </div>                              
                          </td>
                          <td class="text-right txtBrd " >
                            <div class="txtBrdflex ">
                              <a href="#" ng-click="remove_invoice($index);" class="Lnght38"><i class="ft-trash mr-1 text-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"></i></a>
                              <span class="pull-right TaxLeft TaxLeftInpt"><input type="text" allow-decimal-numbers ng-model="invoice.total" limit-to="6" ng-keyup="preInvoiceCalculation(false);" style="max-width: 111px;" class="form-control" placeholder="$0"></span>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <td class="text-right" colspan="2"><button type="button" class="fltr-btn flter-btn-ad btn book-rde" ng-click="add_invoice();"><i class="ft-plus"></i> Add Item</button></td>
                        </tr>
                        <!-- dicount & tax -->
                        <tr>
                          <td colspan="2" class="border-0 txtPad"><b>Fee</b></td>
                        </tr>
                        <tr ng-repeat="invoice1 in invoiceData" ng-hide="invoice1.removeTax">
                          <td class="txtBrd">
                            <input type="text" class="form-control border-0" style="padding: .5rem 0rem;" ng-model="invoice1.taxName" placeholder="Enter Fee">
                          </td>
                          <td class="text-right txtBrd " >
                              <div class="txtBrdflex ">
                                <a href="#" ng-click="show_tax_invoice($index);" class="Lnght38"><i class="{{invoice1.taxvisible ? 'ft-check mr-1 text-success' :'ft-x mr-1 text-danger' }}" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="check"></i></a>
                                <a href="#" ng-click="remove_tax_invoice($index);" class="Lnght38"><i class="ft-trash mr-1 text-danger" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Delete"></i></a>
                              <span class="pull-right TaxLeft TaxLeftInpt"><input type="text" class="form-control" placeholder="$0" ng-keyup="preInvoiceCalculation(false);" ng-model="invoice1.taxAmount"></span>
                              </div>
                          </td>
                        </tr>
                        <tr>
                          <td colspan="2" class="border-0 txtPad"><b>Discount</b></td>
                        </tr>
                        <tr>
                          <td class="txtBrd">
                            <input type="text"  name="discountName" ng-model="discountName" ng-keydown="changecursorDiscount($event);" id="inputDiscount" class="form-control border-0" style="padding: .5rem 0rem;" placeholder="Enter Discount" autocomplete="off" >
                            <div class="clearfix"></div>
                            <div id="search-results" class="showdivhideDiscount" style="visibility:hidden;display: none;">
                            <div class="search-result" ng-repeat="discount in discountList | searchForDiscount: discountName" ng-bind="discount.discountName" ng-click="setQueryDiscount($index,discount.discountId);"></div>
                            </div> 
                          </td>
                          <td class="txtBrd"><span class="pull-right TaxLeft TaxLeftInpt"><input type="text" allow-decimal-numbers ng-model="estimateDiscount" ng-keyup="preCalculation();" limit-to="6" class="form-control" placeholder="$0" autocomplete="off" ></span></td>
                        </tr>
                          <!-- dicount & tax -->
                      </thead>
                      <tfoot>
                        <tr>
                          <th>Estimated Total</th>
                          <th class="txtBrd"><span class="pull-right ">${{estimateFare}}</span></th>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                </div>
                <div class="det-btn text-center containerr">
                  <button type="button" ng-disabled="addBooking.$invalid"  class="fltr-btn btn book-rde" ng-click="showPreview();" onclick="PriceOpn('OverFlow','NewPreview')">Preview</button>
                  <button type="button" ng-click="saveBooking(0);" ng-disabled="addBooking.$invalid" class="fltr-btn btn new-book-btn-mrgn qute-btn">Send Link</button>
                  <button type="button" ng-click="expiryLink();" ng-disabled="estimateSentCheck" class="fltr-btn btn new-book-btn-mrgn book-rde">Expiry Link</button>
                </div>
              </div>    
            </div>                             
          </div>  
           <!-- Estimate Calculation -->
        </div>
        <!-- Right side manage -->
        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
          <div class="whte-blck lwr-sec-blck respnsve-top-mrgn">
            <div class="hed-blck">
              <div class="icn-hd-blck back-chnge">
                 <span class="ft-map-pin"></span>
              </div>
              <div class="frm-title">
                 Ride Detail
              </div>
            </div>
            <!-- map -->
            <div class="map-rde-sec" style="height:300px width:100%;">
              <div id="addBookingMap" width="100%" height="300" style="height:350px;position: unset;overflow: hidden;"></div>
            </div>
            <!-- map -->
            <div class="row">
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-make-book mrgn-btm">
                  <label>Pickup Date <span class="red">*</span></label>
                  <div class='input-group date datePic' id='datetimepicker11234'>
                    <input type="text" id="pickupDate" ng-model="bookingFrom.pickupDate" init-date="bookingFrom.pickupDate"  class="form-control" readonly />
                    <span class="input-group-addon">
                    <span class="ft-calendar"></span>
                    </span>
                  </div>
                </div>
              </div>
              <div class="col-lg-6 col-md-12 col-sm-12 col-xs-12">
                <div class="form-group form-make-book mrgn-btm">
                  <label>Pickup Time <span class="red">*</span></label>
                  <div class='input-group date timePic' id='datetimepicker1865'>
                    <input type='text' id="pickupTime" ng-model="bookingFrom.pickupTime" class="form-control" readonly />
                    <span class="input-group-addon">
                    <span class="ft-clock"></span>
                    </span>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Pickup Location <span class="red">*</span></label>
                  <google-pickup location="bookingFrom.pickupLocation" latitude="bookingFrom.pickupLatitude" longitude="bookingFrom.pickupLongitude"></google-pickup>
                  <input type="hidden" name="pickupLocation" ng-model="bookingFrom.pickupLocation" ng-change="calcRoute()" id="startB" required>
                  <input type="hidden" ng-model="bookingFrom.pickupLatitude">
                  <input type="hidden" ng-model="bookingFrom.pickupLongitude">
                  <span class="ngError" ng-show="addBooking.pickupLocation.$touched && addBooking.pickupLocation.$invalid">Please enter pickup location.</span>
                </div>
              </div>
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="mt-1">
                  <button type="button" class="fltr-btn flter-btn-ad btn book-rde" data-toggle="modal" ng-click="getStopstData();" data-target="#AddStopsM"><i class="ft-plus"></i> Add Stops</button>
                </div>  
              </div>
              <!-- way -->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm" ui-sortable="sortableOptions" ng-model="waypoints">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 Dragsec" ng-repeat="way in waypoints track by  $index" "">
                    <span class="handle input-group-addon"><i class="fa fa-ellipsis-v" aria-hidden="true"></i></span>
                    <div class="whte-blck ad-srvic-pop MinDet mb-1" ng-show="(way.isGroup==false)? true :false">
                      <div class="det-hed">
                        <div class="det-left">
                          <h6 class="pls-btn-back mb-0">{{way.location}} ({{way.waytime}} Min)</h6>
                        </div>
                        <div class="det-right">  
                          <a href="#"  ng-click="waypointRemove($index)"><i class="ft-trash text-danger"></i></a>
                        </div>                      
                      </div>
                    </div>
                    <div class="whte-blck ad-srvic-pop MinDet mb-1" ng-show="way.isGroup">
                      <div class="det-hed">
                        <div class="det-left">
                          <h6 class="pls-btn-back mb-0"><span class="tme-dash2 text-left"><img style="width: 50px;height:50px;border-radius:50%;" src="{{way.groupImage}}"></span>{{way.groupName}} ({{way.waytime}} Min)</h6>
                        </div>
                        <div class="det-right">
                          <a href="#"  ng-click="waypointRemove($index)"><i class="ft-trash text-danger"></i></a>
                        </div>                      
                      </div>
                    </div>
                  </div>  
                </div>
              </div>
              <!-- way -->
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="form-make-book mrgn-top-frm">
                  <label>Destination <span class="red">*</span></label>
                  <google-destination location="bookingFrom.destination" latitude="bookingFrom.destinationLatitude" longitude="bookingFrom.destinationLongitude"></google-destination>
                  <input type="hidden" name="destination" ng-model="bookingFrom.destination" ng-change="calcRoute()" id="endB" required>
                  <input type="hidden" ng-model="bookingFrom.destinationLatitude" >
                  <input type="hidden" ng-model="bookingFrom.destinationLongitude">
                  <span class="ngError" ng-show="addBooking.destination.$touched && addBooking.destination.$invalid">Please enter destination.</span>
                </div>
              </div> 
            </div>
            <div class="det-hed drvr">
              <h5><span class="ft-user"></span>Driver</h5>
            </div> 
            <div class="frm-reser">
              <input type="radio" name="driverAssignStatus" ng-model="bookingFrom.driverAssignStatus" id="driver-radio-Offered" class="radio-button"  ng-value="1" />
              <label for="driver-radio-Offered" class="radio-button-click-target">
                <span class="radio-button-circle"></span>Offered
              </label>
              <input type="radio" name="driverAssignStatus" ng-model="bookingFrom.driverAssignStatus" id="driver-radio-Confirmed" class="radio-button" ng-value="2" />
              <label for="driver-radio-Confirmed" class="radio-button-click-target">
                <span class="radio-button-circle"></span>Confirmed
              </label>
            </div>
            <div class="form-make-book"> 
              <div class="select-box our_selct-box">
                <ui-select ng-model="assignDriverdata" theme="select2"  title="Choose a Driver" append-to-body="true" ng-change="driverCompanyvehiclelist(assignDriverdata);">
                  <ui-select-match placeholder="No driver assigned.Click to select a driver...">
                    {{$select.selected.email}}
                  </ui-select-match>
                  <ui-select-choices repeat="person in companyDrive | propsFilter: {firstName: $select.search, lastName: $select.search, email: $select.search}">
                    <div ng-bind-html="person.fullName | highlight: $select.search"></div>
                    <span class="stus-style pull-right {{(person.onlineStatus=='ON')? 'onlne' : 'oflne'}}">
                    <i class="ft-circle"></i> {{person.onlineStatusBy}}</span>
                    <small><b>Email:</b> {{person.email}}   <b>Contact:</b> {{person.contact| tel}}  </small>
                  </ui-select-choices>
                </ui-select>
              </div>
            </div>   
            <div class="form-make-book mrgn-top-frm">
               <label>Select Vehicle</label>
               <input type="hidden" name="assignDriverId" ng-model="bookingFrom.assignDriverId">
               <select class="form-control" ng-model="bookingFrom.assignVehicleId">
                  <option ng-value="" disabled>Select Vehicle...</option>
                  <option  ng-repeat="vehicle in vehiclelist" ng-value="vehicle.vehicleId" >   {{  vehicle.year }} {{  vehicle.make }} {{  vehicle.model }}</option>
               </select>
            </div>
            <div class="stops-fields stop-sec wow fadeIn mrgn-top-frm" data-class="fadeIn" id="sto-sec20" ng-show="bookingFrom.driverNoteCheck">
               <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 frm-margn form-make-book input_fields_container">
                     <label>Driver's Notes</label>
                     <textarea type="text" ng-model="bookingFrom.driverNote" autocomplete="off" ></textarea>
                  </div>
               </div>
            </div>
            <div class="chck-bx-stop mrgn-top-frm">
               <div class="checked">
                  <input id="checkbox-driNote"  ng-model="bookingFrom.driverNoteCheck" class="checkbox-custom"  type="checkbox" autocomplete="off" >
                  <label for="checkbox-driNote" class="checkbox-custom-label fnt-wt label-deco" style="font-size:15px;">Driver's Notes</label>
               </div>
            </div>
            <div class="det-hed drvr">
              <h5><span class="ft-hash"></span> Affiliated Detail</h5>
              <div class="form-make-book mrgn-top-frm">
                 <label>Estimated Fare <i ng-hide="checkLoader" class="fa fa-refresh fa-spin" style="font-size:18px"></i></label>
                 <input type="text" ng-model="estimateFare" name="estimateFare" allow-only-numbers class="form-control" placeholder="Estimated Fare" readonly="readonly" />
                    <span class="ngError" ng-show="addBooking.estimateFare.$touched && addBooking.estimateFare.$invalid">Please enter estimate fare.</span>
                    <span class="ngError" ng-show="routeSetStatus">Route convenience not available.</span>
              </div>  
              <div class="form-make-book mrgn-top-frm">
                 <label>Price</label>
                 <input type="text" ng-model="bookingFrom.affiliatedPrice" allow-only-numbers class="form-control" placeholder="Price" />
              </div>
              <div class="form-make-book mrgn-top-frm">
                 <label>Affiliated Notes</label>
                 <textarea type="text" ng-model="bookingFrom.affiliateNote" autocomplete="off" ></textarea>
              </div>
            </div>
          </div>
          <div class="whte-blck lowr-blck-whte lwr-mrgn-top">
            <div class="hed-blck">
              <div class="icn-hd-blck">
                 <span class="ft-list"></span>
              </div>
              <div class="frm-title ser-title">
                 Payment Method
              </div>
            </div>
            <div class="form-make-book mrgn-top-frm">
              <label>Payment Method <span class="red">*</span></label>
              <select class="form-control" name="paymentMethod" ng-model="bookingFrom.paymentMethod" required>
                 <option ng-repeat="pay in paymentMethod" ng-value="pay.type">{{pay.type}}</option>
                
              </select>
                <span class="ngError" ng-show="addBooking.paymentMethod.$touched && addBooking.paymentMethod.$invalid">Please enter payment method.</span>
            </div>   
            <div class="chck-bx-stop mrgn-top-frm" ng-show="customerRecord.length">
            	<div class="checked">
            		<input id="checkbox-addMsg"  ng-value="bookingFrom.addMsg" class="checkbox-custom" ng-model="bookingFrom.addMsg"  ng-change="change_cus_msg();" type="checkbox" >
            		<label for="checkbox-addMsg" class="checkbox-custom-label fnt-wt label-deco" style="font-size:15px;">Customer Message</label>
            	</div>
            </div>
            <div class="stops-fields stop-sec wow fadeIn mrgn-top-frm" data-class="fadeIn" id="sto-sec3" ng-show="bookingFrom.addMsg && customerRecord.length">
              <div class="row">
      		      <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 frm-margn form-make-book input_fields_container">
                  <div class="input-group reser-frm add-locatn margin-filed" ng-repeat="msg in cus_messages track by $index" > 
                    <input type="text"  class="form-control" placeholder="Enter a title"  ng-model="msg.title" name="messageCus[]" autocomplete="off" /> 
                    <input type="text"  class="form-control" placeholder="Enter a message" style="width: 45%" ng-model="msg.message" name="messageCus[]" autocomplete="off"  /> <a href="#"  ng-click="cusMsgRemove($index)"><span class="input-group-addon"><i class="ft-minus"></i></span></a> 
    			       </div>
      			     <a href="#" class="mt-2 pull-right" ng-click="cusMsgAdd()" style="font-size: 14px !important;"><span class="input-group-addon"><i class="ft-plus"></i> Add Message</span></a>
      		      </div>
              </div>
            </div>
            <!-- /******/ -->
            <div class="det-btn mrgn-top-frm containerr mb-2">
              <button type="button" class="fltr-btn mt-1 new-book-btn-mrgn"  onclick="navsideClose('OverFlow','NewBooking')">Cancel</button>

              <button type="button" ng-disabled="addBooking.$invalid" class="btn fltr-btn btn mt-1 new-book-btn-mrgn qute-btn" ng-click="saveBooking(1);">Book Ride</button>
            </div>
          </div>
        </div>  
      </div>
    </form>
  </div>
  <!-- Lagged Bag Popup -->
  <div class="modal fade" id="LaggedBag" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger text-bold-600" id="basicModalLabel2">Luggage Bags</h4>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="chck-bx-stop mb-2">
                <input id="checkbox50"  class="checkbox-custom" name="noLuggage" ng-model="bookingFrom.noLuggage"   type="checkbox"   ng-true-value="true" ng-false-value="false" >
                <label for="checkbox50" class="checkbox-custom-label fnt-wt label-deco" style="font-size:14px;padding-left:29px !important;">No Luggage</label>
              </div>
            </div>
            <div class="col-lg-6" ng-repeat="luggage in luggages">
              <div class="bag-list-txt" ng-class="luggage.quantity > 0 ? 'active' : '' ">
                <div class="media">
                  <img class="mr-1" src="<?php echo LUGGAGES_PHOTO; ?>{{luggage.luggage_image}}" alt="">
                  <div class="media-body">
                    <h5>{{luggage.item}} </h5>
                    <h6 class="text-danger text-bold-600">{{luggage.equal}}</h6>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <button class="btn btn-light btn-sm" ng-click="decrement($index)"><i class="ft-minus"></i></button>
                      </div>
                      <input type="text" class="form-control qty_input text-center" ng-model="luggage.quantity" min="0" readonly >
                      <div class="input-group-prepend">
                        <button class="btn btn-light btn-sm" ng-click="increment($index)"><i class="ft-plus"></i></button>
                      </div>
                    </div>                  
                  </div>
                </div> 
                <span ng-show="luggage.quantity > 0"><i class="fa fa-check"></i></span>                                     
              </div>
            </div>
            <div class="col-lg-12" ng-show="luggagesList.length==0">
                <h5 class="text-center">No luggage found</h5>
            </div>
            <div class="col-lg-12 text-right mt-1">
              <div class="det-btn">
                <button type="button" class="fltr-btn btn"  data-dismiss="modal" aria-label="Close" ng-click="checkLuggages();">Close</button>
                <button type="button" class="fltr-btn btn book-rde" ng-hide="luggagesList.length==0" ng-click="checkLuggages();">Save</button>
              </div>
            </div>          
          </div>        
        </div>
      </div>
    </div>
  </div>
  <!-- add passenger -->
  <div class="modal fade" id="AddPassenger" tabindex="-1" role="dialog" data-backdrop="static" data-keyboard="false" aria-labelledby="basicModalLabel4" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title text-danger text-bold-600" id="basicModalLabel4">Add Passenger</h4>
        </div>
        <div class="modal-body">
          <div class="row">

            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <p>Total Passenger: {{(passenger.adult) + (passenger.children)}} </p>
              <p>Number Of Passenger: {{passenger.adult}} Adult, {{passenger.children}} Children </p>
            </div>
              
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
              <h5>Number Of Adult </h5>
              <div class="input-group" ng-init="passenger.adult=1" style="max-width: 150px;">
                <div class="input-group-prepend">
                  <button class="btn btn-light btn-sm" ng-click="passenger.adult = (passenger.adult > 0) ? passenger.adult-1 : 0 "><i class="ft-minus"></i></button>
                </div>
                <input type="text" class="form-control qty_input text-center" ng-model="passenger.adult" min="0" allow-only-numbers >
                <div class="input-group-prepend">
                  <button class="btn btn-light btn-sm" ng-click="passenger.adult = passenger.adult+1; passengerRequired = false"><i class="ft-plus"></i></button>
                </div>
              </div>
            </div>
            <div class="clearfix"></div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-1">
                <h5>Number Of Children </h5>
                <div class="input-group" ng-init="passenger.children=0" style="max-width: 150px;">
                  <div class="input-group-prepend">
                    <button class="btn btn-light btn-sm" ng-click="removePassenger();"><i class="ft-minus"></i></button>
                  </div>
                  <input type="text" class="form-control qty_input text-center" ng-model="passenger.children" min="0" allow-only-numbers readonly>
                  <div class="input-group-prepend">
                    <button class="btn btn-light btn-sm" ng-click="addPassenger();"><i class="ft-plus"></i></button>
                  </div>
                </div>
            </div>

            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 usr-slct" id="chld-add-block" ng-if="passenger.children > 0">
              <div class="user-type form-make-book" >
                  <div class="children-block" id="children-block" ng-repeat="children in children_array track by $index" ng-init="childParentIndex = $index" >
                  <label>Age Of Child </label>
                    <div class="mt-10">
                      <div class="Ustype" ng-repeat="childAge in childAgeArray" >
                        <span class="radio-inline">
                        <input value="childAge.age" ng-value="childAge.age"  ng-model="children.childAge"  name="childAge{{childParentIndex}}"  type="radio">
                        <label><span>{{childAge.age}}</span></label>
                      </span>
                    </div>
                  </div>
                  <!-- seat -->
                  <div class="seat-type-chld">
                    <div class="frm-reser form-make-book chck-bx-stop mrgn-top-frm">
                      <div class="checked">
                        <input id="checkbox-addMsgS{{childParentIndex}}" class="checkbox-custom" ng-change="childrenStateChanged(childParentIndex)"  ng-model="children.useCounterSeat" ng-true-value="true" ng-false-value="false"  type="checkbox" >
                        <label for="checkbox-addMsgS{{childParentIndex}}">Seats </label>
                      </div>
                      <div ng-show="children.useCounterSeat" >
                          <span ng-repeat="valSeat in passengerSetList track by $index" ng-init="seatIndex = $index">
                            <input ng-value="valSeat.id" ng-model="children.childSeatId" name="seatName{{childParentIndex}}" ng-change="children.childSeatName=valSeat.seatName"  id="car-seat-clnt-{{seatIndex}}-{{childParentIndex}}" class="radio-button ng-valid-parse" type="radio">
                            <label for="car-seat-clnt-{{seatIndex}}-{{childParentIndex}}" class="radio-button-click-target">
                            <span class="radio-button-circle"></span>{{valSeat.seatName}}
                            </label>
                          </span>
                      </div>
                    </div>
                  </div>
                  <!-- seat -->
                </div>
              </div>  
             <!--  {{children_array |json}}  -->
            </div>   

            <div class="col-lg-12 text-right mt-1">
              <div class="det-btn">
             <button type="button" class="fltr-btn btn"  data-dismiss="modal" aria-label="Close"  ng-click="savePassenger()">Close</button> 
                <button type="button" class="fltr-btn btn book-rde" data-dismiss="modal" aria-label="Close" ng-click="savePassenger()">Save</button>
              </div>
            </div>          
          </div>        
        </div>
      </div>
    </div>
  </div>
  <!-- End add passenger -->
  <!--  lag quotations -->
  <!-- add stops service -->
  <div class="modal fade" id="AddStopsM" tabindex="-1" role="dialog" aria-labelledby="basicModalLabel2" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header border-bottom border-light">
          <h4 class="modal-title" id="basicModalLabel2">Add Stops</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
          <div class="StopBlck whte-blck ad-srvic-pop clearfix"> 
            <div class="form-make-book">
              <div class="row">
                <div class="col-lg-8">
                  <input type="radio" name="disableExpression" ng-model="disableExpression" id="a1" class="radio-button"  ng-value="true" />
                  <label  for="a1" class="radio-button-click-target"><span class="radio-button-circle"></span>ADDRESS</label>
                  <input type="type" googleplaceapi ng-model="stopData.wayAddress" class="show-name-other-add" placeholder="" ng-click="wayAddressCheck()" id="AddClick">
                </div>
               
                <div class="col-lg-4" id="AddTime" ng-show="fillAddessother">
                  <label class="radio-button-click-target">RESERVE TIME</label>
                    <select class="form-control" ng-model="stopData.waytime">
                       <option  ng-repeat="timeList in getTimeList" ng-value="timeList.time" selected>{{timeList.time}} minutes</option>
                    </select>                 
                </div>              
              </div>              
            </div>
            <div class="form-make-book mrgn-top-frm"  >
              <input type="radio" name="disableExpression" ng-model="disableExpression" id="a2" class="radio-button" ng-value="false" />
              <label  for="a2" class="radio-button-click-target"><span class="radio-button-circle"></span> EN-ROUTE STOP</label>
              <div  ng-show="getStopGList.length==0">
                  <div class="text-center">Not found record.</div>
              </div>
              <ul class="clearfix" ng-disabled="disableExpression" ng-class="{'disabled': disableExpression}">
                <li   ng-repeat="stop in getStopGList">
                 <input class="IntRout" type="radio" id="stopROWId-{{stop.groupId}}" placeholder="" name="routStop">
                  <label for="stopROWId-{{stop.groupId}}" class="RoutOptic" ng-click="showStopGroup(stop.groupId);">
                    
                    <img  style="width: 50px;height:50px;border-radius: 50%;" src="{{stop.groupImage}}" alt="">
                    <h6>{{stop.title}}</h6>                   
                  </label>                  
                </li>
              </ul>
              <div class="row" id="RadioTime" style="width: 100%;" ng-show="showStopDataDetail">
                <div class="col-lg-4">
                  <div class="form-make-book mrgn-top-frm">
                    <label for="">RESERVE TIME</label>
                    <select class="form-control" ng-model="stopData.slotTime"  >
                       <option  ng-repeat="t in showStopData.slotTime" ng-value="t.time"
                       selected>{{t.time}} minutes</option>
                      </select>
                  </div>  
                </div>
                <div class="col-lg-8">
                  <div class="form-make-book mrgn-top-frm">
                    <label>Description</label>
                    <p>{{showStopData.description}}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>          
        </div>
        <div class="modal-footer">
          <div class="det-btn">
            <button type="button" class="fltr-btn btn" data-dismiss="modal">Close</button>
            <button type="button" class="fltr-btn btn book-rde" data-dismiss="modal" ng-click="wayPopupAddress();">Save</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- add stops service -->
  <!-- invoice preview -->
  <!--Invoice page -->
  <div id="NewPreview" class="priceside">
    <div class="slidr-hed-clse clearfix">
        <h2 class="mt-10">Estimate Quotations Preview </h2>
        <a href="#" class="closebtn" onclick="PriceClose('OverFlow','NewPreview')">&times;</a>
    </div>
    <div class="clearfix"></div>
    <div class="Item-Library whte-blck ad-srvic-pop mt-2 m-1 p-1">
      <page size="A4" style="">
          <table style="width: 100%;">
              <tr>
                  <td>
                      <table style="width: 100%;">
                          <tr>
                              <td>
                                  <img src="<?php echo $frontend_dashboard_assets; ?>/img/logo.png" alt="company logo" width="70">
                                  <h2 style="margin-top: 0; font-size: 16px; color: #333;">Reservision Org.</h2>
                              </td>
                              <td style="text-align:right">
                                  <h2 style="font-weight: 400; margin-top: 0; margin-bottom: 10px;">INVOICE</h2>
                                  <p style="color: #868686;
                                          font-weight: 500;
                                          margin-top: 0;
                                          font-size: 15px;
                                          margin-bottom: 15px;"># INV-{{bookingFrom.bookingId}}</p>
                                  <p style="color: #868686;
                                          font-weight: 400;
                                          margin-top: 0;
                                          font-size: 15px;
                                          margin-bottom: 10px;"><?php echo date("dS M, Y"); ?></p>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <tr>
                  <td>
                      <p class="text-muted">Bill To,</p>

                      <h2 style="font-size: 18px;
                      margin-bottom: 0px;
                      color: #333;"  ng-repeat="party in customerRecord" ng-show="party.invoiceAllow==1">{{party.firstName}} {{party.lastName}}</h2>
                      <p style="color: #868686;
                      margin-top: 10px;
                      font-size: 16px;"></p> 
                  </td>
              </tr>
              <tr>
                  <td>
                      <h2 style="font-size:16px; color:#333; margin-bottom: 10px;">Trip Info</h2>
                      <hr style="display: block;height: 1px;border: 0;border-top: 1px solid #e3ebf3;">
                      <table style="width: 100%; border-collapse: collapse;">
                          <tr>
                              <td>
                                  <h2 style="font-size: 14px; color: #464855; margin-bottom: 8px;font-weight: 600;">Date & Time :</h2>
                                  <p style="font-size: 15px; margin-top: 0; color: #6b6f80; line-height: 24px;">{{bookingFrom.pickupDate}}, {{bookingFrom.pickupTime}}</p>
                                  <div style="margin-top: 10px;">
                                      <h2 style="font-size: 14px; color: #464855; margin-bottom: 8px;font-weight: 600;">Source :</h2>
                                      <p style="font-size: 15px; margin-top: 0; color: #6b6f80; line-height: 24px;">{{bookingFrom.pickupLocation}}</p>
                                  </div>
                                  <div style="margin-top: 10px;">
                                      <h2 style="font-size: 14px; color: #464855; margin-bottom: 8px;font-weight: 600;">Destination :</h2>
                                      <p style="font-size: 15px; margin-top: 0; color: #6b6f80; line-height: 24px;">{{bookingFrom.destination}}</p>
                                  </div>
                              </td>
                              <td style="text-align: right">

                                  <h2 style="font-size: 14px; color: #464855; margin-bottom: 8px;font-weight: 600;">Passenger ({{passenger.adult+passenger.children}})</h2>
                                  <p style="font-size: 15px; margin-top: 0; color: #6b6f80; line-height: 24px; margin-bottom: 3px;">Adult : {{passenger.adult}}</p>
                                  <p style="font-size: 15px; margin-top: 0; color: #6b6f80; line-height: 24px;">Children : {{passenger.children}}</p>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
              <tr>
                  <td>
                      <div class="table-responsive">
                          <table class="itemInfo" style="width: 100%;">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Item</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th class="text-right">Total</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <tr  ng-repeat="seat in seatInfo">
                                    <th scope="row">#</th>
                                    <td>
                                    {{seat.childSeatName}}
                                    </td>
                                    <td>{{seat.quantity}}</td>
                                    <td>{{seat.price}}</td>
                                    <td class="text-right">$ {{seat.total}}</td>
                                  </tr>

                                  <tr  ng-repeat="invoice in invoiceData track by $index" ng-show="invoice.total>0">
                                      <th scope="row">#</th>

                                      <td>
                                          {{invoice.item}}
                                      </td>
                                      <td>{{invoice.quantity}}</td>
                                      <td>{{invoice.price}}</td>
                                      <td class="text-right">$ {{invoice.total}}</td>
                                  </tr>
                               

                              </tbody>
                          </table>
                      </div>
                  </td>
              </tr>
              <tr>
                  <td>
                      <table style="width: 100%;">
                          <tr>
                              <td></td>
                              <td style="width: 50%;">
                                  <p style="font-size: 18px;
                                  margin-top: 8px; color: #6b6f80;">Total due</p>
                                  <div class="table-payment">
                                      <table style="border-top: 1px solid #828282; width: 100%;">
                                          <tbody>
                                              <tr>
                                                  <td>Fare</td>
                                                  <td class="text-right">$ {{estimateBasefare}}</td>
                                              </tr>
                                              <!-- <tr>
                                                <td>Luggage Price</td>
                                                <td class="text-right">$ 0.00</td>
                                              </tr> -->
                                            <!--   <tr>
                                                <td>Route Fee</td>
                                                <td class="text-right">$ {{estimateTax}}</td>
                                              </tr> -->
                                              <tr ng-show="additionalPriceMain >0">
                                                <td>Additional Price (Luggage + Stop)</td>
                                                <td class="text-right">$ {{additionalPriceMain}}</td>
                                              </tr>
                                              <tr ng-repeat="invoicetax in invoiceData" ng-show="invoicetax.taxAmount >0 && invoicetax.removeTax==0 && invoicetax.taxvisible==1">
                                                <td>{{invoicetax.taxName}} </td>
                                                <td class="text-right">$ {{invoicetax.taxAmount}}</td>
                                              </tr>
                                              <tr ng-show="estimateDiscount >0">
                                                <td>Discount 
                                                  <span style="font-size: 13px; display: inline-block; width: 100%; margin-top:3px;">({{discountName}})</span>
                                                </td>
                                                <td class="pink text-right">(-) $ {{estimateDiscount}}</td>
                                              </tr>
                                            <!--   <tr>
                                                  <td>Sub Total</td>
                                                  <td class="text-right">$ 2,000.00</td>
                                              </tr> -->
                                              <tr>
                                                  <td style="font-weight: 600; font-size: 16px;">Total</td>
                                                  <td class="text-right" style="font-weight: 600; font-size: 16px;"> $ {{estimateFare}}</td>
                                              </tr>

                                          </tbody>
                                      </table>
                                  </div>
                              </td>
                          </tr>
                      </table>
                  </td>
              </tr>
          </table>
      </page>
      <div class="det-btn text-right">
        <button type="button" ng-click="saveBooking(0);" class="fltr-btn btn mt-1 book-rde">Send</button>
      </div>
    </div>    
  </div>
  <!-- invoice preview -->
</div>
<style type="text/css">
.children-block {
  padding: 12px 0px;
}
.usr-slct .Ustype input[type="radio"] + label span {
  border: 1px solid transparent;
}
.BagLuggage{
  border: 1px dashed #ccc;
  padding: 8px;
  margin-bottom: 8px;
  position: relative;
  opacity: 0.6;
}
.BagLuggage p{
  font-size: 14px;
  margin:0;
  padding-right: 25px;
}
.BagLuggage span{
  display: block;
  opacity: 1;
  position: absolute;
  top: 9px;
  right: 10px;
  background-color: #EB3349;
  border-radius: 50%;
  width: 18px;
  height: 18px;
  color: #fff;
  text-align: center;
  font-size: 12px;
  line-height: 15px;
}
</style>

  <footer class="footer footer-static footer-light navbar-border navbar-shadow">
    <div class="clearfix blue-grey lighten-2 text-sm-center mb-0 px-2"><span class="float-md-left d-block d-md-inline-block"><?php echo COPYRIGHT; ?></span>
    </div>
  </footer>
  

  <?php
        $frontend_dashboard_assets =  base_url().'frontend_asset/dashboard/';
    ?>

    <!-- BEGIN VENDOR JS-->
<script src="<?php echo $frontend_dashboard_assets; ?>js/vendors.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/app-menu.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/app.min.js" type="text/javascript"></script>

 <!-- <script src="<?php echo $frontend_dashboard_assets; ?>js/jquery.min.js" type="text/javascript"></script> -->
 
 <script src="<?php echo $frontend_dashboard_assets; ?>js/jquery-ui.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/jquery.dragtable.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/tableHeadFixer.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/moment.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/bootstrap-datetimepicker.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/select2.full.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/form-select2.min.js" type="text/javascript"></script>
<script src="<?php echo $frontend_dashboard_assets; ?>js/custom.js" type="text/javascript"></script>

</body>
</html>
