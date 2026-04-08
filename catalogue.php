<h1>Catalogue de produits</h1>
<div id="product"></div>

<script>
    const container = document.getElementById('product');
    function voirProduit(id) {
            window.location.href = "produit.html?id=" + id;
        }
    fetch('products.json')
    .then(response => response.json())
    .then(products => {
        products.forEach(product => {
        const div = document.createElement('div');
        div.className = 'product';

        

        div.innerHTML = `
            <h3>${product.name}</h3>
            <p>${product.description}</p>
            <p class="price">${product.price} €</p>
        `;

        const btnDetails = document.createElement('button');
        btnDetails.textContent = "Voir les détails";
        btnDetails.addEventListener('click', () => voirProduit(product.id));
        div.appendChild(btnDetails);
        
        container.appendChild(div);
        });
    })
    .catch(error => {
        console.error('Erreur lors du chargement des produits :', error);
    }); 
</script>