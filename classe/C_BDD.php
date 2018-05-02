<?php
/**
 * Cette classe permet d'acc�der � la base de donn�e
 * @author Jovann Serreau
 * @version 1.0
 * @created 02-mai-2018 12:40:02
 */
class C_BDD
{

	/**
	 * La variable qui contient la connection � la base de donn�e
	 */
	private $M_BDD;

	function __construct()
	{
	}

	function __destruct()
	{
	}



	/**
	 * Cette fonction permet d'ins�rer un Client dans la base de donn�e
	 * 
	 * @param Name
	 * @param First_Name
	 * @param Age
	 * @param Dirth_Date
	 * @param Email
	 * @param Num_Tel
	 */
        public function Add_User_Client($Name,$First_Name,int $Age,$Bith_Date,$Email,$Num_Tel){
            
            $request_table_user = "INSERT INTO User (Name,FirstName,Age,Birth_Date,Id_Employee,Id_Custommers) VALUES (?,?,?,?,?,?)";
            $insert_new_user = $this->M_BDD->prepare($request_table_user);
            $insert_new_user->execute(array($Name,$First_Name,$Age,$Bith_Date,0,0));
            
            $last_id_user = $this->M_BDD->lastInsertID();
            
            $request_table_customer = "INSERT INTO customer (Email,Num_Tel) VALUES (?,?)";
            $insert_new_customer = $this->M_BDD->prepare($request_table_customer);
            $insert_new_customer->execute(array($Email,$Num_Tel));
            
            $last_id_user = $this->M_BDD->lastInsertID();
            
            $request_update = "UPDATE User SET Id_Employee = ".$last_id_user." WHERE id=".$last_id_user;
            $update_user = $this->M_BDD->prepare($request_update);
            $update_user->execute();
        }


        	/**
	 * Cette fonction permet de ins�rer un Employ�e � la base de donn�e
	 * 
	 * @param Name
	 * @param First_Name
	 * @param Age
	 * @param Bith_Date
	 * @param Email
	 * @param Rang
	 * @param Salary
	 */
	public function Add_User_Employee($Name, $First_Name, int $Age, $Bith_Date, $Email, $Rang, int $Salary)
	{
            $request_table_user = "INSERT INTO User (Name,FirstName,Age,Birth_Date,Id_Employee,Id_Custommers) VALUES (?,?,?,?,?,?)";
            $insert_new_user = $this->M_BDD->prepare($request_table_user);
            $insert_new_user->execute(array($Name,$First_Name,$Age,$Bith_Date,0,0));
            
            $last_id_user = $this->M_BDD->lastInsertID();
            
            $request_table_employee = "INSERT INTO Employee (Email,Rang,Salary) VALUES (?,?,?)";
            $insert_new_employee = $this->M_BDD->prepare($request_table_employee);
            $insert_new_employee->execute(array($Email,$Rang,$Salary));
            
            $last_id_employee = $this->M_BDD->lastInsertId();
            
            $request_update = "UPDATE User SET Id_Employee = ".$last_id_employee." WHERE id=".$last_id_user;
            $update_user = $this->M_BDD->prepare($request_update);
            $update_user->execute();
	}

	/**
	 * Cette fonction permet de cr�e la connection � la base de donn�e
	 * 
	 * @param Addresse
	 * @param DataBase
	 * @param Username
	 * @param Password
	 */
	public function Connect_DataBase($Addresse, $DataBase, $Username, $Password=null)
	{
            try{
                $this->M_BDD = new PDO('mysql:host='.$Addresse.';dbname='.$DataBase.'',$Username,$Password);
                return "Connection avec la base donnée : Valider";
            } catch (Exception $e){
                die("Erreur: ".$e->getMessage());
            }
	}

	/**
	 * Cette m�thode permet de r�cup�rer la connection � la base de donn�e
	 */
	public function Get_BBD()
	{
            return $this->M_BDD;
	}

