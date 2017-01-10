<!DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>test</title>
        <link href="styles/main.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id="content">
            <div id="form_input">
                <form method="post" >
                        <table id ="table" >
                            <tr>
                                <td>Name:</td>
                                <td> <input type="text" name="user_name"  /></td>
                            </tr>
                            <tr>
                                <td>E-mail:</td>
                                <td> <input type="text" name="user_email"></td>

                            </tr>
                            <tr>
                                <td>Country</td>
                                <td> 
                                <?php
                                require_once 'model.php';
                                $model =  model::getDB();
                                if($_GET["func"] == "del"){
                       $model->deleteUser($_GET["id"]);
                       
                   }
                                echo "<select name='user_country_id'>";
                                
                                $counties = $model->selectCountries();
                                
                                foreach ($counties as $country) {    
                                    echo  "<option value=".$country["id"].">". 
                                               $country["country_name"].
                                "</option>";
                                    
                                }
                                ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                
                                <input type="submit" />
                                </td>
                            </tr>
                    </table>
                </form> 
                <?php
                    require_once 'check_class.php';
                    $check = new Check();
                    
                    $error=""; 
                    if(!$check->name( $_POST["user_name"])) $error.="Error name</br>";
                    if (!$check->email($_POST["user_email"])) $error.="Error emal</br>";
                    if (!$check->id($_POST["user_country_id"])) $error.="Error country</br>";
                    
                        
                
               
                 if($error=="") $model->addUser($_POST["user_name"],$_POST["user_email"],$_POST["user_country_id"]);
                 else
                     echo "<p>".$error."</p>";
                ?>
               <a href="http://mvc.com/index.php?func=edit">Add user</a>
                <table id="table">
                    <tr>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Country</td>
                        <td colspan="2">Functions</td>
                    </tr>
                    <?php
                    $users = $model->selectUsers();
                    foreach ($users as $user) {
                        echo "<tr>"
                         ."<td>".$user["user_name"]."</td>"
                            ."<td>".$user["user_email"]."</td>"
                            ."<td>".$user["country_name"]."</td>"
                            ."<td> <a href = 'http://mvc.com/index.php?func=edit&id=".$user['id']."'>Edit</a></td>"
                            ."<td> <a href = 'http://mvc.com/index.php?func=del&id=".$user['id']."'>Delete</a></td>" 
                         ."</tr>";
                    }
                   
                    ?>

                </table>
            </div>
        </div>
    </body>
</html>