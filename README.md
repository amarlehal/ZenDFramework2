ZenDFramework2
=============

Zend Framework 2

How to add Zend\Form\Element\Select options Dynamiically .

There are Two easy step to achieve this

1. First of the all you need to het the Zend\Adapter\Adapter Service in your controller and
   Then create an intance of the form with it  to get the records from database.

   In your Action
   
   $dbAdapter = $this->getServiceLocator()->get('Zend\Db\Adapter\Adapter');
   $form = new NewscontentForm ($dbAdapter);
   
2. Now in your form

  namespace Test\Form;
 
use Zend\Form\Form;
 use Zend\Db\Adapter\AdapterInterface;
 use Zend\Db\Adapter\Adapter;
 class TestForm extends Form
 {
 protected $adapter;
 public function __construct(AdapterInterface $dbAdapter)
 {
 $this->adapter =$dbAdapter;
 parent::__construct("Newscontent Form");
 $this->setAttribute('method', 'post');
 //your select field
 $this->add(array(
 'type' => 'Zend\Form\Element\Select',
 'name' => 'name',
 'tabindex' =>2,
 'options' => array(
 'label' => 'Author',
 'empty_option' => 'Please select an author',
 'value_options' => $this->getMySelectSelectOptions(),
 )
 ));
 
// another fields
 
}
 public function getmMySelectOptions()
 {
 $dbAdapter = $this->adapter;
 $sql = 'SELECT id,name FROM newsauthor where active=1 ORDER BY sortorder ASC';
 $statement = $dbAdapter->query($sql);
 $result = $statement->execute();
 
$selectData = array();
 
foreach ($result as $res) {
 $selectData[$res['id']] = $res['name'];
 }
 return $selectData;
 }
 
}

That is all .Now you can easily access all the values in zend select options.


