/*$(document).on('click', '#minus', () => {

})*/
function adjust(e) {
    let ele = document.getElementsByClassName('quantity_input');
    for (let i = 0; i<ele.length; i++) {
        if(i == e){
            let qty = ele[i].value;
            console.log(ele[i].value)
            $('.minus').click(() => {
                if(qty == 1){
                    ele[i].value = qty;
                }
                else{
                    qty--;
                    ele[i].value = qty;
                }
            });
            $('.plus').click(() => {
                if(qty == 10){
                    ele[i].value = qty;
                }
                else{
                    qty++;
                    ele[i].value = qty;
                }
            });
        }
    }
}
            
        


let producecontent = $(
    "<form id='produce-form' method='POST' enctype='multipart/form-data'>"+
    "<div class='glass'>"+
        "<div class='control'>"+
            "<a href='index.php'><img src='../../assets/images/log1.png' height='100px' width='120px' alt='logo'></a>"+
            "<a href='sell_produce.php' class='sec-button'><span class='material-symbols-outlined'>arrow_back</span>Back</a>"+
        "</div>"+
        "<h2>Add Product for Sale</h2><br>"+
                "<section class='produce-form'>"+
                    "<div>"+
                        "<label for='name'>Produce Name</label><br><br>  "+                  
                        "<label for='desc'>Produce Description</label><br><br>"+
                        "<label for='img'>Produce Image</label><br><br>"+
                        "<label for='pri'>Produce Price</label><br><br>"+
                        "<label for='stock'>Produce Stock</label><br><br>"+
                        "<label for='unit'>Stock Unit</label><br><br>"+
                    "</div>"+
                    "<div>"+
                        "<input name='name' id='name' type='text'/><br><br>"+
                        "<input name='desc' id='desc' type='text'/><br><br>"+
                        "<input name='img' id='img' type='file'/><br><br>"+
                        "<input name='pri' id='pri' type='text'/><br><br>"+
                        "<input name='stock' id='stock' type='number'/><br><br>"+
                        "<input name='unit' id='unit' type='text'/><br><br>"+
                    "</div>"+
                "</section>"+
                "<button id='sell' class='pri-button' type='submit'>Add for Sale</button>"+
            "</form>");

//Add farm produce for sale
$(document).on('submit', '#produce-form', (e) => {
    e.preventDefault();
    let name = $('#name').val();
    let desc = $('#desc').val();
    let pri = $('#pri').val();
    let stock = $('#stock').val();
    let unit = $('#unit').val();
    let img = $('#img')[0].files[0];
    $.ajax({
        type: "POST",
        url: "data/sell_farmproduce.php",
        data: {
            name: name,
            desc: desc,
            pri: pri,
            stock: stock,
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
    $('#produce-form')[0].reset(); 
    setTimeout(() => {
        $('.time-message').fadeOut('fast');
    }, 5000);
});