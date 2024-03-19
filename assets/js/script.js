


$("#bt_register").click(function(){
    signup();
});

function signup(){
    var data_frm = new FormData($("form#register")[0]);
    $.ajax({
         url: "api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
            var details = JSON.parse(data);

            if (details["status"] == "200") {
               $.message({
                    type: "success",
                    text: details["message"],
                    duration: 5000,
                    positon: "top-center",
                    showClose: true
               });
               window.location.replace("signin.php");

            } else {
               $.message({
                    type: "error",
                    text: details["message"],
                    duration: 5000,
                    positon: "top-center",
                    showClose: true
               });
          }
         },
         error: function() {
              alert("E1: Signup Error.");
              return false;
         }
    });
}


$("#bt_login").click(function(){
    login();
});

function login(){

     if(!isEmail($("#username").val())){
          alert("Please enter correct email.")
          return false;
     }

     if(!$("#password").val()){
          alert("Please enter password.")
          return false;
     }

    var data_frm = new FormData($("form#login")[0]);
    $.ajax({
         url: "api/common.php",
         type: "POST",
         data: data_frm,
         processData: false,
         contentType: false,
         success: function(data) {
              var details = JSON.parse(data);

              if (details["status"] == "200") {
                    sessionStorage.setItem('user_login_status','true');

                    $.message({
                         type: "success",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
                    window.location.replace("index.php");

              } else {
                    $.message({
                         type: "error",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
              }
         },
         error: function() {
              alert("E2: Login Error.");
              return false;
         }
    });
}

$("#bt_adminlogin").click(function(){
     adminLogin();
 });
 
function adminLogin(){

     if(!isEmail($("#username").val())){
          alert("Please enter correct email.")
          return false;
     }

     if(!$("#password").val()){
          alert("Please enter password.")
          return false;
     }

     var data_frm = new FormData($("form#login")[0]);
     $.ajax({
          url: "../api/common.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);
               sessionStorage.setItem('admin_login_status','true') 

               if (details["status"] == "200") {
                    $.message({
                         type: "success",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
                    window.location.replace("index.php");
               } else {
                    $.message({
                         type: "error",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
               }
          },
          error: function() {
               alert("E3: Admin Login Error.");
               return false;
          }
     });
}

function isEmail(email) {
     var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
     return regex.test(email);
}

function matchPassword(password, confirm_password) {  
     if(password != confirm_password)  
     {   
       return false;  
     } else {  
       return true;  
     }  
}  

$("#bt_add_books").click(function(){
     add_books();
});

function add_books(){

     if(!$("#addBookTitle").val()){
          alert("Please enter book title.")
          return false;
     }

     if(!$("#addBookAuthor").val()){
          alert("Please enter book author.")
          return false;
     }

     if(!$("#addBookCategory").val()){
          alert("Please enter book category.")
          return false;
     }

     let book_image = $("#addBookImage")[0].files.length;
     if (book_image == 0) {
          alert("Select book image.")
          return false;
     }

     var data_frm = new FormData($("form#add_book")[0]);
     $.ajax({
          url: "../api/books.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    $.message({
                         type: "success",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
                    window.location.replace("add_books.php");

               } else {
                    $.message({
                         type: "error",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
}

function getRoundedCanvas(sourceCanvas) {
     var canvas = document.createElement('canvas');
     var context = canvas.getContext('2d');
     var width = sourceCanvas.width;
     var height = sourceCanvas.height;

     canvas.width = width;
     canvas.height = height;
     context.imageSmoothingEnabled = true;
     context.drawImage(sourceCanvas, 0, 0, width, height);
     context.globalCompositeOperation = 'destination-in';
     context.beginPath();
     context.arc(width / 2, height / 2, Math.min(width, height) / 2, 0, 2 * Math.PI, true);
     context.fill();
     return canvas;
}

$("#bt_add_author").click(function(){
     add_author();
});

function dataURItoBlob(dataURI) {
     // convert base64 to raw binary data held in a string
     // doesn't handle URLEncoded DataURIs - see SO answer #6850276 for code that does this
     var byteString = atob(dataURI.split(',')[1]);

     // separate out the mime component
     var mimeString = dataURI.split(',')[0].split(':')[1].split(';')[0]

     // write the bytes of the string to an ArrayBuffer
     var ab = new ArrayBuffer(byteString.length);

     // create a view into the buffer
     var ia = new Uint8Array(ab);

     // set the bytes of the buffer to the correct values
     for (var i = 0; i < byteString.length; i++) {
          ia[i] = byteString.charCodeAt(i);
     }

     // write the ArrayBuffer to a blob, and you're done
     var blob = new Blob([ab], {type: mimeString});
     return blob;
}

function add_author(){

     if(!$("#addAuthorFirstName").val()){
          alert("Please enter author first name.")
          return false;
     }

     if(!$("#addAuthorLastName").val()){
          alert("Please enter author last name.")
          return false;
     }

     let book_image = $("#addAuthorImage")[0].files.length;
     if (book_image == 0) {
          alert("Select author image.")
          return false;
     }

     var author_img = $('#AuthorCroppedImage').attr('src');

     var data_frm = new FormData($("form#add_author")[0]);
     data_frm.append('author_avatar', dataURItoBlob(author_img), 'avatar.jpg');

     $.ajax({
          url: "../api/books.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    $.message({
                         type: "success",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
                    window.location.replace("add_author.php");

               } else {
                    $.message({
                         type: "error",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
}

$("#bt_add_category").click(function(){
     add_category();
});

function add_category(){

     if(!$("#addBookCategory").val()){
          alert("Please enter book category.")
          return false;
     }

     var data_frm = new FormData($("form#add_category")[0]);
     $.ajax({
          url: "../api/books.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    $.message({
                         type: "success",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
                    window.location.replace("add_author.php");
               } else {
                    $.message({
                         type: "error",
                         text: details["message"],
                         duration: 5000,
                         positon: "top-center",
                         showClose: true
                    });
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
}

function admin_logout(){
}

function logout(){
     sessionStorage.removeItem('user_login_status');
     window.location.replace("logout.php");
}

$(".bookdetails").click(function(){
     
     if(sessionStorage.getItem('user_login_status'))
     {
          var book_id     = $(this).data("bookid");
          var book_title  = $(this).data("title");
          var book_image  = $(this).data("image");
          var book_author = $(this).data("author");
          var uid         = $(this).data("uid");
          var action      = $(this).data("action");

          if(action == "0")
          {
               $('#bt_reserve_book').css('display','none');
               $('#bt_borrow_book').css('display','inline-block');
               $('#getStatus').val("Borrow");

          }else{
               $('#bt_borrow_book').css('display','none');
               $('#bt_reserve_book').css('display','inline-block');
               $('#getStatus').val("Requested");

          }

          $('#getSelectedBID').val(book_id);
          $('#getSelectedUID').val(uid);

          $("#bookpopup_image").attr("src",book_image);
          $('#setBookName').text(book_title);
          $('#setBookAuthor').text(book_author);

          $('#BookPop').modal('toggle');

          
     }else{
          window.location.replace("signin.php");
     }

});

function search(book_title) 
{
    console.log(book_title);
    fetchSearchData(book_title,"","");
}

function fetchSearchData(book_title, book_author_name, book_category_name) 
{
    fetch('api/search.php', {
        method: 'POST',
        body: new URLSearchParams ('book_title=' + book_title+"&book_author_name="+book_author_name+"&book_category_name="+book_category_name)
     })
    .then(res => res.json())
    .then(res => viewSearchResults(res))
    .catch(e => console.error('Error: ' + e))
}

function viewSearchResults(data)
{
     const searchViewer = document.getElementById("search-results");
     searchViewer.innerHTML = "";
     for(let i = 0; i < data.length; i++){
          var html = '<li class="category-item '+data[i]["book_category_name"]+'" style="display: inline-block;height: 400px;"><figure><img src="'+data[i]["book_image"]+'" alt="New Releaase" /><figcaption class="bg-yellow"><div class="info-block" style="padding-top: 20px;"><h4>'+data[i]["book_title"]+'</h4><span class="author">'+data[i]["book_author_name"]+'</span><ol style="padding-top:60px;text-align: center;" ><li><a href="#" class="bookdetails" data-image="'+data[i]["book_image"]+'" data-bookid="'+data[i]["id"]+'" data-toggle=s"blog-tags" data-placement="top" title="View Details"><i class="fa  fa-eye"></i></a></li><li><a href="#" data-toggle="blog-tags" data-placement="top" title="Reserve Book"><i class="fa fa-plus-square"></i></a></li><li><a href="#" data-toggle="blog-tags" data-placement="top" title="Add to favorites"><i class="fa fa-heart"></i></a></li></ol></div></figcaption></figure></li>';
          $("#search-results").append(html);

     }
     // console.log(data);
}

const date = new Date();

let day = date.getDate();
let month = date.getMonth() + 1;
let year = date.getFullYear();

let currentDate = `${month}-${day}-${year}`;

$('#returndate').datepicker({
     format:'mm-dd-yyyy',
     minDate: 0,
     todayHighlight:true,

});
     
$('#returndate').datepicker('setStartDate', currentDate);

$(".favourite_book").click(function(){
     if(sessionStorage.getItem('user_login_status'))
     {
          var book_id     = $(this).data("bookid");
          var uid         = $(this).data("uid");
          var action      = $(this).data("action");

          if(action == "add")
          {
               action = "add_favourite";
          }else{
               action = "delete_favourite";
          }

          $.ajax({
               url: "api/books.php",
               type: "POST",
               data: {
                         action: action, 
                         uid: uid, 
                         book_id: book_id,
                    },
             
               success: function(data) {
                    var details = JSON.parse(data);
     
                    if (details["status"] == "200") {

                         Toastify({
                              text: details["message"],
                              duration: 3000,
                              close: true,
                              gravity: "top", 
                              position: "center", 
                              stopOnFocus: true, 
                              style: {
                                background: "#84bb45",
                              },
                              callback: function() {
                                   redirect("index.php");
                                   Toastify.reposition();
                                 },
                              onClick: function(){} 
                            }).showToast();

                    } else {
                         $.message({
                              type: "error",
                              text: details["message"],
                              duration: 5000,
                              positon: "top-center",
                              showClose: true
                         });
                    }
               },
               error: function() {
                    alert("E4: Add Favourite Error.");
                    return false;
               }
          });

          
     }else{
          window.location.replace("signin.php");
     }
});


function redirect(page){
     window.location.replace(page);
}

$('.timerslots').timepicker({
     show2400: true,
     className: "timerslots",
     minTime: "8:00am",
     maxTime: "4:30pm",
     disableTextInput: true,
     timeFormat: 'g:i A',
     lang: {  AM: 'AM', PM: 'PM'},
});
     
$('#bt_add_slots').click(function() {
     $('#slottable tbody').append('<tr><td><input type="text" class="form-control timerslots" name="from_time[]" placeholder=""></td><td><input type="text" name="to_time[]" class="form-control timerslots newslots"  placeholder=""></td><td style="text-align: center;" ><a href="#" class="delete_newtimeslot" onclick="delete_newtimeslot(this)" title="Delete Slot"><i class="fa  fa-trash-o"></i></a><a href="#" style="padding-left: 10px;" onclick="addTimeSlot()" class="add_timeslot book-icon-color" title="Add Slot"><i class="fa  fa-plus-circle"></i></a></td></tr>');
     
     $('.timerslots').timepicker('remove');
     $('.timerslots').timepicker({
          show2400: true,
          className: "timerslots",
          minTime: "8:00am",
          maxTime: "4:30pm",
          disableTextInput: true,
          timeFormat: 'g:i A',
          lang: {  AM: 'AM', PM: 'PM'},
     });

     // $('.newslots').change(function() {
     //      var selected=$(this).val();
     //      alert(selected);
     //  });

  });

  function addMinutesToTime(time, minsAdd) {
     function z(n){ return (n<10? '0':'') + n;};
     var bits = time.split(':');
     var mins = bits[0]*60 + +bits[1] + +minsAdd;
     return z(mins%(24*60)/60 | 0) + ':' + z(mins%60);
   }

$(".delete_timeslot").click(function()
{
     var id     = $(this).data("slotid");
     $('table#slottable tr#'+id).remove();
     $.ajax({
          url: "../api/api.php",
          type: "POST",
          data: {
                    action: "delete_timeslot", 
                    id: id, 
               },
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {

                    Toastify({
                         text: details["message"],
                         duration: 3000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#84bb45",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();

               } else {
                    Toastify({
                         text: details["message"],
                         duration: 5000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#FF0000",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
});

function addTimeSlot(){
     var data_frm = new FormData($("form#add_timeslot")[0]);
     $.ajax({
          url: "../api/api.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    Toastify({
                         text: details["message"],
                         duration: 3000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#84bb45",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               } else {
                    Toastify({
                         text: details["message"],
                         duration: 5000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#FF0000",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
}

function delete_newtimeslot(e){
     $(e).closest('tr').remove();
}

$('.updateslot').change(function() {
     var inject           = $(this).data("inject");
     var inject_value     = inject.split("#");
     var value            = $(this).val();

     $.ajax({
          url: "../api/api.php",
          type: "POST",
          data: {
                    action: "update_timeslot", 
                    id: inject_value[0], 
                    column: inject_value[1], 
                    value: value,
               },
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {

                    Toastify({
                         text: details["message"],
                         duration: 3000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                           background: "#84bb45",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                            },
                         onClick: function(){} 
                       }).showToast();

               } else {
                    Toastify({
                         text: details["message"],
                         duration: 5000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                           background: "#FF0000",
                         },
                         callback: function() {
                              redirect("add_time_slots.php");
                              Toastify.reposition();
                            },
                         onClick: function(){} 
                       }).showToast();
               }
          },
          error: function() {
               alert("E4: Add Favourite Error.");
               return false;
          }
     });
});

$("#bt_reserve_book").click(function()
{
     
     if(!$("#getSelectedSlot").val()){
          alert("Please select time slot.")
          return false;
     }

     if(!$("#returndate").val()){
          alert("Please select date of return.")
          return false;
     }
     
     var data_frm = new FormData($("form#ReserveBook")[0]);
     $.ajax({
          url: "api/books.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    Toastify({
                         text: details["message"],
                         duration: 3000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#84bb45",
                         },
                         callback: function() {
                              redirect("index.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               } else {
                    Toastify({
                         text: details["message"],
                         duration: 5000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#FF0000",
                         },
                         callback: function() {
                              redirect("index.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
});

$("#bt_borrow_book").click(function()
{
     if(!$("#getSelectedSlot").val()){
          alert("Please select time slot.")
          return false;
     }

     if(!$("#returndate").val()){
          alert("Please select date of return.")
          return false;
     }

     var data_frm = new FormData($("form#ReserveBook")[0]);
     $.ajax({
          url: "api/books.php",
          type: "POST",
          data: data_frm,
          processData: false,
          contentType: false,
          success: function(data) {
               var details = JSON.parse(data);

               if (details["status"] == "200") {
                    Toastify({
                         text: details["message"],
                         duration: 3000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#84bb45",
                         },
                         callback: function() {
                              redirect("index.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               } else {
                    Toastify({
                         text: details["message"],
                         duration: 5000,
                         close: true,
                         gravity: "top", 
                         position: "center", 
                         stopOnFocus: true, 
                         style: {
                              background: "#FF0000",
                         },
                         callback: function() {
                              redirect("index.php");
                              Toastify.reposition();
                              },
                         onClick: function(){} 
                         }).showToast();
               }
          },
          error: function() {
               alert("E4: Add Books Error.");
               return false;
          }
     });
});


const slideOutPanel = $('#notification-panel').SlideOutPanel({
           screenClose:true,
           screenOpacity:'0.5',
           screenZindex:'9998',
           width:'400px',
           showScreen:true,
           closeBtn:'<i class="fa fa-times"></i>',
           closeBtnSize:'14px',
           slideFrom:'right',

     
     });
     

function showNotification() {
     $.ajax({
          url: "api/common.php",
          type: "POST",
          data: {
              action: "pull_notification", 
              view: 'Y',
          },
      
          success: function(data) {
              var details = JSON.parse(data);

              if (details["status"] == "200") {
                 $('#notification_box').html('');
                 $('#notification_count').html('');

                  $('#notification_box').html(details["content"]);
                  $('#notification_count').html(details["count"]);

              } else {
                      $.message({
                          type: "error",
                          text: details["message"],
                          duration: 5000,
                          positon: "top-center",
                          showClose: true
                      });
              }
          },
          error: function() {
              alert("E4: Add Books Error.");
              return false;
          }
      });
     slideOutPanel.toggle();

}


