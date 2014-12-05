<?php
/**
 * Created by PhpStorm.
 * User: Matias
 * Date: 13.11.14
 * Time: 18:19
 */
class Mercuriel_Addtotop_Model_Observer extends Mage_Core_Model_Observer{

    public function addItemsToTopmenuItems($observer){
    //get the menu object: //Type Varien_Data_Tree_Node
    $menu = $observer->getMenu();
    //get the tree object in the menu //type Varien_Data_Tree
    $tree = $menu->getTree();
    //get current page handler
    $action = Mage::app()->getRequest()->getParams();
        Mage::log($action);
    $brandNodeId = 'category-node-paniers';
    //set the node id, label and url
    $data = array(
        'name' => Mage::helper('catalog')->__('Paniers de Fruits & Légumes'),
        'id' => $brandNodeId,
        'url' => Mage::getUrl('paniers-de-fruits-legumes/paniers-maraichers.html'),
        'is_active' => (isset($action['id']) && $action['id'] == '13')
    );
    //create a node object
    $brandNode = new Varien_Data_Tree_Node($data, 'id', $tree, $menu);
    //add the node to the menu
    $menu->addChild($brandNode);
    return $this;
}


}