<!-- sidebar nav -->
  <!--     <div class="sidebar-wrapper">
        <ul class="nav"> -->
<!-- <li class="nav-item {{ set_active(['admin']) }}">
	<a class="nav-link" href="{{ route('admin.dashboard') }}">
		<i class="material-icons">dashboard</i>
		<p>Dashboard</p>
	</a>
</li>

<li class="nav-item {{ set_active(['admin/questions*']) }}">
	<a class="nav-link" href="{{ route('admin.questions.index') }}">
		<i class="material-icons">local_library</i>
		<p>Questions</p>
	</a>
</li>


        </ul>
      </div>
 -->
<!-- <nav> navbar content here  </nav>
  <ul id="slide-out" class="sidenav">
    <li><div class="user-view">
      <div class="background">
        <img src="images/office.jpg">
      </div>
      <a href="#user"><img class="circle" src="images/yuna.jpg"></a>
      <a href="#name"><span class="white-text name">John Doe</span></a>
      <a href="#email"><span class="white-text email">jdandturk@gmail.com</span></a>
    </div></li>
    <li><a href="#!"><i class="material-icons">cloud</i>First Link With Icon</a></li>
    <li><a href="#!">Second Link</a></li>
    <li><div class="divider"></div></li>
    <li><a class="subheader">Subheader</a></li>
    <li><a class="waves-effect" href="#!">Third Link With Waves</a></li>
  </ul>
  <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a> -->


<ul id="slide-out" class="sidenav sidenav-fixed">
    <ul>
    	<li>
    		<center><img class="responsive-img" style="width: 90%; padding-top: 2%;" src="https://s13.postimg.cc/3pxqiuqyf/brandnewweb.png"></center>
    	</li>
    </ul>

    <li class="{{ set_active(['admin']) }}"><a href="{{ route('admin.dashboard') }}"><i class="material-icons">dashboard</i>Dashboard</a></li>
    <li class="{{ set_active(['admin/questions*']) }}"><a href="{{ route('admin.questions.index') }}"><i class="material-icons">local_library</i>Questions</a></li>
</ul>

