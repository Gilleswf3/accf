<?php

namespace Propel\Tests\Runtime\ActiveQuery;

use Propel\Runtime\ActiveQuery\ModelCriteria;

class TestableModelCriteria extends ModelCriteria
{
    public $joins = [];

    public function replaceNames(&$sql)
    {
        return parent::replaceNames($sql);
    }

}
