<?php

namespace ContainerO5yfp3V;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder73c4a = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer94a12 = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesa5892 = [
        
    ];

    public function getConnection()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getConnection', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getMetadataFactory', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getExpressionBuilder', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'beginTransaction', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getCache', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getCache();
    }

    public function transactional($func)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'transactional', array('func' => $func), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'wrapInTransaction', array('func' => $func), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'commit', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->commit();
    }

    public function rollback()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'rollback', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getClassMetadata', array('className' => $className), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'createQuery', array('dql' => $dql), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'createNamedQuery', array('name' => $name), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'createQueryBuilder', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'flush', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'clear', array('entityName' => $entityName), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->clear($entityName);
    }

    public function close()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'close', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->close();
    }

    public function persist($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'persist', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'remove', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'refresh', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'detach', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'merge', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getRepository', array('entityName' => $entityName), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'contains', array('entity' => $entity), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getEventManager', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getConfiguration', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'isOpen', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getUnitOfWork', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getProxyFactory', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'initializeObject', array('obj' => $obj), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'getFilters', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'isFiltersStateClean', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'hasFilters', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return $this->valueHolder73c4a->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer94a12 = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder73c4a) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder73c4a = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder73c4a->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__get', ['name' => $name], $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        if (isset(self::$publicPropertiesa5892[$name])) {
            return $this->valueHolder73c4a->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder73c4a;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder73c4a;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder73c4a;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder73c4a;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__isset', array('name' => $name), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder73c4a;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder73c4a;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__unset', array('name' => $name), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder73c4a;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder73c4a;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__clone', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        $this->valueHolder73c4a = clone $this->valueHolder73c4a;
    }

    public function __sleep()
    {
        $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, '__sleep', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;

        return array('valueHolder73c4a');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer94a12 = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer94a12;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer94a12 && ($this->initializer94a12->__invoke($valueHolder73c4a, $this, 'initializeProxy', array(), $this->initializer94a12) || 1) && $this->valueHolder73c4a = $valueHolder73c4a;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder73c4a;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder73c4a;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
