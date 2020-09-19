$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(".add-to-cart-btn").click(function () { //add to cart button in product page
        const product_id = $(this).data('id');
        var quantity = parseInt($('.cart-counter').html());
        alert('click');
        $.ajax({
            type: 'POST',
            url: '/cart/add',
            data: {
                product_id: product_id,
                quantity: quantity,
            },
            dataType: 'json',
            success: function () {
                $('.add-to-cart-btn').attr('disabled', true);
                $('.add-to-cart-btn').html("Уже в корзине");
                alert('Добавлено в корзину ');
            }
        });
    });

    $(".remove-from-cart").click(function () {
        const product_id = $(this).data('id');
        $.ajax({
            type: 'POST',
            url: '/cart/delete',
            data: {
                product_id: product_id,
            },
            dataType: 'json',
            success: function (response) {
                $("tr[data-id='" + product_id + "']").remove();
                $(".sum").html('$ ' + response.sum);
                alert('Удалено');
            }
        });
    });

    $(".cart-btn").click(function () { // + and - button in product page
        var quantity = $('.cart-counter').html();
        if ($(this).data('btn') == '+') {
            $('.cart-counter').html(parseInt(quantity) + 1);
        } else {
            if (quantity > 1) {
                $('.cart-counter').html(parseInt(quantity) - 1);
            }
        }
    });

    $(".cart-btn-page").click(function () { // + and - button in cart page
        const product_id = $(this).data('id');
        var price = $(".price-" + product_id).html();
        var quantity = $(".cart-counter-page[data-id='" + product_id + "']").html();
        if ($(this).data('btn') == '+') {
            quantity = parseInt(quantity) + 1;
        } else {
            if (quantity > 1) {
                quantity = parseInt(quantity) - 1;
            }
        }
        price = price.replace(/\D/g, "");
        $(".cart-counter-page[data-id='" + product_id + "']").html(quantity);
        $(".total-" + product_id).html('$ ' + quantity * price);
        $.ajax({
            type: 'POST',
            url: '/cart/update',
            data: {
                product_id: product_id,
                quantity: quantity,
            },
            dataType: 'json',
            success: function (response) {
                $(".sum").html('$ ' + response.sum);
            }
        });
    });
});

function editProduct(id) {
    $.ajax({
        type: 'POST',
        url: '/admin/getEditProduct',
        data: {id: id},
        success: function (data) {
            data = data.data
            document.getElementById("edit_product_name").value = data.name
            document.getElementById("edit_product_price").value = data.price
            document.getElementById("edit_product_description").innerHTML = data.description
            if (data.image) {
                image = data.image
                document.getElementById("originalImage").value = image
            }
            else
                image = "/images/noimage.jpg"
            document.getElementById("edit_product_image").src = image
            document.getElementById("productId").value = id;
            let scrollingElement = (document.scrollingElement || document.body)
            scrollingElement.scrollTop = scrollingElement.scrollHeight
        },
    });
}

function deleteProduct(id) {
    $.ajax({
        type: 'POST',
        url: '/admin/deleteProduct',
        data: {id: id},
        success: function () {
            alert('Удалено')
            location.reload()
        }
    })

}

function resetFile() {
    document.getElementById("file-edit-product").value = "";
    document.getElementById("edit_product_image").src = "/images/noimage.jpg";
    document.getElementById("originalImage").value = "";
}

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#product_image')
                .attr('src', e.target.result)
                .width(170);
            $('#edit_product_image')
                .attr('src', e.target.result)
                .width(170);
            document.getElementById("originalImage").value = "";
        };

        reader.readAsDataURL(input.files[0]);
    }
}


let wishlist_click = function()
{
    let element = document.querySelector(".add-to-cart-btn");
    let dataID = element.getAttribute("data-id");
    console.log(dataID);
}

document.getElementById("add-to-wishlist").addEventListener("click", wishlist_click);

// --------------Social Shop Wave------------
$('#add_recommend, a.add_recommend').click(function () {
    if ($('#ssw-review-simple-html:hidden').length) {
        $('#ssw-review-simple-html').slideDown();
    }
    else {
        $('#ssw-review-simple-html').slideUp();
    }
});

$('.ssw-ask-question-link.ssw-pull-right.btn.button, a.ssw-ask-question-link.ssw-pull-right.btn.button').click(function () {
    if ($('#ssw-questions-content:hidden').length) {
        $('#ssw-questions-content').slideDown();
        $('#ssw-questions-content .ssw-add-question-form').slideDown();
    }
    else {
        $('#ssw-questions-content').slideUp();
    }
});

// $('#ssw-simple-add-review-form').submit(function () {
$('.button-post').click(function () {
    var data = {
        'body': $('.ssw-control-group').find('textarea[name="body"]').val(),
        'title': $('.ssw-control-group').find('input[name="title"]').val(),
        // 'rate': sswReviewRate,
        'product_id': 1,
    };

    $.ajax({
        type: 'POST',
        url: '/review',
        data: {id: data},
        success: function () {
            console.log(data);
            //location.reload();
        }
    })

});
