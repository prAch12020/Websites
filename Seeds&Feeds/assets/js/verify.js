let verifyemail = $(
    "<form id='verify-email' method='POST'>"+
    "<div class='glass'>"+
        "<div class='control'>"+
            "<img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'>"+
        "</div>"+
        "<h2>Verify Email Address</h2><br>"+
                "<section class='verify-form'>"+
                        "<label>Enter the 6-digit verification code below</label>"+
                        "<input name='dig1' id='dig1' type='text'/><br><br>"+
                        "<input name='dig2' id='dig2' type='text'/><br><br>"+
                        "<input name='dig3' id='dig3' type='text'/><br><br>"+
                        "<input name='dig4' id='dig4' type='text'/><br><br>"+
                        "<input name='dig5' id='dig5' type='text'/><br><br>"+
                        "<input name='dig6' id='dig6' type='text'/><br><br>"+
                    "</div>"+
                "</section>"+
                "<button id='ver-em' class='pri-button' type='submit'>Verify</button>"+
            "</form>");
let verifyphone = $(
    "<form id='verify-phone' method='POST'>"+
    "<div class='glass'>"+
        "<div class='control'>"+
            "<img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'>"+
        "</div>"+
        "<h2>Verify Phone Number</h2><br>"+
                "<section class='verify-form'>"+
                        "<label>Enter the 6-digit verification code below</label>"+
                        "<input name='num1' id='num1' type='text'/><br><br>"+
                        "<input name='num2' id='num2' type='text'/><br><br>"+
                        "<input name='num3' id='num3' type='text'/><br><br>"+
                        "<input name='num4' id='num4' type='text'/><br><br>"+
                    "</div>"+
                "</section>"+
                "<button id='ver-ph' class='pri-button' type='submit'>Verify</button>"+
            "</form>");


$(document).ready(() => {
    let code = $('#dig1').val()+$('#dig2').val()+$('#dig3').val()+$('#dig4').val()+$('#dig5').val()+$('#dig6').val();
    console.log(code);
});

//Verify email
$(document).on('submit', '#verify-email', (e) => {
    e.preventDefault();
    let dig1 = $('#dig1').val();
    let dig2 = $('#dig2').val()
    let dig3 = $('#dig3').val()
    let dig4 = $('#dig4').val()
    let dig5 = $('#dig5').val()
    let dig6 = $('#dig6').val();
    $.ajax({
        type: "POST",
        url: "data/verify.php",
        data: {
            dig1: dig1,
            dig2: dig2,
            dig3: dig3,
            dig4: dig4,
            dig5: dig5,
            dig6: dig6
        },
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    verifyemail.remove();
    $('#formpage').append(verifyphone);
    $('#verify-email')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});


$(document).ready(() => {
    let code = $('#num1').val()+$('#num2').val()+$('#num3').val()+$('#num4').val()+$('#num5').val()+$('#num6').val();
    console.log(code);
});

//Verify email
$(document).on('submit', '#verify-phone', (e) => {
    e.preventDefault();
    let num1 = $('#num1').val();
    let num2 = $('#num2').val()
    let num3 = $('#num3').val()
    let num4 = $('#num4').val()
    let num5 = $('#num5').val()
    let num6 = $('#num6').val();
    $.ajax({
        type: "POST",
        url: "data/verify.php",
        data: {
            num1: num1,
            num2: num2,
            num3: num3,
            num4: num4,
            num5: num5,
            num6: num6
        },
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    $('#verify-phone')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});