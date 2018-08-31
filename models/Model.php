<?php
/**
 *
 */
class Model
{
    //@TODO remove the properties and put them inside a non commitable config file
    protected $dbConnec;
    protected $tableName;

    function __construct()
    {
        $this->dbConnec = new PDO('mysql:host=localhost;dbname=' . DB_NAME, USER, PASS);
    }

    public function getAll()
    {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->tableName);
        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function getOne($identifierKey, $identifierValue)
    {
        $request = $this->dbConnec->prepare('SELECT * FROM ' . $this->tableName . ' WHERE ' . $identifierKey .  ' = "' . $identifierValue . '" LIMIT 1');
        $request->execute();
        $results = $request->fetchAll(PDO::FETCH_OBJ);
        return $results[0];
    }

    public function deleteOne($id)
    {
        $request = $this->dbConnec->prepare('DELETE FROM ' . $this->tableName . ' WHERE id="' . $id . '"');
        $request->execute();
        return true;
    }

    public function updateOne($title, $content, $hidden, $id)
    {
        $request = $this->dbConnec->prepare('UPDATE ' . $this->tableName . ' SET title = "' . $title . '", content = "' . $content . '", hidden = "' . $hidden . '"  WHERE id = "' . $id . '"');
 
        $request->execute();
        return true;
    }
}
