const loginRegex = new RegExp('^[a-zA-Z0-9_.-]{6,}$');
const passRegex = new RegExp('^[a-zA-Z0-9_.-]{7,}$');

const registrButton = $("#registerButton");
const loginBtn = $("#login-button");
const orderBtn = $("#order-btn");


loginBtn.click((e) => {
    const login = $("#login").val();
    const pass = $("#password").val();

    $.ajax({
        url: 'http://clotheslina/services/login.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
        },
        success: (data) => {
            if(data.err) {
                return $("#auth-error").text(data.err);   
            }
            document.location.href = 'http://clotheslina/profile.php';
        }
    });      
})

registrButton.click((e) => {
    let errorFlag = false;

    const login = $("#login").val();
    const pass = $("#password").val();
    const name = $("#name").val();
    const surname = $("#surname").val();
    const tel = $("#tel").val();

    if (!loginRegex.test(login)) {
        $("#login").addClass('error');
        $("#login-error").text("Только латинские символы. Длина от 6 символов!")
        errorFlag = true;
    } else {
        $("#login").removeClass("error");
        $("#login-error").text("")
    }

    if (!passRegex.test(pass)) {
        $("#password").addClass('error');
        $("#password-error").text("Только латинские символы. Длина от 7 символов!")
        errorFlag = true;
    } else {
        $("#password").removeClass("error");
        $("#password-error").text("")
    }

    if (!name) {
        $("#name").addClass('error');
    } else {
        $("#name").removeClass('error');
    }

    if (!surname) {
        $("#surname").addClass('error');
    } else {
        $("#surname").removeClass('error');
    }

    if (!tel) {
        $("#tel").addClass('error');
    } else {
        $("#tel").removeClass('error');
    }

    if (!name || !surname || !tel) {
        $("#fields-error").text("Заполните все поля!")
        errorFlag = true;
    } else {
        $("#fields-error").text("")
    }

    if (errorFlag) return;

    $.ajax({
        url: 'http://clotheslina/services/register.php',
        type: 'POST',
        dataType: 'json',
        data: {
            login: login,
            pass: pass,
            tel: tel,
            name: name,
            surname: surname,
        },
        success: (data) => {
            if(data.error) {
                return $("#login-error").text(data.error);   
            }
            document.location.href = 'http://clotheslina/profile.php';
        }
    });      
})

orderBtn.click((e) => {
    e.preventDefault();
    const totalPriceBlock = document.querySelector('#total-price').textContent;
    const totalPrice = totalPriceBlock.split(' ')[0];
    const name = $("#firstName").val();
    const surname = $("#surname").val();
    const phone = $("#tel").val();
    const city = $("#city").val();
    const street = $("#street").val();
    const house = $("#house").val();
    const flat = $("#flat").val();

    let errorFlag = false;
    $(".cart-form-error").removeClass("active")
    
    if (!name) {
        $("#fistName").addClass('error');
        errorFlag = true;
    } else {
        $("#firstName").removeClass("error");
    }
    if (!surname) {
        $("#surname").addClass("error");
        errorFlag = true;
    } else {
        $("#surname").removeClass("error");
    }
    if (!phone) {
        $("#tel").addClass("error");
        errorFlag = true;
    } else {
        $("#tel").removeClass("error");
    }
    if (!city) {
        $("#city").addClass("error");
        errorFlag = true;
    } else {
        $("#city").removeClass("error");
    }
    if (!street) {
        $("#street").addClass("error");
        errorFlag = true;
    } else {
        $("#street").removeClass("error");
    }
    if (!house) {
        $("#house").addClass("error");
        errorFlag = true;
    } else {
        $("#house").removeClass("error");
    }
    if (!flat) {
        $("#flat").addClass("error");
        errorFlag = true;
    } else {
        $("#flat").removeClass("error");
    }

    if (errorFlag) {
        $(".cart-form-error").addClass("active");
        return;
    }

    const address = `г. ${city}, ул. ${street}, д. ${house}, кв. ${flat}`;
    const reciever = `${name} ${surname}`;

    const items = JSON.parse(localStorage.getItem('items'));

    $.ajax({
        url: 'http://clotheslina/services/makeOrder.php',
        type: 'POST',
        dataType: 'json',
        data: {
            address: address,
            phone: phone,
            reciever: reciever,
            totalPrice: totalPrice,
            items: items
        },
        success: (data) => {
            if(data.err) {
                return $("#not-filled-error").text(data.err);   
            }
            localStorage.clear('items');
            document.location.href = 'http://clotheslina/profile.php';
        }
    });   
})