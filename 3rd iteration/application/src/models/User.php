<?php
 class User {
    private $connection;
    public function __construct($conn)
    {
        $this->connection=$conn;
    }
    public function login($email, $password) {
        $query = $this->connection->prepare("SELECT * FROM user_credentials WHERE email = :email");
        $query->execute([
            "email" => $email,
        ]);
        $user = $query->fetch();
        if ($user && password_verify($password, $user["upassword"])) {
            //pass arguments to session in user variable
            $_SESSION["user"]=$user;
            $_SESSION["userid"]=$user["userid"];
            $_SESSION["role"]=$user["urole"];
            return true;
        }
        else {
            return false;
        }
    }
    public function register($email, $username, $password, $role) {
        
        $emailQuery = "SELECT * FROM user_credentials WHERE email = :email";
        $emailStatement = $this->connection->prepare($emailQuery);
        $emailStatement->execute(['email' => $email]);

        $usernameQuery = "SELECT * FROM user_credentials WHERE username = :username";
        $usernameStatement = $this->connection->prepare($usernameQuery);
        $usernameStatement->execute(['username' => $username]);

        if ($emailStatement->rowCount() > 0 || $usernameStatement->rowCount() > 0) {
            // Email or Username already exist, quit registration
            return false;
        }
        
        $query = $this->connection->prepare("INSERT INTO user_credentials (username, upassword, email, urole) VALUES (:username, :upassword, :email, :urole)");
        $password_hashed = password_hash($password, PASSWORD_DEFAULT);
        $query->execute([
            "email" => $email,
            "username" => $username,
            "upassword" => $password_hashed,
            "urole" => $role
        ]);

        return $this->login($email, $password);
    }
    
    public function selectSales(){
        $query = $this->connection->prepare("SELECT t.od,t.region,
        t.tdate,
        t.country,
        t.discharging_port,
        t.delivery_mode,
        t.customer_name,
        t.customer_group,
        t.category,
        t.pid,
        t.pallets,
        t.branding,
        t.total_volume,
        t.volume_per_container,
        t.incoterm,
        t.status1,
        t.status2,
        t.payment_terms,
        t.payment_terms_days,
        t.estimated_freight,
        t.estimated_fob FROM temporary_full_table AS t");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }

    public function selectSalesOd($od){
        $query = $this->connection->prepare("SELECT t.od,t.region,
        t.tdate,
        t.country,
        t.discharging_port,
        t.delivery_mode,
        t.customer_name,
        t.customer_group,
        t.category,
        t.pid,
        t.pallets,
        t.branding,
        t.total_volume,
        t.volume_per_container,
        t.incoterm,
        t.status1,
        t.status2,
        t.payment_terms,
        t.payment_terms_days,
        t.estimated_freight,
        t.estimated_fob  FROM temporary_full_table AS t WHERE od = $od");
        
        $query->execute([
            
        ]);
        return $query->fetchAll() ;
    }
    public function selectADVod($od){
        $query = $this->connection->prepare("SELECT t.od, t.ac_status, t.contract_id, t.contract_status, t.invoice, t.payment_status FROM temporary_full_table AS t WHERE od = $od");
        
        $query->execute([
            
        ]);
        return $query->fetchAll() ;
    }


    public function selectAllOd($od){
        $query = $this->connection->prepare("SELECT * FROM temporary_full_table WHERE od = $od");
        
        $query->execute([
            
        ]);
        return $query->fetchAll() ;
    }

    public function selectLogistics(){
        $query = $this->connection->prepare("SELECT t.od, t.supplier, t.transporter, t.inspection, t.shipping_line, t.shipped_via, t.loading_date_at_plant, t.quantity_removed_from_the_site, t.stuffing_date, t.real_freight, t.real_fob, t.blno, t.sequence_date, t.transit_time, t.eta, t.bldate, t.blmonth, t.blquarter,t.blyear,t.net_quantity,t.clearance_date,t.userComment,t.type_tc,t.port_loading,t.freight_invoice,t.freight_invoice2,t.freight_invoice3,t.days_of_storage,t.storage_cost,t.days_of_storage2,t.storage_cost2,t.days_of_storage3,t.storage_cost3,t.jours_half,t.jours_1,t.jours_2,t.jours_3,t.mois_facturation  FROM temporary_full_table AS t");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }
    
    public function selectLogisticsOd($od){
        $query = $this->connection->prepare("SELECT t.od, t.supplier, t.transporter, t.inspection, t.shipping_line, t.shipped_via, t.loading_date_at_plant, t.quantity_removed_from_the_site, t.stuffing_date, t.real_freight, t.real_fob, t.blno, t.sequence_date, t.transit_time, t.bldate, t.net_quantity,t.clearance_date,t.userComment,t.type_tc,t.port_loading,t.freight_invoice,t.freight_invoice2,t.freight_invoice3,t.days_of_storage,t.storage_cost,t.days_of_storage2,t.storage_cost2,t.days_of_storage3,t.storage_cost3,t.jours_half,t.jours_1,t.jours_2,t.jours_3  FROM temporary_full_table AS t  WHERE od = $od");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }
    public function selectAll(){
        $query = $this->connection->prepare("SELECT * FROM temporary_full_table");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }
    public function selectADV(){
        $query = $this->connection->prepare("SELECT t.od, t.ac_status,t.payment_terms_days, t.bldate, t.contract_id, t.contract_status, t.invoice, t.payment_status, t.net_quantity, t.total_volume FROM temporary_full_table AS t");
        
        $query->execute([
        
        ]);
        return $query->fetchAll() ;
    }

    public function pushSales(){
         
    }

    public function getUsernameFromId($id) {
        $query = $this->connection->prepare("CALL WelcomeProcedure(:id)");
        $query->execute([
            "id" => $id
        ]);
        $theUserId = $query->fetch();
        echo "<h1 class='wow fadeInUp' data-wow-delay='.2s'>Welcome back $theUserId[0] </h1>";
    }
    
}
?>











