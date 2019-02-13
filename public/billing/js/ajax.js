var INVENTORY_API_URL_AJAX_PROCESS="process/process";
var INVENTORY_API_URL_AJAX_VIEW="process/view";
var billarray=[];
var billtotal=0;

function PrintReport()
{
var dialog = bootbox.dialog({
message: '<p class="text-center">Please wait while we do something...</p>',
closeButton: false
});
  var contents = $("#printdiv").html();
          var frame1 = $('<iframe />');
          frame1[0].name = "frame1";
          frame1.css({ "position": "absolute", "top": "-1000000px" });
          $("body").append(frame1);
          var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
          frameDoc.document.open();
          frameDoc.document.write('<html><head>');
          frameDoc.document.write("<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'><link rel='stylesheet' type='text/css' href='css/main.css'><link rel='stylesheet' type='text/css' href='css/customstyle.css'><title>Billing Reports</title></head><body>");
          frameDoc.document.write(contents);
          frameDoc.document.write("<script src='js/jquery-2.1.4.min.js'></script><script src='ajax.js'></script><script src='js/bootstrap.min.js'></script><script src='js/plugins/pace.min.js'></script><script src='js/main.js'></script><script type='text/javascript' src='js/plugins/jquery.dataTables.min.js'></script><script type='text/javascript' src='js/plugins/dataTables.bootstrap.min.js'></script>");
          frameDoc.document.write("</body></html>");
          frameDoc.document.close();
          setTimeout(function () {
              window.frames["frame1"].focus();
              window.frames["frame1"].print();
              frame1.remove();
              dialog.modal('hide');
          }, 500);

}



function validatefunc(word,type)
{
  if(word!="" && type!="")
  {
    var reqularexp=[];
   reqularexp[0] = /^\d*$/;    //numbers only
   reqularexp[1] = /^[a-zA-Z ]*$/; //alphabets only only
   reqularexp[2] = /^[a-z\d\-_\s]+$/i;  //alpha numeric -,_,<space> only
//email only
   reqularexp[3] = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
//mobile format with + - space
   reqularexp[4] = /^[\d\-+\s]+$/i;  //numeric -,_,<space> only
/*
   reqularexp[5]= /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
*/
  reqularexp[5]=/^(http:\/\/www\.|https:\/\/www\.|http:\/\/|https:\/\/)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/gm;

  var regexppattern=reqularexp[type];
  if(regexppattern.test(word))
  {
    return true;
  }
  else
  {
    return false;
  }
}
else
{
  return false;
}
}


function showsuccess(successmsg)
{
  $.notify({
    message: successmsg
  },{
    type: "success"
  });
}
function showerrors(errormsg,focusid)
{
  $.notify({
    message: errormsg
  },{
    type: "danger"
  });
if(focusid && focusid!="")
{
$("#"+focusid).focus();
}

}


function nosession(response)
{
  if(response=="false1")
  {
  showerrors("Invalid User Login");
  }
  else if(response=="false2")
  {
    showerrors("Session Expired, Relogin again");
  }
  else if(response=="false3")
  {
    showerrors("Banned by admin, contact your administrator");
  }
  else
  {

  }
  window.setTimeout(function()
  {
    window.location.reload();
  }, 1000);
}


function stockof()
{
  var bills=[];

  $('input[name="bills_id"]:checked').each(function() {
    bills.push(this.value);
  });
  if(bills && bills!="" && bills.length>0)
  {
    window.location="stockof?ref="+bills;
  }
  else
  {
    showerrors("Bills is required, Please select bills");
  }

}

function printall()
{
  var bills=[];

  $('input[name="bills_id"]:checked').each(function() {
    bills.push(this.value);
  });
  if(bills && bills!="" && bills.length>0)
  {
    window.location="printbillall?ref="+bills;
  }
  else
  {
    showerrors("Bills is required, Please select bills");
  }

}

function resetpassword()
{
  var a=$("#opw").val();
  var b=$("#npw").val();
  var c=$("#cpw").val();
  var re1 = /[0-9]/;
  var re2 = /[a-z]/;
  var re3 = /[A-Z]/;
  if(!a || a=="")
  {
    $("#opw").focus();
    $.notify({
      message: "Old password is required"
    },{
      type: "danger"
    });
  }
  else if(!b || b=="")
  {
    $("#npw").focus();
    $.notify({
      message: "New password is required"
    },{
      type: "danger"
    });
  }
  else	if(b.length<6)
    {
      $.notify({
        message: "Password must contain at least six characters",
      },{
        type: "danger",
      });
    $("#npw").focus();
  }
  else	if(!re1.test(b))
    {
      $.notify({
        message: "password must contain at least one number (0-9)",
      },{
        type: "danger",
      });
    $("#npw").focus();
  }
  else	if(!re3.test(b))
    {
      $.notify({
        message: "password must contain at least\none uppercase letter (A-Z)  ",
      },{
        type: "danger",
      });
    $("#npw").focus();
  }
  else if(!c || c=="")
  {
    $("#cpw").focus();
    $.notify({
      message: "Confirm password is required"
    },{
      type: "danger"
    });
  }
  else if(b!=c)
  {
    $("#cpw").focus();
    $.notify({
      message: "New password & Confirm password is not same"
    },{
      type: "danger"
    });
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      opw:a,
      npw:b,
      work:'resetpassword'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=='success')
      {
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $("#username").focus();
        $.notify({
          title: "Login Incomplete : ",
          message: "Username is Invalid",
          icon: 'fa fa-times'
        },{
          type: "danger"
        });
      }
      else if(response=="false2")
      {
        $.notify({
          title: "Login Incomplete : ",
          message: "Password is wrong",
          icon: 'fa fa-times'
        },{
          type: "danger"
        });
        $("#password").focus();
      }
      else
      {
        $.notify({
          title: "Login Incomplete : ",
          message: response,
          icon: 'fa fa-times'
        },{
          type: "warning"
        });
      }
    }
    });
  }
  return false;
}


function showdueamount()
{
var total=billtotal;
var paid_amount=+(($("#paid_amount").val())?$("#paid_amount").val():0);
if(total>0 && paid_amount>0)
{
  var ans=(total-paid_amount).toFixed(2);
$("#due_amount").text(ans);
}
else
{
$("#due_amount").text("");
}
}

function showpaymentstatus()
{
  var payment_status=$("#payment_status").val();
  if(payment_status==2)
  {
    $(".payment2").show();
  }
  else
  {
    $(".payment2").hide();
  }
}

