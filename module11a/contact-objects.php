<?php

// Explain Class BaseContact

/*
 * BaseContact is an abstract class that consists of 2 abstract methods, get_name and set_name.
 * These methods will be inherited by following subclasses. The abstract class instantiates the var phone_number
 * and a __toString() function, which is used to print Name:phone#
*/

abstract class BaseContact
{
    abstract public function get_name();
    abstract public function set_name($name);
    public $phone_number;
    public function __toString()
    {
        $s="".$this->get_name();
        if($this->phone_number)
        {
            if(count($s)>0)
            {
                $s.=":";
            }
            else
            {
                $s.="Someone's Phone Number:";
            }
            $s.=$this->phone_number;
        }
        return $s;
    }
}

//What is an extends class?

/*
 * PersonContact is a subclass extending the BaseContact abstract class. It inherits phone_number and returns the implementation
 * of get_name() to return the first name and last name. It also inherits set_name() to spit the names into first and last.
 * It's also using a constructor for initializing the objects passed in the class, accepting default null params for initializing objects.
*/

class PersonContact extends BaseContact
{
    public $first_name;
    public $last_name;
    public function __construct($first_name=null,$last_name=null)
    {
        $this->first_name=$first_name;
        $this->last_name=$last_name;
    }
    public function get_name()
    {
        return $this->first_name." ".$this->last_name;
    }
    public function set_name($name)
    {
        $split_name=explode(" ",$name,2);
        $length=count($split_name);
        $rv=true;
        if($length==0)
        {
            $rv=false;
        }
        elseif($length==1)
        {
            $this->first_name=$this->last_name=$split_name[0];
        }
        else
        {
            $this->first_name=$split_name[0];
            $this->last_name=$split_name[1];
        }
        return $rv;
    }
}

//What does the get and set methods do?
//What is the _construct() for?

/*
 * OrganizationContact is another subclass that inherits properties from the BaseContact abstract class. It extends
 * functionality to return the name from get_name() and set_name(). This returns the name and sets the given name for the
 * passed person info. It's also using a constructor for initializing the objects passed in the class similar to PersonContact.
*/

class OrganizationContact extends BaseContact
{
    public $name;
    public function __construct($name=null)
    {
        $this->name=$name;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function set_name($name)
    {
        $this->name=$name;
    }
}
?>
<!doctype html>
<html>
<head>
    <title>Object Oriented Programming-Simple Class</title>
</head>

<body>
    <strong>Person Contact,Empty Constructor,Two Names</strong>
    <br>
    <?php
    $angelo=new PersonContact();
    $angelo->set_name("Angelo Roncalli");
    $angelo->phone_number=777-777-7777;
    ?>
    <p><?php print $angelo?></p>
    <strong>Person Contact,Empty Constructor,Three Names</strong>
    <br>
    <?php
    $john=new PersonContact();
    $john->set_name("John Giuseppe Roncalli");
    $john->phone_number=777-777-7777;
    ?>
    <p>
        <?php print $john?>
    </p>
    <strong>Person Contact,Parameterized Constructor</strong>
    <br>
    <?php
    $mary=new PersonContact("Mary","Roncalli");
    $mary->phone_number=777-777-7777;
    ?>
    <p><?php print $mary?></p>
    <strong>Organization Contact,Empty Constructor</strong>
    <br>
    <?php
    $parish=new OrganizationContact();
    $parish->set_name("Parish");
    $parish->phone_number=777-777-7777;
    ?>
    <p><?php print $parish?></p>
    <strong>Organization Contact,Parameterized Constructor</strong>
    <br>
    <?php
    $parish=new OrganizationContact("Parish");
    $parish->phone_number=777-777-7777;
    ?>
    <p><?php print $parish?></p>
</body>
</html>