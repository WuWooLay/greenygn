 
<div class="list-group d-none d-md-block mb-3">

    <a href="/users/" class="list-group-item list-group-item-action ">
        <i class="material-icons md-18 text-success">nature</i>
        Plants
    </a>

    <a href="/users/orderlist" class="list-group-item list-group-item-action ">
        <i class="material-icons md-18 text-success">message</i>
        Orders list
    </a>

    <a href="/users/cart/" class="list-group-item list-group-item-action ">
        <i class="material-icons md-18 text-success">shopping_cart</i>
        Cart
        <?php 
            if(isset($_SESSION['cart'])):
        ?>
            <span class="badge badge-primary"><?= count($_SESSION['cart']) ?></span>
        <?php
            endif;
        ?>
    </a>

    <a href="/users/map" class="list-group-item list-group-item-action ">
        <i class="material-icons md-18 text-success">location_on</i>
        Search By Geological
    </a>

</div>


