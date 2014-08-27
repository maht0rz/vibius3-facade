<?php

namespace Vibius\Facade;
use \Vibius\Container\Provider;

class Facade{

	function __construct(){
		$this->container = new Container();
	}

	function __callStatic($functionName, $arguments){
		$className = get_called_class();
		$containerIdentifier = "instances.$className";
		if( $this->container->exists($containerIdentifier) ){
			$classInstance = $this->container->get($containerIdentifier);			
		}

		$classInstance->$functionName(...$arguments);

	}

	private function execute($className, $methodName, $arguments){

	}

}