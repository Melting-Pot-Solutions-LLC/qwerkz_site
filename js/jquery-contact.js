jQuery(document).ready(function () {


    $('button[data-loading-text]')
            .on('click', function () {
                var btn = $(this);
                btn.button('loading');
                setTimeout(function () {
                    btn.button('reset');
                }, 3000);
            });



    $('#sendAT').click(function () {
        
       emailjs.send("gmail","admin_template",{name: $('#nameAT').val(), email: $('#emailAT').val(), sport: $('#sportAT').val(), league: $('#leagueAT').val(), team: $('#teamAT').val(), twitter: $('#twitterAT').val(), selectInterest: $('#selectInterestAT').val(), selectIndustry: $('#selectIndustryAT').val(), message: $('#messageAT').val()}).then(function(response) {
        console.log("SUCCESS. status=%d, text=%s", response.status, response.text);
     }, function(err) {
        console.log("FAILED. error=", err);
     });;
        
        emailjs.send("gmail", "athlete_template", {email: $('#emailAT').val()}).then(function(response) {
            console.log("SUCCESS. status=%d, text=%s", response.status, response.text);
        }, function(err) {
            console.log("FAILED. error=", err);
        });

        $("#formAT").fadeOut(duration=1500);
        alert("Your email has been successfully sent! Thanks!");
        

        var action = $(this).attr('action');

        $(".error-message").slideUp(750, function () {
            $('.error-message').hide();
            $.post(action, {
                name: $('#name').val(),
                email: $('#email').val(),
                sport: $('#sport').val(),
                league: $('#league').val(),
                team: $('#team').val(),
                twitter: $('#twitter').val(),
                selectInterest: $('#selectInterest').val(),
                selectIndustry: $('#selectIndustry').val(),
                message: $('#message').val()
            },
            function (data) {
                document.getElementById('error-message-athletes').innerHTML = data;
                $('.error-message').slideDown('slow');
                $('.submit').removeAttr('disabled');
                if (data.match('success') != null)
                    $('.contact-form-athletes').slideUp('slow');

            }
            );

        });
        
      return false;

    });
    
    $('.contact-form-companies').submit(function () {
        
        emailjs.send("gmail","admin_template",{name: $('#nameOfCompany').val(), email: $('#contactPersonEmail').val(), sport: $('#sport').val(), league: $('#league').val(), team: $('#team').val(), twitter: $('#twitter').val(), selectInterest: $('#selectInterest').val(), selectIndustry: $('#selectIndustry').val(), message: $('#messageCompany').val()}).then(function(response) {
            console.log("SUCCESS. status=%d, text=%s", response.status, response.text);
         }, function(err) {
            console.log("FAILED. error=", err);
         });;

        emailjs.send("gmail", "company_template",  {email: $('#contactPersonEmail').val()});

        var action = $(this).attr('action');

        $("#contact").fadeOut(duration=1500);
        alert("Your email has been successfully sent! Thanks!");

        $(".error-message").slideUp(750, function () {
            $('.error-message').hide();
            $.post(action, {
                nameOfCompany: $('#nameOfCompany').val(),
                contactPerson: $('#contactPerson').val(),
                contactPersonEmail: $('#contactPersonEmail').val(),
                industryCompany: $('#industryCompany').val(),
                revenue: $('#revenue').val(),
                product: $('#product').val(),
                address: $('#address').val(),
                phoneCompany: $('#phoneCompany').val(),
                website: $('#website').val(),
                messageCompany: $('#messageCompany').val()
            },
            function (data) {
                document.getElementById('error-message-companies').innerHTML = data;
                $('.error-message').slideDown('slow');
                $('.submit').removeAttr('disabled');
                if (data.match('success') != null)
                    $('.contact-form-companies').slideUp('slow');

            }
            );

        });

        return false;

    });
    

    $('#callback').submit(function () {

        var action = $(this).attr('action');

        $("#home-error").slideUp(750, function () {
            $('#home-error').hide();
            $.post(action, {
                names: $('#names').val(),
                emails: $('#emails').val(),
                numbers: $('#numbers').val()
            },
            function (data) {
                document.getElementById('home-error').innerHTML = data;
                $('#home-error').slideDown('slow');
                $('.submit').removeAttr('disabled');
                if (data.match('success') != null)
                    $('#callback').slideUp('slow');

            }
            );

        });

        return false;

    });

});