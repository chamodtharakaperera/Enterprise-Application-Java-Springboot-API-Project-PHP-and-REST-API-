package com.customer.repository;

import java.util.List;


import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

import com.customer.model.Order;
 
@Service

public class OrderService {
 
    @Autowired
    private OrderRepository repo;
     
    public List<Order> listAll() {
        return repo.findAll();
    }
     
    public void save(Order product) {
        repo.save(product);
    }
     
    
     
    public void delete(long id) {
        repo.delete(id);
    }
}
