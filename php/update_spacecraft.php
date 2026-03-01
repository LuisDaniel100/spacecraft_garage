<?php
session_start();
require "config.php";

if(!isset($_SESSION['user_id'])){
    header("Location: ../index.php");
    exit;
}

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $nationality = $_POST['nationality'];
    $build_year = $_POST['build_year'];
    $status = $_POST['status'] ?? '';

    $stmt = $conn->prepare("UPDATE spacecrafts SET name = ?, nationality = ?, build_year = ?, status = ? WHERE id = ? AND user_id = ?");
    $stmt->bind_param("ssisii", $name, $nationality, $build_year, $status, $id, $_SESSION['user_id']);
    $stmt->execute();

    header("Location: ../dashboard.php");
    exit;
}