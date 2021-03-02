window.onload = function () {

    document.addEventListener("click", function (event) {

        let elem = event.target;
        
        if (elem.hasAttribute('data-start')) {
            let startId = elem.dataset.start;

            (async () => {
                const response = await fetch('/products/addToPage', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        startId: startId, 
                    }),
                });
                const answer = await response.json();

                if (answer['status'] == 'ok') {
                    answer['products'].forEach(function(product) {
                        let productCard = '<section><img src="/assets/images/products/small/' + product['img'] + '"><h3><a href="/products/' + product['id'] + '">' + product['name'] + '</a></h3><p>Цена: ' + product['price'] + '</p><button>В корзину</button></section>';
                        elem.insertAdjacentHTML('beforebegin', productCard);
                    });
                    elem.setAttribute('data-start', answer['startId']);
                } else {
                    elem.remove();
                }

                
            })();
        }
    });
}


