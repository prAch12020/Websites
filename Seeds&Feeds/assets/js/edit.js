let editproducecontent = $(
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
                        "<input name='name' id='name' type='text' value=''/><br><br>"+
                        "<input name='desc' id='desc' type='text value=''/><br><br>"+
                        "<input name='img' id='img' type='file' accept='.png,.jpeg,.jpg,.webp' value=''/><br><br>"+
                        "<input name='pri' id='pri' type='text' value=''/><br><br>"+
                        "<input name='stock' id='stock' type='number' value=''/><br><br>"+
                        "<input name='unit' id='unit' type='text' value=''/><br><br>"+
                    "</div>"+
                "</section>"+
                "<button id='sell' class='pri-button' type='submit'>Add for Sale</button>"+
            "</form>");

let editinputcontent = $(
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
                "<input name='name' id='name' type='text' value=''/><br><br>"+
                "<input name='description' id='description' type='text' value=''/><br><br>"+
                "<input name='img' id='img' type='file' accept='.png,.jpeg,.jpg,.webp' value=''/><br><br>"+
                "<input name='pri' id='pri' type='text' value=''/><br><br>"+
                "<input name='unit' id='unit' type='text' value=''/><br><br>"+
            "</div>"+
        "</section>"+
        " <button id='sellinput' class='pri-button' type='submit'>Add for Sale</button>"+
        "<span class='material-symbols-outlined close close4'>close</span>"+
    "</div>"+
    "</form>");
