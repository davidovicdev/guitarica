var categories = [];

$.ajaxSetup({
    headers: {
        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
    },
});
$(document).on("click", "#register-button", function (e) {
    e.preventDefault();
    $.ajax({
        type: "POST",
        url: "/register",
        data: {
            register_first_name: document.getElementById("register_first_name")
                .value,
            register_last_name:
                document.getElementById("register_last_name").value,
            register_email: document.getElementById("register_email").value,
            register_phone: document.getElementById("register_phone").value,
            register_password:
                document.getElementById("register_password").value,
            register_address: document.getElementById("register_address").value,
            register_confirm_password: document.getElementById(
                "register_confirm_password"
            ).value,
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                window.location.reload();
            }
        },
        error: function (errors) {
            var errorSpans = [
                document.getElementById("register_first_name_error"),
                document.getElementById("register_last_name_error"),
                document.getElementById("register_email_error"),
                document.getElementById("register_password_error"),
                document.getElementById("register_confirm_password_error"),
                document.getElementById("register_address_error"),
                document.getElementById("register_phone_error"),
            ];
            errorSpans.forEach((errorSpan) => {
                errorSpan.innerHTML = "";
            });
            var allErrors = errors["responseJSON"]["errors"];
            $firstName = allErrors.register_first_name ?? "";
            $lastName = allErrors.register_last_name ?? "";
            $email = allErrors.register_email ?? "";
            $password = allErrors.register_password ?? "";
            $confirmPassword = allErrors.register_confirm_password ?? "";
            $address = allErrors.register_address ?? "";
            $phone = allErrors.register_phone ?? "";
            errorSpans[0].innerHTML = $firstName;
            errorSpans[1].innerHTML = $lastName;
            errorSpans[2].innerHTML = $email;
            errorSpans[3].innerHTML = $password;
            errorSpans[4].innerHTML = $confirmPassword;
            errorSpans[5].innerHTML = $address;
            errorSpans[6].innerHTML = $phone;
        },
    });
});
$(document).on("click", "#login-button", function (e) {
    e.preventDefault();
    var loginErrors = document.getElementById("login_error");
    $.ajax({
        type: "POST",
        url: "/login",
        data: {
            login_email: document.getElementById("login_email").value,
            login_password: document.getElementById("login_password").value,
        },
        success: function (response) {
            loginErrors.innerHTML = "";
            if (response == 1) window.location.reload();
            else {
                loginErrors.innerHTML =
                    "<li class='text-danger'>Wrong email or password</li>";
            }
        },
    });
});
$(document).on("click", ".btn-wishlist", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    $.ajax({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        type: "POST",
        url: `/wishlist/${productId}`,
        data: { productId },
        dataType: "json",
        success: function (response) {
            if (response != 0) {
                $("#wishlistCounter").text(+$("#wishlistCounter").text() + 1);
                toast(
                    "Success",
                    "Successfully added in wishlist",
                    "slide",
                    "success"
                );
            } else {
                toast(
                    "Error",
                    "The product is already in your wishlist",
                    "slide",
                    "error"
                );
            }
        },
    });
});
$(document).on("click", ".remove-wishlist-item", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var element = $(this).parent().parent();
    $.ajax({
        type: "POST",
        url: `/wishlist/remove/${productId}`,
        data: {
            productId,
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                $("#wishlistCounter").text(+$("#wishlistCounter").text() - 1);
                element.remove();
                toast(
                    "Success",
                    "Successfully removed from wishlist",
                    "slide",
                    "success"
                );
            }
        },
    });
});
$(document).on("click", "#add-comment", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var commentMark = document.getElementById("comment-mark").value;
    var commentDescriptionError = document.getElementById(
        "comment-description-error"
    );
    var commentTitleError = document.getElementById("comment-title-error");
    commentDescriptionError.innerText = "";
    commentTitleError.innerText = "";
    var commentTitle = document.getElementById("comment-title").value;
    var commentDescription = document.getElementById(
        "comment-description"
    ).value;
    if (commentDescription == "") {
        commentDescriptionError.innerText = "Description can not be empty";
    }
    if (commentTitle == "") {
        commentTitleError.innerText = "Title can not be empty";
    }
    if (commentTitle != "" && commentDescription != "") {
        $.ajax({
            type: "POST",
            url: "/addComment",
            data: {
                title: commentTitle,
                description: commentDescription,
                mark_id: commentMark,
                product_id: productId,
            },
            dataType: "json",
            success: function (response) {
                if (response) {
                    var content = document.createElement("div");
                    content.classList.add("review");
                    content.innerHTML = `<div class="review">
                    <div class="row no-gutters">
                        <div class="col-auto">
                            <h4 class='text-danger'><a href="#">${
                                response["user"].first_name
                            } ${response["user"].last_name}</a></h4>
                            <div class="ratings-container">
                                <div class="ratings">
                                    <div class="ratings-val" style="width: ${
                                        response["mark_id"] * 20
                                    }%;"></div>
                                </div>
                            </div>
                            <span class="review-date">
                                    1 sec ago
                            </span>
                        </div>
                        <div class="col">
                            <h4 class='text-danger'>${response["title"]}</h4>

                            <div class="review-content">
                                <p class='text-danger'>${
                                    response["description"]
                                }</p>
                            </div>
                        </div>
                        <td class="remove-col"><button class="btn-remove remove-comment" data-id="${
                            response["product_id"]
                        }"><i class="icon-close"></i></button></td>
                    </div>
                </div>`;
                    $(content).insertBefore($(".review")[0]);
                    $("html, body").animate({ scrollTop: 0 }, "slow");
                    toast(
                        "Success",
                        "Successfully added comment",
                        "slide",
                        "success"
                    );
                } else if (response == 0) {
                    toast(
                        "Warning",
                        "You already added comment",
                        "slide",
                        "warning"
                    );
                }
            },
        });
    }
});
$(document).on("click", ".remove-comment", function (e) {
    e.preventDefault();
    var product_id = +$(this).attr("data-id");
    var element = $(this).parent().parent();
    $.ajax({
        type: "POST",
        url: "/removeComment",
        data: { product_id },
        dataType: "json",
        success: function (response) {
            if (response) {
                element.remove();
                toast(
                    "Success",
                    "Successfully removed comment",
                    "slide",
                    "success"
                );
            }
        },
    });
});
$(document).on("change", "input[name=categories]", function (e) {
    e.preventDefault();
    id = $(this).attr("id").split("-")[1];
    categories.includes(id)
        ? categories.splice(categories.indexOf(id), 1)
        : categories.push(id);
    $.ajax({
        type: "GET",
        url: "/products/getByCategories",
        data: { categories },
        dataType: "json",
        success: function (products) {
            $("#products_container").html(products);
        },
    });
});
$(document).on("click", ".btn-cart", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    $.ajax({
        type: "POST",
        url: `/cart/${productId}`,
        data: { productId },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                $("#cartCounter").text(+$("#cartCounter").text() + 1);
                toast(
                    "Success",
                    "Successfully added in cart",
                    "slide",
                    "success"
                );
            } else {
                toast(
                    "Error",
                    "The product is already in your cart",
                    "slide",
                    "error"
                );
            }
        },
    });
});
$(document).on("click", ".remove-cart-item", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var element = $(this).parent().parent();
    var subtractPrice = +$(this).parent().prev().text().split(" ")[0];
    $.ajax({
        type: "POST",
        url: `/cart/remove/${productId}`,
        data: {
            productId,
        },
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                $("#cartCounter").text(+$("#cartCounter").text() - 1);
                changeTotalPrice(subtractPrice);
                element.remove();
                toast(
                    "Success",
                    "Successfully removed from cart",
                    "slide",
                    "success"
                );
            }
        },
    });
});
$(document).on("input", ".quantity", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var times = +$(this).val();
    var currentPrice = +$(this).parent().parent().prev().text().split(" ")[0];
    var totalProductPrice = $(this).parent().parent().next();
    var newPrice = times * currentPrice;
    totalProductPrice.text(`${newPrice} EUR`);
    calculateTotalPrice();
    $.ajax({
        type: "POST",
        url: `/updatequantity/${productId}/${times}`,
        data: { productId: productId, times: times },
        dataType: "json",
    });
});
$(document).on("click", "#editInfo", function (e) {
    e.preventDefault();
    $.ajax({
        type: "put",
        url: "/editInfo",
        data: {
            email: document.getElementById("email").value,
            address: document.getElementById("address").value,
            phone: document.getElementById("phone").value,
        },
        dataType: "json",
        success: function (response) {
            if (response)
                toast(
                    "Success",
                    "Successfully changed info",
                    "slide",
                    "success"
                );
        },
        error: function (errors) {
            var errorSpans = [
                document.getElementById("emailError"),
                document.getElementById("addressError"),
                document.getElementById("phoneError"),
            ];
            errorSpans.forEach((errorSpan) => {
                errorSpan.innerHTML = "";
            });
            var allErrors = errors["responseJSON"]["errors"];
            $email = allErrors.email ?? "";
            $address = allErrors.address ?? "";
            $phone = allErrors.phone ?? "";
            errorSpans[0].innerHTML = $email;
            errorSpans[1].innerHTML = $address;
            errorSpans[2].innerHTML = $phone;
        },
    });
});
$(document).on("click", ".delete-product", function (e) {
    e.preventDefault();
    var productId = +$(this).attr("data-id");
    var element = $(this).parent().parent().parent().parent().parent();
    $.ajax({
        type: "DELETE",
        url: `/products/${productId}`,
        dataType: "json",
        success: function (response) {
            if (response) {
                element.remove();
                toast(
                    "Success",
                    "Successfully deleted product",
                    "slide",
                    "success"
                );
            }
        },
    });
});
$(document).on("click", "#subscribe", function (e) {
    e.preventDefault();
    const REGEX_EMAIL =
        /^(([^<>()[\]\.,;:\s@\"]+(\.[^<>()[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
    var email = document.getElementById("subscribe_email");
    if (REGEX_EMAIL.test(email.value)) {
        toast(
            "Success",
            `Successfully sent coupoun on ${email.value}`,
            "slide",
            "success"
        );
    } else {
        toast("Error", `Email is not vaild, try again`, "slide", "error");
    }
});
/* 
    ADMIN PANEL
*/
$(document).on("click", ".remove-activity", function (e) {
    e.preventDefault();
    var activityId = +$(this).attr("data-id");
    var element = $(this).parent().parent();
    $.ajax({
        type: "DELETE",
        url: `/activity/${activityId}/delete`,
        dataType: "json",
        success: function (response) {
            if (response == 1) {
                element.remove();
                toast(
                    "Success",
                    "Successfully deleted activity",
                    "slide",
                    "success"
                );
            }
        },
    });
});
function toast(h, t, tt, i) {
    $.toast({
        heading: h,
        text: t,
        showHideTransition: tt,
        icon: i,
    });
}
function calculateTotalPrice() {
    var prices = document.querySelectorAll(".total-col");
    var total = 0;
    prices.forEach((price) => {
        total += +price.innerText.split(" ")[0];
    });
    $("#totalPrice").text(`${total} EUR`);
}
function changeTotalPrice(subtractPrice) {
    var totalDiv = document.getElementById("totalPrice");
    var currentTotal = totalDiv.innerText;
    currentTotal = currentTotal.split(" ")[0];
    var newPrice = +currentTotal - subtractPrice;
    totalDiv.innerText = `${newPrice} EUR`;
}
