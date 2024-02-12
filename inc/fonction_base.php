   <?php
    include_once 'connection.php';

    function request_all($query)
    {
        $pdo = connectbd();
        try {
            $stmt = $pdo->query($query);
            $retour = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }
        return $retour;
    }
    function request_singleResult($query)
    {
        $pdo = connectbd();
        try {
            $stmt = $pdo->query($query);
            $retour = $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }
        return $retour;
    }
    /*function update($query,$dataTable)
    {
        $pdo = connectbd();
        echo $query;
        $pdo->exec($query);
        $pdo = null;
    }*/

    function delete($nameTable, $condition)
    {
        $pdo = connectbd();
        try {
            $stmt = $pdo->prepare("DELETE FROM $nameTable WHERE $condition");
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $pdo = null;
        }
    }

    function select_all($table_name)
    {
        $pdo = connectbd();
        $result = array();
        try {
            $stmt = $pdo->prepare("SELECT * FROM $table_name");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }
        return $result;
    }

    function select_by($table_name, $condition)
    {
        $pdo = connectbd();
        $result = array();
        try {
            $stmt = $pdo->prepare("SELECT * FROM $table_name WHERE $condition");
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }
        return $result;
    }

    /*
    $data[nomde_Colonne] = valeur;
    Exemple:
        $dataToInsert = array(
            'username' => 'john_doe',
            'email' => 'john@example.com',
            'password' => password_hash('password123', PASSWORD_DEFAULT)
        );

        insert('users', $dataToInsert);
*/
    function insert($table_name, $data)
    {   
        $pdo = connectbd();
        try {
            $columns = implode(", ", array_keys($data));
            $values = ":" . implode(", :", array_keys($data));

            $stmt = $pdo->prepare("INSERT INTO $table_name ($columns) VALUES ($values)");

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }

            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $pdo = null;
        }
        return 1;
    }
    // update table
    function update($table_name, $data, $condition)
    {
        $pdo = connectbd();
        try {
            $setClause = "";
            foreach ($data as $key => $value) {
                $setClause .= "$key = :$key, ";
            }
            $setClause = rtrim($setClause, ', '); // Supprime la virgule finale

            $stmt = $pdo->prepare("UPDATE $table_name SET $setClause WHERE $condition");

            foreach ($data as $key => $value) {
                $stmt->bindValue(":$key", $value);
            }
            $stmt->execute();
        } catch (PDOException $e) {
            return $e->getMessage();
        } finally {
            $pdo = null;
        }
        return 1;
    }

    // fonction Recherche dans une table
    function search($pdo, $table_name, $column, $value)
    {
        $pdo = connectbd();
        try {
            $stmt = $pdo->prepare("SELECT * FROM $table_name WHERE $column LIKE :search_value");

            $search_value = '%' . $value . '%';
            $stmt->bindParam(':search_value', $search_value, PDO::PARAM_STR);

            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $pdo = null;
        }
    }
