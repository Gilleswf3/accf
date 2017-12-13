<?php

namespace Model\Propel;

use Model\Propel\Base\ContentQuery as BaseContentQuery;
use Propel\Runtime\ActiveQuery\Criteria;



class ContentQuery extends BaseContentQuery
{
    public function getContentsWithPicture(){
         return self::create()->filterByPictureContent(NULL, Criteria::NOT_EQUAL);
    }
}
