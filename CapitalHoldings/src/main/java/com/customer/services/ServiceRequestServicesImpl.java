package com.customer.services;

import com.customer.model.ProductService;
import com.customer.repository.ServiceRequestRepository;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;
import javax.ws.rs.core.Response;
import java.util.List;

@Service
public class ServiceRequestServicesImpl {

    @Autowired
    ServiceRequestRepository repository;

    

    public List<ProductService> getProducts() {
        return repository.findAll();
    }

    public ProductService getProduct(int ServiceID) {

        return repository.findOne(ServiceID);
    }


    public Response createProduct(ProductService productService) {
        ProductService savedProductService = repository.save(productService);
        return Response.ok(savedProductService).build();
    }

    public Response updateProduct(ProductService productService) {
        ProductService savedProductService = repository.save(productService);
        return Response.ok(savedProductService).build();
    }

    public void updateCus(int cusId) {
        repository.updateCusId(cusId,repository.getserviceId());
    }
}
