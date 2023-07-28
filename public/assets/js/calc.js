var group = [1200, 1250, 1300, 1500];
var m = [
    [60.9, 70.2, 61.1, 60.5],//1
    [91.7, 91.1, 91.4, 94.4],//2
    [145.5],//3
    [194.9],//4
    [366.3, 336.2]//pento
];
var precent = [25, 50, 100];
var month = [12, 24, 36];

var selected_m = [];

var selected_bina = 1;
var selected_group = 0;
var selected_price = group[0], selected_area = 0, selected_percent = 100, selected_month = 0;
var add_price=0;


// console.log(menzil_tipi[0][2])
var menzil_area = [{
    bina1: [
        m[0][1], m[0][2],
        m[1][0], m[1][1],
        m[2][0],
        m[3][0],
        m[4][0], m[4][1]
    ],

}]


var menzil_qiymeti = 0;



x = document.getElementsByClassName("select1")[0];
y = document.getElementsByClassName("select2")[0];
z = document.getElementsByClassName("select3")[0];
precentItem = document.getElementsByClassName("select4")[0];
monthItem = document.getElementsByClassName("select5")[0];
all_price = document.getElementsByClassName("all-price")[0];
payment_month_price = document.getElementsByClassName("pay-month")[0];
payment_first_price = document.getElementsByClassName("pay-first")[0];
payment_date_price = document.getElementsByClassName("pay-date")[0];


group_tipi(selected_bina);
menzil_tipi(selected_bina);
month_tipi();
precent_tipi();

x.addEventListener('change', function (e) {
    e.stopPropagation()
    selected_bina = this.value
    // console.log(this.value)
    group_tipi(selected_bina);
    menzil_tipi(selected_bina);
})


y.addEventListener('change', function (e) {
    e.stopPropagation()
    // console.log(group[this.value])
    selected_group=this.value;
    selected_price = group[this.value];
});
z.addEventListener('change', function (e) {
    e.stopPropagation()
    // console.log(this.text, this.value)
    selected_area = parseFloat(this.value)

    z.innerHTML = '';
    for (var i = 0; i < selected_m.length; i++) {
            z.innerHTML += `<option value="${selected_m[j][i]}">${selected_m[j][i]}</option>`

    }
    hesapla()
});
precentItem.addEventListener('change', function (e) {
    e.stopPropagation()
    // console.log(this.value)
    selected_percent = parseInt(this.value)
    hesapla()
});
monthItem.addEventListener('change', function (e) {
    e.stopPropagation()
    // console.log(this.value)
    selected_month = parseInt(this.value)
    hesapla()
});

function group_tipi(tip = 1) {
    console.log('tip:' + tip);
    if (tip == 1 || tip == 2 || tip == 3) {
        y.innerHTML = ` <option value="0">3-6</option>
                           <option value="1">7-10</option>
                           <option value="2">11-13</option>
                           <option value="3">pento</option>
                                           `
    }
    else {
        y.innerHTML = ` <option value="0">3-5</option>
                           <option value="1">6-8</option>
                           <option value="2">9-11</option>
                           <option value="3">pento</option>
                                      `
    }
}
function precent_tipi() {
    selected_percent = precent[0];
    precent.forEach(element => {
        precentItem.innerHTML += `<option value="${element}">${element}</option>`
    });
}
function month_tipi() {
    selected_month = month[0];
    month.forEach(element => {
        monthItem.innerHTML += `<option value="${element}">${element}</option>`
    });
}


var deletions = [60.9, 70.2, 91.4, 94.4];

function menzil_tipi(selected_bina = 0) {

    selected_m = m;
    if (selected_bina == 5) {
        for (var i = 0; i < selected_m.length; i++) {
            for (var j = selected_m[i].length - 1; j >= 0; j--) {
                if (deletions.includes(selected_m[i][j])) {
                    selected_m[i].splice(j, 1);
                }
            }
        }
    }

    z.innerHTML = '';
    for (var i = 0; i < selected_m.length; i++) {
        for (var j = 0; j < selected_m[i].length; j++) {
            z.innerHTML += `<option value="${selected_m[i][j]}">${selected_m[i][j]}</option>`
        }
    }
}

// hesapla()

function hesapla() {

    var pay_area = 0;
    var rest_area = 0;
    if (precent.includes(selected_percent)) {
        pay_area = (selected_area * selected_percent) / 100;
        rest_area = selected_area - pay_area;
    }



    if(selected_month==12)
    {
    add_price=25;
    }
    else if(selected_month==24){
        add_price=50;
    }
    else if(selected_month==36){
        add_price=100;
    }
    else {
        add_price=25;
    }
    var paid_price = pay_area * selected_price;
    var pay_price = rest_area * (selected_price + add_price);
    // console.log(paid_price,pay_price)
    var pay_month = 0;




    if (month.includes(selected_month)) {
        pay_month = pay_price / selected_month;
    }
    all_price.innerHTML=selected_area*selected_price;
    payment_month_price.innerHTML=pay_month.toFixed(2);
    payment_first_price.innerHTML=paid_price.toFixed(2);

    payment_date_price.innerHTML=selected_month;

}
