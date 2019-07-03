<?php

use BlackJack\Router;

//defaul $routes
Router::add('^admin$',['controller' => 'Main','action' => 'default', 'prefix' => 'admin\\']);
Router::add('^admin/(?P<controller>[a-z-]+)(/(?P<action>[a-z-]+))?$',['prefix' => 'admin\\']);

Router::add('^$',['controller' => 'Main','action' => 'default']);
Router::add('^(?P<controller>[a-z-]+)(/(?P<action>[a-z-]+))?$');
