<?php

// Define root dir and root path
define( 'DX_DS', DIRECTORY_SEPARATOR );
define( 'DX_ROOT_DIR', dirname( __FILE__ ) . DX_DS );
define( 'DX_ROOT_PATH', basename( dirname( __FILE__ ) ) . DX_DS );
define( 'DX_ROOT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/' );


// Define the request home that will always persist in REQUEST_URI
$request_home = DX_DS . DX_ROOT_PATH;

// Read the request
$request = $_SERVER['REQUEST_URI'];
$components = array();
$controller = 'Master';
$method = 'index';
$param = array();

include_once 'lib/database.php';
include_once 'lib/auth.php';
include_once 'controllers/HomeController.php';
include_once 'controllers/UserController.php';
include_once 'controllers/CategoryController.php';
include_once 'controllers/ContactController.php';
$master_controller = new \Controllers\HomeController();

if ( ! empty( $request ) ) {
    if( 0 === strpos( $request, '/' ) ) {
        // Clean the request
        $request = substr( $request, 1 );

        // Fetch the controller, method and params if any
        $components = explode( '/', $request, 3 );

        // Get controller and such
        if ( 1 < count( $components ) ) {
            list( $controller, $method ) = $components;

            $param = isset( $components[2] ) ? $components[2] : array();
        }
    }
}

// If the controller is found
if ( isset( $controller ) && file_exists( DX_ROOT_DIR. 'controllers/' . ucfirst($controller) . 'Controller.php' ) ) {

     // Form the controller class
    $controller_class = '\Controllers\\' . ucfirst( $controller ) . 'Controller';
    $instance = new $controller_class();

    // Call the object and the method
    if( method_exists( $instance, $method ) ) {
        call_user_func_array( array( $instance, $method ), array( $param ) );

    } else {
        // fallback to index
        call_user_func_array( array( $instance, 'index' ), array() );
    }
} else {
    $master_controller->home();
}
