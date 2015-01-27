<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Zend_View_Helper_GetTags extends Zend_Controller_Action_Helper_Abstract
 {
    function getTags()
    {
        $listTags = array();
        $count = 5477;

        $tabTags = new Application_Model_DbTable_Tags();
        $select = $tabTags->select();
        $select->limit(60, mt_rand(0, 5417));
        $tags = $tabTags->fetchAll($select)->toArray();
        foreach($tags as $tag)$listTags[] = $tag['tag'];

        return $listTags;
    }
}
?>
