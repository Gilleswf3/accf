<?php

namespace Base;

use \Content as ChildContent;
use \ContentQuery as ChildContentQuery;
use \Exception;
use \PDO;
use Map\ContentTableMap;
use Propel\Runtime\Propel;
use Propel\Runtime\ActiveQuery\Criteria;
use Propel\Runtime\ActiveQuery\ModelCriteria;
use Propel\Runtime\Collection\ObjectCollection;
use Propel\Runtime\Connection\ConnectionInterface;
use Propel\Runtime\Exception\PropelException;

/**
 * Base class that represents a query for the 'content' table.
 *
 *
 *
 * @method     ChildContentQuery orderByIdContent($order = Criteria::ASC) Order by the id_content column
 * @method     ChildContentQuery orderByPictureContent($order = Criteria::ASC) Order by the picture_content column
 * @method     ChildContentQuery orderByContentTitle($order = Criteria::ASC) Order by the content_title column
 * @method     ChildContentQuery orderByContentText($order = Criteria::ASC) Order by the content_text column
 *
 * @method     ChildContentQuery groupByIdContent() Group by the id_content column
 * @method     ChildContentQuery groupByPictureContent() Group by the picture_content column
 * @method     ChildContentQuery groupByContentTitle() Group by the content_title column
 * @method     ChildContentQuery groupByContentText() Group by the content_text column
 *
 * @method     ChildContentQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method     ChildContentQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method     ChildContentQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method     ChildContentQuery leftJoinWith($relation) Adds a LEFT JOIN clause and with to the query
 * @method     ChildContentQuery rightJoinWith($relation) Adds a RIGHT JOIN clause and with to the query
 * @method     ChildContentQuery innerJoinWith($relation) Adds a INNER JOIN clause and with to the query
 *
 * @method     ChildContent findOne(ConnectionInterface $con = null) Return the first ChildContent matching the query
 * @method     ChildContent findOneOrCreate(ConnectionInterface $con = null) Return the first ChildContent matching the query, or a new ChildContent object populated from the query conditions when no match is found
 *
 * @method     ChildContent findOneByIdContent(int $id_content) Return the first ChildContent filtered by the id_content column
 * @method     ChildContent findOneByPictureContent(string $picture_content) Return the first ChildContent filtered by the picture_content column
 * @method     ChildContent findOneByContentTitle(string $content_title) Return the first ChildContent filtered by the content_title column
 * @method     ChildContent findOneByContentText(string $content_text) Return the first ChildContent filtered by the content_text column *

 * @method     ChildContent requirePk($key, ConnectionInterface $con = null) Return the ChildContent by primary key and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContent requireOne(ConnectionInterface $con = null) Return the first ChildContent matching the query and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContent requireOneByIdContent(int $id_content) Return the first ChildContent filtered by the id_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContent requireOneByPictureContent(string $picture_content) Return the first ChildContent filtered by the picture_content column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContent requireOneByContentTitle(string $content_title) Return the first ChildContent filtered by the content_title column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 * @method     ChildContent requireOneByContentText(string $content_text) Return the first ChildContent filtered by the content_text column and throws \Propel\Runtime\Exception\EntityNotFoundException when not found
 *
 * @method     ChildContent[]|ObjectCollection find(ConnectionInterface $con = null) Return ChildContent objects based on current ModelCriteria
 * @method     ChildContent[]|ObjectCollection findByIdContent(int $id_content) Return ChildContent objects filtered by the id_content column
 * @method     ChildContent[]|ObjectCollection findByPictureContent(string $picture_content) Return ChildContent objects filtered by the picture_content column
 * @method     ChildContent[]|ObjectCollection findByContentTitle(string $content_title) Return ChildContent objects filtered by the content_title column
 * @method     ChildContent[]|ObjectCollection findByContentText(string $content_text) Return ChildContent objects filtered by the content_text column
 * @method     ChildContent[]|\Propel\Runtime\Util\PropelModelPager paginate($page = 1, $maxPerPage = 10, ConnectionInterface $con = null) Issue a SELECT query based on the current ModelCriteria and uses a page and a maximum number of results per page to compute an offset and a limit
 *
 */
abstract class ContentQuery extends ModelCriteria
{
    protected $entityNotFoundExceptionClass = '\\Propel\\Runtime\\Exception\\EntityNotFoundException';

