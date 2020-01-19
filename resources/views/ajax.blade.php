     @extends('layouts.layout')
     @section('title', 'ajax') //send page title to main layout
      <script>
         function getMessage() {
            $.ajax({
               type:'POST',
                data: {// change data to this object
                    _token : $('meta[name="csrf-token"]').attr('content'),
                    user_firstname:"test"
                },
               url:'/getmsg',
               success:function(data) {
                  $("#msg").html(data.msg);
               }
            });
         }
      </script>

      <div id ="msg">This message will be replaced using Ajax.
         Click the button to replace the message.</div>
            <button onclick="getMessage()">replace</button>
