<!doctype html>
<html lang = "en">
   <head>
      <meta charset = "utf-8">
      <title>jQuery UI Dialog functionality</title>
      <link href = "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css"
         rel = "stylesheet">
      <script src = "https://code.jquery.com/jquery-1.10.2.js"></script>
      <script src = "https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

      <!-- CSS -->
      <style>
         .ui-widget-header,.ui-state-default, ui-button {
            background:#b9cd6d;
            border: 1px solid #b9cd6d;
            color: #FFFFFF;
            font-weight: bold;
         }
      </style>

      <!-- Javascript -->
      <script>
         $(function() {
            $( "#dialog-1" ).dialog({
               autoOpen: false,
            });
            $( "#opener" ).click(function() {
               $( "#dialog-1" ).dialog( "open" );
            });
         });
      </script>
   </head>

   <body>
      <!-- HTML -->
      <div id = "dialog-1"
         title = "Dialog Title goes here...">This my first jQuery UI Dialog!</div>
      <button id = "opener">Open Dialog</button>
   </body>
</html>
