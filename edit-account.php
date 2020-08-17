<?php
session_start();
require_once 'api/include/common.php';
if(!(isset($_SESSION['user_id']) && $_SESSION['user_id']!='')) {
    header('Location:index.php');
}
$obj = new Common();
if (isset($_SESSION['user_id'])) {
    $myprofile = $obj->selectRow('*', 'users', 'user_id=' . $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html>
    <?php include 'head.php'; ?>
    <body>
        <?php include 'menu.php'; ?>
        <div class="sub-banner-section"></div>
        <div class="edit-account-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <button class="btn btn-danger">Delete My Account</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="title-section">
                            <h3>Update Your Profile</h3>
                        </div>
                        <form class="register-form" onsubmit="return updateMember(<?php echo $myprofile['user_id']; ?>);">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Enter Your Full Name</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="name" value="<?php echo $myprofile['name']; ?>">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Gender</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <select class="custom-select form-control" id="gender">
                                        <option>Choose...</option>
                                            <?php
                                            foreach (array('Male' => 'Male', 'Female' => 'Female') as $key => $val) {
                                                $selected = '';
                                                if ($key == $myprofile['gender']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Age</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="age" placeholder="" type="text" value="<?php echo $myprofile['age']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date Of Birth</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="date_of_birth" name="date" placeholder="DD/MM/YYYY" type="text" value="<?php echo $myprofile['date_of_birth']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Education</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="education" placeholder="" type="text" value="<?php echo $myprofile['education']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Occupation</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="occupation" placeholder="" type="text" value="<?php echo $myprofile['occupation']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Marital Status</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <select class="custom-select form-control" id="marital_status">
                                        <option>Choose...</option>
                                            <?php
                                            foreach (array('Single' => 'Single', 'Widow' => 'Widow', 'Divorced' => 'Divorced') as $key => $val) {
                                                $selected = '';
                                                if ($key == $myprofile['marital_status']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Income</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="income" placeholder="" type="text" value="<?php echo $myprofile['income']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Height</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <select class="custom-select form-control" id="height">
                                        <option>Choose...</option>
                                         <?php
                                            foreach (array('Below 4ft' => 'Below 4ft', '4ft 6in' => '4ft 6in', '4ft 7in' => '4ft 7in', '4ft 8in' => '4ft 8in', '4ft 9in' => '4ft 9in', '4ft 10in' => '4ft 10in', '4ft 11in' => '4ft 11in', '5ft' => '5ft', '5ft 1in' => '5ft 1in', '5ft 2in' => '5ft 2in', '5ft 3in' => '5ft 3in', '5ft 4in' => '5ft 4in', '5ft 5in' => '5ft 5in', '5ft 6in' => '5ft 6in', '5ft 7in' => '5ft 7in', '5ft 8in' => '5ft 8in', '5ft 9in' => '5ft 9in', '5ft 10in' => '5ft 10in', '5ft 11in' => '5ft 11in', '6ft' => '6ft', '6ft 1in' => '6ft 1in', '6ft 2in' => '6ft 2in', '6ft 3in' => '6ft 3in', '6ft 4in' => '6ft 4in', '6ft 5in' => '6ft 5in', '6ft 6in' => '6ft 6in', '6ft 7in' => '6ft 7in', '6ft 8in' => '6ft 8in', '6ft 9in' => '6ft 9in', '6ft 10in' => '6ft 10in', '6ft 11in' => '6ft 11in', '7ft' => '7ft', 'Above 7ft' => 'Above 7ft') as $key => $val) {
                                                $selected = '';
                                                if ($key == $myprofile['height']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Weight</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="weight" placeholder="" type="text" value="<?php echo $myprofile['weight']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Religion</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <select class="custom-select form-control" id="religian">
                                        <option>Choose...</option>
                                         <?php
                                            foreach (array('Hindu' => 'Hindu', 'Christian' => 'Christian', 'Muslim' => 'Muslim') as $key => $val) {
                                                $selected = '';
                                                if ($key == $myprofile['religian']) {
                                                    $selected = 'selected';
                                                }
                                                ?>
                                                <option value="<?php echo $key; ?>" <?php echo $selected; ?>><?php echo $val; ?></option>
                                                <?php
                                            }
                                            ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Caste</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <select class="custom-select form-control" id="caste">
                                        <option selected>Choose...</option>
                                        <option value="">Any</option>
                                        <option value="1">Adaviyar</option>
                                        <option value="2">Adi Dravidar (SC)</option>
                                        <option value="3">Ambalakarar</option>
                                        <option value="4">Arunthathiyar</option>
                                        <option value="5">Bania-Gujarathi</option>
                                        <option value="7">Bharathar</option>
                                        <option value="8">Bhavasar Kshatriya</option>
                                        <option value="9">Boyer</option>
                                        <option value="10">Brahmin-Gujarathi</option>
                                        <option value="11">Brahmin-Gurukkal</option>
                                        <option value="12">Brahmin-Hindi</option>
                                        <option value="13">Brahmin-Iyengar</option>
                                        <option value="14">Brahmin-Iyer</option>
                                        <option value="15">Brahmin-Madhwa-Kannada</option>
                                        <option value="16">Brahmin-Marathi</option>
                                        <option value="17">Brahmin-Palghat</option>
                                        <option value="18">Brahmin-Punjabi</option>
                                        <option value="19">Brahmin-Telugu</option>
                                        <option value="20">Brahmin-Varma</option>
                                        <option value="21">Bramani</option>
                                        <option value="22">Caste No Bar</option>
                                        <option value="23">Chettiar</option>
                                        <option value="24">Desigar</option>
                                        <option value="25">Devandra Kula Vellalar</option>
                                        <option value="26">Ezhavar/IlluthuPillai</option>
                                        <option value="27">Ezhuthachan</option>
                                        <option value="28">Fernando</option>
                                        <option value="29">Gounder</option>
                                        <option value="30">Gowda</option>
                                        <option value="31">Jalunder Jangam</option>
                                        <option value="32">Jangam</option>
                                        <option value="33">Kallar</option>
                                        <option value="34">Kannadiya Naicker</option>
                                        <option value="35">Karnikar</option>
                                        <option value="36">Keralites</option>
                                        <option value="37">Konkani</option>
                                        <option value="38">Krishna Vaka</option>
                                        <option value="39">Kshatriya/Raja</option>
                                        <option value="40">Kulalar</option>
                                        <option value="41">Kuravan</option>
                                        <option value="42">Lohana</option>
                                        <option value="43">Maharastrian</option>
                                        <option value="44">Malayalalee</option>
                                        <option value="45">Maratha - Non Brahmin</option>
                                        <option value="46">Maravar/Mukkulathor/Thevar</option>
                                        <option value="47">Maruthuvar</option>
                                        <option value="48">Meenavar</option>
                                        <option value="49">Moopanar</option>
                                        <option value="50">Mudaliar</option>
                                        <option value="51">Mukkuvar</option>
                                        <option value="100">Muslim</option>
                                        <option value="52">Mutharaiyar</option>
                                        <option value="53">Muthuraja</option>
                                        <option value="54">Muthuraja Ambalakarar</option>
                                        <option value="55">Nadar</option>
                                        <option value="56">Naicker</option>
                                        <option value="57">Naidu</option>
                                        <option value="58">Nair</option>
                                        <option value="59">Namakkar Naidu (SC)</option>
                                        <option value="60">Namdev</option>
                                        <option value="61">Nandavarik</option>
                                        <option value="62">Nepali</option>
                                        <option value="63">Nesavallar</option>
                                        <option value="64">Oriya-Brahmin</option>
                                        <option value="65">Other Castes</option>
                                        <option value="66">Ottar(MBC)</option>
                                        <option value="67">Pandaram</option>
                                        <option value="68">Pannaiyar</option>
                                        <option value="69">Paravar</option>
                                        <option value="70">Parkavakulam</option>
                                        <option value="71">Parvatha Rajakulam</option>
                                        <option value="72">Pattariyar</option>
                                        <option value="73">Pillai</option>
                                        <option value="74">Rajakula Agamudayar</option>
                                        <option value="75">Rajput</option>
                                        <option value="76">Rao</option>
                                        <option value="77">Reddiar</option>
                                        <option value="78">Sathatha SriVaishnava</option>
                                        <option value="79">Schedule Tribes</option>
                                        <option value="80">Senai Thalaivar</option>
                                        <option value="81">Sindhi</option>
                                        <option value="82">Sindhi-Brahmin</option>
                                        <option value="83">Singh</option>
                                        <option value="84">Sourashtra</option>
                                        <option value="85">Udayar</option>
                                        <option value="86">Uppara</option>
                                        <option value="87">Vallambar</option>
                                        <option value="88">Valluvan</option>
                                        <option value="89">Valluvan(S.C)</option>
                                        <option value="90">Valluvar</option>
                                        <option value="91">Vannan</option>
                                        <option value="92">Vannar</option>
                                        <option value="93">Vannia Kula Kshatriya</option>
                                        <option value="94">Vanniar</option>
                                        <option value="95">Veera Saiva Lingayath</option>
                                        <option value="96">Vellalar</option>
                                        <option value="97">Viswakarma-Achari</option>
                                        <option value="98">Yadav (U.P)Hindi</option>
                                        <option value="99">Yadava</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Location</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="location" placeholder="" type="text" value="<?php echo $myprofile['location']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">About Me</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <textarea class="form-control" id="aboutme" placeholder="" rows="3" type="text" value="<?php echo $myprofile['aboutme']; ?>" ></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Mobile No</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input type="mobile" class="form-control" id="phone_no" maxlength="10" placeholder="Parent Number" value="<?php echo $myprofile['phone_no']; ?>" >
                                </div>
                            </div>
                            <h4>Login Detail:</h4>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">User Name</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="user_name" placeholder="" type="text" value="<?php echo $myprofile['user_name']; ?>" />
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>