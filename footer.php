<footer>
    <div class="container">
        <ul class="footer-menu">
            <li><a href="#">About Us</a></li>
            <li><a href="#">Terms and Conditions</a></li>
            <li><a href="#">Contact Us</a></li>
        </ul>
        <p class="text-center"><a href="http://www.iniyaamatrimony.com/">Iniyaamatrimony.com</a> © Copyright 2020, All Rights Reserved.</p>
    </div>
</footer>
<script src="js/jquery.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="js/slick.min.js" type="text/javascript"></script>
<script src="js/sweetalert.min.js" type="text/javascript"></script>
<script src="js/common.js" type="text/javascript"></script>
<script>

    // With jQuery
    $(document).on({
        "contextmenu": function (e) {
            //console.log("ctx menu button:", e.which);

            // Stop the context menu
            e.preventDefault();
        },
        "mousedown": function (e) {
            //console.log("normal mouse down:", e.which);
        },
        "mouseup": function (e) {
            //console.log("normal mouse up:", e.which);
        }
    });

    $('.carousel').carousel({
        interval: 2000
    });

    $(document).ready(function () {
        $('#myModal').modal('show');
    });
</script>
<script>
    $(document).ready(function () {
        var date_input = $('input[name="date"]'); //our date input has the name "date"
        var container = $('.bootstrap-iso form').length > 0 ? $('.bootstrap-iso form').parent() : "body";
        date_input.datepicker({
            format: 'dd/mm/yyyy',
            container: container,
            todayHighlight: true,
            autoclose: true,
        })
    })
</script>
<script>
    function menu() {
        var x = document.getElementById("menu-section");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }

    function menu_login() {
        var x = document.getElementById("login-section");
        if (x.style.display === "block") {
            x.style.display = "none";
        } else {
            x.style.display = "block";
        }
    }
</script>
<script>
    $(document).ready(function () {
        $('.customer-logos').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 1500,
            arrows: false,
            dots: false,
            pauseOnHover: false,
            responsive: [{
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2
                    }
                }, {
                    breakpoint: 520,
                    settings: {
                        slidesToShow: 1
                    }
                }]
        });
    });
</script>