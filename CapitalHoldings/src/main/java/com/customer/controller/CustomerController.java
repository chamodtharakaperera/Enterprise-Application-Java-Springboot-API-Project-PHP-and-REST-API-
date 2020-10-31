package com.customer.controller;

import java.util.List;

import javax.websocket.server.PathParam;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;

import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import com.customer.model.Customer;

import com.customer.repository.CustomerService;
import com.customer.repository.EmailService;

@RestController
@RequestMapping(path="/customer")
public class CustomerController {
	@Autowired
	private CustomerService customerService;
	@Autowired
	private EmailService frmMail;
	//Retrieve data
	@GetMapping(path="/",produces="application/json")
	public List<Customer> getComplain()
	{
		return customerService.getAllCustomers();
		
	}
	@GetMapping(path="/verify",produces="application/json")
	public int verifyCustomer(@PathParam("uname")String uname,@PathParam("pass")String pass)
	{
		return customerService.verifyCustomer(uname,pass);
		
	}
	@GetMapping(path="/checkExist",produces="application/json")
	public int checkExist(@PathParam("uname")String uname,@PathParam("email")String email)
	{
		return customerService.checkExist(email,uname);
		
	}
	
	@GetMapping(path="/save")
	public void addCustomer(@PathParam("id")int id)
	{	
		
	customerService.save(frmMail.waitingCustomers.remove(id));	
							
	}
	@GetMapping(path="/cusId")
	public int getCurrentCusId(@PathParam("usrname")String usrname)
	{	
		
		return customerService.getCurrentCusId(usrname);	
							
	}
}
