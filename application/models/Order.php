<?php
class Order extends CI_Model
{
    public function deleteOrder($tb_name, $orderid)
    {
        $this->db->where('orderID', $orderid);
        $this->db->delete($tb_name);
    }
}