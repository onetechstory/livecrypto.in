<?php
 namespace MailPoetVendor\Doctrine\ORM\Tools\Pagination; if (!defined('ABSPATH')) exit; use MailPoetVendor\Doctrine\DBAL\Platforms\AbstractPlatform; use MailPoetVendor\Doctrine\ORM\Query; use MailPoetVendor\Doctrine\ORM\Query\AST\SelectStatement; use MailPoetVendor\Doctrine\ORM\Query\ParserResult; use MailPoetVendor\Doctrine\ORM\Query\ResultSetMapping; use MailPoetVendor\Doctrine\ORM\Query\SqlWalker; use RuntimeException; use function array_diff; use function array_keys; use function count; use function implode; use function reset; use function sprintf; class CountOutputWalker extends SqlWalker { private $platform; private $rsm; private $queryComponents; public function __construct($query, $parserResult, array $queryComponents) { $this->platform = $query->getEntityManager()->getConnection()->getDatabasePlatform(); $this->rsm = $parserResult->getResultSetMapping(); $this->queryComponents = $queryComponents; parent::__construct($query, $parserResult, $queryComponents); } public function walkSelectStatement(SelectStatement $AST) { if ($this->platform->getName() === 'mssql') { $AST->orderByClause = null; } $sql = parent::walkSelectStatement($AST); if ($AST->groupByClause) { return sprintf('SELECT %s AS dctrn_count FROM (%s) dctrn_table', $this->platform->getCountExpression('*'), $sql); } $from = $AST->fromClause->identificationVariableDeclarations; if (count($from) > 1) { throw new RuntimeException('Cannot count query which selects two FROM components, cannot make distinction'); } $fromRoot = reset($from); $rootAlias = $fromRoot->rangeVariableDeclaration->aliasIdentificationVariable; $rootClass = $this->queryComponents[$rootAlias]['metadata']; $rootIdentifier = $rootClass->identifier; $sqlIdentifier = []; foreach ($rootIdentifier as $property) { if (isset($rootClass->fieldMappings[$property])) { foreach (array_keys($this->rsm->fieldMappings, $property) as $alias) { if ($this->rsm->columnOwnerMap[$alias] === $rootAlias) { $sqlIdentifier[$property] = $alias; } } } if (isset($rootClass->associationMappings[$property])) { $joinColumn = $rootClass->associationMappings[$property]['joinColumns'][0]['name']; foreach (array_keys($this->rsm->metaMappings, $joinColumn) as $alias) { if ($this->rsm->columnOwnerMap[$alias] === $rootAlias) { $sqlIdentifier[$property] = $alias; } } } } if (count($rootIdentifier) !== count($sqlIdentifier)) { throw new RuntimeException(sprintf('Not all identifier properties can be found in the ResultSetMapping: %s', implode(', ', array_diff($rootIdentifier, array_keys($sqlIdentifier))))); } return sprintf('SELECT %s AS dctrn_count FROM (SELECT DISTINCT %s FROM (%s) dctrn_result) dctrn_table', $this->platform->getCountExpression('*'), implode(', ', $sqlIdentifier), $sql); } } 