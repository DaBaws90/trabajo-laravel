<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/app.css">
    <style>
      .table.table-dark td{
        /* align-content: center;
        text-align: center; */
        width: 33%;
      }
      .table.table-dark th{
        /* align-content: center;
        text-align: center; */
      }
    </style>
  </head>
  <body>
      <div class="container">
        @yield('content')
        <footer style="margin-top:3%" class="text-center">Generated by DomPDF</footer>
      </div>

  </body>
</html>