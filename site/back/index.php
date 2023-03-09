<?php
session_start();
if(!isset($_SESSION["email"])) {
    header("location: view/connexion_admin.php");
}
require_once('view/bar_nav.php');
require_once('model/model.php');
// require_once('controllers/ajout_category.php');
// require_once('templates/layout.php');

// $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

dbConnect();
?>
<body>
    <?php
        // if(isset($_GET['page']) && $_GET['page'] !=NULL) {
        //     $page = strval($_GET['page']);

        //     if($page == 1){
        //         include_once('controllers/insert_category.php');
        //     }
        //     elseif($page == 2){
        //         include_once("templates/gestion_category.php");
        //     }
        //     elseif($page == 3){
        //         include_once("templates/sup_category.php");
        //     }
        //     elseif($page == 4){
        //         include_once("templates/ajout_subcategory.php");
        //     }
        //     elseif($page == 5){
        //         include_once("templates/gestion_subcategory.php");
        //     }
        //     elseif($page == 6){
        //         include_once("");
        //     }
        //     elseif($page == 7){
        //         include_once("templates/ajoutProduct.php");
        //     }
        //     elseif($page == 8){
        //         include_once("");
        //     }
        //     elseif($page == 9){
        //         include_once("");
        //     }
        //     elseif($page == 10){
        //         include_once("templates/ajout_photos.php");
        //     }
        //     elseif($page == 11){
        //         include_once("");
        //     }
        //     elseif($page == 12){
        //         include_once("");
        //     }
        //     elseif($page == 13){
        //         include_once("");
        //     }
        //     elseif($page == 14){
        //         include_once("ajout_admin/ajout_admin.php");
        //     }
        //     else {
        //         include_once("index.php");
        //     }
        // }
        // else {
        //     include_once("index.php");
        // }
    ?>
<?php
    
    spl_autoload_register(function($class){
        if(file_exists('Framework' . $class . '.php')) {
            require_once('Framework/' . $class . '.php');
        }
        if(file_exists('controller' . $class . '.php')) {
            require_once('controller/' . $class . '.php');
        }
        if(file_exists('model' . $class . '.php')) {
            require_once('model/ ' . $class . '.php');
        }
    });

    $configFile = file_get_contents("Config/config.json");
    $config = json_decode($configFile);

    spl_autoload_register(function($class) use($config) {
        foreach($config->autoloadFolder as $folder) {
            if(file_exists($folder . '/' . $class . '.php')) {
                require_once($folder . '/' .$class . '.php');
                break;
            }
        }
    });


    try {
        $httpRequest = new HttpRequest();
        $router = new Router();
        $httpRequest->setRoute($router->findRoute($httpRequest));
        $httpRequest->run($config);
    }
    catch(exception $e) {
        $httpRequest = new HttpRequest("/Error","GET");
        $router = new Router();
        $httpRequest->setRoute($router->findRoute($httpRequest,$config->basepath));
        $httpRequest->addParam($e);
        $httpRequest->run($config);
    }