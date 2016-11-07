<?php
include_once './config/config.php';
function __autoload($class){
    $filename="library/{$class}.php";
    if(file_exists($filename)){
        include_once $filename;
    }
}
$action=  filter_input(INPUT_GET, 'action');
$action_obj=new Action($template, $db);
if(!$action){
    $action='shownews';
}
if(!method_exists($action_obj, $action)){
    $action='shownews';
}
$action_obj->$action();

//switch ($action) {
//    case 'createform':
//        $action_obj->createform();
//        break;
//    case 'create':
//        $action_obj->create();
//        break;
//    case 'editform':
//        $action_obj->editform();
//        break;
//    case 'save':
//        $action_obj->save();
//        break;
//    case 'delete':
//        $action_obj->delete();
//        break;    
//    default:
//        $action_obj->showsongs();
//        break;
//}