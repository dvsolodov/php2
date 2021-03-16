window.onload = function () {

    document.addEventListener("click", function (event) {

        let elem = event.target;
        let parentElem = elem.parentElement;
        
        if (elem.hasAttribute('data-id')) {
            let productId = elem.dataset.id;
            let productQuant = elem.dataset.quant;

            (async () => {
                const response = await fetch('/cart/products/add', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        productId: productId,
                        productQuant: productQuant
                    }),
                });
                const answer = await response.json();
                let count = document.getElementById('count');
                count.innerHTML = '(' + answer['count'] + ')';
                let p = document.createElement("p");
                p.innerHTML = answer['buyMsg']; 
                
                parentElem.after(p);

                setTimeout(function () {
                   p.remove();
                }, 2000)
            })();
        }

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
                        let productCard = '<section><img src="/assets/images/products/small/' + product['img'] + '"><h3><a href="/products/' + product['id'] + '">' + product['name'] + '</a></h3><p>Цена: ' + product['price'] + '</p><button data-id="' + product['id'] + '" data-quant="1" data-price="' + product['price'] + '">В корзину</button></section>';
                        elem.insertAdjacentHTML('beforebegin', productCard);
                    });
                    elem.setAttribute('data-start', answer['startId']);
                } else {
                    elem.remove();
                }

                
            })();
        }

        if (elem.hasAttribute('data-prod-id')) {
            let productId = elem.dataset.prodId;
            let delElem = document.querySelector('[data-prod-id="' + productId + '"]');

            (async () => {
                const response = await fetch('/cart/products/delete', {
                    method: 'POST',
                    headers: new Headers({
                        'Content-Type': 'application/json'
                    }),
                    body: JSON.stringify({
                        productId: productId,
                    }),
                });
                const answer = await response.json();

                if (answer['status'] == 'ok') {
                    let tr = document.getElementsByTagName('tr').length;

                    if (tr == 3) {
                        let div = document.querySelector('div');
                        let p = document.createElement("p");
                        p.innerHTML = 'Корзина пуста.'; 
                        div.after(p);
                        div.remove();
                    } else {
                        delElem.remove();
                        totalPriceForProd();
                        totalPriceForCart();
                    }
                } else if (answer['status'] == 'all') {
                    let div = document.querySelector('div');
                    let p = document.createElement("p");
                    p.innerHTML = 'Корзина пуста.'; 
                    div.after(p);
                    div.remove();
                }

                let count = document.getElementById('count');
                count.innerHTML = '(' + answer['count'] + ')';
                
            })();
        }
    });
}
