<?php
    include "../Database/db_connect.php";

    if(isset($_POST['crAcc'])){
        // USED BY (User_Inteface/register)-----------------------------------------------------------------------------------------------
        try{

            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $uname = $_POST['uName'];

            $check_emp = "SELECT cFname, cLname FROM customers WHERE cFname ='$fname' AND cLname='$lname' ";
            $check_do = $conn->query($check_emp);
            
            if($check_do->num_rows > 0){
                echo "<script>
                    alert('Name is Already in Use');
                    window.location.href= 'register_page.php';
                </script>";
                exit();
            }

            $check_emp_usr = "SELECT c_username FROM customers WHERE c_username ='$uname' ";
            $check_do_usr = $conn->query($check_emp_usr);
            
            if($check_do_usr->num_rows > 0){
                echo "<script>
                    alert('Username is Already in Use');
                    window.location.href = 'register_page.php';
                </script>";
                exit();
            }

            $sql = "INSERT INTO customers(cFname, cLname, `address`, cContactNum, c_username, c_password) VALUES(?,?,?,?,?,?) ";
            $do = $conn->prepare($sql);
            $do->bind_param("ssssss", $_POST['fname'], $_POST['lname'], $_POST['caddress'], $_POST['cConNum'], $_POST['uName'], $_POST['pw'] );

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
                alert('Account Created Successfully');
                window.location.href='../Logins/User.php';
            </script>";

        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();

    }

    if(isset($_POST['loginBTN'])){
        // USED BY (Logins/User.php)-----------------------------------------------------------------------------------------------

        try{
            $un = $_POST['usrname'];
            $pass = $_POST['passwrd'];
    
            $sql = "SELECT * FROM customers WHERE c_username='$un' AND c_password='$pass'";
            $do = $conn->query($sql);
    
            if($do->num_rows>0){
                
                session_start();
                $row=$do->fetch_assoc(); 
                $_SESSION['login_ID'] = $row['customer_ID'];
    
                echo "<script>alert('Login Successful');
                        window.location.href='order_interface.php';
                    </script>";
                
            }else{
                echo "<script>alert('Login Failed');
                        window.location.href='../Logins/User.php';
                    </script>";
                $conn->close();
            }
    
        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }

    if(isset($_POST['signoutBTN'])){
        // USED BY (EVERY SIGN OUT)
        session_start();

        session_unset();
        session_destroy();
        
        echo "<script>alert('Logged Out');
                window.location.href='../Logins/User.php';
            </script>";
    }

    if(isset($_POST['loginAdminBTN'])){
        // USED BY (Logins/Admin.php)-----------------------------------------------------------------------------------------------

        try{
            $un = $_POST['usrname'];
            $pass = $_POST['passwrd'];
    
            $sql = "SELECT * FROM employees WHERE e_username='$un' AND e_password='$pass'";
            $do = $conn->query($sql);
    
            if($do->num_rows>0){
                
                session_start();
                $row=$do->fetch_assoc(); 
                $_SESSION['emp_login_ID'] = $row['employee_ID'];
    
                echo "<script>alert('Login Successful');
                        window.location.href='../Admin_Interface/Dashboard_Interface.php';
                    </script>";
                
            }else{
                echo "<script>alert('Login Failed');
                        window.location.href='../Logins/Admin.php';
                    </script>";
                $conn->close();
            }
    
        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }

    if(isset($_POST['cSaveBTN'])){

        $id = $_POST['cID'];
        $fname = $_POST['cFname'];
        $lname = $_POST['cLname'];
        $addr = $_POST['addr'];
        $cont = $_POST['ccont'];
        $un = $_POST['usrname'];
        $pw = $_POST['passwrd'];

        try{
            $sql = "UPDATE customers SET cFname=?, cLname=?, `address`=?, cContactNum=?, c_username=?, c_password=? WHERE customer_ID='$id' ";
            $do = $conn->prepare($sql);
            $do->bind_param("ssssss", $fname, $lname, $addr, $cont, $un, $pw);

            $do->execute();
            $do->close();
            $conn->close();

            echo "<script>
                alert('Account Update Successfully');
                window.location.href='user_account.php';
            </script>";
        }catch(\Exception $e){
            die($e);
        }
        exit();

    }

    if(isset($_POST['cDelBTN'])){

        $id = $_POST['cID'];

        try{
            $sql = "DELETE FROM customers WHERE customer_ID='$id' ";
            $do = $conn->query($sql);

            $conn->close();

            session_start();
            session_unset();
            session_destroy();
            
            echo "<script>alert('Deleted Account | Logged Out');
                    window.location.href='../Logins/User.php';
                </script>";
        }catch(\Exception $e){
            $conn->close();
            die($e);
        }
        exit();
    }




?>