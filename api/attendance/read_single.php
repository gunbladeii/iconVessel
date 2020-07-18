<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');
  header('Content-Type: application/json');

  include_once '../../config/Database.php';
  include_once '../../models/Attendance.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate blog post object
  $post = new Attendance($db);

  // Get ID
  $post->code = isset($_GET['date']) ? $_GET['date'] : die();

  // Get post
  $post->read_single();

  // Create array
  $post_arr = array(
    'id' => $post->id,
    'name' => $post->name,
    'staffID' => $post->staffID,
    'username' => $post->username,
    'date' => $post->date,
    'released' => $post->released
  );

  // Make JSON
  print_r(json_encode($post_arr));