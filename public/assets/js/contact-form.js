var input1 = document.querySelector("#phone-input-1");
var input2 = document.querySelector("#phone-input-2");


var iti=window.intlTelInput(input1, {
  separateDialCode: true,
    onlyCountries: ["az",'tr','ru'],
});

window.intlTelInput(input2, {
  separateDialCode: true
});

$('#contactBtn-1').submit(function(e) {
    e.preventDefault(); //
    var phoneNumber = input1.value;
    var countryCode = iti.getSelectedCountryData().dialCode;

    $.ajax({
    url: $(this).attr('action'), // Sunucu tarafındaki AJAX işleyicisi
    method: 'post',
    data: {
        phone: "+"+countryCode+phoneNumber,
        _token:$("meta[name=csrf]").attr("content")
    },
    success: function(response) {
    // console.log('Sunucu yanıtı:', response);
    },
        error: function(xhr, status, error) {
            // console.error('AJAX hatası:', error);
    }
    });
});

