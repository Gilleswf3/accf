<?php

namespace Model\Propel\Base;

use \Exception;
use \PDO;
use Model\Propel\Tchat as ChildTchat;
use Model\Propel\TchatQuery as ChildTchatQuery;
use Model\Propel\Map\TchatTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'tchat' table.
 *
 *
 *
 * @method     ChildTchatQuery orderByIdTchat($order = Criteria::ASC) Order by the id_tchat column
 * @method     ChildTchatQuery orderByMessage($order = Criteria::ASC) Order by the message column
 * @method     ChildTchatQuery orderByIdCustomer($order = Criteria::ASC) Order by the id_customer column
 * @method     ChildTchatQuery orderByIdEmployee($order = Criteria::ASC) Order by the id_employee column
 *
 * @method     ChildTchatQuery groupByIdTchat() Group by the id_tchat column
 * @method     ChildTchatQuery groupByMessage() Group by the message column
 * @method     ChildTchatQuery groupByIdCustomer() Group by the id_customer column
 * @method     ChildTchatQuery groupByIdEmployee() Group by the id_employee column
 *
 * @method     ChildTchatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildTchatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildTchatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildTchatQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildTchatQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildTchatQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildTchatQuery leftJoinEmployees($relationAlias = null) Adds a LEFT JOIN clause to the query using the Employees relation
 * @method     ChildTchatQuery rightJoinEmployees($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Employees relation
 * @method     ChildTchatQuery innerJoinEmployees($relationAlias = null) Adds a INNER JOIN clause to the query using the Employees relation
 *
 * @method     ChildTchatQuery joinWithEmployees($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Employees relation
 *
 * @method     ChildTchatQuery leftJoinWithEmployees() Adds a LEFT JOIN clause and with to the query using the Employees relation
 * @method     ChildTchatQuery rightJoinWithEmployees() Adds a RIGHT JOIN clause and with to the query using the Employees relation
 * @method     ChildTchatQuery innerJoinWithEmployees() Adds a INNER JOIN clause and with to the query using the Employees relation
 *
 * @method     ChildTchatQuery leftJoinCustomers($relationAlias = null) Adds a LEFT JOIN clause to the query using the Customers relation
 * @method     ChildTchatQuery rightJoinCustomers($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Customers relation
 * @method     ChildTchatQuery innerJoinCustomers($relationAlias = null) Adds a INNER JOIN clause to the query using the Customers relation
 *
 * @method     ChildTchatQuery joinWithCustomers($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Customers relation
 *
 * @method     ChildTchatQuery leftJoinWithCustomers() Adds a LEFT JOIN clause and with to the query using the Customers relation
 * @method     ChildTchatQuery rightJoinWithCustomers() Adds a RIGHT JOIN clause and with to the query using the Customers relation
 * @method     ChildTchatQuery innerJoinWithCustomers() Adds a INNER JOIN clause and with to the query using the Customers relation
 *
 * @method     \Model\Propel\EmployeesQuery|\Model\Propel\CustomersQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildTchat findOne(ConnectionInterface $con = null) Return the first ChildTchat matching the query
 * @method     ChildTchat findOneOrCreate(ConnectionInterface $con = null) Return the first ChildTchat matching the query, or a new ChildTchat object populated from the query conditions when no match is found
 *
 * @method     ChildTchat findOneByIdTchat(int $id_tchat) Return the first ChildTchat filtered by the id_tchat column
 * @method     ChildTchat findOneByMessage(string $message) Return the first ChildTchat filtered by the message column
 * @method     ChildTchat findOneByIdCustomer(int $id_customer) Return the first ChildTchat filtered by the id_customer column
 * @method     ChildTchat findOneByIdEmployee(int $id_employee) Return the first ChildTchat filtered by the id_employee column *

 * @method     ChildTchat requirePk($key, ConnectionInterface $con = null) Return the ChildTchat by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTchat requireOne(ConnectionInterface $con = null) Return the first ChildTchat matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTchat requireOneByIdTchat(int $id_tchat) Return the first ChildTchat filtered by the id_tchat column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTchat requireOneByMessage(string $message) Return the first ChildTchat filtered by the message column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTchat requireOneByIdCustomer(int $id_customer) Return the first ChildTchat filtered by the id_customer column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildTchat requireOneByIdEmployee(int $id_employee) Return the first ChildTchat filtered by the id_employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildTchat[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildTchat objects based on current ModelCriteria
 * @method     ChildTchat[]|ObjectCollection findByIdTchat(int $id_tchat) Return ChildTchat objects filtered by the id_tchat column
 * @method     ChildTchat[]|ObjectCollection findByMessage(string $message) Return ChildTchat objects filtered by the message column
 * @method     ChildTchat[]|ObjectCollection findByIdCustomer(int $id_customer) Return ChildTchat objects filtered by the id_customer column
 * @method     ChildTchat[]|ObjectCollection findByIdEmployee(int $id_employee) Return ChildTchat objects filtered by the id_employee column
 * @method     ChildTchat[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class TchatQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Model\Propel\Base\TchatQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Model\\Propel\\Tchat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildTchatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildTchatQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildTchatQuery) {
            return $criteria;
        }
        $query = new ChildTchatQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query
     * @param ConnectionInterface $con an optional connection object
     *
     * @return ChildTchat|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(TchatTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = TchatTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
            // the object is already in the instance pool
            return $obj;
        }

        return $this->findPkSimple($key, $con);
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTchat A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_tchat, message, id_customer, id_employee FROM tchat WHERE id_tchat = :p0';
        try {
            $stmt = $con->prepare($sql);
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), 0, $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(\PDO::FETCH_NUM)) {
            /** @var ChildTchat $obj */
            $obj = new ChildTchat();
            $obj->hydrate($row);
            TchatTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     ConnectionInterface $con A connection object
     *
     * @return ChildTchat|array|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, ConnectionInterface $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($dataFetcher);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     ConnectionInterface $con an optional connection object
     *
     * @return ObjectCollection|array|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getReadConnection($this->getDbName());
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $dataFetcher = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($dataFetcher);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tchat column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTchat(1234); // WHERE id_tchat = 1234
     * $query->filterByIdTchat(array(12, 34)); // WHERE id_tchat IN (12, 34)
     * $query->filterByIdTchat(array('min' => 12)); // WHERE id_tchat > 12
     * </code>
     *
     * @param     mixed $idTchat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByIdTchat($idTchat = null, $comparison = null)
    {
        if (is_array($idTchat)) {
            $useMinMax = false;
            if (isset($idTchat['min'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $idTchat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idTchat['max'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $idTchat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $idTchat, $comparison);
    }

    /**
     * Filter the query on the message column
     *
     * Example usage:
     * <code>
     * $query->filterByMessage('fooValue');   // WHERE message = 'fooValue'
     * $query->filterByMessage('%fooValue%', Criteria::LIKE); // WHERE message LIKE '%fooValue%'
     * </code>
     *
     * @param     string $message The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByMessage($message = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($message)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TchatTableMap::COL_MESSAGE, $message, $comparison);
    }

    /**
     * Filter the query on the id_customer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCustomer(1234); // WHERE id_customer = 1234
     * $query->filterByIdCustomer(array(12, 34)); // WHERE id_customer IN (12, 34)
     * $query->filterByIdCustomer(array('min' => 12)); // WHERE id_customer > 12
     * </code>
     *
     * @see       filterByCustomers()
     *
     * @param     mixed $idCustomer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByIdCustomer($idCustomer = null, $comparison = null)
    {
        if (is_array($idCustomer)) {
            $useMinMax = false;
            if (isset($idCustomer['min'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_CUSTOMER, $idCustomer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCustomer['max'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_CUSTOMER, $idCustomer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TchatTableMap::COL_ID_CUSTOMER, $idCustomer, $comparison);
    }

    /**
     * Filter the query on the id_employee column
     *
     * Example usage:
     * <code>
     * $query->filterByIdEmployee(1234); // WHERE id_employee = 1234
     * $query->filterByIdEmployee(array(12, 34)); // WHERE id_employee IN (12, 34)
     * $query->filterByIdEmployee(array('min' => 12)); // WHERE id_employee > 12
     * </code>
     *
     * @see       filterByEmployees()
     *
     * @param     mixed $idEmployee The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function filterByIdEmployee($idEmployee = null, $comparison = null)
    {
        if (is_array($idEmployee)) {
            $useMinMax = false;
            if (isset($idEmployee['min'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_EMPLOYEE, $idEmployee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEmployee['max'])) {
                $this->addUsingAlias(TchatTableMap::COL_ID_EMPLOYEE, $idEmployee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TchatTableMap::COL_ID_EMPLOYEE, $idEmployee, $comparison);
    }

    /**
     * Filter the query by a related \Model\Propel\Employees object
     *
     * @param \Model\Propel\Employees|ObjectCollection $employees The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTchatQuery The current query, for fluid interface
     */
    public function filterByEmployees($employees, $comparison = null)
    {
        if ($employees instanceof \Model\Propel\Employees) {
            return $this
                ->addUsingAlias(TchatTableMap::COL_ID_EMPLOYEE, $employees->getIdEmployee(), $comparison);
        } elseif ($employees instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TchatTableMap::COL_ID_EMPLOYEE, $employees->toKeyValue('PrimaryKey', 'IdEmployee'), $comparison);
        } else {
            throw new PropelException('filterByEmployees() only accepts arguments of type \Model\Propel\Employees or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Employees relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function joinEmployees($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Employees');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Employees');
        }

        return $this;
    }

    /**
     * Use the Employees relation Employees object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\EmployeesQuery A secondary query class using the current class as primary query
     */
    public function useEmployeesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmployees($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Employees', '\Model\Propel\EmployeesQuery');
    }

    /**
     * Filter the query by a related \Model\Propel\Customers object
     *
     * @param \Model\Propel\Customers|ObjectCollection $customers The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildTchatQuery The current query, for fluid interface
     */
    public function filterByCustomers($customers, $comparison = null)
    {
        if ($customers instanceof \Model\Propel\Customers) {
            return $this
                ->addUsingAlias(TchatTableMap::COL_ID_CUSTOMER, $customers->getIdCustomer(), $comparison);
        } elseif ($customers instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TchatTableMap::COL_ID_CUSTOMER, $customers->toKeyValue('PrimaryKey', 'IdCustomer'), $comparison);
        } else {
            throw new PropelException('filterByCustomers() only accepts arguments of type \Model\Propel\Customers or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Customers relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function joinCustomers($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Customers');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Customers');
        }

        return $this;
    }

    /**
     * Use the Customers relation Customers object
     *
     * @see useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return \Model\Propel\CustomersQuery A secondary query class using the current class as primary query
     */
    public function useCustomersQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinCustomers($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Customers', '\Model\Propel\CustomersQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildTchat $tchat Object to remove from the list of results
     *
     * @return $this|ChildTchatQuery The current query, for fluid interface
     */
    public function prune($tchat = null)
    {
        if ($tchat) {
            $this->addUsingAlias(TchatTableMap::COL_ID_TCHAT, $tchat->getIdTchat(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the tchat table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TchatTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            TchatTableMap::clearInstancePool();
            TchatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

    /**
     * Performs a DELETE on the database based on the current ModelCriteria
     *
     * @param ConnectionInterface $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *                         if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *                         rethrown wrapped into a PropelException.
     */
    public function delete(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(TchatTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(TchatTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            TchatTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            TchatTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // TchatQuery
