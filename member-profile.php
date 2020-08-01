<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <section class="member-profile-section">
            <div class="container">
                <div class="profile-header">
                    <div class="profile-img">
                        <img src="img/female_user.png" width="200" alt="Profile Image">
                    </div>
                    <div class="profile-nav-info">
                        <h3 class="user-name">Bright Code</h3>
                        <div class="address">
                            <p id="state" class="state">New York,</p>
                            <span id="country" class="country">USA.</span>
                        </div>

                    </div>
                    <div class="profile-option">
                        <div class="notification">
                            <i class="fa fa-bell"></i>
                            <span class="alert-message">3</span>
                        </div>
                    </div>
                </div>

                <div class="main-bd">
                    <div class="left-side">
                        <div class="profile-side">
                            <p class="mobile-no"><i class="fa fa-phone"></i> +23470xxxxx700</p>
                            <p class="user-mail"><i class="fa fa-envelope"></i> Brightisaac80@gmail.com</p>
                            <div class="user-bio">
                                <h3>Bio</h3>
                                <p class="bio">
                                    Lorem ipsum dolor sit amet, hello how consectetur adipisicing elit. Sint consectetur provident magni yohoho consequuntur, voluptatibus ghdfff exercitationem at quis similique. Optio, amet!
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="right-side">

                        <div class="nav">
                            <ul>
                                <li onclick="tabs(0)" class="user-post active">Basic Info</li>
                                <li onclick="tabs(1)" class="user-review">Contact Info</li>
                                <li onclick="tabs(2)" class="user-setting"> Personal Details</li>
                            </ul>
                        </div>
                        <div class="profile-body">
                            <div class="profile-posts tab">
                                <h1>Basic Info</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa quia sunt itaque ut libero cupiditate ullam qui velit laborum placeat doloribus, non tempore nisi ratione error rem minima ducimus. Accusamus adipisci quasi at itaque repellat sed
                                    magni eius magnam repellendus. Quidem inventore repudiandae sunt odit. Aliquid facilis fugiat earum ex officia eveniet, nisi, similique ad ullam repudiandae molestias aspernatur qui autem, nam? Cupiditate ut quasi iste, eos perspiciatis maiores
                                    molestiae.</p>
                            </div>
                            <div class="profile-reviews tab">
                                <h1>Contact Info</h1>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam pariatur officia, aperiam quidem quasi, tenetur molestiae. Architecto mollitia laborum possimus iste esse. Perferendis tempora consectetur, quae qui nihil voluptas. Maiores debitis
                                    repellendus excepturi quisquam temporibus quam nobis voluptatem, reiciendis distinctio deserunt vitae! Maxime provident, distinctio animi commodi nemo, eveniet fugit porro quos nesciunt quidem a, corporis nisi dolorum minus sit eaque error
                                    sequi ullam. Quidem ut fugiat, praesentium velit aliquam!</p>
                            </div>
                            <div class="profile-settings tab">
                                <div class="account-setting">
                                    <h1>Personal Details</h1>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit omnis eaque, expedita nostrum, facere libero provident laudantium. Quis, hic doloribus! Laboriosam nemo tempora praesentium. Culpa quo velit omnis, debitis maxime, sequi
                                        animi dolores commodi odio placeat, magnam, cupiditate facilis impedit veniam? Soluta aliquam excepturi illum natus adipisci ipsum quo, voluptatem, nemo, commodi, molestiae doloribus magni et. Cum, saepe enim quam voluptatum vel debitis
                                        nihil, recusandae, omnis officiis tenetur, ullam rerum.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
        <script>
            $(".nav ul li").click(function () {
                $(this)
                        .addClass("active")
                        .siblings()
                        .removeClass("active");
            });

            const tabBtn = document.querySelectorAll(".nav ul li");
            const tab = document.querySelectorAll(".tab");

            function tabs(panelIndex) {
                tab.forEach(function (node) {
                    node.style.display = "none";
                });
                tab[panelIndex].style.display = "block";
            }
            tabs(0);

            let bio = document.querySelector(".bio");
            const bioMore = document.querySelector("#see-more-bio");
            const bioLength = bio.innerText.length;

            function bioText() {
                bio.oldText = bio.innerText;

                bio.innerText = bio.innerText.substring(0, 100) + "...";
                bio.innerHTML += `<span onclick='addLength()' id='see-more-bio'>See More</span>`;
            }
//        console.log(bio.innerText)

            bioText();

            function addLength() {
                bio.innerText = bio.oldText;
                bio.innerHTML +=
                        "&nbsp;" + `<span onclick='bioText()' id='see-less-bio'>See Less</span>`;
                document.getElementById("see-less-bio").addEventListener("click", () => {
                    document.getElementById("see-less-bio").style.display = "none";
                });
            }
            if (document.querySelector(".alert-message").innerText > 9) {
                document.querySelector(".alert-message").style.fontSize = ".7rem";
            }

        </script>
    </body>
</html>