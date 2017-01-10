
<div id = "title">
    <?php
        if($this->data["func"]=="add")
            echo "<h4>Add user</h4>";
            elseif ($this->data["func"]=="update") 
                echo "<h4>Edit user</h4>";
    ?>
</div>
<form method="post" action="http://mvc.com/functions.php" >
    
    <table id ="table" >
        <tr>
            <td>Name:</td>
            <td> <input type="text" name="user_name" value= "<?php echo $this->data["user"]["user_name"] ?>"  /></td>
        </tr>
        <tr>
            <td>E-mail:</td>
            <td> <input type="text" name="user_email" value= "<?php echo $this->data["user"]["user_email"] ?>"></td>

        </tr>
        <tr>
            <td>Country</td>
            <td> 
                <?php
                echo "<select name='user_country_id'>";
                foreach ($this->data["country"] as $country) {
                    echo "<option value=" . $country["id"] ;
                    if ($this->data["user"]["user_country_id"] == $country['id'])
                        echo " selected='selected'";
                    echo  ">".$country["country_name"] .
                    "</option>";
                }
                echo "</select>"
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="hidden" name="func" value="<?php echo $this->data["func"];?>" />
                <input type="hidden" name="id" value="<?php echo $this->data["user"]["id"];?>">
                <input type="submit" />
            </td>
        </tr>
        
    </table>
</form>



