var districts = [];
var cities = [];
// Fill cities dropdown list
$("select[name='country']" ).change(function(){
  cities = [];
  districts = [];
  var selectedCountry = $("select[name='country']").val();
  $("select[name='district_id']").find('*').not('option:first').remove();
  $("select[name='city']").find('*').not('option:first').remove();
  $.get("helper/getCities/" + selectedCountry, function(data, status){ cities = data; console.log(cities);});
});

$( document ).ajaxComplete(function() {
  $.each(cities, function(k, v){
    $("select[name='city']").append($('<option>', {
        value: v.id,
        text : v.name_en
    }));
  });
});

// Fill districts dropdown list
$("select[name='city']" ).change(function(){
  districts = [];
  var selectedCity = $("select[name='city']").val();
  $("select[name='district_id']").find('*').not('option:first').remove();
  $.get("helper/getDistricts/" + selectedCity, function(data, status){ districts = data; });
});

$( document ).ajaxComplete(function() {
  $("select[name='district_id']").find('*').not('option:first').remove();
  $.each(districts, function(k, v){
    $("select[name='city']").append($('<option>', {
        value: v.id,
        text : v.name_en
    }));
    $("select[name='district_id']").append($('<option>', {
        value: v.id,
        text : v.name_en
    }));
  });
});
// -------------------- Section -----------------------------

// Add Fees Items on checcking facilities
var depending1 = 'group_3';
var depending2 = 'group_5';
var $checkedCertificates = [''];
var $checkedEducationLevel = [''];
$('.facility_checkbox').on('click', function() {
    clearDivOfInputs();
    if ($(this).is(':checked')) {
        if ($(this).hasClass(depending1)) {
            $checkedCertificates.push($(this).attr('id'));
            $.unique($checkedCertificates);
            console.log($checkedCertificates);
        }
        if ($(this).hasClass(depending2)) {
            $checkedEducationLevel.push($(this).attr('id'));
            $.unique($checkedEducationLevel);
            console.log($checkedEducationLevel);
        }
    } else {
        if ($(this).hasClass(depending1)) {
            var removeItem = $(this).attr('id');
            $checkedCertificates.splice($.inArray(removeItem, $checkedCertificates), 1);
            console.log($checkedCertificates);
        }
        if ($(this).hasClass(depending2)) {
            var removeItem = $(this).attr('id');
            $checkedEducationLevel.splice($.inArray(removeItem, $checkedEducationLevel), 1);
            console.log($checkedEducationLevel);
        }
    }
});

function AppendDataLoop() {
    $.each($checkedCertificates, function(keys, certificates) {
        $.each($checkedEducationLevel, function(k, educationLevel) {

            var $selector1 = $('#' + certificates);
            var $selector2 = $('#' + educationLevel);
            var label1 = $selector1.parent().text();
            var label2 = $selector2.parent().text();
            var certificate_id = certificates.split('_')[1];
            var educationLevel_id = educationLevel.split('_')[1];
            var fee =
                '<div class="form-group ' + educationLevel + '">\n' +
                '<label class="control-label col-md-4" for="inputWarning">' + label1 + label2 + '</label>\n' +
                '<div class="input-group">' +
                '<input class="form-control col-md-4" name="fees[' + certificate_id + '][' + educationLevel_id + '][cost]" type="number">' +
                '<span class="input-group-btn">' +
                '<select class="form-control col-md-3" style="width: 100px;" name="fees[' + certificate_id + '][' + educationLevel_id + '][currecy]">' +
                '<option value="EGP">EGP</option>' +
                '<option value="USD">USD</option>' +
                '<option value="GPP">GPP</option>' +
                '</select>' +
                '</span>' +
                '<span class="input-group-btn">' +
                '<button class="btn btn-default removeFeesItem" type="button">x</button>' +
                '</span>' +
                '</div>' +
                '</div>';
            $('#fees-wrapper').append(fee);
        });
    });
}
$("input.facility_checkbox").on('click', function() {
    $('#fees-wrapper').empty();
    AppendDataLoop();
});

