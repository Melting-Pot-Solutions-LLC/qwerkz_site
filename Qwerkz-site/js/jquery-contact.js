jQuery(document).ready(function () {


    $('button[data-loading-text]')
            .on('click', function () {
                var btn = $(this);
                btn.button('loading');
                setTimeout(function () {
                    btn.button('reset');
                }, 3000);
            });


//    $('#contactform').submit(function () {
//
//        var action = $(this).attr('action');
//
//        $(".error-message").slideUp(750, function () {
//            $('.error-message').hide();
//            $.post(action, {
//                name: $('#name').val(),
//                email: $('#email').val(),
//                subject: $('#subject').val(),
//                message: $('#message').val()
//            },
//            function (data) {
//                document.getElementById('error-message').innerHTML = data;
//                $('.error-message').slideDown('slow');
//                $('.submit').removeAttr('disabled');
//                if (data.match('success') != null)
//                    $('#contactform').slideUp('slow');
//
//            }
//            );
//
//        });
//
//        return false;
//
//    });
    
    
    $('.contact-form-athletes').submit(function () {

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
                interest: $('#interest').val(),
                industry: $('#industry').val(),
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

        var action = $(this).attr('action');

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