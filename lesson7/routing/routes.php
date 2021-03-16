<?php

return [
    '' => 'Home/index',
    'home/?' => 'Home/index',
    'products/?' => 'Product/showCatalog',
    'products/(?P<id>\d+)/?' => 'Product/showProduct',
    'comments/add/?' => 'Comment/addComment',
    'products/addToPage/?' => 'Product/addProductsToPage',
    'register/?' => 'Register/register',
    'login/?' => 'Auth/login',
    'logout/?' => 'Auth/logout',
    'cart/?' => 'Cart/showCart',
    'cart/products/add/?' => 'Cart/addProductToCart',
    'cart/products/delete/?' => 'Cart/deleteProductFromCart',
    'order/?' => 'Order/showForm',
    'order/add/?' => 'Order/addOrder',
    'order/(?P<orderId>\d+)/show/?' => 'Order/showCartOfOrder',
    'myorders/?' => 'Order/showAllOrders',
];
