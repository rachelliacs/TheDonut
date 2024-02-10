<?php
class Product extends CI_Model
{
    public function deleteProduct($tb_name, $productid)
    {
        $this->db->where('productID', $productid);
        $this->db->delete($tb_name);
    }

    public function deleteProductCategory($tb_name, $productcategoryid)
    {
        $this->db->where('productCategoryID', $productcategoryid);
        $this->db->delete($tb_name);
    }
}