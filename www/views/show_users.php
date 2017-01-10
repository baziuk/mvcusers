
<a href="http://mvc.com/functions.php?func=new">Add new user</a>
<table id="table_su">
                    <tr>
                        <td>Name</td>
                        <td>E-mail</td>
                        <td>Country</td>
                        <td colspan="2">Functions</td>
                    </tr>
                    <?php

                    foreach ($this->data as $user) {
                        echo "<tr>"
                         ."<td>".$user["user_name"]."</td>"
                            ."<td>".$user["user_email"]."</td>"
                            ."<td>".$user["country_name"]."</td>"
                            ."<td> <a href = 'http://mvc.com/functions.php?func=edit&id=".$user['id']."'>Edit</a></td>"
                            ."<td> <a href = 'http://mvc.com/functions.php?func=del&id=".$user['id']."'>Delete</a></td>" 
                         ."</tr>";
                    }
                  
                    ?>
