<?php

function getListItems($POST){

    $status = $POST['status'] ?? '';
    $date = $POST['date'] ?? '';
    $var = "SELECT list_item.* FROM list_item, todo_list WHERE list_item.list_id = todo_list.id";

    $conn = MakeSQLConnection();
    if ($status == '') {
        $sql = $var;

    } elseif ($status == 0 || 1 ) {
        $sql = $var . " AND status=:status";
    }
    if($date == 'DESC'){
        $sql = $var . " ORDER BY date_time DESC";
    }elseif($date == 'ASC'){
        $sql = $var . " ORDER BY date_time ASC";
    }

    $query = $conn->prepare($sql);
    $query->bindParam(':status', $status);
    $query->execute();
    return $query->fetchAll();
}

function getListItem($id)
{
    $conn = MakeSQLConnection();

    $query = "SELECT list_item.* FROM list_item WHERE id='$id'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $planning= $stmt-> fetch();
    $conn = null;
    return $planning;
}

function getAllList () {
    $conn = MakeSQLConnection();

    $query = "SELECT * FROM todo_list";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $planning= $stmt-> fetchAll();
    $conn = null;
    return $planning;
}

function createList($name)
{
    $conn = MakeSQLConnection();

    $stmt = $conn->prepare("INSERT INTO todo_list (name) VALUES (:name)");
    $stmt->execute([':name' => $name]);
    $conn = null;

    header("Location: ../index.php");
}

function createListItem($content, $date_time, $list_id){
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare("INSERT INTO list_item (content, status, date_time, list_id) VALUES (:content, :status, :date_time, :list_id)");
    $stmt->execute([':content' => $content, ':status' => 0, ':date_time' => $date_time, ':list_id' => $list_id]);
    $conn = null;

    header("Location: ../index.php");
}

function updateList($name, $id)
{
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare("UPDATE todo_list SET name='$name' WHERE id='$id'");
    $stmt->execute();
    $conn = null;

    header("Location: ../index.php");
}

function updateListitem($content, $dateTime, $id)
{
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare("UPDATE list_item SET content='$content', date_time='$dateTime' WHERE id='$id'");
    $stmt->execute();
    $conn = null;
    header("Location: ../index.php");
}

function deleteList($id)
{
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare(" DELETE FROM todo_list WHERE id='$id'");
    $stmt->execute();
    $conn = null;

    deleteListItems($id);

    header("Location: ../index.php");
}

function deleteListItems($id){
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare(" DELETE FROM list_item WHERE list_id='$id'");
    $stmt->execute();
    $conn = null;

}

function deleteListItem($id){
    $conn = MakeSQLConnection();
    $stmt = $conn->prepare(" DELETE FROM list_item WHERE id='$id'");
    $stmt->execute();
    $conn = null;
}

function getStatus($id)
{
    $conn = MakeSQLConnection();

    $query = "SELECT status FROM list_item WHERE id='$id'";

    $stmt = $conn->prepare($query);
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC);

    $status = $stmt-> fetch();
    $conn = null;

    return $status;
}

function changeStatus($id)
{
    $status = getStatus($id);
    $conn = MakeSQLConnection();

    if ($status['status'] === '0'){
        $stmt = $conn->prepare("UPDATE list_item SET status=1 WHERE id='$id'");
        $stmt->execute();
        $conn = null;
    }
    else if ($status['status'] === '1'){
        $stmt = $conn->prepare("UPDATE list_item SET status=0 WHERE id='$id'");
        $stmt->execute();
        $conn = null;
    }
}