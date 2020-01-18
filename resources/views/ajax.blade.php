<html>
   <head>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Ajax Example</title>

      <script src="{{asset('js/jquery.min.js')}}"></script>

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
   </head>
   
   <body>
      <div id ="msg">This message will be replaced using Ajax.
         Click the button to replace the message.</div>
            <button onclick="getMessage()">replace</button>
   
   </body>

</html>