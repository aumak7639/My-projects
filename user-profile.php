<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
$user = $obj->selectAll('*', 'users', 'user_id > 0');
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="user-profile-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="user-profile">
                            <div id="gallerywrapper">
                                <div id="gallery">
                                    <div id="pic1">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 1">
                                        <a class="previous" href="#pic5">&lt;</a>
                                        <a class="next" href="#pic2">&gt;</a>
                                        <h3>Image 1</h3>
                                    </div>
                                    <div id="pic2">
                                        <img src="https://unsplash.it/g/500/350" height="350" width="500" alt="Image 2">
                                        <a class="previous" href="#pic1">&lt;</a>
                                        <a class="next" href="#pic3">&gt;</a>
                                        <h3>Image 2</h3>
                                    </div>
                                    <div id="pic3">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 3">
                                        <a class="previous" href="#pic2">&lt;</a>
                                        <a class="next" href="#pic4">&gt;</a>
                                        <h3>Image 3</h3>
                                    </div>
                                    <div id="pic4">
                                        <img src="https://unsplash.it/g/500/350" height="350" width="500" alt="Image 4">
                                        <a class="previous" href="#pic3">&lt;</a>
                                        <a class="next" href="#pic5">&gt;</a>
                                        <h3>Image 4</h3>
                                    </div>
                                    <div id="pic5">
                                        <img src="https://unsplash.it/g/500/350?random" height="350" width="500" alt="Image 5">
                                        <a class="previous" href="#pic4">&lt;</a>
                                        <a class="next" href="#pic1">&gt;</a>
                                        <h3>Image 5</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="user-details">
                                <table>
                                    <tr>
                                        <th>Name</th>
                                        <th>:</th>
                                        <td>Name Comes Here</td>
                                    </tr>
                                    <tr>
                                        <th>Age</th>
                                        <th>:</th>
                                        <td>Age</td>
                                    </tr>
                                    <tr>
                                        <th>Height</th>
                                        <th>:</th>
                                        <td>Height</td>
                                    </tr>
                                    <tr>
                                        <th>Weight</th>
                                        <th>:</th>
                                        <td>weight</td>
                                    </tr>
                                    <tr>
                                        <th>Education</th>
                                        <th>:</th>
                                        <td>Education</td>
                                    </tr>
                                    <tr>
                                        <th>Occupation</th>
                                        <th>:</th>
                                        <td>Occupation</td>
                                    </tr>
                                    <tr>
                                        <th>Caste</th>
                                        <th>:</th>
                                        <td>Caste</td>
                                    </tr>
                                    <tr>
                                        <th>Religion</th>
                                        <th>:</th>
                                        <td>Religion</td>
                                    </tr>
                                    <tr>
                                        <th>Marital Status</th>
                                        <th>:</th>
                                        <td>Religion</td>
                                    </tr>
                                </table>
                                <div class="text-center contact-info">
                                    <button class="btn btn-contact">See Our Contact Info...</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>