    /**
     * Initializes internal state of \Base\ContentQuery object.
     *
     * @param     string $dbName The database name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'default', $modelName = '\\Content', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new ChildContentQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param     Criteria $criteria Optional Criteria to build the query from
     *
     * @return ChildContentQuery
     */
    public static function create($modelAlias = null, Criteria $criteria = null)
    {
        if ($criteria instanceof ChildContentQuery) {
            return $criteria;
        }
        $query = new ChildContentQuery();
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
     * @return ChildContent|array|mixed the result, formatted by the current formatter
     */
    public function findPk($key, ConnectionInterface $con = null)
    {
        if ($key === null) {
            return null;
        }

        if ($con === null) {
            $con = Propel::getServiceContainer()->getReadConnection(ContentTableMap::DATABASE_NAME);
        }

        $this->basePreSelect($con);

        if (
            $this->formatter || $this->modelAlias || $this->with || $this->select
            || $this->selectColumns || $this->asColumns || $this->selectModifiers
            || $this->map || $this->having || $this->joins
        ) {
            return $this->findPkComplex($key, $con);
        }

        if ((null !== ($obj = ContentTableMap::getInstanceFromPool(null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key)))) {
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
     * @return ChildContent A model object, or null if the key is not found
     */
    protected function findPkSimple($key, ConnectionInterface $con)
    {
        $sql = 'SELECT id_content, picture_content, content_title, content_text FROM content WHERE id_content = :p0';
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
            /** @var ChildContent $obj */
            $obj = new ChildContent();
            $obj->hydrate($row);
            ContentTableMap::addInstanceToPool($obj, null === $key || is_scalar($key) || is_callable([$key, '__toString']) ? (string) $key : $key);
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
     * @return ChildContent|array|mixed the result, formatted by the current formatter
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
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_content column
     *
     * Example usage:
     * <code>
     * $query->filterByIdContent(1234); // WHERE id_content = 1234
     * $query->filterByIdContent(array(12, 34)); // WHERE id_content IN (12, 34)
     * $query->filterByIdContent(array('min' => 12)); // WHERE id_content > 12
     * </code>
     *
     * @param     mixed $idContent The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByIdContent($idContent = null, $comparison = null)
    {
        if (is_array($idContent)) {
            $useMinMax = false;
            if (isset($idContent['min'])) {
                $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $idContent['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idContent['max'])) {
                $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $idContent['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $idContent, $comparison);
    }

    /**
     * Filter the query on the picture_content column
     *
     * Example usage:
     * <code>
     * $query->filterByPictureContent('fooValue');   // WHERE picture_content = 'fooValue'
     * $query->filterByPictureContent('%fooValue%', Criteria::LIKE); // WHERE picture_content LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pictureContent The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByPictureContent($pictureContent = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pictureContent)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentTableMap::COL_PICTURE_CONTENT, $pictureContent, $comparison);
    }

    /**
     * Filter the query on the content_title column
     *
     * Example usage:
     * <code>
     * $query->filterByContentTitle('fooValue');   // WHERE content_title = 'fooValue'
     * $query->filterByContentTitle('%fooValue%', Criteria::LIKE); // WHERE content_title LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contentTitle The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByContentTitle($contentTitle = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contentTitle)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentTableMap::COL_CONTENT_TITLE, $contentTitle, $comparison);
    }

    /**
     * Filter the query on the content_text column
     *
     * Example usage:
     * <code>
     * $query->filterByContentText('fooValue');   // WHERE content_text = 'fooValue'
     * $query->filterByContentText('%fooValue%', Criteria::LIKE); // WHERE content_text LIKE '%fooValue%'
     * </code>
     *
     * @param     string $contentText The value to use as filter.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function filterByContentText($contentText = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($contentText)) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(ContentTableMap::COL_CONTENT_TEXT, $contentText, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   ChildContent $content Object to remove from the list of results
     *
     * @return $this|ChildContentQuery The current query, for fluid interface
     */
    public function prune($content = null)
    {
        if ($content) {
            $this->addUsingAlias(ContentTableMap::COL_ID_CONTENT, $content->getIdContent(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

    /**
     * Deletes all rows from the content table.
     *
     * @param ConnectionInterface $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).
     */
    public function doDeleteAll(ConnectionInterface $con = null)
    {
        if (null === $con) {
            $con = Propel::getServiceContainer()->getWriteConnection(ContentTableMap::DATABASE_NAME);
        }

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con) {
            $affectedRows = 0; // initialize var to track total num of affected rows
            $affectedRows += parent::doDeleteAll($con);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            ContentTableMap::clearInstancePool();
            ContentTableMap::clearRelatedInstancePool();

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
            $con = Propel::getServiceContainer()->getWriteConnection(ContentTableMap::DATABASE_NAME);
        }

        $criteria = $this;

        // Set the correct dbName
        $criteria->setDbName(ContentTableMap::DATABASE_NAME);

        // use transaction because $criteria could contain info
        // for more than one table or we could emulating ON DELETE CASCADE, etc.
        return $con->transaction(function () use ($con, $criteria) {
            $affectedRows = 0; // initialize var to track total num of affected rows

            ContentTableMap::removeInstanceFromPool($criteria);

            $affectedRows += ModelCriteria::delete($con);
            ContentTableMap::clearRelatedInstancePool();

            return $affectedRows;
        });
    }

} // ContentQuery
