<?php

require 'vendor/autoload.php';
require 'lib/Httpstatuses/Httpstatuses.php';

$klein = new \Klein\Klein();
$httpstatuses = new \Httpstatuses\httpstatuses();

$klein->respond('GET', '*', function ($request, $response, $service, $app) use ($httpstatuses) {
    $uri = array_filter(explode("/", strtolower($request->uri())));
    
    if(isset($uri[3]))
        $response->redirect('http://' . $_SERVER['SERVER_NAME'] . '/' . implode('/', $app->status), 302); // remove junk from URL
    
    $spec_list = $httpstatuses->spec_list();
    $default_spec = reset($spec_list);
    
    $spec_id = isset($uri[1]) && ctype_alpha($uri[1]) ? $uri[1] : $default_spec['key'];
    $status_code = isset($uri[1]) && is_numeric($uri[1]) ? $uri[1] : (isset($uri[2]) && is_numeric($uri[2]) ? $uri[2] : false);
    
    if(!isset($spec_list[$spec_id]))
        return $service->render('views/404.php');
    
    // if default redirect to /
    
    $data = array('spec' => $spec_list[$spec_id], 'specs' => $spec_list);
    $view = '404';
    
    if(!isset($data['spec']['default'])) {
        define('BASE_URL', "http://httpstatus.es/{$data['spec']['key']}");
    } else {
        define('BASE_URL', 'http://httpstatus.es');
    }
    
    if($status_code && $code = $httpstatuses->status($status_code, $spec_id)) {
        $data['code'] = $code;
        $view = 'status_code';
    } elseif(!$status_code && $codes = $httpstatuses->statuses($spec_id)) {
        $data['codes'] = $codes;
        $view = 'index';
    }
    
    return $service->render('views/' . $view . '.php', $data);
});

$klein->dispatch();