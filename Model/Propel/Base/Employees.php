<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Agencies as ChildAgencies;
use Model\Propel\AgenciesQuery as ChildAgenciesQuery;
use Model\Propel\Employees as ChildEmployees;
use Model\Propel\EmployeesQuery as ChildEmployeesQuery;
use Model\Propel\Hotline as ChildHotline;
use Model\Propel\HotlineQuery as ChildHotlineQuery;
use Model\Propel\Map\EmployeesTableMap;
use Model\Propel\Map\HotlineTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveRecord\ActiveRecordInterface;
use Propel\Runtime\Collection\Collection;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\BadMethodCallException;
use Propel\Runtime\Exception\LogicException;
use Propel\Runtime\Exception\PropelException;
use Propel\Runtime\Map\TableMap;
use Propel\Runtime\Parser\AbstractParser;

/**
 * Base class that represents a row from the 'employees' table.
 *
 *
 *
 * @package    propel.generator.Model.Propel.Base
 */
abstract class Employees implements ActiveRecordInterface
{
    /**
     * TableMap class name
     */
    const TABLE_MAP = '\\Model\\Propel\\Map\\EmployeesTableMap';


    /**
     * attribute to determine if this object has previously been saved.
     * @var boolean
     */
    protected $new = true;

    /**
     * attribute to determine whether this object has been deleted.
     * @var boolean
     */
    protected $deleted = false;

    /**
     * The columns that have been modified in current object.
     * Tracking modified columns allows us to only update modified columns.
     * @var array
     */
    protected $modifiedColumns = array();

    /**
     * The (virtual) columns that are added at runtime
     * The formatters can add supplementary columns based on a resultset
     * @var array
     */
    protected $virtualColumns = array();

    /**
     * The value for the id_employee field.
     *
     * @var        int
     */
    protected $id_employee;

    /**
     * The value for the firstname field.
     *
     * @var        string
     */
    protected $firstname;

    /**
     * The value for the lastname field.
     *
     * @var        string
     */
    protected $lastname;

    /**
     * The value for the email field.
     *
     * @var        string
     */
    protected $email;

    /**
     * The value for the phone field.
     *
     * @var        string
     */
    protected $phone;

    /**
     * The value for the password field.
     *
     * @var        string
     */
    protected $password;

    /**
     * The value for the job field.
     *
     * @var        string
     */
    protected $job;

    /**
     * The value for the picture field.
     *
     * @var        string
     */
    protected $picture;

    /**
     * The value for the role field.
     *
     * @var        string
     */
    protected $role;

    /**
     * The value for the id_agency field.
     *
     * @var        int
     */
    protected $id_agency;

    /**
     * @var        ChildAgencies
     */
    protected $aAgencies;

    /**
     * @var        ObjectCollection|ChildHotline[] Collection to store aggregation of ChildHotline objects.
     */
    protected $collHotlines;
    protected $collHotlinesPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     *
     * @var boolean
     */
    protected $alreadyInSave = false;

    /**
     * An array of objects scheduled for deletion.
     * @var ObjectCollection|ChildHotline[]
     */
    protected $hotlinesScheduledForDeletion = null;

    /**
     * Initializes internal state of Model\Propel\Base\Employees object.
     */
    public function __construct()
    {
    }

    /**
     * Returns whether the object has been modified.
     *
     * @return boolean True if the object has been modified.
     */
    public function isModified()
    {
        return !!$this->modifiedColumns;
    }

    /**
     * Has specified column been modified?
     *
     * @param  string  $col column fully qualified name (TableMap::TYPE_COLNAME), e.g. Book::AUTHOR_ID
     * @return boolean True if $col has been modified.
     */
    public function isColumnModified($col)
    {
        return $this->modifiedColumns && isset($this->modifiedColumns[$col]);
    }

    /**
     * Get the columns that have been modified in this object.
     * @return array A unique list of the modified column names for this object.
     */
    public function getModifiedColumns()
    {
        return $this->modifiedColumns ? array_keys($this->modifiedColumns) : [];
    }

    /**
     * Returns whether the object has ever been saved.  This will
     * be false, if the object was retrieved from storage or was created
     * and then saved.
     *
     * @return boolean true, if the object has never been persisted.
     */
    public function isNew()
    {
        return $this->new;
    }

    /**
     * Setter for the isNew attribute.  This method will be called
     * by Propel-generated children and objects.
     *
     * @param boolean $b the state of the object.
     */
    public function setNew($b)
    {
        $this->new = (boolean) $b;
    }

    /**
     * Whether this object has been deleted.
     * @return boolean The deleted state of this object.
     */
    public function isDeleted()
    {
        return $this->deleted;
    }

