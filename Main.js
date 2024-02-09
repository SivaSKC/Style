var nav = document.getElementById('navpar');

function openclick() {
    nav.style.right = "0px";
}
function closeclick() {
    nav.style.right = "-200px";
}



var cardopen = document.querySelector(".fa-bag-shopping");
var card = document.querySelector(".card");
var cardclose = document.querySelector(".card-xmark");

cardopen.addEventListener("click", function () {
    card.classList.add("card-sidepar")
});

cardclose.addEventListener("click", function () {
    card.classList.remove("card-sidepar")
});



// document.addEventListener('DOMContentLoaded',loadfood);

function loadfood() {
    items();
}
loadfood();

function items() {

    let botton = document.querySelectorAll(".card-remove");

    botton.forEach((btns) => {
        btns.addEventListener("click", function () {
            const title=this.parentElement.querySelector('.card-name').innerHTML;
            itemlist=itemlist.filter(sample=>sample.protectname!=title)
            this.parentElement.remove();
            loadfood();
        })
    });

    let addcart=document.querySelectorAll('.add-cart');
    addcart.forEach((addbtn)=>{
        addbtn.addEventListener("click",addtocart);
    })

}

let itemlist=[];

//add to cart

function addtocart(){
    var box=this.parentElement;
    var protectname=box.querySelector('.protectname').innerHTML;
    var protectprice=box.querySelector('.protectprice').innerHTML;
    var protectimage=box.querySelector('img').src;

    const listdetails={protectname,protectimage,protectprice};
    if(itemlist.find((protects)=>protects.protectname==listdetails.protectname))
    {
        alert("The Product is Already exsist");
        return;
    }
    else{
        itemlist.push(listdetails);
    }

    var newdiv=document.createElement('div');

    newdiv.innerHTML=`
    <div class="card-box">
    <img src="${protectimage}">
    <div class="details">
        <div class="card-name">${protectname}</div>
        <div class="price-box">
            <div class="card-price">${protectprice}</div>
            <div class="card-amt">400</div>
        </div>
        <input type="number" class="card-input" value="1" min="1">
    </div>
    <i class="fa-solid fa-trash-can card-remove"></i>
</div>
`

    let mainbox=document.querySelector('.card-container');
    mainbox.append(newdiv); 

    loadfood();

    let productcount=document.querySelector('.qtycount');
    const counts=itemlist.length;
    productcount.innerHTML=counts; 
}


// function increaseprice(){
//    let productprice=document.querySelector('.card-price');
//    let 
// }