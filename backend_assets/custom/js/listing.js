 var base_url = $('body').data('base-url'); // Base url
  var authToken = $('body').data('auth-url'); // Base url
          /*listing service */

          var service_list = $('#service_list').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No serivce found</center>',
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No serivce found</center>',
              },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"api/service/addServiceList",
                  "type": "POST",
                  "dataType": "json",
                  "headers": { 'authToken':authToken},
                  "dataSrc": function (jsonData) {
                     
                      return jsonData.data;
                  }
              },
              //Set column definition initialisation properties.
              "columnDefs": [
                  { orderable: false, targets: -1 },
                  
              ]

          });
        /*listing service*/
        /*listing user*/

          var user_list = $('#user_list').DataTable({ 

              "processing": true, //Feature control the processing indicator.
              "serverSide": true, //Feature control DataTables' servermside processing mode.
              "order": [], //Initial no order.
               "lengthChange": false,
              "oLanguage": {
               "sEmptyTable" : '<center>No customer found</center>',
              },
               "oLanguage": {
               "sZeroRecords" : '<center>No customer found</center>',
              },
             
              // Load data for the table's content from an Ajax source
              "ajax": {
                  "url": base_url+"api/users/userList",
                  "type": "POST",
                  "dataType": "json",
                  "headers": { 'authToken':authToken},
                  "dataSrc": function (jsonData) {
                     
                      return jsonData.data;
                  }
              },
              //Set column definition initialisation properties.
              "columnDefs": [
                  { orderable: false, targets: -1 },
                  
              ]

          });
        /*listing user*/
     
function statusChange(e){
  swal({
  title: "Are you sure?",
  text:  $(e).data('message'),
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: true,
  showLoaderOnConfirm: true
},
function(isConfirm) {
  if (isConfirm) {
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'api/service/changeStatus',
                 data: {srv:$(e).data('serid'),srs:$(e).data('sid')},
                  cache: false,
           beforeSend: function() {
          
              
                  },     
                 success: function (res) {
                  if(res.status=='success'){
                   
                  
                   swal("Success", "Your process  has been successfully done.", "success");
                 $('#service_list').DataTable().ajax.reload();
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  }
                  
                     
                 }
             });
    /*ajax*/
   
  } else {
    //swal("Cancelled", "Your Process has been Cancelled", "error");
  }
});
}
function statusChangeuser(e){
  swal({
  title: "Are you sure?",
  text:  $(e).data('message'),
  type: "warning",
  showCancelButton: true,
  confirmButtonClass: "btn-danger",
  confirmButtonText: "Yes",
  cancelButtonText: "No",
  closeOnConfirm: false,
  closeOnCancel: true,
  showLoaderOnConfirm: true
},
function(isConfirm) {
  if (isConfirm) {
    /*ajax*/
    $.ajax({
                 type: "POST",
                 url: base_url+'api/users/changeStatus',
                 data: {use:$(e).data('useid') },
                  cache: false,
           beforeSend: function() {
          
              
                  },     
                 success: function (res) {
                  if(res.status=='success'){
                   
                  
                   swal("Success", "Your process  has been successfully done.", "success");
                 $('#user_list').DataTable().ajax.reload();
                  }else{
                    toastr.error(res.message, 'Alert!', {timeOut: 5000});
                  }
                  
                     
                 }
             });
    /*ajax*/
   
  } else {
    //swal("Cancelled", "Your Process has been Cancelled", "error");
  }
});
}