    /**
     * Specify whether this object has been deleted.
     * @param  boolean $b The deleted state of this object.
     * @return void
     */
    public function setDeleted($b)
    {
        $this->deleted = (boolean) $b;
    }

    /**
     * Sets the modified state for the object to be false.
     * @param  string $col If supplied, only the specified column is reset.
     * @return void
     */
    public function resetModified($col = null)
    {
        if (null !== $col) {
            if (isset($this->modifiedColumns[$col])) {
                unset($this->modifiedColumns[$col]);
            }
        } else {
            $this->modifiedColumns = array();
        }
    }

    /**
     * Compares this with another <code>Employees</code> instance.  If
     * <code>obj</code> is an instance of <code>Employees</code>, delegates to
     * <code>equals(Employees)</code>.  Otherwise, returns <code>false</code>.
     *
     * @param  mixed   $obj The object to compare to.
     * @return boolean Whether equal to the object specified.
     */
    public function equals($obj)
    {
        if (!$obj instanceof static) {
            return false;
        }

        if ($this === $obj) {
            return true;
        }

        if (null === $this->getPrimaryKey() || null === $obj->getPrimaryKey()) {
            return false;
        }

        return $this->getPrimaryKey() === $obj->getPrimaryKey();
    }

    /**
     * Get the associative array of the virtual columns in this object
     *
     * @return array
     */
    public function getVirtualColumns()
    {
        return $this->virtualColumns;
    }

    /**
     * Checks the existence of a virtual column in this object
     *
     * @param  string  $name The virtual column name
     * @return boolean
     */
    public function hasVirtualColumn($name)
    {
        return array_key_exists($name, $this->virtualColumns);
    }

    /**
     * Get the value of a virtual column in this object
     *
     * @param  string $name The virtual column name
     * @return mixed
     *
     * @throws PropelException
     */
    public function getVirtualColumn($name)
    {
        if (!$this->hasVirtualColumn($name)) {
            throw new PropelException(sprintf('Cannot get value of inexistent virtual column %s.', $name));
        }

        return $this->virtualColumns[$name];
    }

    /**
     * Set the value of a virtual column in this object
     *
     * @param string $name  The virtual column name
     * @param mixed  $value The value to give to the virtual column
     *
     * @return $this|Employees The current object, for fluid interface
     */
    public function setVirtualColumn($name, $value)
    {
        $this->virtualColumns[$name] = $value;

        return $this;
    }

    /**
     * Logs a message using Propel::log().
     *
     * @param  string  $msg
     * @param  int     $priority One of the Propel::LOG_* logging levels
     * @return boolean
     */
    protected function log($msg, $priority = Propel::LOG_INFO)
    {
        return Propel::log(get_class($this) . ': ' . $msg, $priority);
    }

