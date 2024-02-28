<?php
class Product extends CI_Model
{
    public function getProducts()
    {
        return $this->db->get('tb_product')->result_array();
    }

    public function getProductByID($productid)
    {
        return $this->db->get_where('tb_product', array('productID' => $productid))->row_array();
    }

    public function deleteProduct($tb_name, $productid)
    {
        $this->db->where('productID', $productid);
        $this->db->delete($tb_name);
    }

    public function deleteProductCart($tb_name, $productid)
    {
        $this->db->where('cartID', $productid);
        $this->db->delete($tb_name);
    }

    public function deleteProductCategory($tb_name, $productcategoryid)
    {
        $this->db->where('productCategoryID', $productcategoryid);
        $this->db->delete($tb_name);
    }
}