function clearDivOfInputs() {
    $('#fees-wrapper').empty();
    $checkedCertificates = [];
    $checkedEducationLevel = [];
    $('input.' + depending1 + ':checked').each(function() {
        $checkedCertificates.push($(this).attr('id'));
    });
    $('input.' + depending2 + ':checked').each(function() {
        $checkedEducationLevel.push($(this).attr('id'));
    });
}

$(document).on('click', '.removeFeesItem', function() {
    $(this).parent().parent().parent().remove();
});

// -------------------- Section -----------------------------

// Tabs Navigation (Next & Prev)
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
    // This function will display the specified tab of the form...
    var x = document.getElementsByClassName("tab");
    x[n].style.display = "block";
    //... and fix the Previous/Next buttons:
    if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
    //... and run a function that will display the correct step indicator:
    fixStepIndicator(n);
}

function nextPrev(n) {
    // This function will figure out which tab to display
    var x = document.getElementsByClassName("tab");
    // Exit the function if any field in the current tab is invalid:
    if (n == 1 && !validateForm()) return false;
    // Hide the current tab:
    x[currentTab].style.display = "none";
    // Increase or decrease the current tab by 1:
    currentTab = currentTab + n;
    // if you have reached the end of the form...
    if (currentTab >= x.length) {
        // ... the form gets submitted:
        document.getElementById("regForm").submit();
        return false;
    }
    // Otherwise, display the correct tab:
    showTab(currentTab);
}
// -------------------- Section -----------------------------

// This function deals with validation of the form fields
function validateForm() {
    var x, y, i, valid = true;
    var requiredInputs = [
      'name',
      'logo',
      'phone',
      'email',
      'district_id',
      'facilities',
      'longitude',
      'latitude'
    ];
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // y = document.getElementById("regForm").elements;
    // A loop that checks every input field in the current tab:

    for (i = 0; i < y.length; i++) {
      // console.log(y[i].name);
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
    }
    return valid; // return the valid status
}

function fixStepIndicator(n) {
    // This function removes the "active" class of all steps...
    var i, x = document.getElementsByClassName("step");
    for (i = 0; i < x.length; i++) {
        x[i].className = x[i].className.replace(" active", "");
    }
    //... and adds the "active" class on the current step:
    x[n].className += " active";
}

(function() {

    $('#live-chat header').on('click', function() {

        $('.chat').slideToggle(300, 'swing');
        $('.chat-message-counter').fadeToggle(300, 'swing');

        if ($('.chat-close').hasClass('fa-plus-circle')) {
            $('.chat-close').removeClass('fa-plus-circle').addClass('fa-minus-circle');
        } else {
            $('.chat-close').removeClass('fa-minus-circle').addClass('fa-plus-circle');
        }

    });

});

// -------------------- Section -----------------------------
$('#send-message').on('click', function() {
    var fieldValue = $("#mail").val();

    var mailValidation = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;


    if (fieldValue.match(mailValidation)) {
        $("#result").text("Valid email.");
    } else {
        $("#result").text("Invalid email address.");
    }

    return false;
});



$("#adon12").click(function() {
    $(".mial-box-ad-sc").append("                                <div class=\"col-md-12 ad-conc ad-conc-dd\">\n" +
        "                                    <div class=\"input-group\">\n" +
        "                                        <input id=\"add3\" placeholder=\"email ...\" type=\"text\" class=\"form-control\" aria-label=\"...\">\n" +
        "                                        <div class=\"input-group-btn\">\n" +
        "                                            <button id=\"adon12\" type=\"button\" class=\"btn btn-default  removeEmail dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"fa close-abdo fa-times-circle-o  fa-2x\" aria-hidden=\"true\"></i></button>\n" +
        "                                        </div><!-- /btn-group -->\n" +
        "                                    </div><!-- /input-group -->\n" +
        "                                </div>");

});


$(document).on('click', '.removeEmail', function() {
    $(this).parent().parent().parent().remove();
});




