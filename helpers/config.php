<?php
function getConfig(){
    $configPath = __DIR__.'/../config.yaml';

    return \Symfony\Component\Yaml\Yaml::parseFile($configPath);
}