package com.customer.model;

import com.fasterxml.jackson.annotation.JsonBackReference;
import com.fasterxml.jackson.annotation.JsonFormat;


import javax.persistence.*;


@Entity
public class ProductService {

    @Id
    @GeneratedValue(strategy = GenerationType.AUTO)
    private int ServiceID;
    private String product_id;
    private String purchase_id;
    @JsonFormat(pattern = "yyyy-mm-dd",shape = JsonFormat.Shape.STRING)
    private String DOService;
    private String probDesc;
    private String status;

    public String getStatus() {
        return status;
    }

    public void setStatus(String status) {
        this.status = status;
    }



    public int getServiceID() {
        return ServiceID;
    }

    public String getProduct_id() {
        return product_id;
    }

    public void setProduct_id(String product_id) {
        this.product_id = product_id;
    }

    public void setServiceID(int serviceID) {
        ServiceID = serviceID;
    }

    public String getPurchase_id() {
        return purchase_id;
    }

    public void setPurchase_id(String purchase_id) {
        this.purchase_id = purchase_id;
    }

    public String getDOService() {
        return DOService;
    }

    public void setDOService(String DOService) {
        this.DOService = DOService;
    }

    public String getProbDesc() {
        return probDesc;
    }

    public void setProbDesc(String probDesc) {
        this.probDesc = probDesc;
    }
    @ManyToOne(fetch = FetchType.EAGER)
    @JoinColumn(name = "cusid",referencedColumnName = "cusId")
    @JsonBackReference
    private Customer customer;


    public Customer getCustomer() {
        return customer;
    }

    public void setCustomer(Customer customer) {
        this.customer = customer;
    }

    /*public Product getProduct() {
        return product;
    }

    public void setProduct(Customer customer) {
        this.product = product;
    }*/

}
