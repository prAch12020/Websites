let addresscontent = $(
    "<form id='address-form' method='POST' enctype='multipart/form-data'>"+
    "<div class='glass'>"+
        "<div class='control'>"+
            "<img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'>"+
        "</div>"+
        "<h2>Complete Personal Details</h2><br>"+
                "<section class='produce-form'>"+
                    "<div>"+
                        "<label for='add'>Street Address</label><br><br>  "+                  
                        "<label for='city'>City</label><br><br>"+
                        "<label for='country'>Country</label><br><br>"+
                    "</div>"+
                    "<div>"+
                        "<input name='add' id='add' type='text'/><br><br>"+
                        "<input name='city' id='city' type='text'/><br><br>"+
                        "<input name='country' id='country' type='text' value='Kenya' disabled/><br><br>"+
                    "</div>"+
                "</section>"+
                "<button id='add' class='pri-button' type='submit'>Submit</button>"+
            "</form>");
logincontent.remove();
$('#formpage').append(addresscontent);
/*<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d127639.93958184938!2d36.8934912!3d-1.327104!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2ske!4v1658227044892!5m2!1sen!2ske" 
width="800" height="600" style="border:0;" allowfullscreen="" 
loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>*/

$(document).on('submit', '#address-form', (e) => {
    e.preventDefault();
    let add = $('#add').val();
    let city = $('#city').val();
    let country = $('#country').val();
    $.ajax({
        type: "POST",
        url: "data/address.php",
        data: {
            add: add,
            city: city,
            country: country
        },
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    $('#address-form')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});