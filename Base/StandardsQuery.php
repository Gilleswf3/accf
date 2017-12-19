<?php

namespace Base;

use \Standards as ChildStandards;
use \StandardsQuery as ChildStandardsQuery;
use \Exception;
use \PDO;
use Map\StandardsTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\ActiveQuery\ModelJoin;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'standards' table.
 *
 *
 *
 * @method     ChildStandardsQuery orderByIdStandard($order = Criteria::ASC) Order by the id_standard column
 * @method     ChildStandardsQuery orderByTitle($order = Criteria::ASC) Order by the title column
 * @method     ChildStandardsQuery orderBySubtitle($order = Criteria::ASC) Order by the subtitle column
 * @method     ChildStandardsQuery orderByDescription($order = Criteria::ASC) Order by the description column
 * @method     ChildStandardsQuery orderByIdEmployee($order = Criteria::ASC) Order by the id_employee column
 *
 * @method     ChildStandardsQuery groupByIdStandard() Group by the id_standard column
 * @method     ChildStandardsQuery groupByTitle() Group by the title column
 * @method     ChildStandardsQuery groupBySubtitle() Group by the subtitle column
 * @method     ChildStandardsQuery groupByDescription() Group by the description column
 * @method     ChildStandardsQuery groupByIdEmployee() Group by the id_employee column
 *
 * @method     ChildStandardsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildStandardsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildStandardsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildStandardsQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildStandardsQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildStandardsQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildStandardsQuery leftJoinEmployees($relationAlias = null) Adds a LEFT JOIN clause to the query using the Employees relation
 * @method     ChildStandardsQuery rightJoinEmployees($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Employees relation
 * @method     ChildStandardsQuery innerJoinEmployees($relationAlias = null) Adds a INNER JOIN clause to the query using the Employees relation
 *
 * @method     ChildStandardsQuery joinWithEmployees($joinType = Criteria::INNER_JOIN) Adds a join clause and with to the query using the Employees relation
 *
 * @method     ChildStandardsQuery leftJoinWithEmployees() Adds a LEFT JOIN clause and with to the query using the Employees relation
 * @method     ChildStandardsQuery rightJoinWithEmployees() Adds a RIGHT JOIN clause and with to the query using the Employees relation
 * @method     ChildStandardsQuery innerJoinWithEmployees() Adds a INNER JOIN clause and with to the query using the Employees relation
 *
 * @method     \EmployeesQuery endUse() Finalizes a secondary criteria and merges it with its primary Criteria
 *
 * @method     ChildStandards findOne(ConnectionInterface $con = null) Return the first ChildStandards matching the query
 * @method     ChildStandards findOneOrCreate(ConnectionInterface $con = null) Return the first ChildStandards matching the query, or a new ChildStandards object populated from the query conditions when no match is found
 *
 * @method     ChildStandards findOneByIdStandard(int $id_standard) Return the first ChildStandards filtered by the id_standard column
 * @method     ChildStandards findOneByTitle(string $title) Return the first ChildStandards filtered by the title column
 * @method     ChildStandards findOneBySubtitle(string $subtitle) Return the first ChildStandards filtered by the subtitle column
 * @method     ChildStandards findOneByDescription(string $description) Return the first ChildStandards filtered by the description column
 * @method     ChildStandards findOneByIdEmployee(int $id_employee) Return the first ChildStandards filtered by the id_employee column *

 * @method     ChildStandards requirePk($key, ConnectionInterface $con = null) Return the ChildStandards by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStandards requireOne(ConnectionInterface $con = null) Return the first ChildStandards matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStandards requireOneByIdStandard(int $id_standard) Return the first ChildStandards filtered by the id_standard column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStandards requireOneByTitle(string $title) Return the first ChildStandards filtered by the title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStandards requireOneBySubtitle(string $subtitle) Return the first ChildStandards filtered by the subtitle column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStandards requireOneByDescription(string $description) Return the first ChildStandards filtered by the description column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildStandards requireOneByIdEmployee(int $id_employee) Return the first ChildStandards filtered by the id_employee column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildStandards[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildStandards objects based on current ModelCriteria
 * @method     ChildStandards[]|ObjectCollection findByIdStandard(int $id_standard) Return ChildStandards objects filtered by the id_standard column
 * @method     ChildStandards[]|ObjectCollection findByTitle(string $title) Return ChildStandards objects filtered by the title column
 * @method     ChildStandards[]|ObjectCollection findBySubtitle(string $subtitle) Return ChildStandards objects filtered by the subtitle column
 * @method     ChildStandards[]|ObjectCollection findByDescription(string $description) Return ChildStandards objects filtered by the description column
 * @method     ChildStandards[]|ObjectCollection findByIdEmployee(int $id_employee) Return ChildStandards objects filtered by the id_employee column
 * @method     ChildStandards[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class StandardsQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\StandardsQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Standards', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildStandardsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildStandardsQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildStandardsQuery) {
            return $criteria;
        }
        $query = new ChildStandardsQuery();
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
     * @return ChildStandards|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(StandardsTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = StandardsTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildStandards A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_standard, title, subtitle, description, id_employee FROM standards WHERE id_standard = :p0';
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
            /** @var ChildStandards $obj */
            $obj = new ChildStandards();
            $obj->hydrate($row);
            StandardsTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildStandards|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_standard column
     *
     * Example usage:
     * <code>
     * $query->filterByIdStandard(1234); // WHERE id_standard = 1234
     * $query->filterByIdStandard(array(12, 34)); // WHERE id_standard IN (12, 34)
     * $query->filterByIdStandard(array('min' => 12)); // WHERE id_standard > 12
     * </code>
     *
     * @param     mixed $idStandard The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByIdStandard($idStandard = null, $comparison = null)
    {
        if (is_array($idStandard)) {
            $useMinMax = false;
            if (isset($idStandard['min'])) {
                $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $idStandard['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idStandard['max'])) {
                $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $idStandard['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $idStandard, $comparison);
    }

    /**
     * Filter the query on the title column
     *
     * Example usage:
     * <code>
     * $query->filterByTitle('fooValue');   // WHERE title = 'fooValue'
     * $query->filterByTitle('%fooValue%', Criteria::LIKE); // WHERE title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $title The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByTitle($title = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($title)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandardsTableMap::COL_TITLE, $title, $comparison);
    }

    /**
     * Filter the query on the subtitle column
     *
     * Example usage:
     * <code>
     * $query->filterBySubtitle('fooValue');   // WHERE subtitle = 'fooValue'
     * $query->filterBySubtitle('%fooValue%', Criteria::LIKE); // WHERE subtitle LIKE '%fooValue%'
     * </code>
     *
     * @param     string $subtitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterBySubtitle($subtitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($subtitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandardsTableMap::COL_SUBTITLE, $subtitle, $comparison);
    }

    /**
     * Filter the query on the description column
     *
     * Example usage:
     * <code>
     * $query->filterByDescription('fooValue');   // WHERE description = 'fooValue'
     * $query->filterByDescription('%fooValue%', Criteria::LIKE); // WHERE description LIKE '%fooValue%'
     * </code>
     *
     * @param     string $description The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByDescription($description = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($description)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandardsTableMap::COL_DESCRIPTION, $description, $comparison);
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
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByIdEmployee($idEmployee = null, $comparison = null)
    {
        if (is_array($idEmployee)) {
            $useMinMax = false;
            if (isset($idEmployee['min'])) {
                $this->addUsingAlias(StandardsTableMap::COL_ID_EMPLOYEE, $idEmployee['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idEmployee['max'])) {
                $this->addUsingAlias(StandardsTableMap::COL_ID_EMPLOYEE, $idEmployee['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StandardsTableMap::COL_ID_EMPLOYEE, $idEmployee, $comparison);
    }

    /**
     * Filter the query by a related \Employees object
     *
     * @param \Employees|ObjectCollection $employees The related object(s) to use as filter
     * @param string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @throws \Propel\Runtime\Exception\PropelException
     *
     * @return ChildStandardsQuery The current query, for fluid interface
     */
    public function filterByEmployees($employees, $comparison = null)
    {
        if ($employees instanceof \Employees) {
            return $this
                ->addUsingAlias(StandardsTableMap::COL_ID_EMPLOYEE, $employees->getIdEmployee(), $comparison);
        } elseif ($employees instanceof ObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(StandardsTableMap::COL_ID_EMPLOYEE, $employees->toKeyValue('PrimaryKey', 'IdEmployee'), $comparison);
        } else {
            throw new PropelException('filterByEmployees() only accepts arguments of type \Employees or Collection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Employees relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
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
     * @return \EmployeesQuery A secondary query class using the current class as primary query
     */
    public function useEmployeesQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinEmployees($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Employees', '\EmployeesQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   ChildStandards $standards Object to remove from the list of results
     *
     * @return $this|ChildStandardsQuery The current query, for fluid interface
     */
    public function prune($standards = null)
    {
        if ($standards) {
            $this->addUsingAlias(StandardsTableMap::COL_ID_STANDARD, $standards->getIdStandard(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the standards table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(StandardsTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            StandardsTableMap::clearInstancePool();
            StandardsTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(StandardsTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(StandardsTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            StandardsTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            StandardsTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // StandardsQuery
