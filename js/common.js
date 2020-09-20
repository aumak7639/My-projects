var avatar = '';
var BASE_IMAGE_URL = 'api/v1/';

function attachFile(id) {
    var val = $('#' + id).val();
    var checkfiletype = false;
    if ($.trim(val) != '' && checkfiletype == false) {
        $('.loader').addClass('is-active');
        var form = new FormData();
        form.append('file', $('#' + id)[0].files[0]);
        $.ajax({
            type: "POST",
            url: 'api/v1/index.php/upload_file',
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
        url: 'api/v1/index.php/insert_user',
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
                    window.location = 'profiles.php';
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
        url: 'api/v1/index.php/login_user',
        data: {user_name: $('#user_name1').val(), password: $('#password1').val()},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Logged In', 'Your Account Has Been Successfully Logged In', 'success');
                setTimeout(function () {
                    window.location = 'profiles.php';
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

function logoutUser() {
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/index.php/logout_user',
        data: {},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('', 'Your Account has been Sucessfully logout', 'info');
                setTimeout(function () {
                    window.location = 'index.php';
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


function makePayment(uid) {
    var gst = (20 * 18) / 100;
    var rzpOptions = {
        key: "rzp_test_4S1JzqVDtmIyws",
        amount: (2000 + (gst * 100)),
        name: "Iniyaa Matrimony",
        description: "Find your Perfect Match",
        image: "http://www.iniyaamatrimony.com/beta/img/logo.png",
        handler: function (response) {
            if (typeof response.razorpay_payment_id !== 'undefined') {
                swal('Thank You', 'Payment Successful', 'success');
                window.location = 'contact-info.php?uid='+uid;
            } else {
                swal('Information', response.result.message, 'info');
            }
        },
        notes: {
            address: "RazorpayTransaction"
        },
        theme: {
            color: "#662d91"
        }
    };
    var rzp1 = new Razorpay(rzpOptions);
    rzp1.open();
    return false;
}

function changePassword(uid) {
    $('.loader').addClass('is-active');
    var pwd = $('#password').val();
    $.ajax({
        type: "POST",
        url: 'api/v1/reset_password',
        data: {password: pwd, 'member': uid},
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Password Changed', 'Your Password has been Changed', 'success');
                $('#password').val('');
                setTimeout(function () {
                    window.location = 'member-profile.php';
                }, 2000);
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


function updateMemberProfile(mid) {
    var data = {name: $('#name').val(), gender: $('#gender').val(), age: $('#age').val(), date_of_birth: $('#date_of_birth').val(), education: $('#education').val(), occupation: $('#occupation').val(), marital_status: $('#marital_status').val(), income: $('#income').val(), height: $('#height').val(), weight: $('#weight').val(), religian: $('#religian').val(), caste: $('#caste').val()};
    $('.loader').addClass('is-active');
    $.ajax({
        type: "POST",
        url: 'api/v1/update_record/users/user_id=' + mid,
        data: data,
        success: function (data) {
            $('.loader').removeClass('is-active');
            if (data.result.error === false) {
                swal('Updated', 'Your Account has been Updated Successfully', 'success');
                window.location = 'member-profile.php';
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

function attachAccountFile(id,mid) {
    var val = $('#' + id).val();
    var checkfiletype = false;
    if ($.trim(val) != '' && checkfiletype == false) {
        $('.loader').addClass('is-active');
        var form = new FormData();
        form.append('file', $('#' + id)[0].files[0]);
        form.append('mid', mid);
        $.ajax({
            type: "POST",
            url: 'api/v1/upload_member_picfile',
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
