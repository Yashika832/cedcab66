<?php
session_start();
 include 'class/tbl_location.php';
 include 'class/tbl_ride.php';
 include_once 'class/tbl_user.php';




if (isset($_POST['action'])) {

    $selectuser=new tbl_user();
    $selectloc=new tbl_location();

    $action = $_POST['action'];
    

    switch ($action) {

        case 'emailcheck': {
            $email_id = $_POST['cedemail'];
            $_SESSION["email"] = $email_id;
            $selectdata = $selectuser->ced_emailCheck($email_id);
            echo $selectdata;
            }
            
            break;
            
            case 'emailcheckotp': {
            $cedemailotp = $_POST['cedemailotp'];
            $selectdata = $selectuser->ced_emailCheckotp($cedemailotp);
            echo $selectdata;
            }break;
        case 'insert':
            { $name =$_POST['cedname'];
                $password = $_POST['cedpassword'];
                
                $mobile = $_POST['cedmobile'];
                $email_id = $_SESSION["email"];
                $is_admin=0;
                $insertdata = $selectuser->ced_registerUser($email_id, $name, $mobile,  $password,$is_admin);
                
                echo $insertdata;
                
                }

            break;
            case 'getDropdown': {

                $selectlocdata = $selectloc->ced_getDropdown();
                echo json_encode($selectlocdata);
                }
                
                break;
                case 'logincheck': {

                    $email_id = $_POST['cedemail'];
                    $password = $_POST['cedpassword'];
                    
                    $selectdata = $selectuser->ced_loginUser($email_id, $password);
                    
                    echo $selectdata;
                    }
                    break;
                    case 'logincheck': {

                        $email_id = $_POST['cedemail'];
                        $password = $_POST['cedpassword'];
                        
                        $selectdata = $selectuser->ced_loginUser($email_id, $password);
                        
                        echo $selectdata;
                        }
                        break;
case 'calculate': {

    $pickupLocation=$_POST['pickupLocation'];
    $dropLocation=$_POST['dropLocation'];
    $cabtype=$_POST['cabtype'];
    $luggage=$_POST['luggage'];
    
    $calculatedFare= $selectloc -> calculateFare($pickupLocation,$dropLocation,$cabtype,$luggage);
    echo json_encode($calculatedFare);
   
    }
    break;
        default:
            echo "Something Went Wrong";
    }
} else {
    die("<h1>You cann't  access  </h1>");
}