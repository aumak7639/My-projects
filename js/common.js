var avatar = '';
var BASE_IMAGE_URL = '../api/v1/';

function attachFile(id) {
    var val = $('#' + id).val();
    var checkfiletype = false;
    if ($.trim(val) != '' && checkfiletype == false) {
        $('.loader').addClass('is-active');
        var form = new FormData();
        form.append('file', $('#' + id)[0].files[0]);
        $.ajax({
            type: "POST",
            url: 'api/v1/upload_file',
            processData: false,
            contentType: false,
            data: form,
            success: function (data) {
                $('.loader').removeClass('is-active');
                if (data.result.error === false) {
                    if (id == 'profile_picture') {
                        $("#preview_container").removeClass('hidden');
                        $("#upload_container").addClass('hidden');
                        avatar = data.result.data;
                        $("#preview_container img").attr("src", BASE_IMAGE_URL + avatar);
                    }
                } else {
                    swal('Information', data.result.message, 'info');
                }
            },
            error: function (err) {
                $('.loader').removeClass('is-active');
                swal('Error', err.statusText, 'error');
            }
        });
    } else {
        if (id != 'profile_picture' && checkfiletype == false) {
            swal('Information', 'Please attach profile', 'info');
        }
    }
}

function registerMember() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/insert_user',
        data: {name: $('#name').val(), phone_no: $('#phone_no').val(), profile_picture: avatar, gender: $('#gender').val(), age: $('#age').val(), date_of_birth: $('#date_of_birth').val(), education: $('#education').val(), occupation: $('#occupation').val(), marital_status: $('#marital_status').val(), income: $('#income').val(), height: $('#height').val(), weight: $('#weight').val(), religian: $('#religian').val(), caste: $('#caste').val(), location: $('#location').val(), aboutme: $('#aboutme').val(), user_name: $('#user_name').val(), password: $('#password').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                $('#name').val('');
                $('#phone_no').val('');
                $('#age').val('');
                $('#date_of_birth').val('');
                $("#profile_picture").val('');
                $('#gender').val('');
                $('#education').val('');
                $('#occupation').val('');
                $('#income').val('');
                $('#height').val('');
                $('#weight').val('');
                $('#caste').val('');
                $('#religion').val('');
                $('#location').val('');
                $('#aboutme').val('');
                $('#marital_status').val('');
                $('#user_name').val('');
                $('#password').val('');
                swal("Thanks for Registration!", "Your Account Has been Created...", "success");
                setTimeout(function () {
                    window.location = 'profiles';
                }, 2000);
            } else {
                swal("Oops!", data.result.message, "info");
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal("Oops!", err.statusText, "error");
        }
    });
    return false;
}

function loginUser() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/login_user',
        data: {user_name: $('#user_name1').val(), password: $('#password1').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Logged In', 'Your Account Has Been Successfully Logged In', 'success');
                setTimeout(function () {
                    window.location = 'profiles';
                }, 3000);
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
    return false;
}

function logoutUser(name) {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/logout_user',
        data: {},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('', 'Thanks ' + name + ' Your Account has been Sucessfully logout', 'info');
                setTimeout(function () {
                    window.location = 'index';
                }, 3000);
            } else {
                swal('Information', data.result.message, 'info');
            }
        },
        error: function (err) {
            $('.loader').removeClass('is-active');
            swal('Error', err.statusText, 'error');
        }
    });
}

function closeProfilePic() {
    $("#profile_picture").val('');
    $("#preview_container").addClass('hidden');
    $("#upload_container").removeClass('hidden');
}