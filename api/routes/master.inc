<?php

session_start();
$app->post('/update_record/:table/:where', function($table, $where) use ($app) {
    $res = array('error' => true, 'message' => 'Unable to update');
    $data = $app->request->post();
    $com = new Common();
    $record = $com->updateRecordWithWhere($data, $table, $where);
    if ($record > 0) {
        $res['error'] = false;
        $res['message'] = 'Record updated successfully';
    }
    echoRespnse(201, $res);
});

$app->get('/delete_record/:table/:where', function($table, $where) {
    $res = array('error' => true, 'message' => 'Unable to delete');
    $com = new Common();
    $data = $com->deleteRecordWithWhere($table, $where);
    if ($data > 0) {
        $res['error'] = false;
        $res['message'] = 'Record deleted successfully';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/upload_file', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to upload image');
    $obj = new Common();
    $data = '';
    if (isset($_FILES) && isset($_FILES['file'])) {
        $data = $obj->saveFile($_FILES['file'], 'uploads');
    }
    if ($data != '') {
        $res['error'] = false;
        $res['message'] = 'Image uploaded successfully';
        $res['data'] = $data;
        $res['extension'] = $obj->getExtension($data);
    }
    echoRespnse(201, $res);
});

$app->post('/upload_fileimage', function() use ($app) {

    $image = $_POST['image'];
    $name = $_POST['name'];

    $realImage = base64_decode($image);
    echo getcwd() . "\n";

    file_put_contents('uploads/'.$name, $realImage);



    echo "Image Uploaded Successfully.";
});
$app->post('/add_user/:id', function($id) use ($app) {
    $data = $app->request->post();
    $res = array('error' => true);
    $com = new Common();
    date_default_timezone_set('Asia/Singapore');
    if ($id > 0) {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $record = $com->updateRecordWithWhere($data, 'users', 'user_id = ' . $id);
        if ($record > 0) {
            $res['message'] = 'User updated successfully';
            $res['false'] = false;
        } else {
            $res['message'] = 'No updates found';
        }
    } else {
        $nri_exist = $com->selectRow('*', 'users', 'phone_no=\'' . $data['phone_no'] . '\'');
        if (count($nri_exist) == 0) {
            $data['created_at'] = date('Y-m-d H:i:s');
            $data['updated_at'] = date('Y-m-d H:i:s');
            $record = $com->insertRecord($data, 'users');
            if ($record > 0) {
                $res['message'] = 'User added successfully';
                $res['error'] = false;
            } else {
                $res['message'] = 'Unable to add user';
            }
        } else {
            $res['message'] = 'User already exist';
            $res['error'] = false;
        }
    }
    echoRespnse(201, $res);
});

$app->get('/get_users', function() {
    $res = array('error' => true, 'message' => 'No records found');
    $com = new Common();
    $data = $com->selectAll('*', 'users', 'user_id > 0');
    if (count($data) > 0) {
        $res['error'] = false;
        $res['message'] = 'Records found';
        $res['data'] = $data;
    }
    echoRespnse(201, $res);
});

$app->post('/insert_user', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to insert');
    $data = $app->request->post();
    $com = new Common();
    $exist = $com->selectRow('*', 'users', 'phone_no=\'' . $data['phone_no'] . '\'');
    if (count($exist) == 0) {
        if (!isset($data['profile_picture'])) {
            $data['image_path'] = '';
        }
        $record = $com->insertRecord(array('name' => $data['name'], 'phone_no' => $data['phone_no'], 'image_path' => $data['profile_picture'], 'gender' => $data['gender'], 'age' => $data['age'], 'date_of_birth' => $data['date_of_birth'], 'education' => $data['education'], 'occupation' => $data['occupation'], 'marital_status' => $data['marital_status'], 'income' => $data['income'], 'height' => $data['height'], 'weight' => $data['weight'], 'religian' => $data['religian'], 'caste' => $data['caste'], 'location' => $data['location'], 'aboutme' => $data['aboutme'], 'user_name' => $data['user_name'], 'password' => $data['password']), 'users');
        if ($record > 0) {
            $_SESSION['user_id']=$record;
            $res['error'] = false;
            $res['message'] = 'Record inserted successfully';
        }
    } else {
        $res['error'] = true;
        $res['message'] = 'User already exist';
    }
    echoRespnse(201, $res);
});

$app->post('/login_user', function() use ($app) {
    $res = array('error' => true, 'message' => 'Invalid login details');
    $data = $app->request->post();
    date_default_timezone_set('Asia/Kolkata');
    $obj = new Common();
    $record = $obj->selectRow('*', 'users', 'user_name=\'' . $data['user_name'] . '\'');
    if (count($record) > 0) {
        if ($data['password'] == $record['password']) {
            $_SESSION['user_id']=$record['user_id'];
            $res['error'] = false;
        } else {
            $res['message'] = 'Username or Password mismatch';
        }
    }
    echoRespnse(201, $res);
});

$app->post('/logout_user', function() use ($app) {
    $res = array('error' => false, 'message' => 'No user found in this User Name');
    session_destroy();
    echoRespnse(201, $res);
});

$app->post('/reset_password', function() use ($app) {
    $data = $app->request->post();
    $obj = new Common();
    $res = array('error' => true, 'message' => 'Unable to update your password');
    $user = $obj->selectRow('*', 'users', 'user_id=\'' . $data['member'] . '\'');
    if (count($user) > 0) {
        $update = $obj->updateRecordWithWhere(array('password' => $data['password']), 'users', 'user_id=\'' . $data['member'] . '\'');
        if ($update > 0) {
            $res['error'] = false;
            $res['message'] = 'Password updated successfully';
        }
    } else {
        $res['message'] = 'User Name Incorrect';
    }
    echoRespnse(201, $res);
});

$app->post('/upload_member_picfile:id:mid', function() use ($app) {
    $res = array('error' => true, 'message' => 'Unable to upload image');
    $obj = new Common();
    $data = '';
    if (isset($_FILES) && isset($_FILES['file'])) {
        $data = $obj->saveFile($_FILES['file'], 'uploads');
        //echo $data;
    }
    if ($data != '') {
        $res['error'] = false;
        $res['message'] = 'Image uploaded successfully';
        $res['data'] = $data;

        $data1 = $app->request->post();
        $user_id = $data1['mid'];
        $obj->updateRecordWithWhere(array('profile_image' => $data), 'users', 'user_id=' . $user_id);

        $res['extension'] = $obj->getExtension($data);
    }
    echoRespnse(201, $res);
});
