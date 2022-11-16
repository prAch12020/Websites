//The sign up form 
let signupcontent = $(
"<form class='animate__animated animate__fadeInUp back reg-form' method='POST'>"+
        "<div class='glass'>"+
            "<div class='control'>"+
                "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
                "<a onClick='openPage(\"log\")' class='sec-button'><span class='material-symbols-outlined'>login</span>Log in</a>"+
                "<a href='index.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
            "</div>"+
            "<h2>Sign Up</h2><br>"+
            "<section class='signup-form'>"+
        "<div>"+
            "<label for='fname'>First Name</label><br>"+
            "<label for='lname'>Last Name</label><br>"+
            "<label for='email'>Email Address</label><br>"+
            "<label for='phone'>Phone Number</label><br>"+
            "<label for='role'>Type</label><br>"+
            "<label for='password'>Password</label> <br>"+
            "<label for='password2'>Confirm Password</label><br>"+
        "</div>"+
        "<div>"+
            "<input type='text' id='fname' name='fname'><br>"+
            "<input type='text' id='lname' name='lname'><br>"+
            "<input type='email' id='email' name='email'><br>"+
            "<input type='tel' id='phone' name='phone'><br>"+
            "<select id='role' name='role'>"+
                "<option selected disabled>--</option>"+
                "<option value='Farmer'>Farmer</option>"+
                "<option value='Inputs Seller'>Inputs Seller</option>"+
                "<option value='Produce Buyer'>Produce Buyer</option>"+
                "<option value='Veterinarian'>Veterinarian</option>"+
            "</select><br>"+
               " <input type='password' id='password' name='password'><br>"+
                "<input type='password' id='password2'><br>"+
            "</div>"+
        "</section>"+
       "<br><button type='submit' class='pri-button signup' name='signup'>Sign Up</button>"+
    "</div>"+
"<span class='material-symbols-outlined close close1'>close</span>"+
"</form>");

//The login form
let logincontent = $(
    "<form class='animate__animated animate__fadeInUp back sign-in' method='POST'>"+
            "<div class='glass'>"+
                "<div class='control'>"+
                    "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
                    "<a onClick='openPage(\"sign\")' class='sec-button'><span class='material-symbols-outlined'>how_to_reg</span>Sign Up</a>"+
                    "<a href='index.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
                "</div>"+
                "<h2>Log In</h2><br>"+
                "<section class='login-form'>"+
            "<div>"+
                "<label for='em'>Email Address</label><br>"+
                "<label for='pass'>Password</label> <br>"+
            "</div>"+
            "<div>"+
                "<input type='email' id='em' name='em'><br>"+
                "<input type='password' id='pass' name='pass'><br>"+
                "</div>"+
            "</section>"+
           " <br><button type='submit' class='pri-button login' name='login'>Log In</button>"+
        "</div>"+
    "<span class='material-symbols-outlined close close2'>close</span>"+
    "</form>");


//Opening the forms
function openPage(page){
    $('.formdiv').css('height', '800px');
    $('.formdiv').css('width', '100%');
    $('.back-popup').css('opacity', '0.1');
    $('body').css('overflow-y', 'hidden');

    if(page === 'sign'){
        $('#formpage').css('background-image', "url('../../assets/images/sign-back.jpg')");
        logincontent.remove();
        $('#formpage').append(signupcontent);
    }
    if(page === 'log'){
        $('#formpage').css('background-image', "url('../../assets/images/log-back.jpg')");
        signupcontent.remove();
        $('#formpage').append(logincontent);           
    }
    if(page === 'input'){
        $('#formpage').css('background-image', "url('../../assets/images/tractor.jpg')");
        $('#formpage').append(inputcontent);           
    }

    if(page === 'produce'){
        $('#formpage').css('background-image', "url('../../assets/images/tea.jpg')");
        $('#formpage').append(producecontent);           
    }

    $('.close').click(() => {
        $('.formdiv').css('height', '0');
        $('.formdiv').css('width', '0');
        $('.back-popup').css('opacity', '1');
        $('body').css('overflow-y', 'scroll');
    });
    $('.close1').click(() => signupcontent.remove() );
    $('.close2').click(() => logincontent.remove() );
    $('.close4').click(() => inputcontent.remove() );
}

//Display success and error messages
function displayMessage(res){
    let content = $("<div class='time-message'><span>"+res+"</span><span class='material-symbols-outlined close3'>close</span></div>");
    $('#formpage').prepend(content);
    $('.close3').click(() => content.remove() );
}

//Sign up
$(document).on('submit', '.reg-form', (e) => {
    e.preventDefault();
    let fname = $('#fname').val();
    let lname = $('#lname').val();
    let email = $('#email').val();
    let phone = $('#phone').val();
    let password = $('#password').val();
    let role = $('#role').val();
    $.ajax({
        type: "POST",
        url: "data/signup.php",
        data: {
            fname: fname,
            lname: lname,
            email: email,
            phone: phone,
            password: password,
            role: role
        },
        dataType: 'text',
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    $('.reg-form')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});

//Login
$(document).on('submit', '.sign-in', (ev) => {
    ev.preventDefault();
    let em = $('#em').val();
    let pass = $('#pass').val();
    $.ajax({
        type: "POST",
        url: "data/login.php",
        data: {
            em: em,
            pass: pass,
        },
        dataType: 'text',
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){[0]
            console.log(xhr);
        }
    });
    $('.sign-in')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});
