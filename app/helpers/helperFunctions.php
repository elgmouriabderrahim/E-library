<?php
class Helper {
        public static function filterData($data) {
                return htmlspecialchars(trim(stripslashes($data)));
        }
        public static function validateRegesterInputs($firstname, $lastname, $email, $password, $cpassword){
                $name_regex = "/^[a-zA-Z\s]{3,}$/";
                $password_regex = '/^[^<>\/\?\!"]{6,}$/';
                $errors = [];
                    if(empty($firstname))
                        $errors['firstname'] = "firstname required";
                    else if(!preg_match($name_regex, $firstname))
                        $errors['firstname'] = "invalid name";
                    
                    if(empty($lastname))
                        $errors['lastname'] = "lastname required";
                    else if(!preg_match($name_regex, $lastname))
                        $errors['lastname'] = "invalid name";
                    
                    if(empty($email))
                        $errors['email'] = "email required";
                    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
                        $errors['email'] = "invalid email";
                    
                    if(empty($password))
                        $errors['password'] = "password required";
                    else if(!preg_match($password_regex, $password))
                        $errors['password'] = 'password must be at least 6 characters and must not contain < > / ? ! "';
                    
                    if(!empty($password) && empty($cpassword))
                        $errors['cpassword'] = "confirm your password";
                    if(!empty($cpassword) && $password !== $cpassword)
                        $errors['cpassword'] = "passwords do not match";
                return $errors;
        }
        public static function validateLoginInputs($email, $password){
                $errors = [];
                if(empty($email))
                        $errors['email'] = "email required";
                if(empty($password))
                        $errors['password'] = "password required";
                return $errors;
        }
}