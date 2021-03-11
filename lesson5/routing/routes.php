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
];
