<?php
/**
 * PHP Token Reflection
 *
 * Version 1.0 beta 2
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this library in the file license.txt.
 *
 * @author Ondřej Nešpor <andrew@andrewsville.cz>
 * @author Jaroslav Hanslík <kukulich@kukulich.cz>
 */

namespace TokenReflection\Broker;

use TokenReflection;

/**
 * Broker backend interface.
 *
 * Defines methods for storing and retrieving reflection objects.
 */
interface Backend
{
	/**
	 * Identifier of the tokenized classes list.
	 *
	 * @var integer
	 */
	const TOKENIZED_CLASSES = 1;

	/**
	 * Identifier of the internal classes list.
	 *
	 * @var integer
	 */
	const INTERNAL_CLASSES = 2;

	/**
	 * Identifier of the nonexisten classes list.
	 *
	 * @var integer
	 */
	const NONEXISTENT_CLASSES = 4;

	/**
	 * Returns a reflection object of the given namespace.
	 *
	 * @param string $namespaceName Namespace name
	 * @return \TokenReflection\IReflectionNamespace|null
	 */
	public function getNamespace($namespaceName);

	/**
	 * Returns if there was such namespace processed (FQN expected).
	 *
	 * @param string $namespaceName Namespace name
	 * @return boolean
	 */
	public function hasNamespace($namespaceName);

	/**
	 * Returns a reflection object of the given class (FQN expected).
	 *
	 * @param string $className CLass bame
	 * @return \TokenReflection\IReflectionClass|null
	 */
	public function getClass($className);

	/**
	 * Returns if there was such class processed (FQN expected).
	 *
	 * @param string $className Class name
	 * @return boolean
	 */
	public function hasClass($className);

	/**
	 * Returns a reflection object of a function (FQN expected).
	 *
	 * @param string $functionName Function name
	 * @return \TokenReflection\IReflectionFunction|null
	 */
	public function getFunction($functionName);

	/**
	 * Returns if there was such function processed (FQN expected).
	 *
	 * @param string $functionName Function name
	 * @return boolean
	 */
	public function hasFunction($functionName);

	/**
	 * Returns a reflection object of a constant (FQN expected).
	 *
	 * @param string $constantName Constant name
	 * @return \TokenReflection\IReflectionConstant|null
	 */
	public function getConstant($constantName);

	/**
	 * Returns if there was such constant processed (FQN expected).
	 *
	 * @param string $constantName Constant name
	 * @return boolean
	 */
	public function hasConstant($constantName);

	/**
	 * Returns if the given file was already processed.
	 *
	 * @param string $fileName File name
	 * @return boolean
	 */
	public function isFileProcessed($fileName);

	/**
	 * Returns an array of tokens for a particular file.
	 *
	 * @param string $fileName File name
	 * @return \TokenReflection\Stream
	 */
	public function getFileTokens($fileName);

	/**
	 * Adds a file to the backend storage.
	 *
	 * @param \TokenReflection\ReflectionFile $file File reflection object
	 * @return \TokenReflection\Broker\Backend
	 */
	public function addFile(TokenReflection\ReflectionFile $file);

	/**
	 * Sets the reflection broker instance.
	 *
	 * @param \TokenReflection\Broker $broker Reflection broker
	 * @return \TokenReflection\Broker\Backend
	 */
	public function setBroker(TokenReflection\Broker $broker);

	/**
	 * Returns the reflection broker instance.
	 *
	 * @return \TokenReflection\Broker $broker Reflection broker
	 */
	public function getBroker();

	/**
	 * Sets if token streams are stored in the backend.
	 *
	 * @param boolean $store
	 * @return \TokenReflection\Broker\Backend
	 */
	public function setStoringTokenStreams($store);

	/**
	 * Returns if token streams are stored in the backend.
	 *
	 * @return boolean
	 */
	public function getStoringTokenStreams();

	/**
	 * Returns all classes from all namespaces.
	 *
	 * @param integer $type Returned class types (multiple values may be OR-ed)
	 * @return array
	 */
	public function getClasses($type = Backend::TOKENIZED_CLASSES);

	/**
	 * Returns all functions from all namespaces.
	 *
	 * @return array
	 */
	public function getFunctions();

	/**
	 * Returns all constants from all namespaces.
	 *
	 * @return array
	 */
	public function getConstants();
}