<!DOCTYPE html>
<html lang="en">

<head>
  @include('admin.includes.head')
</head>

<style type="text/css">
  

  .btn {
    white-space: normal;
    color: #fff !important;
  }

  .btn > .material-icons {
    margin-top: 0;
    margin-bottom: 0; 
  }


</style>

<body class="has-fixed-sidenav">
  <header>
    @yield('breadcrumbs')
    @include('admin.includes.sidebar')
  </header>

  <main>
      @yield('content')
  </main>

  

  @include('admin.includes.scripts')
  <script type="text/javascript">
  $(document).ready(function(){
    $('.sidenav').sidenav();
    @yield('script')
  });
  </script>
</body>

</html>