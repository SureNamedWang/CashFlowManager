<?php
class Cashflow_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
        $this->load->library('session');
    }

    //insert new cashflow
    //Cashflow add()
    public function add($data){
        $this->db->insert('cashflow',$data);
    }

    public function getSaldo($from,$to){
        $sql = "SELECT SUM(x.inout) AS saldo
        FROM
        (
        SELECT 
        case when c.tipe='in' then c.nominal
        ELSE c.nominal*-1
        END AS 'inout' 
        FROM cashflow c
        WHERE c.is_deleted = 0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'
        and c.is_approved = 1
        ) x";
        $query = $this->db->query($sql);
        

        $row= $query->row();
        if($row->saldo==null){
            return 0;
        }
        return $row->saldo;
    }

    public function getPemasukan($from,$to){
        $sql = "SELECT       
        SUM(c.nominal) AS 'total'    
        FROM cashflow c              
        WHERE c.is_deleted=0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'
        AND c.is_approved=1
        AND c.tipe = 'in'";

        $query = $this->db->query($sql);
        
        $row=$query->row();
        if($row->total==null){
            return 0;
        }
        return $row->total;
    }

    public function getPengeluaran($from,$to){
        $sql = "SELECT       
        SUM(c.nominal) AS 'total'    
        FROM cashflow c              
        WHERE c.is_deleted=0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'
        AND c.is_approved=1
        AND c.tipe = 'out'";

        $query = $this->db->query($sql);
        
        $row=$query->row();
        if($row->total==null){
            return 0;
        }
        return $row->total;
    }

    public function getPemasukanPending($from,$to){
        $sql = "SELECT       
        SUM(c.nominal) AS 'total'    
        FROM cashflow c              
        WHERE c.is_deleted=0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'
        AND c.is_approved=0
        AND c.tipe = 'in'";

        $query = $this->db->query($sql);
        
        $row=$query->row();
        if($row->total==null){
            return 0;
        }
        return $row->total;
    }

    public function getPengeluaranPending($from,$to){
        $sql = "SELECT       
        SUM(c.nominal) AS 'total'    
        FROM cashflow c              
        WHERE c.is_deleted=0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'
        AND c.is_approved=0
        AND c.tipe = 'out'";

        $query = $this->db->query($sql);
        
        $row=$query->row();
        if($row->total==null){
            return 0;
        }
        return $row->total;
    }
}