<h2>Výrobci Motorových pil</h2>
<?php
var_dump($_POST);
 if (isset($_GET["id"]) && is_numeric($_GET["id"])) {
    $id = (int) $_GET["id"];
    $query = $conn->prepare("SELECT * FROM vyrobci WHERE id=?");
    $query->bindParam(1, $id, PDO::PARAM_INT);
    $query->execute();
    $vyrobce = $query->fetch();
    if ($vyrobce) {
        echo "Upravuješ výrobce -" . $vyrobce["jmeno_vyrobce"] . "<br>";
    } else {
        die("Tento výrobce neexistuje");
    }
} else {
    $id = NULL;
} 
if (isset($_POST["jmeno_vyrobce"])) {
    if (strlen($_POST["jmeno_vyrobce"] > 3)) {
        echo 'jméno výrobce musi byt delsi nez tri znaky';
    } else {
        $jmenovyrobce = filter_var($_POST["jmeno_vyrobce"], FILTER_SANITIZE_STRING);
        if ($id == NULL){
        $query = $conn->prepare("INSERT INTO vyrobci VALUES(NULL, ?)");
        $query->bindParam(1, $jmenovyrobce, PDO::PARAM_STR);
        }
        else{
            $query = $conn->prepare("UPDATE vyrobci SET VALUES " . " jmeno_vyrobce = ? WHERE id = ?");
            $query -> bindParam(1, $jmenovyrobce, PDO::PARAM_STR);
            $query -> bindParam(2, $id , PDO::PARAM_INT );
        }
        if ($query->execute()) {
            echo "Pridano";
        } else {
            echo 'nepridano';
        }
    }
}

?>
<form method="post">
    <label for="nazev">
        Jméno výrobce
    </label>
    <input type="text" name="jmeno_vyrobce" id="jmeno_vyrobce" 
           value="<?php if ($id != NULL) {
           echo $vyrobce["jmeno_vyrobce"]; }?>"
           placeholder="Jméno výrobce">
    <br>
    <button type="submit"><strong>Odeslat</strong></button>
</form>




