UPGRADE FROM 2.16 to 2.17
=========================

Configuration
-------------

### The `doctrine.orm.entity_managers.some_em.report_fields_where_declared` configuration option is deprecated

This option is a no-op when using `doctrine/orm` 3 and has been conditionally
deprecated. You should stop using it as soon as you upgrade to Doctrine ORM 3.