function checkimage(photoid)
{
var b=$(photoid).val();
if(b!="")
{
    var file_data = $(photoid).prop('files')[0];
          var sFileName = file_data.name;
  var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file_data.size;

          var iConvert = (file_data.size / 1048576).toFixed(2);

          if (!(sFileExtension === "jpg" || sFileExtension === "jpeg" || sFileExtension === "png") || iFileSize > 1000000)
          {
              txt = "File type : " + sFileExtension + "\n\n";
              txt += "Size: " + iConvert + " MB \n\n";
              txt += "Please make sure your file is in image format and less than 1 MB.\n\n";
$(photoid).val("");
$.notify({
  message: txt
},{
  type: "danger"
});
$(photoid).focus();
          }
          else
          {

          }
}
else
{
  $(photoid).val("");
$.notify({
  message: "Image is not selected"
},{
  type: "danger"
});
$(photoid).focus();
}

}

function updateprofile()
{
var company_name=$("#company_name").val();
var address=$("#address").val();
var mobile=$("#mobile").val();
var email=$("#email").val();
var bill_prefix=$("#bill_prefix").val();
var bill_no=$("#bill_no").val();
var account_id=$("#account_id").val();
var reemail= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
var logo_type=$("input[name='logo_type']:checked").val();
var logo_name=$("#logo_name").val();
var gstno=$("#gstno").val();
if(!logo_type || logo_type=="")
{
  $.notify({
    message: "Logo type is required"
  },{
    type: "danger"
  });
  $("#logo_type").focus();
}
else if(logo_type=="2" && logo_name=="")
{
  $.notify({
    message: "Logo name is required"
  },{
    type: "danger"
  });
  $("#logo_name").focus();
}
 else if(company_name=="")
 {
   $.notify({
     message: "Company name is required"
   },{
     type: "danger"
   });
   $("#company_name").focus();
 }
 else if(address=="")
 {
   $.notify({
     message: "Address is required"
   },{
     type: "danger"
   });
   $("#address").focus();
 }
 else if(mobile=="")
 {
   $.notify({
     message: "Mobile is required"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 else if(isNaN(mobile))
 {
   $.notify({
     message: "Type valid mobile number"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 else if(email=="")
 {
   $.notify({
     message: "Email is required"
   },{
     type: "danger"
   });
   $("#email").focus();
 }
 else if(!reemail.test(email))
 {
   $.notify({
     message: "Type valid  email id"
   },{
     type: "danger"
   });
   $("#email").focus();
 }
 else if(account_id=="")
 {
   $.notify({
     message: "Account is required"
   },{
     type: "danger"
   });
   $("#account_id").focus();
 }
 else
 {
   var form_data = new FormData();
 form_data.append('file',$('#logo').prop('files')[0]);
 form_data.append('logo_type',logo_type);
  form_data.append('logo_name',logo_name);
 form_data.append('company_name',company_name);
 form_data.append('address',address);
 form_data.append('mobile',mobile);
 form_data.append('email',email);
 form_data.append('bill_prefix',bill_prefix);
 form_data.append('bill_no',bill_no);
  form_data.append('gstno',gstno);
 form_data.append('account_id',account_id);
 form_data.append('work','updateprofile');
$.ajax({
      url: INVENTORY_API_URL_AJAX_PROCESS,
      dataType: 'text',  // what to expect back from the PHP script, if anything
          cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Profile updated successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
return false;
}


function checkcsv(csvid)
{
var b=$(csvid).val();
if(b!="")
{
    var file_data = $(csvid).prop('files')[0];
          var sFileName = file_data.name;
  var sFileExtension = sFileName.split('.')[sFileName.split('.').length - 1].toLowerCase();
        var iFileSize = file_data.size;

          var iConvert = (file_data.size / 1048576).toFixed(2);

          if (!(sFileExtension === "csv") || iFileSize > 1000000)
          {
              txt = "File type : " + sFileExtension + "\n\n";
              txt += "Size: " + iConvert + " MB \n\n";
              txt += "Please make sure your file is in CSV format and less than 1 MB.\n\n";
$(csvid).val("");
$.notify({
  message: txt
},{
  type: "danger"
});
$(csvid).focus();
          }
          else
          {

          }
}
else
{
  $(csvid).val("");
$.notify({
  message: "CSV is not selected"
},{
  type: "danger"
});
$(csvid).focus();
}

}

function importproduct()
{
var product_file=$("#product_file").val();
 if(product_file=="")
 {
   $.notify({
     message: "CSV file is required"
   },{
     type: "danger"
   });
   $("#product_file").focus();
 }
 else
 {
   var form_data = new FormData();
 form_data.append('file',$('#product_file').prop('files')[0]);
 form_data.append('work','importproduct');
$.ajax({
      url: INVENTORY_API_URL_AJAX_PROCESS,
      dataType: 'text',  // what to expect back from the PHP script, if anything
          cache: false,
            contentType: false,
            processData: false,
            data: form_data,
            type: 'post',
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Product details added successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
return false;
}

function updatedeposit(id)
{
  var account_id=$("#account_id").val();
  var deposit_date=$("#deposit_date").val();
  var cash_type=$("#cash_type").val();
  var amount=$("#amount").val();
  var notes=$("#notes").val();
  if(!id || id=="")
  {
    $.notify({
      message: "Some datas missing,try again later"
    },{
      type: "danger"
    });
  }
  else if(!account_id || account_id=="")
  {
    $.notify({
      message: "Bank Account  is required"
    },{
      type: "danger"
    });
    $("#account_id").focus();
  }
  else if(!deposit_date || deposit_date=="")
    {
      $.notify({
        message: "Deposit date is required"
      },{
        type: "danger"
      });
      $("#deposit_date").focus();
    }
    else if(!cash_type || cash_type=="")
      {
        $.notify({
          message: "Cash type is required"
        },{
          type: "danger"
        });
        $("#cash_type").focus();
      }
      else if(!amount || amount=="")
        {
          $.notify({
            message: "Amount is required"
          },{
            type: "danger"
          });
          $("#amount").focus();
        }
  else if(isNaN(amount))
  {
    $.notify({
      message: "Type valid amount"
    },{
      type: "danger"
    });
    $("#amount").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      account_id:account_id,
      amount:amount,
      deposit_date:deposit_date,
      notes:notes,
      cash_type:cash_type,
      work:'updatedeposit'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Deposit updated successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}


function updateexpense(id)
{
  var account_id=$("#account_id").val();
  var expense_date=$("#expense_date").val();
  var cash_type=$("#cash_type").val();
  var amount=$("#amount").val();
  var notes=$("#notes").val();
  if(!id || id=="")
  {
    $.notify({
      message: "Some datas missing,try again later"
    },{
      type: "danger"
    });
  }
  else if(!account_id || account_id=="")
  {
    $.notify({
      message: "Bank Account  is required"
    },{
      type: "danger"
    });
    $("#account_id").focus();
  }
  else if(!expense_date || expense_date=="")
    {
      $.notify({
        message: "Expense date is required"
      },{
        type: "danger"
      });
      $("#expense_date").focus();
    }
    else if(!cash_type || cash_type=="")
      {
        $.notify({
          message: "Cash type is required"
        },{
          type: "danger"
        });
        $("#cash_type").focus();
      }
      else if(!amount || amount=="")
        {
          $.notify({
            message: "Amount is required"
          },{
            type: "danger"
          });
          $("#amount").focus();
        }
  else if(isNaN(amount))
  {
    $.notify({
      message: "Type valid amount"
    },{
      type: "danger"
    });
    $("#amount").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      account_id:account_id,
      amount:amount,
      expense_date:expense_date,
      notes:notes,
      cash_type:cash_type,
      work:'updateexpense'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Expense updated successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}


function deleteexpense(id)
{
    if(id && id!="")
    {
    swal({
      title: "Are you sure?",
      text: "You will not be able to this  History!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        $.ajax({
        type: 'post',
        url: INVENTORY_API_URL_AJAX_PROCESS,
        data:
        {
          id:id,
          work:'deleteexpense'
        },
        success: function (response)
        {
          response=$.trim(response);
          if(response=="success")
          {
            swal("Deleted!", "Your data has been deleted.", "success");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false1")
          {
            swal("Error", "Invalid user login", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false2")
          {
            swal("Error", "Session Expired, Relogin again", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false3")
          {
            swal("Error", "Banned by admin, contact your administrator", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else
          {
            swal("Error", response, "error");
          }
        }
        });
      }
      else
      {
        swal("Cancelled", "Your data History is safe :)", "error");
      }

    });
    }
    else
    {
      $.notify({
        message: "Some Contents are missing,\nTry again later"
      },{
        type: "danger"
      });
    }

}

function deletedeposit(id)
{
    if(id && id!="")
    {
    swal({
      title: "Are you sure?",
      text: "You will not be able to this  History!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        $.ajax({
        type: 'post',
        url: INVENTORY_API_URL_AJAX_PROCESS,
        data:
        {
          id:id,
          work:'deletedeposit'
        },
        success: function (response)
        {
          response=$.trim(response);
          if(response=="success")
          {
            swal("Deleted!", "Your data has been deleted.", "success");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false1")
          {
            swal("Error", "Invalid user login", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false2")
          {
            swal("Error", "Session Expired, Relogin again", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false3")
          {
            swal("Error", "Banned by admin, contact your administrator", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else
          {
            swal("Error", response, "error");
          }
        }
        });
      }
      else
      {
        swal("Cancelled", "Your data History is safe :)", "error");
      }

    });
    }
    else
    {
      $.notify({
        message: "Some Contents are missing,\nTry again later"
      },{
        type: "danger"
      });
    }

}

function adddeposit()
{
  var account_id=$("#account_id").val();
  var deposit_date=$("#deposit_date").val();
  var cash_type=$("#cash_type").val();
  var amount=$("#amount").val();
  var notes=$("#notes").val();
  if(!account_id || account_id=="")
  {
    $.notify({
      message: "Bank Account is required"
    },{
      type: "danger"
    });
    $("#account_id").focus();
  }
  else if(!deposit_date || deposit_date=="")
    {
      $.notify({
        message: "Deposit date is required"
      },{
        type: "danger"
      });
      $("#deposit_date").focus();
    }
    else if(!cash_type || cash_type=="")
      {
        $.notify({
          message: "Cash type is required"
        },{
          type: "danger"
        });
        $("#cash_type").focus();
      }
      else if(!amount || amount=="")
        {
          $.notify({
            message: "Amount is required"
          },{
            type: "danger"
          });
          $("#amount").focus();
        }
  else if(isNaN(amount))
  {
    $.notify({
      message: "Type valid amount"
    },{
      type: "danger"
    });
    $("#amount").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      account_id:account_id,
      amount:amount,
      deposit_date:deposit_date,
      notes:notes,
      cash_type:cash_type,
      work:'adddeposit'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Deposit added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}

function addexpense()
{
  var account_id=$("#account_id").val();
  var expense_date=$("#expense_date").val();
  var cash_type=$("#cash_type").val();
  var amount=$("#amount").val();
  var notes=$("#notes").val();
  if(!account_id || account_id=="")
  {
    $.notify({
      message: "Bank Account  is required"
    },{
      type: "danger"
    });
    $("#account_id").focus();
  }
  else if(!expense_date || expense_date=="")
    {
      $.notify({
        message: "Expense date is required"
      },{
        type: "danger"
      });
      $("#expense_date").focus();
    }
    else if(!cash_type || cash_type=="")
      {
        $.notify({
          message: "Cash type is required"
        },{
          type: "danger"
        });
        $("#cash_type").focus();
      }
      else if(!amount || amount=="")
        {
          $.notify({
            message: "Amount is required"
          },{
            type: "danger"
          });
          $("#amount").focus();
        }
  else if(isNaN(amount))
  {
    $.notify({
      message: "Type valid amount"
    },{
      type: "danger"
    });
    $("#amount").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      account_id:account_id,
      amount:amount,
      expense_date:expense_date,
      notes:notes,
      cash_type:cash_type,
      work:'addexpense'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Expense added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}


function addstock()
{
  var productid=$("#productid").val();
  var qty=$("#qty").val();
  if(!productid || productid=="")
  {
    $.notify({
      message: "Product is required"
    },{
      type: "danger"
    });
    $("#productid").focus();
  }
  else if(!qty || qty=="")
    {
      $.notify({
        message: "Quantity is required"
      },{
        type: "danger"
      });
      $("#qty").focus();
    }
  else if(isNaN(qty))
  {
    $.notify({
      message: "Type valid Quantity"
    },{
      type: "danger"
    });
    $("#qty").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      productid:productid,
      qty:qty,
      work:'addstock'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Stock added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}

function addstockentry(productid)
{
  var qty=$("#qty"+productid).val();
  if(!productid || productid=="")
  {
    $.notify({
      message: "Some datas are missing"
    },{
      type: "danger"
    });
  }
  else if(!qty || qty=="")
    {
      $.notify({
        message: "Quantity is required"
      },{
        type: "danger"
      });
      $("#qty"+productid).focus();
    }
  else if(isNaN(qty))
  {
    $.notify({
      message: "Type valid Quantity"
    },{
      type: "danger"
    });
    $("#qty").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      productid:productid,
      qty:qty,
      work:'addstock'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Stock added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  return false;
}

function addaccount()
{
  var account_no=$("#account_no").val();
  var account_type=$("#account_type").val();
  var mobile=$("#mobile").val();
  var bank_name=$("#bank_name").val();
  var bank_branch=$("#bank_branch").val();
  var contact_personname=$("#contact_personname").val();
  var mobile=$("#mobile").val();
  var initial_balance=$("#initial_balance").val();
  var netbanking_url=$("#netbanking_url").val();
  var message=$("#message").val();
  var ifsc_code=$("#ifsc_code").val();

  var remap=/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;

  if(!account_no || account_no=="")
  {
    $.notify({
      message: "Account number is required"
    },{
      type: "danger"
    });
    $("#account_no").focus();
  }
  else if(!account_type || account_type=="")
  {
    $.notify({
      message: "Account type is required"
    },{
      type: "danger"
    });
    $("#account_type").focus();
  }
  else if(!bank_name || bank_name=="")
  {
    $.notify({
      message: "Bank name is required"
    },{
      type: "danger"
    });
    $("#bank_name").focus();
  }
  else if(!bank_branch || bank_branch=="")
  {
    $.notify({
      message: "Bank branch is required"
    },{
      type: "danger"
    });
    $("#bank_branch").focus();
  }
  else if(!ifsc_code || ifsc_code=="")
  {
    $.notify({
      message: "IFSC code is required"
    },{
      type: "danger"
    });
    $("#ifsc_code").focus();
  }

  else if(initial_balance!="" && isNaN(initial_balance))
  {
    $.notify({
      message: "Type valid initial balance"
    },{
      type: "danger"
    });
    $("#initial_balance").focus();
  }
  else if(mobile!="" && isNaN(mobile))
  {
    $.notify({
      message: "Type valid mobile number"
    },{
      type: "danger"
    });
    $("#mobile").focus();
  }
  else if(netbanking_url!="" && !remap.test(netbanking_url))
  {
    $.notify({
      message: "Type or copy paste valid URL"
    },{
      type: "danger"
    });
    $("#netbanking_url").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      message:message,
      account_no:account_no,
      account_type:account_type,
      bank_name:bank_name,
      bank_branch:bank_branch,
      initial_balance:initial_balance,
      contact_personname:contact_personname,
      mobile:mobile,
      netbanking_url:netbanking_url,
      ifsc_code:ifsc_code,
      work:'addaccount'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Account added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
return false;
}

function updateaccount(id)
{
  var account_no=$("#account_no").val();
  var account_type=$("#account_type").val();
  var mobile=$("#mobile").val();
  var bank_name=$("#bank_name").val();
  var bank_branch=$("#bank_branch").val();
  var contact_personname=$("#contact_personname").val();
  var initial_balance=$("#initial_balance").val();
  var netbanking_url=$("#netbanking_url").val();
  var message=$("#message").val();
  var ifsc_code=$("#ifsc_code").val();
  if(!id || id=="")
  {
    $.notify({
      message: "Some datas are missing"
    },{
      type: "danger"
    });
  }
  else if(!account_no || account_no=="")
  {
    $.notify({
      message: "Account number is required"
    },{
      type: "danger"
    });
    $("#account_no").focus();
  }
  else if(!account_type || account_type=="")
  {
    $.notify({
      message: "Account type is required"
    },{
      type: "danger"
    });
    $("#account_type").focus();
  }
  else if(!bank_name || bank_name=="")
  {
    $.notify({
      message: "Bank name is required"
    },{
      type: "danger"
    });
    $("#bank_name").focus();
  }
  else if(!bank_branch || bank_branch=="")
  {
    $.notify({
      message: "Bank branch is required"
    },{
      type: "danger"
    });
    $("#bank_branch").focus();
  }
  else if(!ifsc_code || ifsc_code=="")
  {
    $.notify({
      message: "IFSC code is required"
    },{
      type: "danger"
    });
    $("#ifsc_code").focus();
  }
  else if(initial_balance!="" && isNaN(initial_balance))
  {
    $.notify({
      message: "Type valid initial balance"
    },{
      type: "danger"
    });
    $("#initial_balance").focus();
  }
  else if(mobile!="" && isNaN(mobile))
  {
    $.notify({
      message: "Type valid mobile number"
    },{
      type: "danger"
    });
    $("#mobile").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      message:message,
      account_no:account_no,
      account_type:account_type,
      bank_name:bank_name,
      bank_branch:bank_branch,
      initial_balance:initial_balance,
      contact_personname:contact_personname,
      mobile:mobile,
      netbanking_url:netbanking_url,
      ifsc_code:ifsc_code,
      work:'updateaccount'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Account updated successfully"
        },{
          type: "success"
        });
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
return false;
}

function statusaccount(id)
{
  if(!id || id=="")
  {
    $.notify({
      message: "Some datas are missing"
    },{
      type: "danger"
    });
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      work:'statusaccount'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Account status updated successfully"
        },{
          type: "success"
        });
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
return false;
}

function deleteaccount(id)
{
    if(id && id!="")
    {
    swal({
      title: "Are you sure?",
      text: "You will not be able to this  History!",
      type: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel plx!",
      closeOnConfirm: false,
      closeOnCancel: false
    }, function(isConfirm) {
      if (isConfirm) {
        $.ajax({
        type: 'post',
        url: INVENTORY_API_URL_AJAX_PROCESS,
        data:
        {
          id:id,
          work:'deleteaccount'
        },
        success: function (response)
        {
          response=$.trim(response);
          if(response=="success")
          {
            swal("Deleted!", "Your data has been deleted.", "success");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false1")
          {
            swal("Error", "Invalid user login", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false2")
          {
            swal("Error", "Session Expired, Relogin again", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else if(response=="false3")
          {
            swal("Error", "Banned by admin, contact your administrator", "error");
            window.setTimeout(function()
            {
               window.location.reload();
             }, 1000);
          }
          else
          {
            swal("Error", response, "error");
          }
        }
        });
      }
      else
      {
        swal("Cancelled", "Your data History is safe :)", "error");
      }

    });
    }
    else
    {
      $.notify({
        message: "Some Contents are missing,\nTry again later"
      },{
        type: "danger"
      });
    }

}

function paymentstatus(status,id)
{
  if(status && status!="" && id && id!="")
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      status:status,
      work:'paymentstatus'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Payment status updated successfully"
        },{
          type: "success"
        });
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  else
  {
    $.notify({
      message: "Some contents are missing"
    },{
      type: "danger"
    });
  }
}

function stager(stage,id)
{
  if(stage && stage!="" && id && id!="")
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      stage:stage,
      work:'updatestager'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Stager updated successfully"
        },{
          type: "success"
        });
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
  else
  {
    $.notify({
      message: "Some contents are missing"
    },{
      type: "danger"
    });
  }
}

function PrintAccount()
{
  var contents = $("#printdiv").html();
          var frame1 = $('<iframe />');
          frame1[0].name = "frame1";
          frame1.css({ "position": "absolute", "top": "-1000000px" });
          $("body").append(frame1);
          var frameDoc = frame1[0].contentWindow ? frame1[0].contentWindow : frame1[0].contentDocument.document ? frame1[0].contentDocument.document : frame1[0].contentDocument;
          frameDoc.document.open();
          //Create a new HTML document.
          frameDoc.document.write('<html><head>');
          frameDoc.document.write("<link href='https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'><link rel='stylesheet' type='text/css' href='css/main.css'><link rel='stylesheet' type='text/css' href='css/customstyle.css'><title>Account</title></head><body>");
          frameDoc.document.write(contents);
          frameDoc.document.write("<script src='js/jquery-2.1.4.min.js'></script><script src='ajax.js'></script><script src='js/bootstrap.min.js'></script><script src='js/plugins/pace.min.js'></script><script src='js/main.js'></script><script type='text/javascript' src='js/plugins/jquery.dataTables.min.js'></script><script type='text/javascript' src='js/plugins/dataTables.bootstrap.min.js'></script>");
          frameDoc.document.write('</body></html>');
          frameDoc.document.close();
          setTimeout(function () {
              window.frames["frame1"].focus();
              window.frames["frame1"].print();
              frame1.remove();
          }, 500);
}

function deletebill(id)
{
  if(id && id!="")
  {
  swal({
    title: "Are you sure?",
    text: "You will not be able to this  History!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function(isConfirm) {
    if (isConfirm) {
      $.ajax({
      type: 'post',
      url: INVENTORY_API_URL_AJAX_PROCESS,
      data:
      {
        id:id,
        work:'deletebill'
      },
      success: function (response)
      {
        response=$.trim(response);
        if(response=="success")
        {
          swal("Deleted!", "Your data has been deleted.", "success");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false1")
        {
          swal("Error", "Invalid user login", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false2")
        {
          swal("Error", "Session Expired, Relogin again", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false3")
        {
          swal("Error", "Banned by admin, contact your administrator", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else
        {
          swal("Error", response, "error");
        }
      }
      });
    }
    else
    {
      swal("Cancelled", "Your data History is safe :)", "error");
    }

  });
  }
  else
  {
    $.notify({
      message: "Some Contents are missing,\nTry again later"
    },{
      type: "danger"
    });
  }

}

function updatebill(id,deposit_id,bill_no)
{
  var client_id=$("#client_id").val();
  var discount_type=$("#discount_type").val();
  var discount=$("#discount").val();
  var payment_status=$("#payment_status").val();
  var paid_amount=+(($("#paid_amount").val())?$("#paid_amount").val():0);
  if(bill_no=="")
  {
    $.notify({
      message: "Some datas missing"
    },{
      type: "danger"
    });
  }
  else if(client_id=="")
  {
    $.notify({
      message: "Client is required"
    },{
      type: "danger"
    });
    $("#client_id").focus();
  }
  else if(discount_type!="" && discount=="")
  {
    $.notify({
      message: "Discount is required,if discount type is selected"
    },{
      type: "danger"
    });
    $("#discount").focus();
  }

  else if(discount_type!="" && discount!="" && isNaN(discount))
  {
    $.notify({
      message: "Type valid Discount"
    },{
      type: "danger"
    });
    $("#discount").focus();
  }
  else if(billarray=="" || billarray.length==0)
  {
    $.notify({
      message: "Add atleast one product"
    },{
      type: "danger"
    });
    $("#product_id").focus();
  }

  else if(payment_status=="" || !payment_status)
  {
    $.notify({
      message: "Payment details is required"
    },{
      type: "danger"
    });
    $("#payment_status").focus();
  }
  else if(payment_status=="2" && paid_amount==0)
  {
    $.notify({
      message: "Paid Amount is required"
    },{
      type: "danger"
    });
    $("#paid_amount").focus();
  }

  else if(payment_status=="2" && paid_amount!="" && isNaN(paid_amount))
  {
    $.notify({
      message: "Type valid Paid amount"
    },{
      type: "danger"
    });
    $("#paid_amount").focus();
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      id:id,
      billarray:billarray,
      client_id:client_id,
      discount_type:discount_type,
      discount:discount,
      payment_status:payment_status,
      paid_amount:paid_amount,
      gtotal:billtotal,
      deposit_id:deposit_id,
      bill_no:bill_no,
      work:'updatebill'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Bills updated successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
}

function savebill()
{
  var client_id=$("#client_id").val();
  var discount_type=$("#discount_type").val();
  var discount=$("#discount").val();
  var payment_status=$("#payment_status").val();
  var paid_amount=+(($("#paid_amount").val())?$("#paid_amount").val():0);
  if(client_id=="")
  {
    $.notify({
      message: "Client is required"
    },{
      type: "danger"
    });
    $("#client_id").focus();
  }
  else if(discount_type!="" && discount=="")
  {
    $.notify({
      message: "Discount is required,if discount type is selected"
    },{
      type: "danger"
    });
    $("#discount").focus();
  }
  else if(discount_type!="" && discount!="" && isNaN(discount))
  {
    $.notify({
      message: "Type valid Discount"
    },{
      type: "danger"
    });
    $("#discount").focus();
  }
  else if(billarray=="" || billarray.length==0)
  {
    $.notify({
      message: "Add atleast one product"
    },{
      type: "danger"
    });
    $("#product_id").focus();
  }
  else if(payment_status=="" || !payment_status)
  {
    $.notify({
      message: "Payment details is required"
    },{
      type: "danger"
    });
    $("#payment_status").focus();
  }
  else if(payment_status=="2" && paid_amount==0)
  {
    $.notify({
      message: "Paid Amount is required"
    },{
      type: "danger"
    });
    $("#paid_amount").focus();
  }
  else if(payment_status=="2" && paid_amount!="" && isNaN(paid_amount))
  {
    $.notify({
      message: "Type valid Paid amount"
    },{
      type: "danger"
    });
    $("#paid_amount").focus();
  }

  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      billarray:billarray,
      client_id:client_id,
      discount_type:discount_type,
      discount:discount,
      payment_status:payment_status,
      paid_amount:paid_amount,
      gtotal:billtotal,
      work:'addbill'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=="success")
      {
        $.notify({
          message: "Bills added successfully"
        },{
          type: "success"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $.notify({
          message: "Invalid User Login"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false2")
      {
        $.notify({
          message: "Session Expired, Relogin again"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false3")
      {
        $.notify({
          message: "Banned by admin, contact your administrator"
        },{
          type: "danger"
        });
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else
      {
        $.notify({
          message: response
        },{
          type: "danger"
        });
      }
    }
    });
  }
}

function addbillproducts()
{
  var product_id=$("#product_id").val();
  var qty=+$("#qty").val();
  var tempposition="-1";
  if(product_id=="")
  {
    $.notify({
      message: "Product is required"
    },{
      type: "danger"
    });
    $("#product_id").focus();
  }
  else if(qty=="")
  {
    $.notify({
      message: "Quantity is required"
    },{
      type: "danger"
    });
    $("#qty").focus();
  }
  else if(qty!="" && isNaN(qty))
  {
    $.notify({
      message: "Type valid Quantity"
    },{
      type: "danger"
    });
    $("#qty").focus();
  }
  else
  {
    var product_name=($('option:selected',"#product_id").attr('prname'))?$('option:selected',"#product_id").attr('prname'):"";;
    var hsn=($('option:selected',"#product_id").attr('hsn'))?$('option:selected',"#product_id").attr('hsn'):"";
    var price=+(($('option:selected',"#product_id").attr('price'))?$('option:selected',"#product_id").attr('price'):0);
    var cost_price=+(($('option:selected',"#product_id").attr('costprice'))?$('option:selected',"#product_id").attr('costprice'):0);
    var cgst=+(($('option:selected',"#product_id").attr('cgst'))?$('option:selected',"#product_id").attr('cgst'):0);
    var sgst=+(($('option:selected',"#product_id").attr('sgst'))?$('option:selected',"#product_id").attr('sgst'):0);
    var cess=+(($('option:selected',"#product_id").attr('cess'))?$('option:selected',"#product_id").attr('cess'):0);
    if(billarray!="")
    {
    for(i=0;i<billarray.length;i++)
    {
      if(product_id==billarray[i]['id'])
      {
        tempposition=i;
      }
    }
    }
    if(tempposition=="-1")
    {
      billarray.push({id:product_id, product_name:product_name,hsn:hsn,cost_price:cost_price,price:price,qty:qty,cgst:cgst,sgst:sgst,cess:cess});
    }
    else
    {
        billarray[tempposition]['qty']=+(billarray[tempposition]['qty'])+qty;
    }
    $("#qty").val("");
    showbilltable();
      }
  return false;
}

function removeProducts(index)
{
  if (index > -1)
  {
      billarray.splice(index, 1);
  }
  showbilltable();
}

function showbilltable()
{
  var tablerows="";
  var total=0;
  var temp=0;
  var discount_type=$("#discount_type").val();
  var discount=+($("#discount").val())?$("#discount").val():0;
  if(billarray!="" && billarray.length>0)
  {
    for(i=0;i<billarray.length;i++)
    {
        var billqty=+(billarray[i]['qty']);
        var billqty1=billqty.toFixed(3);
        var billprice=+(billarray[i]['price']);
        var billprice1=billprice.toFixed(2);
        var billsutotal=+((billarray[i]['qty']*billarray[i]['price'])+ ((billarray[i]['qty']*billarray[i]['price'])*(((+billarray[i]['cgst'])+(+billarray[i]['sgst'])+(+billarray[i]['cess']))/100)));
        var billsutotal1=billsutotal.toFixed(2);
      j=i+1;
      tablerows=tablerows+"<tr><td>"+j+"</td><td>"
      +billarray[i]['product_name']+"</td><td>"
      +billqty1+"</td><td>"
      +billprice1+"</td><td>"
      +billarray[i]['cgst']+"</td><td>"
      +billarray[i]['sgst']+"</td><td>"
      +billarray[i]['cess']+"</td><td>"
      +billsutotal1
      +"</td><td><button type='button' onclick='removeProducts("+i+")' class='btn btn-danger mybtn2' data-toggle='tooltip' title='Remove'><i class='fa fa-remove'></i></button></td></tr>";
      total+=((billarray[i]['qty']*billarray[i]['price'])+ ((billarray[i]['qty']*billarray[i]['price'])*(((+billarray[i]['cgst'])+(+billarray[i]['sgst'])+(+billarray[i]['cess']))/100)));
    }
    temp=1;
  }
  var gtotal=+total;
  var temptotal=+0;
  if(discount_type==1)
  {
     temptotal=(gtotal)*(discount/100);
    gtotal=gtotal-temptotal;
  }
  else if(discount_type==2)
  {
    temptotal=+discount;
      gtotal=gtotal-temptotal;
  }
  var str = ""+gtotal;
  var gtotal1=gtotal;
  var n=str.indexOf(".");
  if(n>=0)
  {
  var str_arr =str.split(".");
  if(str_arr.length>1)
  {
    if(str_arr[1]>=30)
    {
      gtotal1=(+(str_arr[0]))+1;
    }
    else if(str_arr[1]<30)
    {
      gtotal1=str_arr[0];
    }
  }
}
  $("#productbilltable").html(tablerows);
  if(temp==1)
  {
    $("#total").text(total.toFixed(2));
    $("#discountdiv").text(temptotal.toFixed(2));
    $("#gtotal").text(gtotal1);
  }
  else
  {
    $("#total").text("");
    $("#discountdiv").text("");
    $("#gtotal").text("");
  }
    billtotal=gtotal1;
    showdueamount();
}
function showclientname()
{
  var clientname=$('option:selected',"#client_id").attr('clientname');
  $("#client_name").text(clientname);
}

function checkallck(ckid)
{
  if($("#"+ckid).prop('checked') == true)
  {
    $('.'+ckid).prop('checked', true);
  }
  else
  {
  $('.'+ckid).prop('checked', false);
  }
}

function logout()
{
  $.ajax({
type: 'post',
url: INVENTORY_API_URL_AJAX_PROCESS,
data:
{
  work:'logout'
 },
success: function (response)
{
  window.setTimeout(function()
  {
     window.location.reload();
   }, 1000);
}
});
}

function login()
{
  var a=$("#username").val();
  var b=$("#password").val();
  var reg1= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

  if(!a || a=="")
  {
    $("#username").focus();
    $.notify({
      title: "Login Incomplete : ",
      message: "Username is required",
      icon: 'fa fa-times'
    },{
      type: "danger"
    });
  }
  else if(!b || b=="")
  {
    $("#password").focus();
    $.notify({
      title: "Login Incomplete : ",
      message: "Password is required",
      icon: 'fa fa-times'
    },{
      type: "danger"
    });
  }
  else
  {
    $.ajax({
    type: 'post',
    url: INVENTORY_API_URL_AJAX_PROCESS,
    data:
    {
      username:a,
      password:b,
      work:'login'
    },
    success: function (response)
    {
      response=$.trim(response);
      if(response=='success')
      {
        window.setTimeout(function()
        {
           window.location.reload();
         }, 1000);
      }
      else if(response=="false1")
      {
        $("#username").focus();
        $.notify({
          title: "Login Incomplete : ",
          message: "Username is Invalid",
          icon: 'fa fa-times'
        },{
          type: "danger"
        });
      }
      else if(response=="false2")
      {
        $.notify({
          title: "Login Incomplete : ",
          message: "Password is wrong",
          icon: 'fa fa-times'
        },{
          type: "danger"
        });
        $("#password").focus();
      }
      else
      {
        $.notify({
          title: "Login Incomplete : ",
          message: response,
          icon: 'fa fa-times'
        },{
          type: "warning"
        });
      }
    }
    });
  }
return false;
}


function updateproduct(id)
{
  var product_id=$("#product_id").val();
  var hsn=$("#hsn").val();
  var product_name=$("#product_name").val();
  var comments=$("#comments").val();
  var cost_price=$("#cost_price").val();
  var price=$("#price").val();
  /*
  var tax=$("#tax").val();
  */
  var cgst=$("#cgst").val();
  var sgst=$("#sgst").val();
  var cess=$("#cess").val();
 var decimal=  /^[-+]?[0-9]+\.[0-9]+$/;
 if(product_id=="")
 {
   $.notify({
     message: "product id is required"
   },{
     type: "danger"
   });
   $("#product_id").focus();
 }
 else if(hsn=="")
 {
   $.notify({
     message: "HSN is required"
   },{
     type: "danger"
   });
   $("#hsn").focus();
 }
 else if(product_name=="")
 {
   $.notify({
     message: "Product name is required"
   },{
     type: "danger"
   });
   $("#product_name").focus();
 }
 else if(cost_price=="")
 {
   $.notify({
     message: "Cost price is required"
   },{
     type: "danger"
   });
   $("#cost_price").focus();
 }
 else if(!decimal.test(cost_price) && isNaN(cost_price))
 {
   $.notify({
     message: "Type valid Cost price"
   },{
     type: "danger"
   });
   $("#cost_price").focus();
 }
 else if(price=="")
 {
   $.notify({
     message: "Price is required"
   },{
     type: "danger"
   });
   $("#price").focus();
 }
 else if(!decimal.test(price) && isNaN(price))
 {
   $.notify({
     message: "Type valid  price"
   },{
     type: "danger"
   });
   $("#price").focus();
 }
 /*else if(tax=="")
 {
   $.notify({
     message: "Tax is required"
   },{
     type: "danger"
   });
   $("#tax").focus();
 }
 else if(!decimal.test(tax) && isNaN(tax))
 {
   $.notify({
     message: "Type valid  tax"
   },{
     type: "danger"
   });
   $("#tax").focus();
 }*/
 else
 {
   $.ajax({
   type: 'post',
   url: INVENTORY_API_URL_AJAX_PROCESS,
   data:
   {
     id:id,
     product_id:product_id,
     hsn:hsn,
     product_name:product_name,
     comments:comments,
     cost_price:cost_price,
     price:price,
     cgst:cgst,
     sgst:sgst,
     cess:cess,
     work:'updateproducts'
   },
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Product updated successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
  return false;
}


function addproduct()
{
  var product_id=$("#product_id").val();
  var hsn=$("#hsn").val();
  var product_name=$("#product_name").val();
  var comments=$("#comments").val();
  var cost_price=$("#cost_price").val();
  var price=$("#price").val();
  /*
  var tax=$("#tax").val();
  */
  var cgst=$("#cgst").val();
  var sgst=$("#sgst").val();
  var cess=$("#cess").val();
  var qty=($("#qty").val())?$("#qty").val():0;
 var decimal=  /^[-+]?[0-9]+\.[0-9]+$/;
 if(product_id=="")
 {
   $.notify({
     message: "Product id is required"
   },{
     type: "danger"
   });
   $("#product_id").focus();
 }
 else if(hsn=="")
 {
   $.notify({
     message: "HSN is required"
   },{
     type: "danger"
   });
   $("#hsn").focus();
 }
 else if(product_name=="")
 {
   $.notify({
     message: "Product name is required"
   },{
     type: "danger"
   });
   $("#product_name").focus();
 }
 else if(cost_price=="")
 {
   $.notify({
     message: "Cost price is required"
   },{
     type: "danger"
   });
   $("#cost_price").focus();
 }
 else if(!decimal.test(cost_price) && isNaN(cost_price))
 {
   $.notify({
     message: "Type valid Cost price"
   },{
     type: "danger"
   });
   $("#cost_price").focus();
 }
 else if(price=="")
 {
   $.notify({
     message: "Price is required"
   },{
     type: "danger"
   });
   $("#price").focus();
 }
 else if(!decimal.test(price) && isNaN(price))
 {
   $.notify({
     message: "Type valid  price"
   },{
     type: "danger"
   });
   $("#price").focus();
 }
 /*
 else if(tax=="")
 {
   $.notify({
     message: "Tax is required"
   },{
     type: "danger"
   });
   $("#tax").focus();
 }
 else if(!decimal.test(tax) && isNaN(tax))
 {
   $.notify({
     message: "Type valid  tax"
   },{
     type: "danger"
   });
   $("#tax").focus();
 }
 */
 else if(qty!="" && !decimal.test(qty) && isNaN(qty))
 {
   $.notify({
     message: "Type valid  quantity"
   },{
     type: "danger"
   });
   $("#qty").focus();
 }
 else
 {
   $.ajax({
   type: 'post',
   url: INVENTORY_API_URL_AJAX_PROCESS,
   data:
   {
     product_id:product_id,
     hsn:hsn,
     product_name:product_name,
     comments:comments,
     cost_price:cost_price,
     price:price,
     cgst:cgst,
     sgst:sgst,
     cess:cess,
     qty:qty,
     work:'addproducts'
   },
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Product added successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
  return false;
}


function updateclient(id)
{
  var client_name=$("#client_name").val();
  var comments=$("#comments").val();
  var address=$("#address").val();
  var gstno=$("#gstno").val();
  var email=$("#email").val();
  var mobile=$("#mobile").val();
  var reemail= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var remap=/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;

 if(client_name=="")
 {
   $.notify({
     message: "Client name is required"
   },{
     type: "danger"
   });
   $("#client_name").focus();
 }
 /*
 else if(email=="")
 {
   $.notify({
     message: "Email is required"
   },{
     type: "danger"
   });
   $("#email").focus();
 }*/
 else if(email!="" && !reemail.test(email))
 {
   $.notify({
     message: "Type valid  email id"
   },{
     type: "danger"
   });
   $("#email").focus();
 }
 else if(mobile=="")
 {
   $.notify({
     message: "Mobile is required"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 else if(isNaN(mobile))
 {
   $.notify({
     message: "Type valid mobile number"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 /*else if(address=="")
 {
   $.notify({
     message: "Address is required"
   },{
     type: "danger"
   });
   $("#address").focus();
 }
 else if(website!="" && !remap.test(website))
 {
   $.notify({
     message: "Type or Copy paste valid website url"
   },{
     type: "danger"
   });
   $("#website").focus();
 }*/
 else
 {
   $.ajax({
   type: 'post',
   url: INVENTORY_API_URL_AJAX_PROCESS,
   data:
   {
      id:id,
      client_name:client_name,
      comments:comments,
      address:address,
      gstno:gstno,
      email:email,
      mobile:mobile,
     work:'updateclients'
   },
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Clients updated successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
  return false;
}
function addclient()
{
  var client_name=$("#client_name").val();
  var comments=$("#comments").val();
  var address=$("#address").val();
  var gstno=$("#gstno").val();
  var email=$("#email").val();
  var mobile=$("#mobile").val();
  var reemail= /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  var remap=/^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/;

 if(client_name=="")
 {
   $.notify({
     message: "Client name is required"
   },{
     type: "danger"
   });
   $("#client_name").focus();
 }
 /*
 else if(email=="")
 {
   $.notify({
     message: "Email is required"
   },{
     type: "danger"
   });
   $("#email").focus();
 }
 */
 else if(email!="" && !reemail.test(email))
 {
   $.notify({
     message: "Type valid  email id"
   },{
     type: "danger"
   });
   $("#email").focus();
 }
 else if(mobile=="")
 {
   $.notify({
     message: "Mobile is required"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 else if(isNaN(mobile))
 {
   $.notify({
     message: "Type valid mobile number"
   },{
     type: "danger"
   });
   $("#mobile").focus();
 }
 /*else if(address=="")
 {
   $.notify({
     message: "Address is required"
   },{
     type: "danger"
   });
   $("#address").focus();
 }
 else if(website!="" && !remap.test(website))
 {
   $.notify({
     message: "Type or Copy paste valid website url"
   },{
     type: "danger"
   });
   $("#website").focus();
 }
 */
 else
 {
   $.ajax({
   type: 'post',
   url: INVENTORY_API_URL_AJAX_PROCESS,
   data:
   {
      client_name:client_name,
      comments:comments,
      address:address,
      gstno:gstno,
      email:email,
      mobile:mobile,
     work:'addclients'
   },
   success: function (response)
   {
     response=$.trim(response);
     if(response=="success")
     {
       $.notify({
         message: "Clients added successfully"
       },{
         type: "success"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false1")
     {
       $.notify({
         message: "Invalid User Login"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false2")
     {
       $.notify({
         message: "Session Expired, Relogin again"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else if(response=="false3")
     {
       $.notify({
         message: "Banned by admin, contact your administrator"
       },{
         type: "danger"
       });
       window.setTimeout(function()
       {
          window.location.reload();
        }, 1000);
     }
     else
     {
       $.notify({
         message: response
       },{
         type: "danger"
       });
     }
   }
   });
 }
  return false;
}

function deleteproducts(id)
{
  if(id && id!="")
  {
  swal({
    title: "Are you sure?",
    text: "You will not be able to this  History!",
    type: "warning",
    showCancelButton: true,
    confirmButtonText: "Yes, delete it!",
    cancelButtonText: "No, cancel plx!",
    closeOnConfirm: false,
    closeOnCancel: false
  }, function(isConfirm) {
    if (isConfirm) {
      $.ajax({
      type: 'post',
      url: INVENTORY_API_URL_AJAX_PROCESS,
      data:
      {
        id:id,
        work:'deleteproducts'
      },
      success: function (response)
      {
        response=$.trim(response);
        if(response=="success")
        {
          swal("Deleted!", "Your data has been deleted.", "success");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false1")
        {
          swal("Error", "Invalid user login", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false2")
        {
          swal("Error", "Session Expired, Relogin again", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else if(response=="false3")
        {
          swal("Error", "Banned by admin, contact your administrator", "error");
          window.setTimeout(function()
          {
             window.location.reload();
           }, 1000);
        }
        else
        {
          swal("Error", response, "error");
        }
      }
      });
    }
    else
    {
      swal("Cancelled", "Your data History is safe :)", "error");
    }

  });
  }
  else
  {
    $.notify({
      message: "Some Contents are missing,\nTry again later"
    },{
      type: "danger"
    });
  }

    return true;
}


function activebanproducts(id)
{
  if(id!="")
  {
  var temp=2;
  if($("#myck"+id).prop('checked') == true)
  {
    temp=1;
  }
  $.ajax({
  type: 'post',
  url: INVENTORY_API_URL_AJAX_PROCESS,
  data:
  {
    id:id,
    status:temp,
    work:'statusproducts'
  },
  success: function (response)
  {
    response=$.trim(response);
    if(response=="success")
    {
    }
    else if(response=="false1")
    {
      $.notify({
        message: "Invalid User Login"
      },{
        type: "danger"
      });
      window.setTimeout(function()
      {
         window.location.reload();
       }, 1000);
    }
    else if(response=="false2")
    {
      $.notify({
        message: "Session Expired, Relogin again"
      },{
        type: "danger"
      });
      window.setTimeout(function()
      {
         window.location.reload();
       }, 1000);
    }
    else if(response=="false3")
    {
      $.notify({
        message: "Banned by admin, contact your administrator"
      },{
        type: "danger"
      });
      window.setTimeout(function()
      {
         window.location.reload();
       }, 1000);
    }
    else
    {
      $.notify({
        message: response
      },{
        type: "danger"
      });
    }
  }
  });
}
}
