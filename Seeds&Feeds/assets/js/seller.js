//The input adding form
let inputcontent = $(
    "<form id='input-form' class='animate__animated animate__fadeInUp back' enctype='multipart/form-data' method='POST'>"+
    "<div class='glass'>"+
        "<div class='control'>"+
            "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
            "<a href='seller.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
        "</div>"+
        "<h2>Add Item for Sale</h2><br>"+
        "<section class='input-form'>"+
            "<div>"+
                "<label for='name'>Input Name</label><br><br>  "+                  
                "<label for='desc'>Input Description</label><br><br>"+
                "<label for='img'>Input Image</label><br><br>"+
                "<label for='pri'>Input Price</label><br><br>"+
                "<label for='pri'>Input Unit</label><br><br>"+
            "</div>"+
            "<div>"+
                "<input name='name' id='name' type='text'/><br><br>"+
                "<input name='description' id='description' type='text'/><br><br>"+
                "<input name='img' id='img' type='file' accept='.png,.jpeg,.jpg,.webp'/><br><br>"+
                "<input name='pri' id='pri' type='text'/><br><br>"+
                "<input name='unit' id='unit' type='text'/><br><br>"+
            "</div>"+
        "</section>"+
        " <button id='sellinput' class='pri-button' type='submit'>Add for Sale</button>"+
        "<span class='material-symbols-outlined close close4'>close</span>"+
    "</div>"+
    "</form>");

//Add input item for sale
$(document).on('submit', '#input-form', (e) => {
    e.preventDefault();
    let name = $('#name').val();
    let description = $('#description').val();
    let pri = $('#pri').val();
    let unit = $('#unit').val();
    let img = $('#img')[0].files[0];
    $.ajax({
        type: "POST",
        url: "data/sell_input.php",
        data: {
            name: name,
            description: description,
            pri: pri,
            unit: unit,
            img: img['name']
        },
        success: function(res){
            displayMessage(res);
        },
        error: function(xhr){
            console.log(xhr);
        }
    });
    $('#input-form')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});