$("#adon13").click(function() {
    $(".mial-box-ad-sc").append("                                <div class=\"col-md-12 ad-conc ad-conc-dd\">\n" +
        "                                    <div class=\"input-group\">\n" +
        "                                        <input id=\"add3\" placeholder=\"website ...\" type=\"text\" class=\"form-control\" aria-label=\"...\">\n" +
        "                                        <div class=\"input-group-btn\">\n" +
        "                                            <button id=\"adon12\" type=\"button\" class=\"btn btn-default  removeEmail dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"fa close-abdo fa-times-circle-o  fa-2x\" aria-hidden=\"true\"></i></button>\n" +
        "                                        </div><!-- /btn-group -->\n" +
        "                                    </div><!-- /input-group -->\n" +
        "                                </div>");

});


$(document).on('click', '.website', function() {
    $(this).parent().parent().parent().remove();
});




$("#adon14").click(function() {
    $(".mial-box-ad-sc").append("                                <div class=\"col-md-12 ad-conc ad-conc-dd\">\n" +
        "                                    <div class=\"input-group\">\n" +
        "                                        <input id=\"add3\" placeholder=\"website ...\" type=\"text\" class=\"form-control\" aria-label=\"...\">\n" +
        "                                        <div class=\"input-group-btn\">\n" +
        "                                            <button id=\"adon12\" type=\"button\" class=\"btn btn-default  removenumbers dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"fa close-abdo fa-times-circle-o  fa-2x\" aria-hidden=\"true\"></i></button>\n" +
        "                                        </div><!-- /btn-group -->\n" +
        "                                    </div><!-- /input-group -->\n" +
        "                                </div>");

});

$(document).on('click', '.removenumbers', function() {
    $(this).parent().parent().parent().remove();
});


$("#adon15").click(function() {
    $(".addmission-box-ad-sc").append("<div class=\"col-md-12 ad-conc ad-conc-dd\">\n" +
        "<div class=\"input-group\">\n" +
        "<input id=\"add3\" placeholder=\"URL ...\" type=\"text\" class=\"form-control\" aria-label=\"...\">\n" +
        "<div class=\"input-group-btn\">\n" +
        "  <button id=\"adon12\" type=\"button\" class=\"btn btn-default  removeaddmission dropdown-toggle\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\"> <i class=\"fa close-abdo fa-times-circle-o  fa-2x\" aria-hidden=\"true\"></i></button>\n" +
        " </div><!-- /btn-group -->\n" +
        "</div><!-- /input-group -->\n" +
        " </div>");

});

$(document).on('click', '.removeaddmission', function() {
    $(this).parent().parent().parent().remove();
});



// -------------------- Section -----------------------------

// Initialize the editor.

function initMap() {
    var uluru = {
        lat: 30.036108,
        lng: 31.421031
    };
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 17,
        center: uluru
    });
    var card = document.getElementById('pac-card');
    var input = document.getElementById('pac-input');
    var types = document.getElementById('type-selector');
    var strictBounds = document.getElementById('strict-bounds-selector');

    map.controls[google.maps.ControlPosition.TOP_RIGHT].push(card);

    var autocomplete = new google.maps.places.Autocomplete(input);

    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var infowindowContent = document.getElementById('infowindow-content');
    infowindow.setContent(infowindowContent);
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            // User entered the name of a Place that was not suggested and
            // pressed the Enter key, or the Place Details request failed.
            window.alert("No details available for input: '" + place.name + "'");
            return;
        }

        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17); // Why 17? Because it looks good.
        }
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);

        var address = '';
        if (place.address_components) {
            address = [
                (place.address_components[0] && place.address_components[0].short_name || ''), (place.address_components[1] && place.address_components[1].short_name || ''), (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }

        infowindowContent.children['place-icon'].src = place.icon;
        infowindowContent.children['place-name'].textContent = place.name;
        infowindowContent.children['place-address'].textContent = address;
        infowindow.open(map, marker);
    });
}
