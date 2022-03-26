<?php

namespace ContainerLHUNU3m;
include_once \dirname(__DIR__, 4).'/vendor/doctrine/persistence/lib/Doctrine/Persistence/ObjectManager.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).'/vendor/doctrine/orm/lib/Doctrine/ORM/EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{
    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder474c3 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializerafbdc = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicProperties8d17e = [
        
    ];

    public function getConnection()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getConnection', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getMetadataFactory', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getExpressionBuilder', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'beginTransaction', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->beginTransaction();
    }

    public function getCache()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getCache', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getCache();
    }

    public function transactional($func)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'transactional', array('func' => $func), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->transactional($func);
    }

    public function wrapInTransaction(callable $func)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'wrapInTransaction', array('func' => $func), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->wrapInTransaction($func);
    }

    public function commit()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'commit', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->commit();
    }

    public function rollback()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'rollback', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getClassMetadata', array('className' => $className), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'createQuery', array('dql' => $dql), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'createNamedQuery', array('name' => $name), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'createQueryBuilder', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'flush', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'clear', array('entityName' => $entityName), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->clear($entityName);
    }

    public function close()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'close', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->close();
    }

    public function persist($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'persist', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'remove', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'refresh', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'detach', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'merge', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getRepository', array('entityName' => $entityName), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'contains', array('entity' => $entity), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getEventManager', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getConfiguration', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'isOpen', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getUnitOfWork', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getProxyFactory', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'initializeObject', array('obj' => $obj), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'getFilters', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'isFiltersStateClean', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'hasFilters', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return $this->valueHolder474c3->hasFilters();
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

        $instance->initializerafbdc = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder474c3) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder474c3 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder474c3->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__get', ['name' => $name], $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        if (isset(self::$publicProperties8d17e[$name])) {
            return $this->valueHolder474c3->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder474c3;

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

        $targetObject = $this->valueHolder474c3;
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
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__set', array('name' => $name, 'value' => $value), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder474c3;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder474c3;
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
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__isset', array('name' => $name), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder474c3;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder474c3;
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
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__unset', array('name' => $name), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder474c3;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder474c3;
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
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__clone', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        $this->valueHolder474c3 = clone $this->valueHolder474c3;
    }

    public function __sleep()
    {
        $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, '__sleep', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;

        return array('valueHolder474c3');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializerafbdc = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializerafbdc;
    }

    public function initializeProxy() : bool
    {
        return $this->initializerafbdc && ($this->initializerafbdc->__invoke($valueHolder474c3, $this, 'initializeProxy', array(), $this->initializerafbdc) || 1) && $this->valueHolder474c3 = $valueHolder474c3;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder474c3;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder474c3;
    }
}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
