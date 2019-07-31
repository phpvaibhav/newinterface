runAllForms();
//loader manage
function preLoadshow(e){
  if(e){
      $('.pace').addClass('pace-active').removeClass('pace-inactive');
  }else{
     $('.pace').addClass('pace-inactive').removeClass('pace-active');
  }
}//end function
//loader manage
$(function(){

  $('.number-only').keypress(function(e) {
  if(isNaN(this.value+""+String.fromCharCode(e.charCode))) return false;
  })
  .on("cut copy paste",function(e){
  e.preventDefault();
  });
   $(".floatNumeric").on("keypress keyup blur",function (event) {
            //this.value = this.value.replace(/[^0-9\.]/g,'');
     $(this).val($(this).val().replace(/[^0-9\.]/g,''));
            if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                event.preventDefault();
            }
});
$(".alfaNumeric").on("keypress keyup blur",function (event) {
       
            if (this.value.match(/[^a-zA-Z0-9 ]/g)) {
                    this.value = this.value.replace(/[^a-zA-Z0-9 ]/g, '');
                }
});

   //date 
   $( "#purchaseDate" ).datepicker({  
      dateFormat: 'mm/dd/yyyy'
    });
   
   //date 


});
 //rember me
 $(function() {
  if (localStorage.chkbx && localStorage.chkbx != '') {
    $('#remember_me').attr('checked', 'checked');
    $('#username').val(localStorage.usrname);
    $('#password').val(localStorage.pass);
  } else {
    $('#remember_me').removeAttr('checked');
    $('#username').val('');
    $('#password').val('');
  }
  $('#remember_me').click(function() {
    if ($('#remember_me').is(':checked')) {
        // save username and password
        localStorage.usrname = $('#username').val();
        localStorage.pass = $('#password').val();
        localStorage.chkbx = $('#remember_me').val();
      } else {
        localStorage.usrname = '';
        localStorage.pass = '';
        localStorage.chkbx = '';
      }
    });
  });
 //rember me
  var base_url = $('body').data('base-url'); // Base url
  var authToken = $('body').data('auth-url'); // Base url
      $(function() {
        // Validation
        $("#login-form").validate({
          // Rules for form validation
          rules : {
            email : {
              required : true,
              email : true
            },
            password : {
              required : true,
              minlength : 3,
              maxlength : 20
            }
          },

          // Messages for form validation
          messages : {
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a valid email address'
            },
            password : {
              required : 'Please enter your password'
            }
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          },
          // ajax 
            submitHandler: function (form) {
              toastr.clear();
              $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: base_url+'api/'+$(form).attr('action'),
                 data: $(form).serialize(),
                  cache: false,
           beforeSend: function() {
                   preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                    preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                    setTimeout(function(){ window.location = base_url+'service'; },4000);
                  /*  if(res.users.userType==1){
						 window.location = base_url+'service';
                     // window.location = base_url+'admin/dashboard';
                    }else{
                      window.location = base_url+'service';
                    }
*/
                   
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 3000});
                  }
                  
                    
                 }
             });
             return false; // required to block normal submit since you used ajax
         }
    

        });    // Validation
        $("#forgot-form").validate({
          // Rules for form validation
          rules : {
            email : {
              required : true,
              email : true
            }
         
          },

          // Messages for form validation
          messages : {
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a valid email address'
            },
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          },
          // ajax 
            submitHandler: function (form) {
              toastr.clear();
              $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: base_url+'api/'+$(form).attr('action'),
                 data: $(form).serialize(),
                  cache: false,
           beforeSend: function() {
                     preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                   preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                    setTimeout(function(){ window.location = base_url; },4000);
                  // window.location = base_url;
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});

                  }
                  
                   // $('#submit').prop('disabled', false);  
                 }
             });
             return false; // required to block normal submit since you used ajax
         }
    

        });
      });

                  
      // Validation
      $(function() {
        // Validation
        $("#smart-form-register").validate({

          // Rules for form validation
          rules : {
            fullName : {
              required : true
            },
            email : {
              required : true,
              email : true
            },
            contact : {
              required : true,
            
            },
            password : {
              required : true,
              minlength : 3,
              maxlength : 20
            },
            passwordConfirm : {
              required : true,
              minlength : 3,
              maxlength : 20,
              equalTo : '#password'
            },
          
          },

          // Messages for form validation
          messages : {
            fullName : {
              required : 'Please enter your full name'
            },
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a valid email address'
            },
            contact : {
              required : 'Please enter your contact number'
            },
            password : {
              required : 'Please enter your password'
            },
            passwordConfirm : {
              required : 'Please re-enter your password',
              equalTo : 'Please enter the same password as above'
            }
          /*  ,firstname : {
              required : 'Please select your first name'
            },
            lastname : {
              required : 'Please select your last name'
            },
            gender : {
              required : 'Please select your gender'
            },
            terms : {
              required : 'You must agree with Terms and Conditions'
            }*/
          },

          // Ajax form submition
          submitHandler : function(form) {
            toastr.clear();
               $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: base_url+'api/'+$(form).attr('action'),
                 data: $(form).serialize(),
                  cache: false,
           beforeSend: function() {
                     preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                   preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                    setTimeout(function(){ window.location = base_url+'service'; },4000);
              /*      if(res.users.userType==1){
						 window.location = base_url+'service';
                      //window.location = base_url+'admin/dashboard';
                    }else{
                      window.location = base_url+'service';
                    }*/
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});

                  }
                  
                    //$('#submit').prop('disabled', false);  
                 }
             });
             return false; // required to block normal submit since you used ajax
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        // Validation
        // Change Password
          // Validation
        $("#smart-form-changepass").validate({

          // Rules for form validation
          rules : {
          
            password : {
              required : true,
              minlength : 3,
              maxlength : 20
            }, 
            npassword : {
              required : true,
              minlength : 3,
              maxlength : 20
            },
            rnpassword : {
              required : true,
              minlength : 3,
              maxlength : 20,
              equalTo : '#npassword'
            },
          
          },

          // Messages for form validation
          messages : {
            
            password : {
              required : 'Please enter your current password'
            },
            npassword : {
              required : 'Please enter your new password'
            },
            rnpassword : {
              required : 'Please re-enter your password',
              equalTo : 'Please enter the same password as above'
            }
         
          },

          // Ajax form submition
          submitHandler : function(form) {
                toastr.clear();
               $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: base_url+'api/users/'+$(form).attr('action'),
                  "headers": { 'authToken':authToken},
                 data: $(form).serialize(),
                  cache: false,
           beforeSend: function() {
                     preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                   preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                   setTimeout(function(){ window.location = base_url+'service'; },4000);
                    
                      //window.location = base_url+'admin/dashboard';
                
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});
                  }
                  
                    //$('#submit').prop('disabled', false);  
                 }
             });
             return false; // required to block normal submit since you used ajax
          },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        // Change Password
        // update profile
         $("#smart-form-updateuser").validate({

          // Rules for form validation
          rules : {
            fullName : {
              required : true
            },
            email : {
              required : true,
              email : true
            },
            contact : {
              required : true,
            
            },
          
          
          },

          // Messages for form validation
          messages : {
            fullName : {
              required : 'Please enter your login'
            },
            email : {
              required : 'Please enter your email address',
              email : 'Please enter a valid email address'
            },
           contact : {
              required : 'Please enter your contact number',
            
            },
           
          
          },

          // Ajax form submition
         /* submitHandler : function(form) {
           
             return false; // required to block normal submit since you used ajax
          },
*/
          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        // update profile
       
        $("#smart-form-service").validate({

          // Rules for form validation
          rules : {
            productName : {
              required : true
            },
            vendor : {
              required : true,
             
            },
            serialNumber : {
              required : true,
            
            },
            purchaseDate : {
              required : true,
             
            }, 
            contactNumber : {
              required : true,
             
            },
            comment : {
              required : true,
             
            },
           
          
          },

          // Messages for form validation
          messages : {
       
            productName : {
              required : 'Please enter your product name'
            },
            vendor : {
              required : 'Please enter your Vendor'
            },
            serialNumber : {
              required : 'Please enter your product serial number',
           
            },
            purchaseDate : {
              required : 'Please select your product purchase date'
            },
            contactNumber : {
              required : 'Please enter your contact number'
            },
            comment : {
              required : 'Please enter your comment'
            },
           
          },

          // Ajax form submition
        //  submitHandler : function(form) {
              // $('#submit').prop('disabled', true);
               //~ var form_data = $(form).serialize();
 
            //~ $.ajax({
                 //~ type: "POST",
                 //~ url: base_url+'api/service/'+$(form).attr('action'),
                 //~ headers: { 'authToken': authToken },
                 //~ data: form_data,
                  //~ cache: false,
         //~ //          processData: false,
       //~ // contentType: false,
           //~ beforeSend: function() {
          
                    //~ $('#submit').prop('disabled', true);  
                  //~ },     
                 //~ success: function (res) {
                   //~ $('#submit').prop('disabled', false); 
                  //~ if(res.status=='success'){
                   //~ toastr.success(res.message, 'Success', {timeOut: 5000});
                   //~ window.location = base_url+'service';
                  //~ }else{
                    //~ toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  //~ }
                  
                    
                 //~ }
             //~ });
            // return false; // required to block normal submit since you used ajax
         // },

          // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          }
        });
        //fromsubmit
        $(document).on('submit', "#smart-form-service", function (event) {
            toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url+'api/service/'+$(this).attr('action'),
        headers: { 'authToken': authToken },
        data: formData, //only input
        processData: false,
        contentType: false,
        cache: false,
            beforeSend: function () {
               preLoadshow(true);
            $('#submit').prop('disabled', true);
            },
          success: function (res) {
             preLoadshow(false);
                   setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                   setTimeout(function(){ window.location = base_url+'service'; },4000);
                  // window.location = base_url+'service';
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});
                  }
                  
                    
                 }
    });

});      
$(document).on('submit', "#smart-form-updateuser", function (event) {
    toastr.clear();
    event.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: "POST",
        url: base_url+'api/users/'+$(this).attr('action'),
        headers: { 'authToken': authToken },
        data: formData, //only input
        processData: false,
        contentType: false,
        cache: false,
            beforeSend: function () {
               preLoadshow(true);
            $('#submit').prop('disabled', true);
            },
          success: function (res) {
             preLoadshow(false);
                   setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                   setTimeout(function(){ window.location = base_url+'users/userDetail/'+res.url; },4000);
                   
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});
                  }
                  
                    
                 }
    });

});
        //fromsubmit

      });

 $("#addFormAjax").validate({
         rules: {
        password: {
          required: true,
          minlength: 6,
          maxlength: 15,
        },
        cpassword: {
           required: true,  
         minlength: 6,
           maxlength: 15,
         equalTo: "#password",
       }
      },
      messages: {
        password:{
               required: "Please enter password.",
               minlength: "Password should have minimum 6 characters.",
               maxlength: "Password should have Maxlength 15 characters.",
        }, 
        cpassword:{ 
          required:"Please enter confirm password.",
          minlength: "Confirm password should have minimum 6 characters.",
                maxlength: "Confirm password should have Maxlength 15 characters.",
          equalTo:"Confirm password does not match.",

        }
      },
      // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          },
          // ajax 
            submitHandler: function (form) {
              toastr.clear();
              $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: $(form).attr('action'),
                 data: $(form).serialize(),
                 dataType:'json',
                  cache: false,
           beforeSend: function() {
                     preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                   preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                    setTimeout(function(){ window.location = base_url; },4000);
                  
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});
                  }
                  
                  //  $('#submit').prop('disabled', false);  
                 }
             });
             return false; // required to block normal submit since you used ajax
         }

   });
// comment service
$("#commentForm").validate({
         rules: {
        comment: {
          required: true,
        } 
      },
      messages: {
        comment:{
               required: "Please enter comment.",
        }
      },
      // Do not change code below
          errorPlacement : function(error, element) {
            error.insertAfter(element.parent());
          },
          // ajax 
            submitHandler: function (form) {
              toastr.clear();
              $('#submit').prop('disabled', true);
            $.ajax({
                 type: "POST",
                 url: $(form).attr('action'),
                  headers: { 'authToken': authToken },
                 data: $(form).serialize(),
                 dataType:'json',
                  cache: false,
           beforeSend: function() {
                     preLoadshow(true);
                    $('#submit').prop('disabled', true);  
                  },     
                 success: function (res) {
                    preLoadshow(false);
                    setTimeout(function(){  $('#submit').prop('disabled', false); },4000);
                  if(res.status=='success'){
                   toastr.success(res.message, 'Success', {timeOut: 3000});
                      setTimeout(function(){ location.reload(); },3000);
                  
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 4000});
                  }
                  
                  //  $('#submit').prop('disabled', false);  
                 }
             });
             return false; // required to block normal submit since you used ajax
         }

   });
