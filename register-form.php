<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <div class="register-section">
                    <h4 class="modal-title">Register Form</h4>
                </div>
            </div>
            <div class="modal-body text-center">
                <form class="register-form" onsubmit = 'return registerMember();'>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Enter Your Full Name</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" id="name" value="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Gender</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <select class="custom-select form-control" id="gender">
                                <option selected>Choose...</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Age</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="age" placeholder="" type="text" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Date Of Birth</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="date_of_birth" name="date" placeholder="DD/MM/YYYY" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Education</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="education" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Occupation</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="occupation" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Marital Status</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <select class="custom-select form-control" id="marital_status">
                                <option selected>Choose...</option>
                                <option value="Single">Single</option>
                                <option value="Widow">Widow</option>
                                <option value="Divorced">Divorced</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Income</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="income" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Height</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <select class="custom-select form-control" id="height">
                                <option>Choose...</option>
                                <option value="Below 4ft">Below 4ft</option>
                                <option value="4ft 6in" selected="selected">4ft 6in</option>
                                <option value="4ft 7in">4ft 7in</option>
                                <option value="4ft 8in">4ft 8in</option>
                                <option value="4ft 9in">4ft 9in</option>
                                <option value="4ft 10in">4ft 10in</option>
                                <option value="4ft 11in">4ft 11in</option>
                                <option value="5ft">5ft</option>
                                <option value="5ft 1in">5ft 1in</option>
                                <option value="5ft 2in">5ft 2in</option>
                                <option value="5ft 3in">5ft 3in</option>
                                <option value="5ft 4in">5ft 4in</option>
                                <option value="5ft 5in">5ft 5in</option>
                                <option value="5ft 6in">5ft 6in</option>
                                <option value="5ft 7in">5ft 7in</option>
                                <option value="5ft 8in">5ft 8in</option>
                                <option value="5ft 9in">5ft 9in</option>
                                <option value="5ft 10in">5ft 10in</option>
                                <option value="5ft 11in">5ft 11in</option>
                                <option value="6ft">6ft</option>
                                <option value="6ft 1in">6ft 1in</option>
                                <option value="6ft 2in">6ft 2in</option>
                                <option value="6ft 3in">6ft 3in</option>
                                <option value="6ft 4in" selected="selected">6ft 4in</option>
                                <option value="6ft 5in">6ft 5in</option>
                                <option value="6ft 6in">6ft 6in</option>
                                <option value="6ft 7in">6ft 7in</option>
                                <option value="6ft 8in">6ft 8in</option>
                                <option value="6ft 9in">6ft 9in</option>
                                <option value="6ft 10in">6ft 10in</option>
                                <option value="6ft 11in">6ft 11in</option>
                                <option value="7ft">7ft</option>
                                <option value="Above 7ft">Above 7ft</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Weight</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="weight" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Religion</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <select class="custom-select form-control" id="religian">
                                <option selected>Choose...</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Christian">Christian</option>
                                <option value="Muslim">Muslim</option>
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
                            <input class="form-control" id="location" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">About Me</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <textarea class="form-control" id="aboutme" placeholder="" rows="3" type="text"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Mobile No</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input type="mobile" class="form-control" id="phone_no" maxlength="10" placeholder="Parent Number">
                        </div>
                    </div>
                    <h4>Login Detail:</h4>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">User Name</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="user_name" placeholder="" type="text"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Password</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <input class="form-control" id="password" placeholder="" type="password"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 col-form-label">Profile Picture</label>
                        <span class="col-sm-1"> : </span>
                        <div class="col-sm-7">
                            <div id="upload_container">
                                <input type="file" class="form-control" id="profile_picture" onchange="attachFile('profile_picture');">
                            </div>
                            <div class="image-preview hidden" id="preview_container">
                                <button type="button" onclick="closeProfilePic();" class="close-button-profile-img"><i class="fa fa-close"></i></button>
                                <img src="" alt="image" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mb-2">SUBMIT</button>
                </form>
                <p>Already Have a Account! <a href='#' data-toggle="modal" data-target="#myModal1">Sign in</a></p>
            </div>
            <div class="modal-footer">
                <!--         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
            </div>
        </div>

    </div>
</div>