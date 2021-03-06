<?php

namespace Propel\Tests\Issues;

use Propel\Tests\TestCase;
use Propel\Generator\Util\QuickBuilder;

/**
 * This test proves the bug described in https://github.com/propelorm/Propel2/issues/989.
 * 
 * @group database
 */
class Issue989Test extends TestCase
{
    protected function setUp()
    {
        parent::setUp();
        if (!class_exists('\Nature')) {
            $schema = '
            <database>
                <table name="recherche" phpName="Recherche">
                    <column name="id" type="integer" primaryKey="true" autoIncrement="true"/>
                </table>

                <table name="recherche_nature" phpName="RechercheNature" isCrossRef="true">
                    <column name="recherche_id" type="integer" primaryKey="true"/>
                    <column name="nature_id" type="integer" primaryKey="true"/>
                    <foreign-key foreignTable="recherche" onDelete="cascade">
                        <reference local="recherche_id" foreign="id"/>
                    </foreign-key>
                    <foreign-key foreignTable="nature">
                        <reference local="nature_id" foreign="id"/>
                    </foreign-key>
                </table>

                <table name="nature" phpName="Nature">
                    <column name="id" type="integer" primaryKey="true" autoIncrement="true"/>
                </table>
            </database>
            ';
            QuickBuilder::buildSchema($schema);
        }
    }
    
    public function testIssue989()
    {
        $nature = new \Nature();
        $nature->save();

        // RechercheNature
        $rechercheNature = new \RechercheNature();
        $rechercheNature->setNatureId($nature->getId());

        // Collection
        $collection = new \Propel\Runtime\Collection\ObjectCollection();
        $collection->setModel('\RechercheNature');
        $collection->setData(array($rechercheNature));

        // Recherche
        $recherche = new \Recherche();
        $recherche->setRechercheNatures($collection);
        
        $countBeforeSave = $recherche->countRechercheNatures(); 

        $recherche->save();

        $countAfterSave = $recherche->countRechercheNatures();
        
        $this->assertEquals($countBeforeSave, $countAfterSave);
    }
}