	/**
	 * 
	 * @param Field
	 * @param ID
	 */
	public function Get_Info_Target($Table,$Field, int $ID)
	{
            $request = "SELECT ".$Field." FROM ".$Table." WHERE id = ".$ID;
            $sth = $this->M_BDD->prepare($request);
            $sth->execute();
            $rep = $sth->fetchAll();
            if($rep==null){
                return $rep[$Field];
            }
            else
            {
                return "Erreur: Aucune information trouver sur ce champs";
            }
	}

	/**
	 * Cette permet de r�cup�rer l'ID d'un utlisateur
	 * 
	 * @param Table
	 * @param Name
	 * @param First_name
	 */
	public function GetID_User($Table, $Name, $First_name)
	{
            if($Table){
                if($Name){
                    if($First_name){
                       $request = "SELECT id FROM ".$Table." WHERE Name=".$Name." AND FirstName=".$First_name;
                       $sth = $this->M_BDD->prepare($request);
                       $sth->execute();
                       $rep = $sth->fetchAll();
                       if($rep!=null){
                           return $rep['id'];
                       }
                       else
                       {
                           return "Aucun utilisateur trouver";
                       }
                    }
                    else
                    {
                         return "Vous avez pas préciser le Prénom de utilisateur";
                    }
                }
                else
                {
                    return "Vous avez pas préciser le nom de utilisateur";
                }
            }
            else
            {
                return "Vous avez pas préciser la table ";
            }
	}

	/**
	 * Cette fonction permet de r�cup�rer la liste compl�e des personne
	 * 
	 * @param Table
	 */
	public function GetList()
	{
            $request = "SELECT * FROM User";
            $sth = $this->M_BDD->prepare($request);
            $sth->execute();
            $recieve=$sth->fetchAll();
            foreach ($recieve as $row){
                echo 'Numéro Utilisateur: '.$row['id'];
                echo "Nom de l'Utilisateur: ".$row['Name'];
                echo "Prénon de l'Utilisateur: ".$row['FirstName'];
                echo "Date de naissance: ".$row['Birth_Date'];
                echo "Age: ".$row['Age'];
            }
	}

	/**
	 * Cette fonction permet de ce d�connecter de la base de donn�e. 
	 */
	public function Logout_DataBase()
	{
            $this->M_BDD=null;
	}

	/**
	 * Cette fonction permet de update un champs dans le base de donn�e
	 * 
	 * @param Field_Update
	 * @param Val
	 */
	public function Update(int $ID,$Table,$Field_Update, $Val)
	{
            
            $request = "UPDATE ".$Table." SET ".$Field_Update." = ".$Val." WHERE id = ".$ID;
            $sth = $this->M_BDD->prepare($request);
            $sth->execute();
            echo 'Update réusi';
            
	}
        
        /**
         * Cette fonction permet de suprimer un utilisateur
         * 
         * @param  id
         * @param emp_cus 
         */
        public function Delete(int $ID,int $emp_cus){
            
            if($emp_cus==1){
                $request_get_ID = "SELECT * FROM user WHERE id=".$ID;
                
                $sth = $this->M_BDD->prepare($request_get_ID);
                $sth->execute();
                $rep = $sth->fetchAll();
                
                $id_customer = $rep['id_Customers'];
                
                $request_remove_customer = ("DELETE FROM customer WHERE id=".$id_customer);
                $sth2 = $this->prepare($request_remove_customer);
                $sth2->execute();
                
                $request_remove_user = ("DELETE FROM user WHERE id=".$ID);
                $sth3 = $this->prepare($request_remove_user);
                $sth3->execute();
            }
            else {
                $request_get_ID = "SELECT * FROM user WHERE id=".$ID;
                
                $sth = $this->M_BDD->prepare($request_get_ID);
                $sth->execute();
                $rep = $sth->fetchAll();
                
                $id_employee = $rep['Id_Employee'];
                
                $request_remove_employee = ("DELETE FROM employee WHERE id=".$id_employee);
                $sth2 = $this->prepare($request_remove_employee);
                $sth2->execute();
                
                $request_remove_user = ("DELETE FROM user WHERE id=".$ID);
                $sth3 = $this->prepare($request_remove_user);
                $sth3->execute();               
            }
            
        }

}
?>