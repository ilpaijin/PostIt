<?php

namespace PostIt\Application\Commands;

use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Schema\Schema;

/**
 *
 * @package    PostIt
 * @author     Paolo Pietropoli (ilpaijin) <paolo.pietropoli@yieldr.com>
 * @copyright  Paolo Pietropoli
 * @license
 * @version    Release: @package_version@
 */
class Schemas
{
    /**
     *
     * @param  Doctrine\DBAL\Connection $conn
     * @return void
     */
    public static function create(Connection $conn)
    {
        \Doctrine\DBAL\Types\Type::addType('enum', 'PostIt\Application\Commands\Types\Enum');

        $sm = $conn->getSchemaManager();

        $schema = static::getBlogSchemas();

        foreach ($schema->getTables() as $table) {
            $sm->createTable($table);
        }
    }

    /**
     * return the blog shemas
     *
     * @return Doctrine\DBAL\Schema\Schema
     */
    public static function getBlogSchemas()
    {
        $schema = new Schema;

        $users = $schema->createTable('users');
        $users->addColumn('id', 'integer', array("unsigned" => true, 'autoincrement' => true));
        $users->setPrimaryKey(array("id"));
        $users->addColumn('username', 'string', array("length" => 64));
        $users->addColumn('password', 'string', array("length" => 64));
        $users->addUniqueIndex(array("username"));

        $posts = $schema->createTable('posts');
        $posts->addColumn('id', 'integer', array("unsigned" => true, 'autoincrement' => true));
        $posts->setPrimaryKey(array("id"));
        $posts->addColumn('title', 'string', array("length" => 100));
        $posts->addColumn('body', 'text');
        $posts->addColumn('user_id', 'integer', array("unsigned" => true));
        $posts->addColumn('date_created', 'datetime');

        $comments = $schema->createTable('comments');
        $comments->addColumn('id', 'integer', array("unsigned" => true, 'autoincrement' => true));
        $comments->setPrimaryKey(array("id"));
        $comments->addColumn('body', 'string');
        $comments->addColumn('user_id', 'integer', array("unsigned" => true));

        $images = $schema->createTable('images');
        $images->addColumn('id', 'integer', array("unsigned" => true, 'autoincrement' => true));
        $images->setPrimaryKey(array("id"));
        $images->addColumn('post_id', 'integer', array("unsigned" => true, 'notnull' => false));
        $images->addColumn('title', 'string', array("length" => 100));
        $images->addColumn('name', 'string', array("length" => 100));
        $images->addColumn('status', 'enum');

        $posts->addForeignKeyConstraint($users,
            array("user_id"),
            array("id"),
            array("onDelete" => "CASCADE", "onUpdate" => "NO ACTION")
        );

        $comments->addForeignKeyConstraint($users,
            array("user_id"),
            array("id"),
            array("onDelete" => "CASCADE", "onUpdate" => "NO ACTION")
        );

        $images->addForeignKeyConstraint($posts,
            array("post_id"),
            array("id"),
            array("onDelete" => "NO ACTION", "onUpdate" => "NO ACTION")
        );

        return $schema;
    }
}
