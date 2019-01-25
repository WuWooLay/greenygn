<nav class="navbar navbar-expand-lg navbar-dark bg-success ">
   
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
               <a class="nav-link" href="/users/"> Home </a>
           </li>

           <li class="nav-item  <?= (isset($title) ?  ($title == 'Orders')? 'active' : '' : '') ?> ">
               <a class="nav-link" href="/users/orderlist/"> Orders List</a>
           </li>

       </ul>
       <!-- Left Navbar End-->

        <!-- Right Navbar -->
        <ul class="navbar-nav mr-4">

            <li class="nav-item  <?= (isset($title) ?  ($title == 'Cart')? 'active' : '' : '') ?> ">
               <a class="nav-link" href="/users/cart/">

                <i class="material-icons md-18">shopping_cart</i>

                <?php 
                    if(isset($_SESSION['cart'])):
                ?>
                    <span class="badge badge-dark"><?= count($_SESSION['cart']) ?></span>
                <?php
                    endif;
                ?>
                
               </a>
            </li>

            <li class="nav-item  mr-5 <?= (isset($title) ?  ($title == 'Setting')? 'active' : '' : '') ?> dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
                   <img class="rounded-circle" src="<?= $_SESSION['user']['image'] ?>" width="30" height="30" alt=" <?= $_SESSION['user']['name'] ?> ">
                   <?= $_SESSION['user']['name'] ?> 
                </a>
                  
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    <a class="dropdown-item" href="/users/profile/"> Profile </a>
                    <a class="dropdown-item" href="/logout"> Logout </a>
                </div>
            </li>

       </ul>
       <!-- Right Navbar End-->
   </div>
</nav>