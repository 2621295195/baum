<?php

if (!function_exists('flatten_tree')) {

    /**
     * Transform a hierarchical array of nodes to a flat array. The order of
     * the nodes returned in the array will match the order they appear in the
     * original array.
     *
     * @param  array        $tree     Array of nested nodes
     * @param  array|null   $only     Array of keys to return in each node
     *                                or null for all of the keys
     * @param  array        &$result  Recursion temporary variable
     * @return array                  Flattened array
     */
    function flatten_tree($tree, $only = [], &$result = []) {
        foreach($tree as $k=>$v) {
            $result[$v['id']] = $only ? array_only($v, $only) : $v;

            if(isset($v['children'])) {
                flatten_tree($v['children'], $only, $result);
            }
        }

        return $result;
    }

}
