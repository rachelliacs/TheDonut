<?php
class Order extends CI_Model
{
    public function deleteOrder($tb_name, $orderid)
    {
        $this->db->where('orderID', $orderid);
        $this->db->delete($tb_name);
    }

    public function createTransaction($data)
    {
        return $this->db->insert('tb_order', $data);
    }

    public function updateTransactionStatus($orderid, $orderstatus)
    {
        $this->db->where('orderID', $orderid);
        return $this->db->update('tb_order', array('orderStatus' => $orderstatus));
    }
}