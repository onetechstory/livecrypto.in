<?php
    header("Access-Control-Allow-Origin: *");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_FILES['front']) && isset($_FILES['rear'])) {
            $errors = [];
            $uploaded_files = array();
            $path = 'uploads/';
            
            // Front
            $file_tmp_front = $_FILES['front']['tmp_name'];
            $file_size_front = $_FILES['front']['size'][0];
            $ext_front = end(explode('.', $_FILES['front']['name'][0]));
            $file_name_front = 'front_'. round(microtime(true)) . '.' . $ext_front;
            $file_front = $path . $file_name_front;

            if ($file_size_front > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name_front;
            }

            if (empty($errors)) {
                if(move_uploaded_file(end($file_tmp_front), $file_front)) {
                    array_push($uploaded_files, 'https://livecrypto.in/'.$file_front);
                } else {
                    $errors[] = 'Front Files Not uploaded';
                }
            }

            // Rear
            $file_tmp_rear = $_FILES['rear']['tmp_name'];
            $file_size_rear = $_FILES['rear']['size'][0];
            $ext_rear = end(explode('.', $_FILES['rear']['name'][0]));
            $file_name_rear = 'rear_'. round(microtime(true)) . '.' . $ext_rear;
            $file_rear = $path . $file_name_rear;

            if ($file_size_rear > 2097152) {
                $errors[] = 'File size exceeds limit: ' . $file_name_rear . ' ' . $file_type_rear;
            }

            if (empty($errors)) {
                if(move_uploaded_file(end($file_tmp_rear), $file_rear)) {
                    array_push($uploaded_files, 'https://livecrypto.in/'.$file_rear);
                } else {
                    $errors[] = 'Rear Files Not uploaded';
                }
            }
            
            if(count($uploaded_files) == 2) {
              echo json_encode($uploaded_files);
            }
            if ($errors) print_r($errors);
        } else {
            echo "Missing Files";
        }
    }

?>