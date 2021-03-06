<?php


namespace ConfigMaster\Form;

use Zend\InputFilter\InputFilter;
use Zend\InputFilter\InputFilterAwareInterface;
use Zend\InputFilter\InputFilterInterface;

class AppFormInputFilter implements InputFilterAwareInterface {
    
    protected $_inputFilter;

    /**
     * get config input filter
     * @return Ambigous <InputFilterInterface, \Zend\InputFilter\InputFilter>
     */
	public function __construct() {
        $this->_inputFilter = new InputFilter();
        
        $this->_inputFilter->add(array(
            'name'     => 'id',
            'required' => false,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 0,
                        'max'      => 200,
                    ),
                ),
            ),
        ));
        
        $this->_inputFilter->add(array(
            'name'     => 'name',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 200,
                    ),
                ),
            ),
        ));
        
        $this->_inputFilter->add(array(
            'name'     => 'desc',
            'required' => true,
            'filters'  => array(
                array('name' => 'StripTags'),
                array('name' => 'StringTrim'),
            ),
            'validators' => array(
                array(
                    'name'    => 'StringLength',
                    'options' => array(
                        'encoding' => 'UTF-8',
                        'min'      => 1,
                        'max'      => 200,
                    ),
                ),
            ),
        ));
    }

    /**
     * (non-PHPdoc)
     * @see \Zend\InputFilter\InputFilterAwareInterface::setInputFilter()
     */
    public function setInputFilter(InputFilterInterface $inputFilter) {
        $this->_inputFilter = $inputFilter;
        return $this;
    }
    
    /**
     * @return \Zend\InputFilter\InputFilter $_inputFilter
     */
    public function getInputFilter()
    {
        return $this->_inputFilter;
    }
}