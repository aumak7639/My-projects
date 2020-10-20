<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
}
$user = $obj->selectAll('*', 'users', 'user_id > 0');
$uniqid = 'iniyamem'
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <section class="">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="row">
                            <?php if (count($user) > 0) { ?>
                                <?php foreach ($user as $row) { ?>
                                    <div class="col-md-6">
                                        <div class="member-detail">
                                            <!--                                            <div class="m-b-10">
                                                                                            <strong class="m-b-10">ID: </strong>
                                                                                        </div>-->
                                            <div class="member-section">
                                                <div class="member-img">
                                                    <?php if ($row['image_path'] != '') { ?>
                                                        <img src='<?php echo BASE_URL . $row['image_path']; ?>' alt='' />
                                                    <?php } else { ?>
                                                        <img src='<?php echo BASE_URL ?>no_preview.jpg' alt='' />
                                                    <?php } ?>
                                                </div>
                                                <div class="member-info read-more-less" data-id="100">
                                                    <strong><h4><?php echo $row['name']; ?> - <span>Id: <?php echo $uniqid . $row['user_id']; ?></span></h4></strong>
                                                    <p><?php echo $row['age']; ?> Years / <?php echo $row['height']; ?></p>
                                                    <p class="thumbnail read-toggle" data-id='<?php echo $row['user_id']; ?>'>About : <?php if ($row['aboutme'] != '') { ?><?php echo $row['aboutme']; ?>  <?php } else { ?> No About <?php } ?></p>
                                                </div>
                                            </div>
                                            <!--                                            <div class="member-content-footer">                   
                                                                                        </div>-->

                                            <a href='user-profile.php?uid=<?php echo $row['user_id']; ?>' class="btn profile-btn">View Full Profile</a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="text-center">
                                    <h4>No Member's</h4>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="side-box">
                            <div class="side-header">
                                <h3>INIYAA MATRIMONY</h3>
                            </div>
                            <div class="side-content">
                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                <ul>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Region 1</li>
                                    <li><i class="fa fa-check-square-o" aria-hidden="true"></i> Region 2</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="module parallax parallax-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-sm-5 mobileapp-img hidden-xs"> <img src="https://www.lovevivah.com/assets/images/MobileAppHome.png?v=1" alt="LoveVivah App"> </div>
                    <div class="col-md-7 col-sm-7 parallax-caption">
                        <h2>Happiness is Just an App Away!</h2>
                        <p>Find your right match with Lovevivah.com </p>
                        <p style="font-weight:bold;"><i class="fa fa-hand-o-right"></i> Simple |  Fast | Convenient | Safe &amp; Secure</p>
                        <div class="app-download-btn">
                            <p>Available on Android</p>
                            <a href="#" target="_blank"><span class="membership-icon android-app"></span></a> </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="home-why-cnt">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-md-12">
                        <div class="text-center">
                            <h2 class="home-why-txt">Why Choose Iniya</h2>
                            <div class="push--top push--bottom separation">
                                <hr class="MuiDivider-root">
                            </div>
                            <div class="home-why-dtxt">Iniya is different from other matchmaking sites because of some unique benefits that every parent will find highly useful</div>

                        </div>

                    </div>

                </div>
                <div class="row center-xs">
                    <div class="col-xs-12 col-md-4">
                        <div class="home-why-itm">
                            <span class="home-why-itm-icn" style="background: url(&quot;https://img2.sangam.com/assets/icons/info.svg&quot;) no-repeat;"></span>
                            <div class="home-why-itm-dsc">
                                <h3 class="home-why-itm-dsc-hd">Get Complete Family Information</h3>
                                <div class="soft-half--top">You will find detailed family information in every profile. Knowing the family will help you take the next step with confidence.</div>

                            </div>

                        </div>

                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="home-why-itm">
                            <span class="home-why-itm-icn" style="background: url(&quot;https://img2.sangam.com/assets/icons/match.svg&quot;) no-repeat;"></span>
                            <div class="home-why-itm-dsc">
                                <h3 class="home-why-itm-dsc-hd">Get Matches from your Community</h3>
                                <div class="soft-half--top">With over 80 community sites, you can find a match from your community.</div>       
                            </div>

                        </div>

                    </div>

                    <div class="col-xs-12 col-md-4">
                        <div class="home-why-itm">
                            <span class="home-why-itm-icn" style="background: url(&quot;https://img2.sangam.com/assets/icons/connection.png&quot;) no-repeat;"></span>
                            <div class="home-why-itm-dsc">
                                <h3 class="home-why-itm-dsc-hd">Find Common Links with Prospects</h3>
                                <div class="soft-half--top">A common native place, college or company can help you find references and make background checks.</div>

                            </div>

                        </div>

                    </div>

                </div>

            </div>

        </div>
        <?php include 'footer.php'; ?>

        <script>
            $(document).ready(function () {
                var contentArray = [];
                var index = "";
                var clickedIndex = "";
                var minimumLength = $('.read-more-less').attr('data-id');
                var initialContentLength = [];
                var initialContent = [];
                var readMore = "........<br/><hr/><span class='read-more'><span class='glyphicon glyphicon-plus-sign'></span>Read More</span>";
                var readLess = ".......<br/><hr/><span class='read-less'><span class='glyphicon glyphicon-minus-sign'></span>Read Less</span>";
                $('.read-toggle').each(function () {
                    index = $(this).attr('data-id');
                    contentArray[index] = $(this).html();
                    initialContentLength[index] = $(this).html().length;
                    if (initialContentLength[index] > minimumLength) {
                        initialContent[index] = $(this).html().substr(0, minimumLength);
                    } else {
                        initialContent[index] = $(this).html();
                    }
                    $(this).html(initialContent[index] + readMore);
                    //console.log(initialContent[0]);  


                });
                $(document).on('click', '.read-more', function () {
                    $(this).fadeOut(1000, function () {
                        clickedIndex = $(this).parents('.read-toggle').attr('data-id');
                        $(this).parents('.read-toggle').html(contentArray[clickedIndex] + readLess);
                    });
                });
                $(document).on('click', '.read-less', function () {
                    $(this).fadeOut(1000, function () {
                        clickedIndex = $(this).parents('.read-toggle').attr('data-id');
                        $(this).parents('.read-toggle').html(initialContent[clickedIndex] + readMore);
                    });
                });
            });

        </script>
    </body>
</html>