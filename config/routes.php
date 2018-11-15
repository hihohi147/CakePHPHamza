<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */


use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\Router;

Router::extensions(['json', 'xml']);
Router::defaultRouteClass(DashedRoute::class);

// New route we're adding for our tagged action.
// The trailing `*` tells CakePHP that this action has
// passed parameters.
Router::scope(
    '/athletes',
    ['controller' => 'Athletes'],
    function ($routes) {
        $routes->connect('/tagged/*', ['action' => 'tags']);
    }
    );

Router::scope('/', function (RouteBuilder $routes) {
    // Connect the default home and /pages/* routes.
    $routes->connect('/', [
        'controller' => 'Athletes',
        'action' => 'index'
    ]);
    $routes->connect('/pages/*', [
        'controller' => 'Pages',
        'action' => 'display'
    ]);
    
    // Connect the conventions based default routes.
     $routes->fallbacks(DashedRoute::class);
});
    
   
