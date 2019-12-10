<?php
/**
 * @author: Jiří Šifalda <sifalda.jiri@gmail.com>
 */
namespace Flame\Modules\Configurators;

use Nette\SmartObject;

abstract class Config
{
    use SmartObject;

	/**
	 * @return mixed
	 */
	abstract public function getConfiguration();
}