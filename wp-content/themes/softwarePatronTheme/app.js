var nav_Ul = document.getElementById("menu-top-menu");

nav_Ul.classList.add('navbar-nav');
nav_Ul.classList.add('mb-2');
nav_Ul.classList.add('mb-lg-0');
const menuItems = document.querySelectorAll('.menu-item');

// Loop through each menu item
menuItems.forEach(function (item) {
    // Add the class "nav-item" to the <li> element
    item.classList.add('nav-item');

    // Get the <a> element inside the <li>
    const link = item.querySelector('a');

    // Add the classes "nav-link" and "color-primary" to the <a> element
    link.classList.add('nav-link', 'color-primary');
});

// const searchForm = document.querySelector('.woocommerce-product-search');

//   if (searchForm) {
//     searchForm.classList.add('d-flex', 'justify-content-center');
//   }

// const searchInput = document.getElementById('woocommerce-product-search-field-0');

//   if (searchInput) {
//     searchInput.classList.add('form-control', 'w-50', 'form-control-sm', 'd-inline');
//   }

//   const searchButton = document.querySelector('button[type="submit"][value="Search"]');

//   if (searchButton) {
//     searchButton.classList.add('btn', 'small', 'btn-sm');
//   }