package com.customer.controller;

import java.util.List;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;

import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.customer.model.Order;

import com.customer.repository.OrderService;

@RestController
@RequestMapping(path="/order")

public class OrderController {
 
    @Autowired
    private OrderService orderService;
     
    @GetMapping(path="/",produces="application/json")
	public List<Order> getComplain()
	{
		return orderService.listAll();
		
	}
	//save data
	@PostMapping(path="/",consumes="application/json",produces="application/json")
	public void addComplain(@RequestBody Order order)
	{					
		 Integer id = orderService.listAll().size()+1;
		 order.setId(new Long(id));
		 orderService.save(order);						
	}
	@DeleteMapping(path="/",consumes="application/json",produces="application/json")
	public String deleteComplain(@PathParam("id")Long id)
	{
		
		orderService.delete(id);
		return "ID no is deleted";
		
	}
}