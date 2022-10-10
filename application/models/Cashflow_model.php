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

    //get Saldo
    //Home index()
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

    //get Pemasukan
    //Home index()
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

    //get Pengeluaran
    //Home index()
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

    //get PemasukanPending
    //Home index()
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

    //get PengeluaranPending
    //Home index()
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

    //get All Cash Flow
    //Cashflow index()
    public function getCashFlow($from,$to){
        $sql = "SELECT *
        from cashflow c
        where c.is_deleted=0
        and c.created_date between '".$from." 00:00:01' and '".$to." 23:59:59'";

        $query = $this->db->query($sql);

        return $query->result();
    }

    //approve Cashflow
    //Cashflow approve()
    public function ApproveCashFlow($id,$data){
        $this->db->where('cashflow_id',$id);

        $this->db->update('cashflow',$data);
    }

    //delete Cashflow
    //Cashflow delete()
    public function DeleteCashFlow($id,$data){
        $this->db->where('cashflow_id',$id);

        $this->db->update('cashflow',$data);
    }
}