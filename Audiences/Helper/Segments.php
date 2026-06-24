<?php

/*
 * This file is part of Numbers Framework.
 *
 * (c) Volodymyr Volynets <volodymyr.volynets@gmail.com>
 *
 * This source file is subject to the Apache 2.0 license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Numbers\Audiences\Audiences\Helper;

use Numbers\Backend\Db\Common\Model\Shareable\Fields as ShareableFields;
use Numbers\Audiences\Audiences\Model\Contacts;

class Segments
{
    /**
     * @var array|null
     */
    public static array|null $shareable_fields = null;

    /**
     * Convert segment to SQL
     *
     * @param int|null $au_segment_id
     * @param array $options
     *      array data
     * @return string
     */
    public static function convertSegmentToSQL(int|null $au_segment_id, array $options = []): string
    {
        // preload shareable fields
        if (self::$shareable_fields === null) {
            self::$shareable_fields = ShareableFields::getStatic([
                'where' => [
                    'sm_sharefield_module_code' => ['AU', 'SM']
                ],
                'pk' => ['sm_sharefield_code'],
            ]);
        }
        // load segment
        $segment = $au_segment_id ? self::loadByID($au_segment_id) : $options['data'];
        // process groups
        $groups = [];
        $empty_groups = [];
        // 1st round to gather groups
        foreach ($segment['\Numbers\Audiences\Audiences\Model\Segment\Details'] as $k => $v) {
            if ($v['au_segdetail_field'] == '__au_group') {
                // if we have group within a group
                if (strpos($v['au_segdetail_group'] ?? '', '-') !== false) {
                    $all_group_key = $group_key = explode('-', $v['au_segdetail_group'] ?? '__MAIN__');
                    unset($group_key[array_key_last($group_key)]);
                    $new_key = [];
                    foreach ($all_group_key as $v2) {
                        $new_key[] = $v2;
                        $new_key[] = 'options';
                    }
                    array_key_set($groups, $new_key, [
                        'order' => $v['au_segdetail_order'],
                        'operator' => $v['au_segdetail_operator'],
                    ]);
                    $empty_groups[implode('-', $all_group_key)] = $k;
                    unset($empty_groups[implode('-', $group_key)]);
                } else {
                    $groups[$v['au_segdetail_group']] = [
                        'order' => $v['au_segdetail_order'],
                        'operator' => $v['au_segdetail_operator'],
                    ];
                    $empty_groups[$v['au_segdetail_group']] = $k;
                }
            }
        }
        // 2nd round to gather nodes
        foreach ($segment['\Numbers\Audiences\Audiences\Model\Segment\Details'] as $k => $v) {
            if ($v['au_segdetail_field'] != '__au_group') {
                $all_group_key = $group_key = explode('-', $v['au_segdetail_group'] ?? '__MAIN__');
                unset($group_key[array_key_last($group_key)]);
                $new_key = [];
                foreach ($all_group_key as $v2) {
                    $new_key[] = $v2;
                    $new_key[] = 'options';
                }
                array_pop($new_key);
                // process values
                $value_ids = $v['\Numbers\Audiences\Audiences\Model\Segment\Detail\ValuesIDs'] ?? [];
                if (!is_numeric_key_array($value_ids)) {
                    $value_ids = array_extract_values_by_key($value_ids, 'au_segdetvalids_value_id');
                }
                array_key_set($groups, $new_key, [
                    'order' => $v['au_segdetail_order'],
                    'is_node' => true,
                    'operator' => $v['au_segdetail_operator'],
                    'field' => $v['au_segdetail_field'],
                    'shareable' => self::$shareable_fields[$v['au_segdetail_field']],
                    'values' => $v,
                    'value_ids' => $value_ids,
                ]);
                unset($empty_groups[implode('-', $group_key)]);
            }
        }
        // create query builder object
        $query = Contacts::queryBuilderStatic(['alias' => 'au_contacts_from_segments'])->select();
        if (!empty($options['columns'])) {
            $query = $query->columns($options['columns']);
        }
        foreach ($groups as $k => $v) {
            $reference_parent = null;
            self::queryAttachWhere($k, $v, $query, $reference_parent, [
                'alias' => 'au_contacts_from_segments',
                'model' => \Factory::model(Contacts::class, true),
                'class' => Contacts::class,
            ]);
        }
        return $query->sql();
    }

    /**
     * Query attach where
     *
     * @param string $key
     * @param array $data
     * @param mixed $reference_query
     * @param mixed $reference_parent
     * @param array $options
     * @throws \Exception
     * @return void
     */
    protected static function queryAttachWhere(string $key, array $data, & $reference_query, & $reference_parent, array $options = []): void
    {
        // determine next model
        if ($reference_parent !== null) {
            $query_main = & $reference_parent;
        } else {
            $query_main = & $reference_query;
        }
        if (!empty($data['options'])) {
            $query_main->where($data['operator'], function ($query) use ($data, $reference_query, $options) {
                foreach ($data['options'] as $k => $v) {
                    //$query->where('VVV', 'CODE2');
                    Segments::queryAttachWhere($k, $v, $reference_query, $query, $options);
                }
            });
        } else {
            $parent_alias = $options['alias'];
            $group_alias = $parent_alias . '_' . (new \String2($data['values']['au_segdetail_group']))->lowercase()->snakeCase()->toString();
            switch ($data['values']['au_segdetail_sm_sharetype_code']) {
                case 'OPTIONS':
                    if (isset($data['shareable']['sm_sharefield_detail_model_code'])) {
                        Segments::queryAttachExists($data, $group_alias, $parent_alias, $options, $query_main);
                    } elseif (\Factory::model($data['shareable']['sm_sharefield_originated_model_code'], true)::class == $options['class']) {
                        // the same table
                        $query_main->where($data['operator'], [$parent_alias . '.' . $data['shareable']['sm_sharefield_sql_name'], 'IN', $data['value_ids'], false]);
                    }
                    break;
                case 'OPTION':
                    if (isset($data['shareable']['sm_sharefield_detail_model_code'])) {
                        Segments::queryAttachExists($data, $group_alias, $parent_alias, $options, $query_main);
                    } elseif (\Factory::model($data['shareable']['sm_sharefield_originated_model_code'], true)::class == $options['class']) {
                        // the same table
                        $query_main->where($data['operator'], [$parent_alias . '.' . $data['shareable']['sm_sharefield_sql_name'], 'IN', $data['values']['au_segdetail_options_value_id'], false]);
                    }
                    // no break
                case 'CODE':
                    if (isset($data['shareable']['sm_sharefield_detail_model_code'])) {
                        Segments::queryAttachExists($data, $group_alias, $parent_alias, $options, $query_main);
                    } elseif (\Factory::model($data['shareable']['sm_sharefield_originated_model_code'], true)::class == $options['class']) {
                        // the same table
                        $query_main->where($data['operator'], [$parent_alias . '.' . $data['shareable']['sm_sharefield_sql_name'], 'IN', $data['values']['au_segdetail_options_value_code'], false]);
                    }
                    break;
                case 'RANGE':
                    if (isset($data['shareable']['sm_sharefield_detail_model_code'])) {
                        Segments::queryAttachExists($data, $group_alias, $parent_alias, $options, $query_main);
                    } elseif (\Factory::model($data['shareable']['sm_sharefield_originated_model_code'], true)::class == $options['class']) {
                        $query_main->where($data['operator'], function ($query) use ($data, $group_alias, $parent_alias) {
                            $query->where('AND', [$parent_alias . '.' . $data['shareable']['sm_sharefield_sql_name'], '>=', $data['values']['au_segdetail_range_value_id1'], false]);
                            $query->where('AND', [$parent_alias . '.' . $data['shareable']['sm_sharefield_sql_name'], '<=', $data['values']['au_segdetail_range_value_id2'], false]);
                        });
                    }
                    break;
                default:
                    throw new \Exception('Field type: ' . $data['values']['au_segdetail_sm_sharetype_code'] . '?');
            }
        }
    }

    /**
     * Query attach exists
     *
     * @param mixed $data
     * @param mixed $group_alias
     * @param mixed $parent_alias
     * @param mixed $options
     * @param mixed $reference_query
     * @return void
     */
    protected static function queryAttachExists($data, $group_alias, $parent_alias, $options, & $reference_query): void
    {
        $reference_query->where($data['operator'], function (& $query) use ($data, $group_alias, $parent_alias, $options) {
            $model = \Factory::model($data['shareable']['sm_sharefield_detail_model_code'], true);
            $query = $model->queryBuilder(['alias' => $group_alias])->select();
            $query->columns(1);
            // check if we have connection
            if (empty($model->collections[$options['class']])) {
                throw new \Exception('Model does not have collection: ' . $options['class'] . '?');
            }
            $collection = $model->collections[$options['class']];
            foreach ($collection['map'] as $k => $v) {
                $query->where('AND', [$parent_alias . '.' . $k, '=', $group_alias . '.' . $v, true]);
            }
            // originated model
            $originated_model = \Factory::model($data['shareable']['sm_sharefield_originated_model_code'], true);
            $originated_collection = $model->collections[$originated_model::class];
            $originated_on = [];
            foreach ($originated_collection['map'] as $k => $v) {
                $originated_on[] = ['AND', [$group_alias . '.' . $v, '=', $group_alias . '_originated.' . $k, true]];
            }
            $query->join('INNER', $originated_model, $group_alias . '_originated', 'ON', $originated_on);
            // actual column
            switch ($data['values']['au_segdetail_sm_sharetype_code']) {
                case 'OPTIONS':
                    $query->where('AND', [$group_alias . '_originated.' . $data['shareable']['sm_sharefield_sql_name'], 'IN', $data['value_ids'], false]);
                    break;
                case 'OPTION':
                    $query->where('AND', [$group_alias . '_originated.' . $data['shareable']['sm_sharefield_sql_name'], '=', $data['values']['au_segdetail_options_value_id'], false]);
                    break;
                case 'RANGE':
                    $query->where('AND', function ($query) use ($data, $group_alias) {
                        $query->where('AND', [$group_alias . '_originated.' . $data['shareable']['sm_sharefield_sql_name'], '>=', $data['values']['au_segdetail_range_value_id1'], false]);
                        $query->where('AND', [$group_alias . '_originated.' . $data['shareable']['sm_sharefield_sql_name'], '<=', $data['values']['au_segdetail_range_value_id2'], false]);
                    });
                    break;
                case 'CODE':
                    $query->where('AND', [$group_alias . '_originated.' . $data['shareable']['sm_sharefield_sql_name'], '=', $data['values']['au_segdetail_options_value_code'], false]);
                    break;
                default:
                    throw new \Exception('Field type: ' . $data['values']['au_segdetail_sm_sharetype_code'] . '?');
            }
        }, 'EXISTS');
    }

    /**
     * Load by ID
     *
     * @param int $au_segment_id
     * @return array
     */
    public static function loadByID(int $au_segment_id): array
    {
        $result = \Numbers\Audiences\Audiences\Model\Collection\Segments::getStatic([
            'where' => [
                'au_segment_tenant_id' => \Tenant::id(),
                'au_segment_id' => $au_segment_id,
            ],
            'pk' => null,
            'single_row' => true,
        ]);
        return $result['data'] ?? [];
    }

    /**
     * Load contacts by campaign #
     *
     * @param int $au_campaign_id
     * @return array
     */
    public static function loadContactsByCampaignID(int $au_campaign_id): array
    {
        $segments = \Numbers\Audiences\Audiences\Model\Campaign\Segments::getStatic([
            'where' => [
                'au_campsegm_tenant_id' => \Tenant::id(),
                'au_campsegm_au_campaign_id' => $au_campaign_id,
            ],
            'pk' => ['au_campsegm_au_segment_id']
        ]);
        if (!$segments) {
            return [];
        }
        $result = [];
        $model = new \Numbers\Audiences\Audiences\Model\Campaign\Segments();
        foreach ($segments as $k => $v) {
            $sql = self::convertSegmentToSQL($k, [
                'columns' => ['au_contact_id'],
            ]);
            $contacts = $model->db_object->query($sql, 'au_contact_id');
            if (!$contacts['success']) {
                return $contacts;
            }
            $result = array_unique(array_merge($result, array_keys($contacts['rows'])));
        }
        return $result;
    }
}
