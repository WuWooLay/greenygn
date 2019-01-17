    
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
            <li class="nav-item <?= (isset($title) ?  ($title == 'Home')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/"> Home </a>
            </li>
            <li class="nav-item <?= (isset($title) ?  ($title == 'Forum')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/forum"> Forum </a>
            </li>
            <li class="nav-item <?= (isset($title) ?  ($title == 'Application')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/apps"> Apps </a>
            </li>
            <li class="nav-item <?= (isset($title) ?  ($title == 'About')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/about"> About </a>
            </li>
            <li class="nav-item <?= (isset($title) ?  ($title == 'Team')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/team"> Team </a>
            </li>

        </ul>
        <!-- Left Navbar End-->

         <!-- Left Navbar -->
         <ul class="navbar-nav">
            <li class="nav-item <?= (isset($title) ?  ($title == 'Login')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/login"> Login </a>
            </li>
            <li class="nav-item <?= (isset($title) ?  ($title == 'Register')? 'active' : '' : '') ?>">
                <a class="nav-link" href="/register"> Register </a>
            </li>
        </ul>
        <!-- Left Navbar End-->
    </div>
    </nav>