    /**
     * Export the current object properties to a string, using a given parser format
     * <code>
     * $book = BookQuery::create()->findPk(9012);
     * echo $book->exportTo('JSON');
     *  => {"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * @param  mixed   $parser                 A AbstractParser instance, or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param  boolean $includeLazyLoadColumns (optional) Whether to include lazy load(ed) columns. Defaults to TRUE.
     * @return string  The exported data
     */
    public function exportTo($parser, $includeLazyLoadColumns = true)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        return $parser->fromArray($this->toArray(TableMap::TYPE_PHPNAME, $includeLazyLoadColumns, array(), true));
    }

    /**
     * Clean up internal collections prior to serializing
     * Avoids recursive loops that turn into segmentation faults when serializing
     */
    public function __sleep()
    {
        $this->clearAllReferences();

        $cls = new \ReflectionClass($this);
        $propertyNames = [];
        $serializableProperties = array_diff($cls->getProperties(), $cls->getProperties(\ReflectionProperty::IS_STATIC));

        foreach($serializableProperties as $property) {
            $propertyNames[] = $property->getName();
        }

        return $propertyNames;
    }

    /**
     * Get the [id_employee] column value.
     *
     * @return int
     */
    public function getIdEmployee()
    {
        return $this->id_employee;
    }

    /**
     * Get the [firstname] column value.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Get the [lastname] column value.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Get the [email] column value.
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [phone] column value.
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [password] column value.
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [job] column value.
     *
     * @return string
     */
    public function getJob()
    {
        return $this->job;
    }

    /**
     * Get the [picture] column value.
     *
     * @return string
     */
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Get the [role] column value.
     *
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * Get the [id_agency] column value.
     *
     * @return int
     */
    public function getIdAgency()
    {
        return $this->id_agency;
    }

    /**
     * Set the value of [id_employee] column.
     *
     * @param int $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setIdEmployee($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_employee !== $v) {
            $this->id_employee = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_ID_EMPLOYEE] = true;
        }

        return $this;
    } // setIdEmployee()

    /**
     * Set the value of [firstname] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setFirstname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->firstname !== $v) {
            $this->firstname = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_FIRSTNAME] = true;
        }

        return $this;
    } // setFirstname()

    /**
     * Set the value of [lastname] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setLastname($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->lastname !== $v) {
            $this->lastname = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_LASTNAME] = true;
        }

        return $this;
    } // setLastname()

    /**
     * Set the value of [email] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_EMAIL] = true;
        }

        return $this;
    } // setEmail()

    /**
     * Set the value of [phone] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_PHONE] = true;
        }

        return $this;
    } // setPhone()

    /**
     * Set the value of [password] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_PASSWORD] = true;
        }

        return $this;
    } // setPassword()

    /**
     * Set the value of [job] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setJob($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->job !== $v) {
            $this->job = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_JOB] = true;
        }

        return $this;
    } // setJob()

    /**
     * Set the value of [picture] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setPicture($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->picture !== $v) {
            $this->picture = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_PICTURE] = true;
        }

        return $this;
    } // setPicture()

    /**
     * Set the value of [role] column.
     *
     * @param string $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setRole($v)
    {
        if ($v !== null) {
            $v = (string) $v;
        }

        if ($this->role !== $v) {
            $this->role = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_ROLE] = true;
        }

        return $this;
    } // setRole()

    /**
     * Set the value of [id_agency] column.
     *
     * @param int $v new value
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function setIdAgency($v)
    {
        if ($v !== null) {
            $v = (int) $v;
        }

        if ($this->id_agency !== $v) {
            $this->id_agency = $v;
            $this->modifiedColumns[EmployeesTableMap::COL_ID_AGENCY] = true;
        }

        if ($this->aAgencies !== null && $this->aAgencies->getIdAgency() !== $v) {
            $this->aAgencies = null;
        }

        return $this;
    } // setIdAgency()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
        // otherwise, everything was equal, so return TRUE
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array   $row       The row returned by DataFetcher->fetch().
     * @param int     $startcol  0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @param string  $indexType The index type of $row. Mostly DataFetcher->getIndexType().
                                  One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                            TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false, $indexType = TableMap::TYPE_NUM)
    {
        try {

            $col = $row[TableMap::TYPE_NUM == $indexType ? 0 + $startcol : EmployeesTableMap::translateFieldName('IdEmployee', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_employee = (null !== $col) ? (int) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 1 + $startcol : EmployeesTableMap::translateFieldName('Firstname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->firstname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 2 + $startcol : EmployeesTableMap::translateFieldName('Lastname', TableMap::TYPE_PHPNAME, $indexType)];
            $this->lastname = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 3 + $startcol : EmployeesTableMap::translateFieldName('Email', TableMap::TYPE_PHPNAME, $indexType)];
            $this->email = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 4 + $startcol : EmployeesTableMap::translateFieldName('Phone', TableMap::TYPE_PHPNAME, $indexType)];
            $this->phone = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 5 + $startcol : EmployeesTableMap::translateFieldName('Password', TableMap::TYPE_PHPNAME, $indexType)];
            $this->password = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 6 + $startcol : EmployeesTableMap::translateFieldName('Job', TableMap::TYPE_PHPNAME, $indexType)];
            $this->job = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 7 + $startcol : EmployeesTableMap::translateFieldName('Picture', TableMap::TYPE_PHPNAME, $indexType)];
            $this->picture = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 8 + $startcol : EmployeesTableMap::translateFieldName('Role', TableMap::TYPE_PHPNAME, $indexType)];
            $this->role = (null !== $col) ? (string) $col : null;

            $col = $row[TableMap::TYPE_NUM == $indexType ? 9 + $startcol : EmployeesTableMap::translateFieldName('IdAgency', TableMap::TYPE_PHPNAME, $indexType)];
            $this->id_agency = (null !== $col) ? (int) $col : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }

            return $startcol + 10; // 10 = EmployeesTableMap::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException(sprintf('Error populating %s object', '\\Model\\Propel\\Employees'), 0, $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {
        if ($this->aAgencies !== null && $this->id_agency !== $this->aAgencies->getIdAgency()) {
            $this->aAgencies = null;
        }
    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param      boolean $deep (optional) Whether to also de-associated any related objects.
     * @param      ConnectionInterface $con (optional) The ConnectionInterface connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(EmployeesTableMap::DATABASE_NAME);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $dataFetcher = ChildEmployeesQuery::create(null, $this->buildPkeyCriteria())->setFormatter(ModelCriteria::FORMAT_STATEMENT)->find($con);
        $row = $dataFetcher->fetch();
        $dataFetcher->close();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true, $dataFetcher->getIndexType()); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAgencies = null;
            $this->collHotlines = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param      ConnectionInterface $con
     * @return void
     * @throws PropelException
     * @see Employees::setDeleted()
     * @see Employees::isDeleted()
     */
    public function delete(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        $con->transaction(function () use ($con) {
            $deleteQuery = ChildEmployeesQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $this->setDeleted(true);
            }
        });
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see doSave()
     */
    public function save(ConnectionInterface $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($this->alreadyInSave) {
            return 0;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getWriteConnection(EmployeesTableMap::DATABASE_NAME);
        }

        return $con->transaction(function () use ($con) {
            $ret = $this->preSave($con);
            $isInsert = $this->isNew();
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                EmployeesTableMap::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }

            return $affectedRows;
        });
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param      ConnectionInterface $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see save()
     */
    protected function doSave(ConnectionInterface $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            // We call the save method on the following object(s) if they
            // were passed to this object by their corresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aAgencies !== null) {
                if ($this->aAgencies->isModified() || $this->aAgencies->isNew()) {
                    $affectedRows += $this->aAgencies->save($con);
                }
                $this->setAgencies($this->aAgencies);
            }

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                    $affectedRows += 1;
                } else {
                    $affectedRows += $this->doUpdate($con);
                }
                $this->resetModified();
            }

            if ($this->hotlinesScheduledForDeletion !== null) {
                if (!$this->hotlinesScheduledForDeletion->isEmpty()) {
                    \Model\Propel\HotlineQuery::create()
                        ->filterByPrimaryKeys($this->hotlinesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->hotlinesScheduledForDeletion = null;
                }
            }

            if ($this->collHotlines !== null) {
                foreach ($this->collHotlines as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @throws PropelException
     * @see doSave()
     */
    protected function doInsert(ConnectionInterface $con)
    {
        $modifiedColumns = array();
        $index = 0;

        $this->modifiedColumns[EmployeesTableMap::COL_ID_EMPLOYEE] = true;
        if (null !== $this->id_employee) {
            throw new PropelException('Cannot insert a value for auto-increment primary key (' . EmployeesTableMap::COL_ID_EMPLOYEE . ')');
        }

         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(EmployeesTableMap::COL_ID_EMPLOYEE)) {
            $modifiedColumns[':p' . $index++]  = 'id_employee';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_FIRSTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'firstname';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_LASTNAME)) {
            $modifiedColumns[':p' . $index++]  = 'lastname';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = 'email';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PHONE)) {
            $modifiedColumns[':p' . $index++]  = 'phone';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = 'password';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_JOB)) {
            $modifiedColumns[':p' . $index++]  = 'job';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PICTURE)) {
            $modifiedColumns[':p' . $index++]  = 'picture';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_ROLE)) {
            $modifiedColumns[':p' . $index++]  = 'role';
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_ID_AGENCY)) {
            $modifiedColumns[':p' . $index++]  = 'id_agency';
        }

        $sql = sprintf(
            'INSERT INTO employees (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case 'id_employee':
                        $stmt->bindValue($identifier, $this->id_employee, PDO::PARAM_INT);
                        break;
                    case 'firstname':
                        $stmt->bindValue($identifier, $this->firstname, PDO::PARAM_STR);
                        break;
                    case 'lastname':
                        $stmt->bindValue($identifier, $this->lastname, PDO::PARAM_STR);
                        break;
                    case 'email':
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case 'phone':
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case 'password':
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case 'job':
                        $stmt->bindValue($identifier, $this->job, PDO::PARAM_STR);
                        break;
                    case 'picture':
                        $stmt->bindValue($identifier, $this->picture, PDO::PARAM_STR);
                        break;
                    case 'role':
                        $stmt->bindValue($identifier, $this->role, PDO::PARAM_STR);
                        break;
                    case 'id_agency':
                        $stmt->bindValue($identifier, $this->id_agency, PDO::PARAM_INT);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), 0, $e);
        }

        try {
            $pk = $con->lastInsertId();
        } catch (Exception $e) {
            throw new PropelException('Unable to get autoincrement id.', 0, $e);
        }
        $this->setIdEmployee($pk);

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param      ConnectionInterface $con
     *
     * @return Integer Number of updated rows
     * @see doSave()
     */
    protected function doUpdate(ConnectionInterface $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();

        return $selectCriteria->doUpdate($valuesCriteria, $con);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param      string $name name
     * @param      string $type The type of fieldname the $name is of:
     *                     one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                     TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                     Defaults to TableMap::TYPE_PHPNAME.
     * @return mixed Value of field.
     */
    public function getByName($name, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EmployeesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param      int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getIdEmployee();
                break;
            case 1:
                return $this->getFirstname();
                break;
            case 2:
                return $this->getLastname();
                break;
            case 3:
                return $this->getEmail();
                break;
            case 4:
                return $this->getPhone();
                break;
            case 5:
                return $this->getPassword();
                break;
            case 6:
                return $this->getJob();
                break;
            case 7:
                return $this->getPicture();
                break;
            case 8:
                return $this->getRole();
                break;
            case 9:
                return $this->getIdAgency();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     *                    TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                    Defaults to TableMap::TYPE_PHPNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to TRUE.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = TableMap::TYPE_PHPNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {

        if (isset($alreadyDumpedObjects['Employees'][$this->hashCode()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Employees'][$this->hashCode()] = true;
        $keys = EmployeesTableMap::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdEmployee(),
            $keys[1] => $this->getFirstname(),
            $keys[2] => $this->getLastname(),
            $keys[3] => $this->getEmail(),
            $keys[4] => $this->getPhone(),
            $keys[5] => $this->getPassword(),
            $keys[6] => $this->getJob(),
            $keys[7] => $this->getPicture(),
            $keys[8] => $this->getRole(),
            $keys[9] => $this->getIdAgency(),
        );
        $virtualColumns = $this->virtualColumns;
        foreach ($virtualColumns as $key => $virtualColumn) {
            $result[$key] = $virtualColumn;
        }

        if ($includeForeignObjects) {
            if (null !== $this->aAgencies) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'agencies';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'agencies';
                        break;
                    default:
                        $key = 'Agencies';
                }

                $result[$key] = $this->aAgencies->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collHotlines) {

                switch ($keyType) {
                    case TableMap::TYPE_CAMELNAME:
                        $key = 'hotlines';
                        break;
                    case TableMap::TYPE_FIELDNAME:
                        $key = 'hotlines';
                        break;
                    default:
                        $key = 'Hotlines';
                }

                $result[$key] = $this->collHotlines->toArray(null, false, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param  string $name
     * @param  mixed  $value field value
     * @param  string $type The type of fieldname the $name is of:
     *                one of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME
     *                TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     *                Defaults to TableMap::TYPE_PHPNAME.
     * @return $this|\Model\Propel\Employees
     */
    public function setByName($name, $value, $type = TableMap::TYPE_PHPNAME)
    {
        $pos = EmployeesTableMap::translateFieldName($name, $type, TableMap::TYPE_NUM);

        return $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param  int $pos position in xml schema
     * @param  mixed $value field value
     * @return $this|\Model\Propel\Employees
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setIdEmployee($value);
                break;
            case 1:
                $this->setFirstname($value);
                break;
            case 2:
                $this->setLastname($value);
                break;
            case 3:
                $this->setEmail($value);
                break;
            case 4:
                $this->setPhone($value);
                break;
            case 5:
                $this->setPassword($value);
                break;
            case 6:
                $this->setJob($value);
                break;
            case 7:
                $this->setPicture($value);
                break;
            case 8:
                $this->setRole($value);
                break;
            case 9:
                $this->setIdAgency($value);
                break;
        } // switch()

        return $this;
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param      array  $arr     An array to populate the object from.
     * @param      string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = TableMap::TYPE_PHPNAME)
    {
        $keys = EmployeesTableMap::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) {
            $this->setIdEmployee($arr[$keys[0]]);
        }
        if (array_key_exists($keys[1], $arr)) {
            $this->setFirstname($arr[$keys[1]]);
        }
        if (array_key_exists($keys[2], $arr)) {
            $this->setLastname($arr[$keys[2]]);
        }
        if (array_key_exists($keys[3], $arr)) {
            $this->setEmail($arr[$keys[3]]);
        }
        if (array_key_exists($keys[4], $arr)) {
            $this->setPhone($arr[$keys[4]]);
        }
        if (array_key_exists($keys[5], $arr)) {
            $this->setPassword($arr[$keys[5]]);
        }
        if (array_key_exists($keys[6], $arr)) {
            $this->setJob($arr[$keys[6]]);
        }
        if (array_key_exists($keys[7], $arr)) {
            $this->setPicture($arr[$keys[7]]);
        }
        if (array_key_exists($keys[8], $arr)) {
            $this->setRole($arr[$keys[8]]);
        }
        if (array_key_exists($keys[9], $arr)) {
            $this->setIdAgency($arr[$keys[9]]);
        }
    }

     /**
     * Populate the current object from a string, using a given parser format
     * <code>
     * $book = new Book();
     * $book->importFrom('JSON', '{"Id":9012,"Title":"Don Juan","ISBN":"0140422161","Price":12.99,"PublisherId":1234,"AuthorId":5678}');
     * </code>
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants TableMap::TYPE_PHPNAME, TableMap::TYPE_CAMELNAME,
     * TableMap::TYPE_COLNAME, TableMap::TYPE_FIELDNAME, TableMap::TYPE_NUM.
     * The default key type is the column's TableMap::TYPE_PHPNAME.
     *
     * @param mixed $parser A AbstractParser instance,
     *                       or a format name ('XML', 'YAML', 'JSON', 'CSV')
     * @param string $data The source data to import from
     * @param string $keyType The type of keys the array uses.
     *
     * @return $this|\Model\Propel\Employees The current object, for fluid interface
     */
    public function importFrom($parser, $data, $keyType = TableMap::TYPE_PHPNAME)
    {
        if (!$parser instanceof AbstractParser) {
            $parser = AbstractParser::getParser($parser);
        }

        $this->fromArray($parser->toArray($data), $keyType);

        return $this;
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(EmployeesTableMap::DATABASE_NAME);

        if ($this->isColumnModified(EmployeesTableMap::COL_ID_EMPLOYEE)) {
            $criteria->add(EmployeesTableMap::COL_ID_EMPLOYEE, $this->id_employee);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_FIRSTNAME)) {
            $criteria->add(EmployeesTableMap::COL_FIRSTNAME, $this->firstname);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_LASTNAME)) {
            $criteria->add(EmployeesTableMap::COL_LASTNAME, $this->lastname);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_EMAIL)) {
            $criteria->add(EmployeesTableMap::COL_EMAIL, $this->email);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PHONE)) {
            $criteria->add(EmployeesTableMap::COL_PHONE, $this->phone);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PASSWORD)) {
            $criteria->add(EmployeesTableMap::COL_PASSWORD, $this->password);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_JOB)) {
            $criteria->add(EmployeesTableMap::COL_JOB, $this->job);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_PICTURE)) {
            $criteria->add(EmployeesTableMap::COL_PICTURE, $this->picture);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_ROLE)) {
            $criteria->add(EmployeesTableMap::COL_ROLE, $this->role);
        }
        if ($this->isColumnModified(EmployeesTableMap::COL_ID_AGENCY)) {
            $criteria->add(EmployeesTableMap::COL_ID_AGENCY, $this->id_agency);
        }

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @throws LogicException if no primary key is defined
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = ChildEmployeesQuery::create();
        $criteria->add(EmployeesTableMap::COL_ID_EMPLOYEE, $this->id_employee);

        return $criteria;
    }

    /**
     * If the primary key is not null, return the hashcode of the
     * primary key. Otherwise, return the hash code of the object.
     *
     * @return int Hashcode
     */
    public function hashCode()
    {
        $validPk = null !== $this->getIdEmployee();

        $validPrimaryKeyFKs = 0;
        $primaryKeyFKs = [];

        if ($validPk) {
            return crc32(json_encode($this->getPrimaryKey(), JSON_UNESCAPED_UNICODE));
        } elseif ($validPrimaryKeyFKs) {
            return crc32(json_encode($primaryKeyFKs, JSON_UNESCAPED_UNICODE));
        }

        return spl_object_hash($this);
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getIdEmployee();
    }

    /**
     * Generic method to set the primary key (id_employee column).
     *
     * @param       int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdEmployee($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {
        return null === $this->getIdEmployee();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param      object $copyObj An object of \Model\Propel\Employees (or compatible) type.
     * @param      boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param      boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setFirstname($this->getFirstname());
        $copyObj->setLastname($this->getLastname());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setJob($this->getJob());
        $copyObj->setPicture($this->getPicture());
        $copyObj->setRole($this->getRole());
        $copyObj->setIdAgency($this->getIdAgency());

        if ($deepCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);

            foreach ($this->getHotlines() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addHotline($relObj->copy($deepCopy));
                }
            }

        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdEmployee(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param  boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return \Model\Propel\Employees Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Declares an association between this object and a ChildAgencies object.
     *
     * @param  ChildAgencies $v
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAgencies(ChildAgencies $v = null)
    {
        if ($v === null) {
            $this->setIdAgency(NULL);
        } else {
            $this->setIdAgency($v->getIdAgency());
        }

        $this->aAgencies = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the ChildAgencies object, it will not be re-added.
        if ($v !== null) {
            $v->addEmployees($this);
        }


        return $this;
    }


    /**
     * Get the associated ChildAgencies object
     *
     * @param  ConnectionInterface $con Optional Connection object.
     * @return ChildAgencies The associated ChildAgencies object.
     * @throws PropelException
     */
    public function getAgencies(ConnectionInterface $con = null)
    {
        if ($this->aAgencies === null && ($this->id_agency != 0)) {
            $this->aAgencies = ChildAgenciesQuery::create()->findPk($this->id_agency, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAgencies->addEmployeess($this);
             */
        }

        return $this->aAgencies;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param      string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('Hotline' == $relationName) {
            $this->initHotlines();
            return;
        }
    }

    /**
     * Clears out the collHotlines collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return void
     * @see        addHotlines()
     */
    public function clearHotlines()
    {
        $this->collHotlines = null; // important to set this to NULL since that means it is uninitialized
    }

    /**
     * Reset is the collHotlines collection loaded partially.
     */
    public function resetPartialHotlines($v = true)
    {
        $this->collHotlinesPartial = $v;
    }

    /**
     * Initializes the collHotlines collection.
     *
     * By default this just sets the collHotlines collection to an empty array (like clearcollHotlines());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param      boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initHotlines($overrideExisting = true)
    {
        if (null !== $this->collHotlines && !$overrideExisting) {
            return;
        }

        $collectionClassName = HotlineTableMap::getTableMap()->getCollectionClassName();

        $this->collHotlines = new $collectionClassName;
        $this->collHotlines->setModel('\Model\Propel\Hotline');
    }

    /**
     * Gets an array of ChildHotline objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this ChildEmployees is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @return ObjectCollection|ChildHotline[] List of ChildHotline objects
     * @throws PropelException
     */
    public function getHotlines(Criteria $criteria = null, ConnectionInterface $con = null)
    {
        $partial = $this->collHotlinesPartial && !$this->isNew();
        if (null === $this->collHotlines || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collHotlines) {
                // return empty collection
                $this->initHotlines();
            } else {
                $collHotlines = ChildHotlineQuery::create(null, $criteria)
                    ->filterByEmployees($this)
                    ->find($con);

                if (null !== $criteria) {
                    if (false !== $this->collHotlinesPartial && count($collHotlines)) {
                        $this->initHotlines(false);

                        foreach ($collHotlines as $obj) {
                            if (false == $this->collHotlines->contains($obj)) {
                                $this->collHotlines->append($obj);
                            }
                        }

                        $this->collHotlinesPartial = true;
                    }

                    return $collHotlines;
                }

                if ($partial && $this->collHotlines) {
                    foreach ($this->collHotlines as $obj) {
                        if ($obj->isNew()) {
                            $collHotlines[] = $obj;
                        }
                    }
                }

                $this->collHotlines = $collHotlines;
                $this->collHotlinesPartial = false;
            }
        }

        return $this->collHotlines;
    }

    /**
     * Sets a collection of ChildHotline objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param      Collection $hotlines A Propel collection.
     * @param      ConnectionInterface $con Optional connection object
     * @return $this|ChildEmployees The current object (for fluent API support)
     */
    public function setHotlines(Collection $hotlines, ConnectionInterface $con = null)
    {
        /** @var ChildHotline[] $hotlinesToDelete */
        $hotlinesToDelete = $this->getHotlines(new Criteria(), $con)->diff($hotlines);


        $this->hotlinesScheduledForDeletion = $hotlinesToDelete;

        foreach ($hotlinesToDelete as $hotlineRemoved) {
            $hotlineRemoved->setEmployees(null);
        }

        $this->collHotlines = null;
        foreach ($hotlines as $hotline) {
            $this->addHotline($hotline);
        }

        $this->collHotlines = $hotlines;
        $this->collHotlinesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Hotline objects.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct
     * @param      ConnectionInterface $con
     * @return int             Count of related Hotline objects.
     * @throws PropelException
     */
    public function countHotlines(Criteria $criteria = null, $distinct = false, ConnectionInterface $con = null)
    {
        $partial = $this->collHotlinesPartial && !$this->isNew();
        if (null === $this->collHotlines || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collHotlines) {
                return 0;
            }

            if ($partial && !$criteria) {
                return count($this->getHotlines());
            }

            $query = ChildHotlineQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByEmployees($this)
                ->count($con);
        }

        return count($this->collHotlines);
    }

    /**
     * Method called to associate a ChildHotline object to this object
     * through the ChildHotline foreign key attribute.
     *
     * @param  ChildHotline $l ChildHotline
     * @return $this|\Model\Propel\Employees The current object (for fluent API support)
     */
    public function addHotline(ChildHotline $l)
    {
        if ($this->collHotlines === null) {
            $this->initHotlines();
            $this->collHotlinesPartial = true;
        }

        if (!$this->collHotlines->contains($l)) {
            $this->doAddHotline($l);

            if ($this->hotlinesScheduledForDeletion and $this->hotlinesScheduledForDeletion->contains($l)) {
                $this->hotlinesScheduledForDeletion->remove($this->hotlinesScheduledForDeletion->search($l));
            }
        }

        return $this;
    }

    /**
     * @param ChildHotline $hotline The ChildHotline object to add.
     */
    protected function doAddHotline(ChildHotline $hotline)
    {
        $this->collHotlines[]= $hotline;
        $hotline->setEmployees($this);
    }

    /**
     * @param  ChildHotline $hotline The ChildHotline object to remove.
     * @return $this|ChildEmployees The current object (for fluent API support)
     */
    public function removeHotline(ChildHotline $hotline)
    {
        if ($this->getHotlines()->contains($hotline)) {
            $pos = $this->collHotlines->search($hotline);
            $this->collHotlines->remove($pos);
            if (null === $this->hotlinesScheduledForDeletion) {
                $this->hotlinesScheduledForDeletion = clone $this->collHotlines;
                $this->hotlinesScheduledForDeletion->clear();
            }
            $this->hotlinesScheduledForDeletion[]= clone $hotline;
            $hotline->setEmployees(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Employees is new, it will return
     * an empty collection; or if this Employees has previously
     * been saved, it will retrieve related Hotlines from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Employees.
     *
     * @param      Criteria $criteria optional Criteria object to narrow the query
     * @param      ConnectionInterface $con optional connection object
     * @param      string $joinBehavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return ObjectCollection|ChildHotline[] List of ChildHotline objects
     */
    public function getHotlinesJoinCustomers(Criteria $criteria = null, ConnectionInterface $con = null, $joinBehavior = Criteria::LEFT_JOIN)
    {
        $query = ChildHotlineQuery::create(null, $criteria);
        $query->joinWith('Customers', $joinBehavior);

        return $this->getHotlines($query, $con);
    }

    /**
     * Clears the current object, sets all attributes to their default values and removes
     * outgoing references as well as back-references (from other objects to this one. Results probably in a database
     * change of those foreign objects when you call `save` there).
     */
    public function clear()
    {
        if (null !== $this->aAgencies) {
            $this->aAgencies->removeEmployees($this);
        }
        $this->id_employee = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->email = null;
        $this->phone = null;
        $this->password = null;
        $this->job = null;
        $this->picture = null;
        $this->role = null;
        $this->id_agency = null;
        $this->alreadyInSave = false;
        $this->clearAllReferences();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references and back-references to other model objects or collections of model objects.
     *
     * This method is used to reset all php object references (not the actual reference in the database).
     * Necessary for object serialisation.
     *
     * @param      boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep) {
            if ($this->collHotlines) {
                foreach ($this->collHotlines as $o) {
                    $o->clearAllReferences($deep);
                }
            }
        } // if ($deep)

        $this->collHotlines = null;
        $this->aAgencies = null;
    }

    /**
     * Return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(EmployeesTableMap::DEFAULT_STRING_FORMAT);
    }

    /**
     * Code to be run before persisting the object
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preSave')) {
            return parent::preSave($con);
        }
        return true;
    }

    /**
     * Code to be run after persisting the object
     * @param ConnectionInterface $con
     */
    public function postSave(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postSave')) {
            parent::postSave($con);
        }
    }

    /**
     * Code to be run before inserting to database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preInsert')) {
            return parent::preInsert($con);
        }
        return true;
    }

    /**
     * Code to be run after inserting to database
     * @param ConnectionInterface $con
     */
    public function postInsert(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postInsert')) {
            parent::postInsert($con);
        }
    }

    /**
     * Code to be run before updating the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preUpdate')) {
            return parent::preUpdate($con);
        }
        return true;
    }

    /**
     * Code to be run after updating the object in database
     * @param ConnectionInterface $con
     */
    public function postUpdate(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postUpdate')) {
            parent::postUpdate($con);
        }
    }

    /**
     * Code to be run before deleting the object in database
     * @param  ConnectionInterface $con
     * @return boolean
     */
    public function preDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::preDelete')) {
            return parent::preDelete($con);
        }
        return true;
    }

    /**
     * Code to be run after deleting the object in database
     * @param ConnectionInterface $con
     */
    public function postDelete(ConnectionInterface $con = null)
    {
        if (is_callable('parent::postDelete')) {
            parent::postDelete($con);
        }
    }


    /**
     * Derived method to catches calls to undefined methods.
     *
     * Provides magic import/export method support (fromXML()/toXML(), fromYAML()/toYAML(), etc.).
     * Allows to define default __call() behavior if you overwrite __call()
     *
     * @param string $name
     * @param mixed  $params
     *
     * @return array|string
     */
    public function __call($name, $params)
    {
        if (0 === strpos($name, 'get')) {
            $virtualColumn = substr($name, 3);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }

            $virtualColumn = lcfirst($virtualColumn);
            if ($this->hasVirtualColumn($virtualColumn)) {
                return $this->getVirtualColumn($virtualColumn);
            }
        }

        if (0 === strpos($name, 'from')) {
            $format = substr($name, 4);

            return $this->importFrom($format, reset($params));
        }

        if (0 === strpos($name, 'to')) {
            $format = substr($name, 2);
            $includeLazyLoadColumns = isset($params[0]) ? $params[0] : true;

            return $this->exportTo($format, $includeLazyLoadColumns);
        }

        throw new BadMethodCallException(sprintf('Call to undefined method: %s.', $name));
    }

}
