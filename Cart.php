<?php include 'header.php';?>

<body class="inblog-page">
    <?php include 'navbar.php';?>

<div class="site-content">
    <main class="site-main  main-container no-sidebar">
        <div class="container">
            <div class="breadcrumb-trail breadcrumbs">
                <ul class="trail-items breadcrumb">
                    <li class="trail-item trail-begin">
                        <a href="#">
								<span>
									Home
								</span>
                        </a>
                    </li>
                    <li class="trail-item trail-end active">
							<span>
								Shopping Cart
							</span>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="main-content-cart main-content col-sm-12">
                    <h3 class="custom_blog_title">
                        Shopping Cart
                    </h3>
                    <div class="page-main-content">
                        <div class="shoppingcart-content">
                            <form action="https://dreamingtheme.kiendaotac.com/html/stelina/shoppingcart.html" class="cart-form">
                                <table class="shop_table">
                                    <thead>
                                    <tr>
                                        <th class="product-remove"></th>
                                        <th class="product-thumbnail"></th>
                                        <th class="product-name"></th>
                                        <th class="product-price"></th>
                                        <th class="product-quantity"></th>
                                        <th class="product-subtotal"></th>
                                    </tr>
                                    </thead>
                                   <tbody id="cartBody"></tbody>
                                </table>
                            </form>
                            <div class="control-cart">
                                <button onclick="window.location.href='Shop'" class="button btn-continue-shopping">
                                    Continue Shopping
                                </button>
                                <button onclick="window.location.href='Checkout'"  class="button btn-cart-to-checkout">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>

    <?php include 'footer.php';?>


<script>
$(document).ready(function() {
  // Load cart data on page load
  $.ajax({
    url: 'get_cart.php',
    type: 'GET',
    dataType: 'json',
    success: function(data) {
      let html = '';
      let total = 0;

      if (Array.isArray(data) && data.length > 0) {
        data.forEach(item => {
          const itemTotal = parseFloat(item.qty) * parseFloat(item.product_price);
          total += itemTotal;

          html += `
            <tr class="cart_item" data-id="${item.id}">
              <td class="product-remove">
                <a href="javascript:void(0);" class="remove" data-id="${item.id}">
                </a>
              </td>

              <td class="product-thumbnail">
                <a href="#"><img src="Admin/Product_Image/${item.product_image}" alt="${item.product_name}" style="width: 60px;"></a>
              </td>
              <td class="product-name" data-title="Product">${item.product_name}</td>
              <td class="product-price" data-title="Price">$${item.product_price}</td>
              <td class="product-quantity" data-title="Quantity">
                <div class="quantity">
                  <div class="control">
                    <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                    <input type="text" step="1" data-id="${item.id}" value="${item.qty}" class="input-qty qty" size="4">
                    <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                  </div>
                </div>
              </td>
              <td class="product-subtotal" data-title="Total">$${itemTotal.toFixed(2)}</td>
            </tr>
          `;
        });

        // Append total row
        html += `
          <tr>
            <td colspan="6" class="actions">
              <div class="order-total">
                <span class="title">Total Price:</span>
                <span class="total-price">$${total.toFixed(2)}</span>
              </div>
            </td>
          </tr>
        `;

        $('#cartBody').html(html);
      } else {
        $('#cartBody').html('<tr><td colspan="6">No items in your cart.</td></tr>');
      }
    },
    error: function(xhr, status, error) {
      console.error("Error loading cart:", error);
    }
  });

  // Handle remove item from cart
  $(document).on('click', '.remove', function() {
    const id = $(this).data('id');  // Get item id
    $.ajax({
      url: 'delete_cart_item.php',  // PHP script to handle deletion
      type: 'POST',
      data: { id: id },
      success: function(response) {
        if (response.trim() === 'success') {
          // Reload the cart after removing the item
          loadCart();
        } else {
          alert('Failed to remove item.');
        }
      },
      error: function(xhr, status, error) {
        console.error("Error removing item:", error);
      }
    });
  });

  // Update quantity (+ or -)
  $(document).on('click', '.qtyplus, .qtyminus', function() {
    const $input = $(this).closest('.quantity').find('.qty');
    const currentQty = parseInt($input.val());
    const itemId = $input.data('id');

    
    $input.val(currentQty); // Update the input field
    
    // Update the cart in the backend
    $.ajax({
      url: 'update_cart_item.php',
      type: 'POST',
      data: { id: itemId, qty: currentQty },
      success: function(response) {
        if (response.trim() === 'success') {
          // Reload the cart after updating the quantity
          loadCart();
        } else {
          alert('Failed to update item quantity.');
        }
      },
      error: function(xhr, status, error) {
        console.error("Error updating quantity:", error);
      }
    });
  });

  // Reload cart and update totals
  function loadCart() {
    $.ajax({
      url: 'get_cart.php',
      type: 'GET',
      dataType: 'json',
      success: function(data) {
        let html = '';
        let total = 0;

        if (Array.isArray(data) && data.length > 0) {
          data.forEach(item => {
            const itemTotal = parseFloat(item.qty) * parseFloat(item.product_price);
            total += itemTotal;

            html += `
              <tr class="cart_item" data-id="${item.id}">
                <td class="product-remove">
                  <a href="javascript:void(0);" class="remove" data-id="${item.id}">
                  </a>
                </td>

                <td class="product-thumbnail">
                  <a href="#"><img src="Admin/Product_Image/${item.product_image}" alt="${item.product_name}" style="width: 60px;"></a>
                </td>
                <td class="product-name" data-title="Product">${item.product_name}</td>
                <td class="product-price" data-title="Price">$${item.product_price}</td>
                <td class="product-quantity" data-title="Quantity">
                  <div class="quantity">
                    <div class="control">
                      <a class="btn-number qtyminus quantity-minus" href="#">-</a>
                      <input step="1" type="text" data-id="${item.id}" value="${item.qty}" class="input-qty qty" size="4">
                      <a href="#" class="btn-number qtyplus quantity-plus">+</a>
                    </div>
                  </div>
                </td>
                <td class="product-subtotal" data-title="Total">$${itemTotal.toFixed(2)}</td>
              </tr>
            `;
          });

          // Append total row
          html += `
            <tr>
              <td colspan="6" class="actions">
                <div class="order-total">
                  <span class="title">Total Price:</span>
                  <span class="total-price">$${total.toFixed(2)}</span>
                </div>
              </td>
            </tr>
          `;

          $('#cartBody').html(html);
        } else {
          $('#cartBody').html('<tr><td colspan="6">No items in your cart.</td></tr>');
        }
      },
      error: function(xhr, status, error) {
        console.error("Error loading cart:", error);
      }
    });
  }
});
</script>
