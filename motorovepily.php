<h2>Motorové pily</h2>
<?php

if(isset($_POST["submit"])){
    if(isset($_POST["id_vyrobce"])){
        $id_vyrobce = filter_var($_POST["id_vyrobce"], FILTER_SANITIZE_NUMBER_INT);
        if(isset($_POST["nazev"])){
            $nazev = filter_var($_POST["nazev"], FILTER_SANITIZE_STRING);
                if(isset($_POST["hmotnost"])){
                    $hmotnost = filter_var($_POST["hmotnost"], FILTER_SANITIZE_STRING);
                    if(isset($_POST["vykon"])){
                        $vykon = filter_var($_POST["vykon"], FILTER_SANITIZE_STRING);
                        $query = $conn ->prepare("INSERT INTO motorove_pily VALUES(NULL, ?, ?, ?, ?)");
                        $query ->bindParam(1, $id_vyrobce, PDO::PARAM_INT);
                        $query ->bindParam(2, $nazev, PDO::PARAM_STR);
                        $query ->bindParam(3, $hmotnost, PDO::PARAM_STR);
                        $query ->bindParam(4, $vykon, PDO::PARAM_STR);
                   
                        if($query->execute()){
                            echo "pila pridana";
                        }else{
                            echo 'pila nepridana';
                        }
                                                }  else {
            echo 'Nebyl zadan vyrobce';
        }
        
                }
        
            }
        }
    
    }
    $query = $conn->prepare("select * from vyrobci");
    $query->execute();

?>
<form method="POST">
    <label for="vyrobci">Vyrobce</label>
    <select name="vyrobci" id="vyrobci">
        <?php foreach($query->fetchAll() as $row){?>
        <option value='<?php echo $row["id"]; ?>'>
            <?php echo $row["jmeno_vyrobce"]; ?>
               
        </option>
        <?php } ?>
    </select>
    <br>
    <label for="motorovepily">
        Pila
    </label>
    <input type="text" name="nazev" required="required" placeholder="nazev" id="nazev">
    <br>
    <label for="motorovepily">
        Hmotnost
    </label>
 
    <input type="text" name="hmotnost" required="required" placeholder="Hmotnost" id="hmotnost">
    <br>
    <label for="motorovepily">
        Vykon
    </label>
    
    <input type="text" name="vykon"  required="required" placeholder="Vykon" id="vykon">
    <br>
    <button type="submit">Odeslat</button>
</form>