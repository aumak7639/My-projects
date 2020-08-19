<?php
session_start();
require_once 'api/include/common.php';
$obj = new Common();
if (isset($_SESSION['user_id'])) {
    $login_member = $obj->selectRow('*', 'users', 'user_id=' . $_SESSION['user_id']);
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
                        <form class="register-form" onsubmit = "return updateMemberProfile(<?php echo $login_member['user_id']; ?>);">
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Enter Your Full Name</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input type="text" class="form-control" id="name" value="<?php echo $login_member['name']; ?>">
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
                                            if ($key == $login_member['gender']) {
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
                                    <input class="form-control" id="age" placeholder="" type="text" value="<?php echo $login_member['age']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Date Of Birth</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="date_of_birth" name="date" placeholder="DD/MM/YYYY" type="text" value="<?php echo $login_member['date_of_birth']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Education</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="education" placeholder="" type="text" value="<?php echo $login_member['education']; ?>" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-4 col-form-label">Occupation</label>
                                <span class="col-sm-1"> : </span>
                                <div class="col-sm-7">
                                    <input class="form-control" id="occupation" placeholder="" type="text" value="<?php echo $login_member['occupation']; ?>" />
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
                                            if ($key == $login_member['marital_status']) {
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
                                    <input class="form-control" id="income" placeholder="" type="text" value="<?php echo $login_member['income']; ?>" />
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
                                            if ($key == $login_member['height']) {
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
                                    <input class="form-control" id="weight" placeholder="" type="text" value="<?php echo $login_member['weight']; ?>" />
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
                                            if ($key == $login_member['religian']) {
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
                                        <?php
                                        foreach (array('1' => 'Adaviyar', '2' => 'Adi Dravidar (SC)', '3' => 'Ambalakarar', '4' => 'Arunthathiyar', '5' => 'Bania-Gujarathi', '7' => 'Bharathar', '8' => 'Bhavasar Kshatriya', '9' => 'Boyer', '10' => 'Brahmin-Gujarathi', '11' => 'Brahmin-Gurukkal', '12' => 'Brahmin-Hindi', '13' => 'Brahmin-Iyengar', '14' => 'Brahmin-Iyer', '15' => 'Brahmin-Madhwa-Kannada', '16' => 'Brahmin-Marathi', '17' => 'Brahmin-Palghat', '18' => 'Brahmin-Punjabi', '19' => 'Brahmin-Telugu', '20' => 'Brahmin-Varma', '21' => 'Bramani', '22' => 'Caste No Bar', '23' => 'Chettiar', '24' => 'Desigar', '25' => 'Devandra Kula Vellalar', '26' => 'Ezhavar/IlluthuPillai', '27' => 'Ezhuthachan', '28' => 'Fernando', '29' => 'Gounder', '30' => 'Gowda', '31' => 'Jalunder Jangam', '32' => 'Jangam', '33' => 'Kallar', '34' => 'Kannadiya Naicker', '35' => 'Karnikar', '36' => 'Keralites', '37' => 'Konkani', '38' => 'Krishna Vaka', '39' => 'Kshatriya/Raja', '40' => 'Kulalar', '41' => 'Kuravan', '42' => 'Lohana', '43' => 'Maharastrian', '44' => 'Malayalalee', '45' => 'Maratha - Non Brahmin', '46' => 'Maravar/Mukkulathor/Thevar', '47' => 'Maruthuvar', '48' => 'Meenavar', '49' => 'Moopanar', '50' => 'Mudaliar', '51' => 'Mukkuvar', '52' => 'Mutharaiyar', '53' => 'Muthuraja', '54' => 'Muthuraja Ambalakarar', '55' => 'Nadar', '56' => 'Naicker', '57' => 'Naidu', '58' => 'Nair', '59' => 'Namakkar Naidu (SC)', '60' => 'Namdev', '61' => 'Nandavarik', '62' => 'Nepali', '63' => 'Nesavallar', '64' => 'Oriya-Brahmin', '65' => 'Other Castes', '66' => 'Ottar(MBC)', '67' => 'Pandaram', '68' => 'Pannaiyar', '69' => 'Paravar', '70' => 'Parkavakulam', '71' => 'Parvatha Rajakulam', '72' => 'Pattariyar', '73' => 'Pillai', '74' => 'Rajakula Agamudayar', '75' => 'Rajput', '76' => 'Rao', '77' => 'Reddiar', '78' => 'Sathatha SriVaishnava', '79' => 'Schedule Tribes', '80' => 'Senai Thalaivar', '81' => 'Sindhi', '82' => 'Sindhi-Brahmin', '83' => 'Singh', '84' => 'Sourashtra', '85' => 'Udayar', '86' => 'Uppara', '87' => 'Vallambar', '88' => 'Valluvan', '89' => 'Valluvan(S.C)', '90' => 'Valluvar', '91' => 'Vannan', '92' => 'Vannar', '93' => 'Vannia Kula Kshatriya', '94' => 'Vanniar', '95' => 'Veera Saiva Lingayath', '96' => 'Vellalar', '97' => 'Viswakarma-Achari', '98' => 'Yadav (U.P)Hindi', '99' => 'Yadava', '100' => 'Muslim') as $key => $val) {
                                            $selected = '';
                                            if ($key == $login_member['caste']) {
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
                            <button type="submit" class="btn btn-primary mb-2">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <?php include 'footer.php'; ?>
    </body>
</html>