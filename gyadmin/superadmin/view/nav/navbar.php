<nav class="navbar navbar-expand-lg navbar-dark bg-success">
   
   <!-- Brand Logo -->
       <a class="navbar-brand ml-md-1" href="/"> 
           <img src="/assets/images/logo/greenygn.svg" width="30" height="30" alt="">
           GreenYgn
       </a>
   <!-- Brand Logo End -->
  
   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
   </button>

   <div class="collapse navbar-collapse" id="navbarSupportedContent">

       <!-- Left Navbar -->
       <ul class="navbar-nav mr-auto">
           <li class="nav-item  <?= (isset($title) ?  ($title == 'Home')? 'active' : '' : '') ?>">
               <a class="nav-link" href="/"> Home </a>
           </li>

           <li class="nav-item  <?= (isset($title) ?  ($title == 'Plants')? 'active' : '' : '') ?> ">
               <a class="nav-link" href="/"> Plants </a>
           </li>
           <li class="nav-item  <?= (isset($title) ?  ($title == 'Forum')? 'active' : '' : '') ?> ">
               <a class="nav-link" href="/"> Forum </a>
           </li>


           <li class="nav-item  <?= (isset($title) ?  ( $title == 'Add' )? 'active' : '' : '') ?> dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/admin_readmal/horror"> User </a>
                    <a class="dropdown-item" href="javascript:void(0)"> Admin </a>
                    <a class="dropdown-item" href="javascript:void(0)"> About Page </a>
                  </div>
           </li>

       </ul>
       <!-- Left Navbar End-->

        <!-- Left Navbar -->
        <ul class="navbar-nav mr-4">

            <li class="nav-item  mr-5 <?= (isset($title) ?  ($title == 'Setting')? 'active' : '' : '') ?> dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Setting 
                  </a>
                  <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/gyadmin/superadmin/profile.php"> Profile </a>
                    <a class="dropdown-item" href="/logout"> Logout </a>
                  </div>
            </li>

       </ul>
       <!-- Left Navbar End-->
   </div>
</nav>