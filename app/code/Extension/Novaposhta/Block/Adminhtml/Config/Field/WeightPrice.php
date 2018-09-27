<?php
/**
 * Created by PhpStorm.
 * User: bucya
 * Date: 1/4/18
 * Time: 3:48 PM
 */

namespace Extension\Novaposhta\Block\Adminhtml\Config\Field;


use Magento\Config\Block\System\Config\Form\Field\FieldArray\AbstractFieldArray;

class WeightPrice extends AbstractFieldArray
{
    public function _prepareToRender()
    {
        $this->addColumn('weight', [
            'label' => __('Weight upper limit'),
            'style' => 'width:120px',
        ]);
        $this->addColumn('price', [
            'label' => __('Price'),
            'style' => 'width:120px',
        ]);
        $this->_addAfter = false;
        $this->_addButtonLabel = __('Add rate');
    }
}