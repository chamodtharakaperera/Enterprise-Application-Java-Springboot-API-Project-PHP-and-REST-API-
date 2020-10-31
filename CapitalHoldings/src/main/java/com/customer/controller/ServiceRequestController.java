package com.customer.controller;

import com.customer.model.ProductService;

import com.customer.services.ServiceRequestServicesImpl;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.*;


import java.util.List;

import javax.websocket.server.PathParam;

@RestController
@RequestMapping(path="/serviceapi")
public class ServiceRequestController {


    @Autowired
    private ServiceRequestServicesImpl serv;


    //Retrieve data
    @RequestMapping(value="/proserv",method = RequestMethod.GET)
    public List<ProductService> getProductService()
    {
        return serv.getProducts();
    }

    //save data
    @RequestMapping(value = "/proserv", method = RequestMethod.POST)
    public void saveProductService(@PathParam("cusid")int cusid,@RequestBody ProductService productService) {
        serv.createProduct(productService);
        serv.updateCus(cusid);
    }
}
