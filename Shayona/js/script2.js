function dispProfile(){
    const setDiv1 = document.getElementsByClassName("dropDiv2");
    for (i = 0; i < setDiv1.length; i++) {
        if(setDiv1[i].style.display != "block"){
            setDiv1[i].style.display = "block";
            setDiv1[i].style.animation = "showSmall .5s ease";
        }
        else if(setDiv1[i].style.display != "none"){
            setDiv1[i].style.display = "none";
        }
    }
    const setDiv2 = document.getElementsByClassName("dropDiv1");
    for (i = 0; i < setDiv2.length; i++) {
        if(setDiv2[i].style.display != "block"){
            setDiv2[i].style.display = "block";
            setDiv2[i].style.animation = "showBig .5s ease";
        }
        else if(setDiv2[i].style.display != "none"){
            setDiv2[i].style.display = "none";
        }
    }
}

function enableInputs(id){
    let ids =  document.getElementsByClassName('id');
    let num = document.getElementsByClassName('num');
    let btn = document.getElementsByClassName('btnUpdate');
    let forms = document.getElementsByClassName('orders-form');
    for(let i = 0; i < forms.length; i++){
        let chars = forms[i].getAttribute('action').substr(20);
        if(chars == id){
            if(btn[i].style.display != "block"){
                btn[i].style.display = "block";
                for(let i = 0; i < ids.length; i++){
                    if(ids[i].value == id){
                        let oldValue = num[i].value;
                        num[i].removeAttribute('readonly');
                        num[i].setAttribute('onchange', 'getNewTotal(this.value,'+ oldValue + ',' + id + ')');
                        break;
                    }
                }
            }
            else if(btn[i].style.display != "none"){
                btn[i].style.display = "none";
                for(let i = 0; i < ids.length; i++){
                    if(ids[i].value == id){
                        num[i].setAttribute('readonly', 'readonly');
                        num[i].removeAttribute('onchange');
                        break;
                    }
                }
            }
        }
    }
}

function getNewTotal(newNum, oldNum, id){
    let ids =  document.getElementsByClassName('id');
    let price = document.getElementsByClassName('price');
    for(let i = 0; i < ids.length; i++){
        if(ids[i].value == id){
            let cost = price[i].value / oldNum;
            let totalCostPerOrder = newNum * cost;
            price[i].setAttribute('value', totalCostPerOrder);
            break;
        }
    }
}

function manageViews(id){
    let users = document.getElementById('viewUsers');
    let orders = document.getElementById('viewOrders');
    let menu = document.getElementById('viewMenu');
    let services = document.getElementById('viewServices');
    if(id == "users"){
        users.style.display = "block";
        orders.style.display = "none";
        menu.style.display = "none";
        services.style.display = "none";
    }
    else if(id == "orders"){
        orders.style.display = "block";
        users.style.display = "none";
        menu.style.display = "none";
        services.style.display = "none";
    }
    else if(id == "menu"){
        menu.style.display = "block";
        orders.style.display = "none";
        users.style.display = "none";
        services.style.display = "none";
    }
    else if(id == "query"){
        services.style.display = "block";
        orders.style.display = "none";
        menu.style.display = "none";
        users.style.display = "none";
    }
    
}

function checkPage(){
    let a = document.getElementsByClassName('page');
    for(let i = 0; i < a.length; i++){
        if(a[i].hasAttribute('id')){
            manageViews('menu');
            break;
        }
    }
}
checkPage();

let show = "fa fa-eye";
let hide = 'fa fa-eye-slash';
function showPassword1(){
    let pass_field = document.getElementById('pass');
    let eye = document.getElementById('eye');
    if(pass_field.type !== "password"){
        pass_field.type = 'password';
        eye.setAttribute('class', show);
    }
    else if(pass_field.type !== "text"){
        pass_field.type = 'text';
        eye.setAttribute('class', hide);
    }
}
function showPassword2(){
    let field_pass = document.getElementById('field-pass');
    let eye2 = document.getElementById('eye2');
    if(field_pass.type !== "password"){
        field_pass.type = 'password';
        eye2.setAttribute('class', show);
    }
    else if(field_pass.type !== "text"){
        field_pass.type = 'text';
        eye2.setAttribute('class', hide);
    }
}

let imgIdx = 0;
function dispCarousel() {
    let i;
    let images = document.getElementsByClassName("images");
    for (i = 0; i < images.length; i++) {
        images[i].style.display = "none";
        images[i].style.width = "100%";
        images[i].style.animation = "fade 1s linear";
    }
    imgIdx++;
    if (imgIdx > images.length) {imgIdx = 1}
    images[imgIdx-1].style.display = "block";
    setTimeout(dispCarousel, 2500); 
} 
dispCarousel();